<?php
    /*
    * Clase para el mantenimiento de una coleccion de datos
    */
    class Repositorio{
        public $Datos=[];
        
        /*
        *constructor
        * @param Array $datosexternos si no se pasa el parametro se toma el valor NULL
        */
            public function __construct(Array $datosexternos=NULL){
            $this->Datos=$datosexternos;
        }

        public function Agregar(IRepositorio $nuevo){
            $this->Datos[$nuevo->getClave()]=$nuevo;
        }

        public function Leer($clave){
            return $this->Datos[$clave];
        }

        public function Modificar(IRepositorio $otro){
            $this->Datos[$otro->getClave()]=$otro;
        }

        public function Borrar($clave){
            unset($this->Datos[$clave]);
        }

        public function LeerTodos(){
            return $this->Datos;
        }
    }
?>