<?php
include('../../config/conexion.php');
include('../../modelo/funciones.php');
include('../../modelo/usuario.php');
include('../../modelo/multimedia.php');

$arrjson = "";
$data = json_decode(file_get_contents('php://input'), true);

$arrjson[0]['titulo'] 	= "";
$arrjson[0]['order'] 	= "";
$arrjson[0]['file_portada'] 	 = ""; // limpiamos
$arrjson[0]['act_img_portada']  = "blanco.jpg";
$arrjson[0]['f_creacion'] 		= "";
$arrjson[0]['f_modificacion'] 	= "";
if (isset($data['codigo'])) {
	if (($data['codigo'] > 0)) {
		$codigo 	= $data['codigo'];
		$objnot 	= new Multimedia();
		$objfunc 	= new misFunciones();
		$datanot 	= $objnot->dameDetalle($codigo);
		$item 		= count($datanot) - 1;
		for($i=0; $i<=$item; $i++){
			$data 	= $datanot[$i];
			$arrjson[$i]['codigo'] 	= $data['tmu_id'];
			$arrjson[$i]['act_img_portada']  = $data['tmu_archivo'];
			if (empty($data['tmu_archivo']))
				$arrjson[$i]['act_img_portada']  = "blanco.jpg";
			$arrjson[$i]['f_creacion'] 		= $data['tmu_fechacreacion'];
			$arrjson[$i]['f_modificacion'] 	= $data['tmu_fechamodificacion'];
		}
	}else{
		$arrjson[0]['codigo'] 	= -1;
	}
}else{
	$arrjson[0]['codigo'] 	= -1;
}
echo json_encode($arrjson);
?>