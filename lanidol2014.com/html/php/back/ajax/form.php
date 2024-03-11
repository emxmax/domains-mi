<?php
session_start();
header("content-type: utf-8");
require("../core/config/main.php");

$oRegForm = new eCrmRegisterForm();
$oRegForm->formID=isset($_REQUEST['formID'])? $_REQUEST['formID']: NULL;
$field=isset($_REQUEST['field'])? $_REQUEST['field']: array();
//Common Fields
$oRegForm->name		=isset($_REQUEST['name'])? $_REQUEST['name']: NULL;
$oRegForm->lastname	=isset($_REQUEST['lastname'])? $_REQUEST['lastname']: NULL;
$oRegForm->surname	=isset($_REQUEST['surname'])? $_REQUEST['surname']: NULL;
$oRegForm->phone	=isset($_REQUEST['phone'])? $_REQUEST['phone']: NULL;
$oRegForm->email	=isset($_REQUEST['email'])? $_REQUEST['email']: NULL;
$oRegForm->countryID=isset($_REQUEST['countryID'])? $_REQUEST['countryID']: NULL;
$oRegForm->city		=isset($_REQUEST['city'])? $_REQUEST['city']: NULL;
$oRegForm->district	=isset($_REQUEST['district'])? $_REQUEST['district']: NULL;
$oRegForm->address	=isset($_REQUEST['address'])? $_REQUEST['address']: NULL;
$oRegForm->state	=2; //Pendiente

if($oRegForm->formID!=NULL){
	//Submit Form
	RegisterForm($oRegForm, $field);
}

function RegisterForm($oRegForm, $field){
	
	if(CrmRegisterForm::AddNew($oRegForm)){
		while (list($alias, $value) = each($field)){
			$oField=CrmFormField::getItem_Alias($alias);
			if($oField!=NULL){
				$oRegField=new CrmRegisterField();
				$oRegField->registerID=$oRegForm->registerID;
				$oRegField->fieldID=$oField->fieldID;
				$oRegField->value=($oField->fieldType!=2)? $value: NULL;
				$oRegField->textValue=($oField->fieldType==2)? $value: NULL;
				if(!CrmRegisterField::AddNew($oRegField)){
					CrmRegisterForm::Delete($oRegForm);
					RaiseError('Ocurrio un error al enviar los datos!');
					return;
				}
			}
		}
		
		//Enviar Notificacion al administrador
		Email::Send_RegisterForm($oRegForm->registerID);
		
		Response('Gracias por registrarse.');
	}
	
}

function Response($msg){
	echo $_GET['callback'].
	"({
		'retval': 1,
		'message': '".$msg."'
	})";
}

function RaiseError($err){
	echo $_GET['callback'].
	"({
		'return': 0,
		'retval': '".$err."'
	})";
}

?>