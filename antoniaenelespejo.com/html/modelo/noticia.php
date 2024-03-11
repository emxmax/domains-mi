<?php
class Noticia extends Conexion{
	function damenotCategoria($page=NULL,$filtro=NULL,$inicio=NULL,$TAMANO_PAGINA=NULL,$cat=NULL){
		$page = $this->limpiacadena($page);
		$filtro = $this->limpiacadena($filtro);

		$sql = "Select art_id, tca_cat_id, art_nombre, art_descripsuperior, art_descripinferior,art_frase, ";
		$sql.= "(Select tmp_cat.cat_nombre From tca_categoria as tmp_cat Where tmp_cat.cat_id = tca_cat_id Limit 0,1) as namecategoria, ";
		$sql.= "(Select tmp_cat.seo_url From tseo_seo as tmp_cat Where tmp_cat.tar_art_id = art_id Limit 0,1) as  	seo_url, ";
		$sql.= "art_imgportada, art_tipomultimedia, art_imggrande, art_video, art_fechapublicacion, ";
		$sql.= "art_estado,art_destacado,art_fechacreacion,art_fechamodificacion,art_order ";
		$sql.= "From tar_articulo ";
		$sql.= "Where art_borrado = 1 ";
		$sql.= "and art_estado = 1 ";
		//$sql.= "and tca_cat_id != 8 ";
		if ($cat!=0)
			$sql.= "and tca_cat_id = ".$cat." ";
		if (!empty($filtro)){
			$sql.= "and art_nombre like('%".$filtro."%') ";
		}
		$sql.= "Order by art_estado DESC, art_destacado DESC, art_order ASC, art_fechapublicacion DESC ";
		if ($TAMANO_PAGINA > 0)
			$sql.= "LIMIT ".$inicio."," . $TAMANO_PAGINA;
		return $this->Sqlfetch_assoc($sql);	
	}
	function dameCodigo($id){
		$sql = "Select * ";
		$sql.= "From tseo_seo ";
		$sql.= "Where seo_url = '".$id."'";
		$data = $this->Sqlfetch_assoc($sql);
		return $data[0]['tar_art_id'];	
	}
	function dameListado($page=NULL,$filtro=NULL,$inicio=NULL,$TAMANO_PAGINA=NULL){
		$page = $this->limpiacadena($page);
		$filtro = $this->limpiacadena($filtro);

		$sql = "Select art_id, tca_cat_id, art_nombre, art_descripsuperior, art_descripinferior,art_frase, ";
		$sql.= "(Select tmp_cat.cat_nombre From tca_categoria as tmp_cat Where tmp_cat.cat_id = tca_cat_id Limit 0,1) as namecategoria, ";
		$sql.= "(Select tmp_cat.seo_url From tseo_seo as tmp_cat Where tmp_cat.tar_art_id = art_id Limit 0,1) as  	seo_url, ";
		$sql.= "art_imgportada, art_tipomultimedia, art_imggrande, art_video, art_fechapublicacion, ";
		$sql.= "art_estado,art_destacado,art_fechacreacion,art_fechamodificacion,art_order ";
		$sql.= "From tar_articulo ";
		$sql.= "Where art_borrado = 1 ";
		$sql.= "and tca_cat_id != 8 ";
		$sql.= "and art_estado = 1 ";
		//$sql.= "and tca_cat_id = 2 ";
		if (!empty($filtro)){
			$sql.= "and art_nombre like('%".$filtro."%') ";
		}
		$sql.= "Order by art_fechacreacion DESC, art_estado DESC, art_destacado DESC, art_order ASC ";
		if ($TAMANO_PAGINA > 0)
			$sql.= "LIMIT ".$inicio."," . $TAMANO_PAGINA;
		return $this->Sqlfetch_assoc($sql);	
	}
	function dameDetalle($codigo=NULL){
		$page = $this->limpiacadena($codigo);

		$sql = "Select art_id, tca_cat_id, art_nombre, art_descripsuperior, art_descripinferior,art_frase, art_fechapublicacion, ";
		$sql.= "(Select tmp_cat.cat_nombre From tca_categoria as tmp_cat Where tmp_cat.cat_id = tca_cat_id Limit 0,1) as namecategoria, ";
		$sql.= "art_imgportada, art_tipomultimedia, art_imggrande, art_video, art_fechapublicacion, ";
		$sql.= " (Select tmp_seo.seo_url From tseo_seo as tmp_seo Where tmp_seo.tar_art_id = art_id Limit 0,1) as nameurl_seo, ";
		$sql.= "art_estado,art_destacado,art_fechacreacion,art_fechamodificacion,art_order ";
		$sql.= "From tar_articulo ";
		$sql.= "Where art_id = ".$codigo;
		return $this->Sqlfetch_assoc($sql);	
	}
	function dameDetalleAntonia($codigo=NULL){
		$page = $this->limpiacadena($codigo);

		$sql = "Select art_id, tca_cat_id, art_nombre, art_descripsuperior, art_descripinferior,art_frase, ";
		$sql.= "(Select tmp_cat.cat_nombre From tca_categoria as tmp_cat Where tmp_cat.cat_id = tca_cat_id Limit 0,1) as namecategoria, ";
		$sql.= "art_imgportada, art_tipomultimedia, art_imggrande, art_video, art_fechapublicacion, ";
		$sql.= " (Select tmp_seo.seo_url From tseo_seo as tmp_seo Where tmp_seo.tar_art_id = art_id Limit 0,1) as nameurl_seo, ";
		$sql.= "art_estado,art_destacado,art_fechacreacion,art_fechamodificacion,art_order ";
		$sql.= "From tar_articulo ";
		$sql.= "Where art_id = ".$codigo;
		return $this->Sqlfetch_assoc($sql);	
	}
	function dameDestacado(){
		$sql = "Select art_id, tca_cat_id, art_nombre, art_descripsuperior, art_descripinferior,art_frase, ";
		$sql.= "(Select tmp_cat.cat_nombre From tca_categoria as tmp_cat Where tmp_cat.cat_id = tca_cat_id Limit 0,1) as namecategoria, ";
		$sql.= "(Select tmp_cat.seo_url From tseo_seo as tmp_cat Where tmp_cat.tar_art_id = art_id Limit 0,1) as  	seo_url, ";
		$sql.= "art_imgportada, art_tipomultimedia, art_imggrande, art_video, art_fechapublicacion, ";
		$sql.= "art_estado,art_destacado,art_fechacreacion,art_fechamodificacion,art_order ";
		$sql.= "From tar_articulo ";
		$sql.= "Where art_borrado = 1 ";
		$sql.= "and art_destacado = 1 ";
		$sql.= "and art_estado = 1 ";
		$sql.= "and (Select tca_fk_cat_id From tca_categoria Where cat_id = tca_cat_id ) = 4 ";
		$sql.= "Order by art_fechapublicacion DESC ";
		return $this->Sqlfetch_assoc($sql);	
	}

	function dameUltimasNot($inicio=NULL,$TAMANO_PAGINA=NULL){
		$sql = "Select art_id, tca_cat_id, art_nombre, art_descripsuperior, art_descripinferior,art_frase, ";
		$sql.= "(Select tmp_cat.cat_nombre From tca_categoria as tmp_cat Where tmp_cat.cat_id = tca_cat_id Limit 0,1) as namecategoria, ";
		$sql.= "(Select tmp_cat.seo_url From tseo_seo as tmp_cat Where tmp_cat.tar_art_id = art_id Limit 0,1) as  	seo_url, ";
		$sql.= "art_imgportada, art_tipomultimedia, art_imggrande, art_video, art_fechapublicacion, ";
		$sql.= "art_estado,art_destacado,art_fechacreacion,art_fechamodificacion,art_order ";
		$sql.= "From tar_articulo ";
		$sql.= "Where art_borrado = 1 ";
		//$sql.= "and art_destacado = 1 ";
		$sql.= "and art_estado = 1 ";
		$sql.= "and (Select tca_fk_cat_id From tca_categoria Where cat_id = tca_cat_id ) = 4 ";
		$sql.= "Order by art_fechapublicacion DESC ";
		if ($TAMANO_PAGINA > 0)
			$sql.= "LIMIT ".$inicio."," . $TAMANO_PAGINA;
		return $this->Sqlfetch_assoc($sql);	
	}

	function dameListadoNotCat($inicio=NULL,$TAMANO_PAGINA=NULL,$codCatNot=NULL){
		$sql = "Select art_id, tca_cat_id, art_nombre, art_descripsuperior, art_descripinferior,art_frase, ";
		$sql.= "(Select tmp_cat.cat_nombre From tca_categoria as tmp_cat Where tmp_cat.cat_id = tca_cat_id Limit 0,1) as namecategoria, ";
		$sql.= "art_imgportada, art_tipomultimedia, art_imggrande, art_video, art_fechapublicacion, ";
		$sql.= "art_estado,art_destacado,art_fechacreacion,art_fechamodificacion,art_order ";
		$sql.= "From tar_articulo ";
		$sql.= "Where art_borrado = 1 ";
		$sql.= "and tca_cat_id = ".$codCatNot." ";
		$sql.= "and art_estado = 1 ";
		$sql.= "and (Select tca_fk_cat_id From tca_categoria Where cat_id = tca_cat_id ) = 4 ";
		$sql.= "Order by art_fechapublicacion DESC ";
		if ($TAMANO_PAGINA > 0)
			$sql.= "LIMIT ".$inicio."," . $TAMANO_PAGINA;
		//echo $sql;
		return $this->Sqlfetch_assoc($sql);	
	}
}
?>