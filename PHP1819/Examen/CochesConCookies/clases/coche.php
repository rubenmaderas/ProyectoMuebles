<?php
    include_once 'IRepositorio.php';
    include_once 'pieza.php';

    class coche implements IRepositorio{
        private $IdCoche;
        private $Marca;
        private $Modelo;
        private $Combustible;
        private $AñoFabricacion;
        private $Observaciones;
        private $Piezas=[];

        public function __construct($idcoche,$marca,$modelo,$combustible,$añofabricacion,$observaciones){
            $this->IdCoche=$idcoche;
            $this->Marca=$marca;
            $this->Modelo=$modelo;
            $this->Combustible=$combustible;
            $this->AñoFabricacion=$añofabricacion;
            $this->Observaciones=$observaciones;
        }

        public function getIdCoche(){
            return $this->IdCoche;
        }

        public function setIdCoche($IdCoche){
            $this->IdCoche = $IdCoche;
             return $this;
        }

        public function getMarca(){
            return $this->Marca;
        }

        public function setMarca($Marca){
            $this->Marca = $Marca;
            return $this;
        }

        public function getModelo(){
            return $this->Modelo;
        }

        public function setModelo($Modelo){
            $this->Modelo = $Modelo;
            return $this;
        }

        public function getCombustible(){
            return $this->Combustible;
        }

        public function setCombustible($Combustible){
            $this->Combustible = $Combustible;
            return $this;
        }

        public function getAñoFabricacion(){
            return $this->AñoFabricacion;
        }

        public function setAñoFabricacion($AñoFabricacion){
            $this->AñoFabricacion = $AñoFabricacion;
            return $this;
        }

        public function getObservaciones(){
            return $this->Observaciones;
        }

        public function setObservaciones($Observaciones){
            $this->Observaciones = $Observaciones;
            return $this;
        }

        public function AnnadirPiezas($piezas){
            $this->Piezas[$piezas->getClave()]=$piezas;
        }

        public function getClave(){
            //Cuando Implementas una clase tienes que crear el metodo  
            //del IRepositorio en la clase donde la quieres implementar
            return $this->getIdCoche();
        }

        public function getPiezas(){
            return $this->Piezas;
        }
        public function setPiezas($Piezas){
            $this->Piezas = $Piezas;
            return $this;
        }
    }
?>