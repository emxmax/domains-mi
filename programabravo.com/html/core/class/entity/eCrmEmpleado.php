<?php
	/**
	 * Object represents table 'crm_empleado'
	 *
     	 * @author: Fischer Tirado
     	 * @date: 2011-08-16 20:00	 
	 */
	class eCrmEmpleado{
		
		public $personaID;
		public $codigoBP;
		public $dni;
		public $clave;
		public $nombres;
		public $apellido1;
		public $apellido2;
		public $fechaNacimiento;
		public $posicion;
		public $unidadOrganizativa;
		public $superiorID;
		public $superiorNombre;
		public $gerencia;
		public $email;
		public $estado;
		public $fechaRegistro;

		public $enviados;
		public $recibidos;
		
		public function __construct($personaID=NULL, $codigoBP=NULL, $dni=NULL, $clave=NULL, $nombres=NULL, $apellido1=NULL, $apellido2=NULL, $fechaNacimiento=NULL, $posicion=NULL, $unidadOrganizativa=NULL, $superiorID=NULL, $superiorNombre=NULL, $gerencia=NULL, $email=NULL, $estado=NULL, $fechaRegistro=NULL)
		{
			$this->personaID            = $personaID;
			$this->codigoBP             = $codigoBP;
			$this->dni                  = $dni;
			$this->clave                = $clave;
			$this->nombres              = $nombres;
			$this->apellido1            = $apellido1;
			$this->apellido2            = $apellido2;
			$this->fechaNacimiento      = $fechaNacimiento;
			$this->posicion             = $posicion;
			$this->unidadOrganizativa   = $unidadOrganizativa;
			$this->superiorID           = $superiorID;
			$this->superiorNombre       = $superiorNombre;
			$this->gerencia             = $gerencia;
			$this->email                = $email;
			$this->estado               = $estado;
			$this->fechaRegistro        = $fechaRegistro;
			
			return $this;
		}

		public function __toString()
		{
			return Collection::objectToString($this);
		}

	}
?>