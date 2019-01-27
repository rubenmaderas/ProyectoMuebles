<?php
include_once 'IRepositorio.php';
include_once 'pescatas.php';
include_once 'pescador.php';
    class pescata implements IRepositorio{

        private $Especie;
        private $Hora;
        private $Peso;
        private $Talla;

        // Create a connstructor with two arguments
        public function __construct($especie, $hora,$peso,$talla) {
            $this->Especie = $especie;
            $this->Hora = $hora;
            $this->Peso = $peso;
            $this->Talla = $talla;
        }
        /**
         * Get the value of Especie
         */ 
        public function getEspecie()
        {
            return $this->Especie;
        }

        /**
         * Set the value of Especie
         *
         * @return  self
         */ 
        public function setEspecie($Especie)
        {
            $this->Especie = $Especie;

            return $this;
        }

        /**
         * Get the value of Hora
         */ 
        public function getHora()
        {
            return $this->Hora;
        }

        /**
         * Set the value of Hora
         *
         * @return  self
         */ 
        public function setHora($Hora)
        {
            $this->Hora = $Hora;

            return $this;
        }

        /**
         * Get the value of Peso
         */ 
        public function getPeso()
        {
            return $this->Peso;
        }

        /**
         * Set the value of Peso
         *
         * @return  self
         */ 
        public function setPeso($Peso)
        {
            $this->Peso = $Peso;

            return $this;
        }

        public function getClave(){
            //Cuando Implementas una clase tienes que crear el metodo  
            //del IRepositorio en la clase donde la quieres implementar
            return $this->getEspecie();
        }

        /**
         * Get the value of Talla
         */ 
        public function getTalla()
        {
            return $this->Talla;
        }

        /**
         * Set the value of Talla
         *
         * @return  self
         */ 
        public function setTalla($Talla)
        {
            $this->Talla = $Talla;

            return $this;
        }
    }
?>