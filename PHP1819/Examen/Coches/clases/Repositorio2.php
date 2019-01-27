<?php
    class Repositorio{
        public Datos=[];
    }

    public function __construct(Array $datosexternos=null){
        $this->Datos=$datosexternos;
    }

    public function Agregar(IRepositorio $nuevo){
        $this->Datos[$nuevo->getClave()]=$nuevo;
    }

    public function Leer($clave){
        $this->Datos[$clave];
    }

    public function Modificar(IRepositorio $otro){
        return $this->Datos[$otro->getClave()]=$otro;
    }

    public function Borrar($clave){
        unset($this->Datos[$clave]);
    }
    
    public function LeerTodos(){
        return $this->Datos;
    }
?>