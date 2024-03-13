<?php
	/**
	 * Object represents table 'crm_empleado'
	 *
     	 * @author: Fischer Tirado
     	 * @date: 2011-08-16 20:00	 
	 */
	class eCrmPostIt{
		
		public $postitID;
		public $typeID;
		public $origenID;
		public $destinoID;
		public $mensaje;
		public $votos;
		public $estado;
		public $fechaRegistro;

		public $typeName;
                public $origen;
		public $destino;
		public $mundo;

		public $mundoOrigen;
		public $mundoDestino;
		public $dniOrigen;
		public $dniDestino;
                
                public $gerenciaOrigen;
                public $gerenciaDestino;

                public function __construct($postitID=NULL, $typeID=NULL, $origenID=NULL, $destinoID=NULL, $mensaje=NULL, $votos=NULL, $estado=NULL, $fechaRegistro=NULL)
		{
			$this->postitID 		= $postitID;
			$this->typeID 			= $typeID;
			$this->origenID 		= $origenID;
			$this->destinoID 		= $destinoID;
			$this->mensaje 			= $mensaje;
			$this->votos 			= $votos;
			$this->estado 			= $estado;
			$this->fechaRegistro 	= $fechaRegistro;
			
			return $this;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}

	}
?>