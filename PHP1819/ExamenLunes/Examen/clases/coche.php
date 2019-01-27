<?php
    include_once './pieza.php';
    include_once '../clases/Repositorio.php';
    include_once '../clases/IRepositorio.php';


    class coche implements IRepositorio{
        public $IdCoche;
        public $Marca;
        public $Modelo;
        public $Combustible;
        public $AñoFabricacion;
        public $Observaciones;
        public $Piezas=[];

        public function __construct($idcoche,$marca,$modelo,$combustible,$añofabricacion,$observaciones,$piezas=[]){
            $this->IdCoche=$idcoche;
            $this->Marca=$marca;
            $this->Modelo=$modelo;
            $this->Combustible=$combustible;
            $this->AñoFabricacion=$añofabricacion;
            $this->Observaciones=$observaciones;
            $this->Piezas[]=$piezas=[];
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
        
        public function getCoche(){
            
                $coche =  ['1111AAA'=>new coche("1111AAA","Audi","A4","Diesel","2006","Buen coche", $pieza = [
                    '1'=>new pieza("1","Descripcion Pieza","coche","1111AAA","10","100")
                ]), 
                                '2222BBB'=>new coche("2222BBB","Mercedes","Benz","Diesel","2013","Cochazo")];
                return $coche;
        }
    }
?>