<?php

    include_once './Repositorio.php';
    include_once './IRepositorio.php';

    class pieza implements IRepositorio{
        private $IdPieza;
        private $Descripcion;
        private $Categoria;
        private $IdCoche;
        private $Stock;
        private $Precio;

        public function __construct($idpieza,$descripcion,$categoria,$idcoche,$stock,$precio){
            $this->IdPieza=$idpieza;
            $this->Descripcion=$descripcion;
            $this->Categoria=$categoria;
            $this->IdCoche=$idcoche;
            $this->Stock=$stock;
            $this->Precio=$precio;
        }  

        public function getIdPieza(){
            return $this->IdPieza;
        }
 
        public function setIdPieza($IdPieza){
            $this->IdPieza = $IdPieza;
            return $this;
        }

        public function getDescripcion(){
            return $this->Descripcion;
        }

        public function setDescripcion($Descripcion){
            $this->Descripcion = $Descripcion;
            return $this;
        }

        public function getCategoria(){
            return $this->Categoria;
        }

        public function setCategoria($Categoria){
            $this->Categoria = $Categoria;
            return $this;
        }

        public function getIdCoche(){
            return $this->IdCoche;
        }

        public function setIdCoche($IdCoche){
            $this->IdCoche = $IdCoche;
            return $this;
        }

        public function getStock(){
            return $this->Stock;
        }

        public function setStock($Stock){
            $this->Stock = $Stock;
            return $this;
        }

        public function getPrecio(){
            return $this->Precio;
        }

        public function setPrecio($Precio){
            $this->Precio = $Precio;
            return $this;
        }

        public function getClave(){
            //Cuando Implementas una clase tienes que crear el metodo  
            //del IRepositorio en la clase donde la quieres implementar
            return $this->getIdPieza();
        }
    }
?>