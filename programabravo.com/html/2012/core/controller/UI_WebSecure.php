<?php
class UI_WebSecure{

var $pageTitle;
var $metaTag;

var $oContentLang;
var $oSectionLang;
var $sectionID;
var $langID;
var $minisiteID;

var $module;
var $Command;
var $FormView;
var $msgError;

    function __construct($FormView, $Command){
        global $sectionID, $langID, $minisiteID;

        $this->sectionID=$sectionID;
        $this->langID=$langID;
        $this->minisiteID=$minisiteID;

        $this->FormView     =$FormView;
        $this->Command      =$Command;
        $this->module       ='default'; // Default Module
        $this->setPageHeaders();
        $this->processFormAction();
    }

    function setPageHeaders(){
        global $oContentHome;

        $this->pageTitle =SEO::get_SiteName();
        $this->metaTag   =array('title'=>'', 'description'=>'', 'keywords'=>'');

        if(isset($oContentHome)){
            $this->oContentLang=$oContentHome;
            $this->oSectionLang=CmsSectionLang::getItem($this->oContentLang->sectionID, $this->oContentLang->langID);

            $this->pageTitle.=": ".$this->oContentLang->title;
            $this->metaTag  =XMLParser::getArray_MetaTag($this->oContentLang->metaTag);
        }
    }

    function processFormAction(){

        switch($this->Command){
            case "delete":

                break;
            case "insert":

                break;
            case "update":

                break;
        }

        //$this->addError($DAO::GetErrorMsg());
    }

    function getFormView(){

        switch($this->FormView){
            case "login":
            case "registro":
            case "perfil":
            case "portafolio":
            case "operaciones":
            case "historial":
            case "ranking":
            case "condiciones":
            case "grafico":
            case "operacion_conf":
                $view=$this->FormView.".php";
                break;
            default:
                $this->FormView='';
                $view="index.php";
                break;
        }

        return $view;
    }


    function addError($strErr){
        if($strErr=="") return;

        $this->msgError.="<li>".$strErr."</li>\n";
    }

    function getErrorMessage(){
        return $this->msgError;
    }

    function getPaging($DAO){
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