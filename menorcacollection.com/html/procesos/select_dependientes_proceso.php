<?php
// Array que vincula los IDs de los selects declarados en el HTML con el nombre de la tabla donde se encuentra su contenido
$listadoSelects=array(
"paises"=>"lista_paises",
"estados"=>"lista_estados"
);

function validaSelect($selectDestino)
{
	// Se valida que el select enviado via GET exista
	global $listadoSelects;
	if(isset($listadoSelects[$selectDestino])) return true;
	else return false;
}

function validaOpcion($opcionSeleccionada)
{
	// Se valida que la opcion seleccionada por el usuario en el select tenga un valor numerico
	if(is_numeric($opcionSeleccionada)) return true;
	else return false;
}

$selectDestino=$_GET["select"]; $opcionSeleccionada=$_GET["opcion"];

if(validaSelect($selectDestino) && validaOpcion($opcionSeleccionada))
{
	$tabla=$listadoSelects[$selectDestino];

    include '../adm/decon/connect.php';
    $query = sprintf('SELECT id, opcion FROM %s WHERE relacion=%d',$tabla,$opcionSeleccionada);
    $result = mysql_query($query, $conn->getConectado());
   /* 
	conectar();
	$consulta=mysql_query("SELECT id, opcion FROM $tabla WHERE relacion='$opcionSeleccionada'") or die(mysql_error());
	desconectar();
	 */
	// Comienzo a imprimir el select
	echo "<select name='".$selectDestino."' id='".$selectDestino."' class='frm_combo comboTipo1' onchange='cargaContenido(this.id)' style='margin:0px;'>";
	echo "<option value='0'>&nbsp;</option>";
	while($row=mysql_fetch_row($result))
	{
		// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
		$row[1]=htmlentities($row[1]);
		// Imprimo las opciones del select
		echo "<option value='".$row[0]."'>".$row[1]."</option>";
	}			
	echo "</select>";

}
?>