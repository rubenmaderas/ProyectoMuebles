<?php
    //Crear una clase pelicula
    class pelicula{
        public $Titulo;
        public $Director;
        public $Duracion;
    
        public function __construct($t,$d,$dr){
            $this->Titulo=$t;
            $this->Director=$d;
            $this->Duracion=$dr;
        }

        public static function comparapelisdura(Pelicula $p1,Pelicula $p2){
            //Si devuelve 0 p1 = p2 si es -1 p2 > p1 y si es 1 p1 > p2
            return $p1->Duracion-$p2->Duracion;
        }

        public static function comparapelisnombre(Pelicula $p1,Pelicula $p2){
            //Si devuelve 0 p1 = p2 si es -1 p2 > p1 y si es 1 p1 > p2
            return strncmp($p1->Duracion,$p2->Duracion);
        }
    }
?>