<?php
    class alumno{
        //public protected o private
        public $Requerido;
        public $LongitudMaxima;
        public $LongitudMinima;
        public $Rango;
        public $Email;
        public $Dni;
        public $Patron;

        //Constructor
        public function __construct($requerido,$longitudmaxima,$longitudminima,$rango,$email,$dni,$patron){
            $this->Requerido=$requerido;
            $this->LongitudMaxima=$longitudmaxima;
            $this->LongitudMinima=$longitudminima;
            $this->Rango=$rango;
            $this->Email=$email;
            $this->Dni=$dni;
            $this->Patron=$patron;
        }

        public static function validar(){
           
        }
    }
?>