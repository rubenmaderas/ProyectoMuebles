<?php
    include_once 'IRepositorio.php';
    include_once 'pescatas.php';
    include_once 'pescador.php';

    class pescador implements IRepositorio{
        private $NumeroFederado;
        private $Nombre;
        private $Apellidos;
        private $Dni;
        private $Pescatas=[];

        public function __construct($numerofederado,$nombre,$apellidos,$dni){
            $this->NumeroFederado=$numerofederado;
            $this->Nombre=$nombre;
            $this->Apellidos=$apellidos;
            $this->Dni=$dni;
        }

        public function getNumeroFederado(){
            return $this->NumeroFederado;
        }

        public function setNumeroFederado($NumeroFederado){
            $this->NumeroFederado = $NumeroFederado;
            return $this;
        }

        public function getNombre(){
            return $this->Nombre;
        }

        public function setNombre($Nombre){
            $this->Nombre = $Nombre;
            return $this;
        }

        public function getApellidos(){
            return $this->Apellidos;
        }

        public function setApellidos($Apellidos){
            $this->Apellidos = $Apellidos;
            return $this;
        }

        public function getDni(){
            return $this->Dni;
        }

        public function setDni($Dni){
            $this->Dni = $Dni;
            return $this;
        }
        
        public function getPescatas(){
            return $this->Pescatas;
        }
 
        public function setPescatas($Pescatas){
            $this->Pescatas = $Pescatas;
            return $this;
        }

        public function AnnadirPescatas($pescatas){
            $this->Pescatas[$pescatas->getClave()]=$pescatas;
        }

        public function getClave(){
            //Cuando Implementas una clase tienes que crear el metodo  
            //del IRepositorio en la clase donde la quieres implementar
            return $this->getNumeroFederado();
        }
    }
?>