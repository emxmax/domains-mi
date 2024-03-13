<?php

class Navegacion extends Url{

	private $id;
	private $nivel_hijo;
	private $perfil;
	private $site;
	private $db;
	private $seccion;
	private $datos=array();

	public function __construct($db,$site,$seccion,$perfil,$nivel){
		$this->db=$db;
		$this->site=$site;
		$this->seccion=$seccion;
		$this->perfil=$perfil;
		$this->nivel=$nivel;
	}

	private function cargarResultado($id){
		
		return $this->db->contenidos()->where(array("id"=>$id,"id_seccion"=>$this->seccion))->fetch();
	}
	
	private function menuPadre($hijo){
		
		$padre = $this->db->contenidos[array("id"=>$hijo,"id_seccion"=>$this->seccion)]["padre"];
		$nivel_padre = $this->db->contenidos[array("id"=>$padre,"id_seccion"=>$this->seccion)]["nivel"];
		$resultado_padre = $this->cargarResultado($padre);
		
		$this->nivel_hijo = $this->db->contenidos[array("id"=>$hijo,"id_seccion"=>$this->seccion)]["nivel"];
		$datos = array($padre,$nivel_padre,$resultado_padre);
		
		return $datos;
	}
	
	private function cargarDato($tipo,$url,$titulo,$id,$padre,$nivel,$perfil,$elemento_cod_mod){
		$this->datos[]= "<li class='margen'><a href='".$this->tipoContenido($tipo,$url,$titulo,$id,$padre,$nivel,$perfil,$elemento_cod_mod)."'>".$titulo."</a></li>";
	}
	
	public function agregarDato($hijo){
		$resultado_padre = $this->cargarResultado($hijo);
        krsort($this->datos);
		$this->cargarDato($resultado_padre['tipo_contenido'],$resultado_padre['url'],$resultado_padre['titulo'],$resultado_padre['id'],$resultado_padre['padre'],$resultado_padre['nivel'],$this->perfil,$resultado_padre['elemento_cod_mod']);
	}

	public function obtenerNavegacion(){
		return $this->datos;
	}
	
	public function ejecutar($hijo){

		$resultado_padre = $this->menuPadre($hijo);
		
		if($this->nivel==$this->nivel_hijo){

		}else{
			
			if($resultado_padre[1]>$this->nivel){
				
				$this->cargarDato($resultado_padre[2]['tipo_contenido'],$resultado_padre[2]['url'],$resultado_padre[2]['titulo'],$resultado_padre[2]['id'],$resultado_padre[2]['padre'],$resultado_padre[2]['nivel'],$this->perfil,$resultado_padre[2]);
				$this->ejecutar($resultado_padre[0]);
				
			}
		
		}

	}

};


?>