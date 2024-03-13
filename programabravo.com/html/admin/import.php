<?php
session_start();
set_time_limit ( 6000 );
require_once("../core/config/main.php");
require_once("../core/controller/UI_AdmPage.php");
require_once("../core/include/admin/module_request.php");
require_once("../core/include/admin/logon.php");

function FillEmpleado($arr_row, $oEmpleado){
    $oEmpleado->codigoBP           =$arr_row[0];
    $oEmpleado->clave              =$oEmpleado->codigoBP;
    $oEmpleado->apellido1          =addslashes($arr_row[1]);
    $oEmpleado->apellido2          =addslashes($arr_row[2]);
    $oEmpleado->nombres            =addslashes($arr_row[3]);
    $oEmpleado->posicion           =addslashes($arr_row[5]);
    $oEmpleado->unidadOrganizativa =addslashes($arr_row[6]);
    $oEmpleado->gerencia           =addslashes($arr_row[7]);
    $oEmpleado->email              =$arr_row[8];
    $oEmpleado->estado             =1;
}
function PrintLog($message){
    echo $message."<br />\n";
    ob_end_flush();
    //ob_flush();
    //flush();
    ob_start();
    //Sleep(1);
}
function Import($file){
ob_start();

//$f_name='../userfiles/import/empleado.txt';
$buffer=file_get_contents($file); //Actualizado x ftp
$data=str_getcsv($buffer, "\n");
//var_dump($data); exit;
if(count($data)>1){
    PrintLog("Proceso iniciado a las ".date("Y-m-d H:i:s"));
    CrmEmpleado::DesactivarTodos(); //desactiva todos los empleados
    $data[0]=NULL;
    $data=array_filter($data);
    $n=0;
    foreach($data as $row){
        $arr_row = str_getcsv($row, ";");
        if(count($arr_row)<8) continue; //validar registros
        
        $dni = trim($arr_row[4]);
        $oEmpleado = CrmEmpleado::getWebItem_dni($dni);
        
        if($oEmpleado==NULL){
            $oEmpleado = new eCrmEmpleado();
            $oEmpleado->dni = $dni;
            FillEmpleado($arr_row, $oEmpleado);

            $msg="Insertando nuevo registro: $dni";
            if(CrmEmpleado::AddNew($oEmpleado)){
                $msg.="[OK]";
            }
            else{
                $msg.="[Fail]".CrmEmpleado::GetErrorMsg();
			}
				PrintLog($msg);
            
        }
        else{
            FillEmpleado($arr_row, $oEmpleado);
            $msg="Actualizando registro: $dni ";
            $msg.=CrmEmpleado::Update($oEmpleado)? "[OK]": "[Fail]";

            PrintLog($msg);
        }
    }

    PrintLog("Proceso completado a las ".date("Y-m-d H:i:s"));
}
else
    PrintLog("No se puede localizar el archivo ".$f_name);
}

$file=isset($_FILES['file'])? $_FILES['file']: NULL;
$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
?>

<div>
<?php
if(isset($file) && ($ext=='txt' || $ext=='csv')){
	Import($file['tmp_name']);
}
else{
?>
<form name="form" method="POST" enctype="multipart/form-data">
<table>
<tr>
	<td>Archivo</td>
	<td><input type="file" name="file"></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td><input type="submit" name="Cargar archivo"></td>
</tr>
</table>
</form>
<?php
}
?>
</div>
