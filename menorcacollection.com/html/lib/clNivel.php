<?php

class Nivel{

	private $id;
	private $nivel_hijo;
	private $db;
	private $seccion;

	public function __construct($db,$seccion,$nivel){
		$this->nivel=$nivel;
		$this->db=$db;
		$this->seccion=$seccion;
	}

	private function menuPadre($hijo){
		
		$padre = $this->db->contenidos[array("id"=>$hijo,"id_seccion"=>$this->seccion)]["padre"];
		$nivel_padre = $this->db->contenidos[array("id"=>$padre,"id_seccion"=>$this->seccion)]["nivel"];
		$this->nivel_hijo = $this->db->contenidos[array("id"=>$hijo,"id_seccion"=>$this->seccion)]["nivel"];

		$datos = array($padre,$nivel_padre);
		return $datos;
	}

	public function obtenerId(){
		return $this->id;
	}

	public function modificarId($id){
		$this->id=$id;
	}
	
	public function ejecutar($hijo){

		$resultado_padre = $this->menuPadre($hijo);
		
		if($this->nivel==$this->nivel_hijo){
			$this->modificarId($hijo);
		}else{

			if($resultado_padre[1]>$this->nivel){
				$this->ejecutar($resultado_padre[0]);
			}else{
				$this->modificarId($resultado_padre[0]);
			}
		
		}

	}

};


?>