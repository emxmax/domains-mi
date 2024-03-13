<?php

class UI_AdmPage{
var $moduleID;
var $menuID;
var $parentMenuID;
var $moduleName;
var $moduleForm;
var $moduleParams;
var $FormView;
var $ItemType;
var $ItemTitle;
var $Command;
var $StaticDAO;

var $UsrSession;
var $lUserEvents;
var $Page;
var $OrderBy;

var $clientScript;
var $msgError;
var $msgAlert;

var $urlContent;

	function UI_AdmPage($moduleID, $FormView, $Command){
	global $ADMIN;
	
		$oModule=AdmModule::getItem($moduleID);
		if($oModule!=null){
			$this->moduleID		=$oModule->moduleID;
			$this->moduleName	=$oModule->moduleName;
			$this->moduleForm	=$oModule->moduleForm;
			$this->moduleParams	=$oModule->moduleParams;
			$this->menuID		=$oModule->menuID;
			$this->parentMenuID	=$this->getParentMenuID($oModule->menuID);
		}
		else
			return false;

		$this->FormView		=(isset($FormView))?$FormView:"list";
		$this->Command		=$Command;
		$this->UsrSession	=isset($_SESSION[ADM_SESSION_ID])? $_SESSION[ADM_SESSION_ID]: NULL;
		$this->lUserEvents	=(isset($this->UsrSession["userEventList"])) ? unserialize($this->UsrSession["userEventList"]) : null;
	}

	function ValidateEvent($command){
		
		if($this->lUserEvents == null || $this->lUserEvents->getLength()==0){
			$this->addError("No tiene acceso a este m&oacute;dulo, permiso denegado.");
			return false;
		}
		
		//var_dump($this->lUserEvents);
		foreach($this->lUserEvents as $oEvent){
			if($oEvent->moduleID == $this->moduleID && $oEvent->command == $command){
				return true;
			}
		}
		
		return false;
	}
	
	function getEvent($command){
		
		if($this->lUserEvents == null || $this->lUserEvents->getLength()==0){
			return null;
		}
		
		//var_dump($this->lUserEvents);
		foreach($this->lUserEvents as $oEvent){
			if($oEvent->moduleID == $this->moduleID && $oEvent->command == $command){
				return $oEvent;
			}
		}
		
		return null;
	}
	
	function GetCommandEvent(){
		
		switch($this->Command){
			case "insert":
			case "update":
			case "moveUp":
			case "delete": $command="ADMINISTRAR"; break;
			case "send":
			case "list":
			case "": $command="LISTAR"; break;
			default: $command=$this->Command; break;
		}
		
		return $command;
	}

	function getParentMenuID($menuID){

		$oMenu=AdmMenu::getItem($menuID);
		if($oMenu!=null){
			$menuID= ($oMenu->parentMenuID>0) ? $this->getparentmenuID($oMenu->parentMenuID): $oMenu->menuID;
		}
		return $menuID;
	}
	
	function processFormAction($DAO, $oItem){
	
		$this->StaticDAO=$DAO;
		$DAO::$page		=$this->Page;
		$DAO::$orderBy	=$this->OrderBy;
		
		if(!$this->ValidateEvent("ADMINISTRAR")){
			$this->addAlert("Acceso limitado, su perfil solo tiene permisos de lectura.");
			$this->addClientScript("var userReadOnly=true;");
		}
		
		if(!$this->ValidateEvent($this->GetCommandEvent($this->Command))){
			$this->addError("No puede realizar esta acci&oacute;n, permiso denegado.");
			return;
		}

		if($this->FormView=="xls"){
			header("Content-Type: application/vnd.ms-excel");	
			header("Content-Disposition: attachment; filename=\"".$this->moduleName.".xls\";" );
		}

		switch($this->Command){
			case "delete":
				$DAO::Delete($oItem);
				//$oEvent=this->getEvent($this->Command);
				//Insetat AdmRegistroLog::Insert($this->UsrSession->userID, $oEvent->eventID, "El usuario elimino un registro")
				break;
			case "insert":
				if ($DAO::AddNew($oItem)){
					//Insetat Registro Log
					$this->FormView="list";
				}
				break;
			case "update":
				if ($DAO::Update($oItem)){
					//Insetat Registro Log
					$this->FormView="list";
				}
				break;
		}

		$this->addError($DAO::GetErrorMsg());
	}

	function getFormView(){

		switch($this->FormView){
			case "":
			case "list":
				$strForm="list.php";
				break;
			case "edit":
			case "add":
				$strForm="form.php";
				break;
			default:
				$strForm=$this->FormView.".php";
				break;
		}
		
		return $this->moduleForm.".".$strForm;
	}
	
	function getFormTitle(){
	
		switch($this->FormView){
			case "":
			case "list":
				$title="Listado";
				break;
			case "add":
				$title="Nuevo";
				break;
			case "edit":
				$title="Editar";
				break;
			case "section":
				$title="Editar Secci&oacute;n";
				break;
			default:
				$title=$this->FormView;
				break;
		}
		
		if($this->ItemType!="") $title.=" - ".$this->ItemType;
		if($this->ItemTitle!="") $title.=": ".$this->ItemTitle;
		
		return $title;
	}
	
	function getURL($params=''){
		if(!isset($this->urlContent)){
			$aurl=explode('/', $_SERVER["PHP_SELF"]);
			$url=end($aurl)."?moduleID=".$this->moduleID; //$url=$this->moduleForm.".php?moduleID=".$this->moduleID;
			$url.=($this->moduleParams!="" ? "&".$this->moduleParams : "");
			$url.=($params!="" ? "&".$params : "");
			$this->urlContent=$url;
		}
		
		return $this->urlContent;
	}

	function addError($msg){
		if($msg=="") return;
		
		$this->msgError.="<li>".$msg."</li>\n";
	}

	function addAlert($msg){
		if($msg=="") return;
		
		$this->msgAlert.="<li>".$msg."</li>\n";
	}

	function addClientScript($script){
		if($script=="") return;
		
		$this->clientScript.=$script."\n";
	}

	function getSortingHeader($field, $title){

		$arrOrder =  explode(" ", $this->OrderBy);
		$sortType = "ASC";
		$className="";
	
		if($arrOrder[0]==$field){
			$sortType=($arrOrder[1]=="ASC") ? "DESC" : "ASC";
			$className="sort$sortType";
		}

		$sortOrder="'$field $sortType'";
		
		return "<a href=\"javascript:OrderBy(".$sortOrder.")\" class=\"$className\">$title</a>";
		
	}

	function getPaging(){
		$DAO=$this->StaticDAO;
		$pageCount=$DAO::GetPageCount();
		
		$xlink="";
		if ($pageCount>1) {
			$xlink="Pag. ";
		
			$j=floor($this->Page/10)*10;
			if($this->Page>=10) $xlink.="<a href='javascript:MovePg(".($j-1).")'><<</a> ";
			for ($i=0;$i<10;$i++){
				if($j==$this->Page)
					$xlink.= "<strong>".($j+1)."</strong> ";
					else
						$xlink.= "<a href='javascript:MovePg($j)'>".($j+1)."</a> ";
				if(($j+1)>=$pageCount) break;
				$j++;
			}
	
			if(($j+1)<$pageCount) $xlink.="<a href='javascript:MovePg($j)'>>></a> ";
		
		} 	

		return $xlink;
	}

}

?>