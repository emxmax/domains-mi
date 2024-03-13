<?php
session_start();
header("content-type: utf-8");
require("../core/config/main.php");

$oRegForm = new eCrmRegisterForm();
$oRegForm->formID=isset($_REQUEST['formID'])? $_REQUEST['formID']: NULL;
$field=isset($_POST['field'])? $_POST['field']: array();
$upload=isset($_FILES['field'])? $_FILES['field']: NULL;

//Common Fields
$oRegForm->name		=isset($_POST['name'])? $_POST['name']: NULL;
$oRegForm->lastname	=isset($_POST['lastname'])? $_POST['lastname']: NULL;
$oRegForm->surname	=isset($_POST['surname'])? $_POST['surname']: NULL;
$oRegForm->phone	=isset($_POST['phone'])? $_POST['phone']: NULL;
$oRegForm->email	=isset($_POST['email'])? $_POST['email']: NULL;
$oRegForm->countryID=isset($_POST['countryID'])? $_POST['countryID']: NULL;
$oRegForm->city		=isset($_POST['city'])? $_POST['city']: NULL;
$oRegForm->district	=isset($_POST['district'])? $_POST['district']: NULL;
$oRegForm->address	=isset($_POST['address'])? $_POST['address']: NULL;
$oRegForm->state	=2; //Pendiente

if($oRegForm->formID!=NULL){
	//Submit Form
	RegisterForm($oRegForm, $field, $upload);
}

function RegisterForm($oRegForm, $field, $upload){
	
	if(CrmRegisterForm::AddNew($oRegForm)){
		while (list($alias, $value) = each($field)){
			if(!RegisterField($oRegForm, $alias, $value)){
				CrmRegisterForm::Delete($oRegForm);
				RaiseError('Ocurrio un error al enviar los datos!');
				return;
			}
		}
		
		if($upload!=NULL){
			$upload=UploadFile::fixArray($upload);
			$path='../userfiles/form/'.$oRegForm->formID.'/';
			foreach($upload as $file){
				$file["name"]=md5($file["name"]).'.'.end(explode('.', $file["name"]));
				if(!RegisterField($oRegForm, key($upload), $file["name"])){
					CrmRegisterForm::Delete($oRegForm);
					RaiseError('Ocurrio un error al enviar los datos!');
					return;
				}
			
				if(UploadFile::ValidateUpload($file)){
					UploadFile::MoveUploaded($file, $path);
				}else{
					CrmRegisterForm::Delete($oRegForm);
					RaiseError(UploadFile::$ErrorMessage);
					return;
				}
			}
		}
		
		//Enviar Notificacion al administrador
		Email::Send_RegisterForm($oRegForm->registerID);
		
		Response('Gracias por registrarse.');
	}
	
}

function RegisterField($oRegForm, $alias, $value){
	$oField=CrmFormField::getItem_Alias($alias);
	if($oField!=NULL){
		$oRegField=new CrmRegisterField();
		$oRegField->registerID=$oRegForm->registerID;
		$oRegField->fieldID=$oField->fieldID;
		$oRegField->value=($oField->fieldType!=2)? $value: NULL;
		$oRegField->textValue=($oField->fieldType==2)? $value: NULL;
		return CrmRegisterField::AddNew($oRegField);
	}
	else
		return false;
}

function Response($msg){
	echo '<script type="text/javascript">parent.getMessage(1, "'.$msg.'");</script>';
	exit;
}

function RaiseError($err){
	echo '<script type="text/javascript">parent.getMessage(0, "'.$msg.'");</script>';
	exit;
}

?>