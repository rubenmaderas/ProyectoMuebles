<?php
    class alumno{
        //public protected o private
        public $Nombre;
        public $Apellidos;
        protected $Curso;
        private $Dni;
        public static $Sueño;

        //Constructor
        public function __construct($nombre,$apellidos,$curso,$dni){
            $this->Apellidos=$apellidos;
            $this->Nombre=$nombre;
            $this->Curso=$curso;
            $this->Dni=$dni;
            self::$Sueño=20; //Para acceder a una clase estatica desde fuera
        }

        /**
         * Get the value of Nombre
         */ 
        public function getNombre(){
                return $this->Nombre;
        }

        /**
         * Set the value of Nombre
         *
         * @return  self
         */ 
        public function setNombre($Nombre){
                $this->Nombre = $Nombre;

                return $this;
        }

        /**
         * Get the value of Apellidos
         */ 
        public function getApellidos(){
                return $this->Apellidos;
        }

        /**
         * Set the value of Apellidos
         *
         * @return  self
         */ 
        public function setApellidos($Apellidos){
                $this->Apellidos = $Apellidos;

                return $this;
        }

        /**
         * Get the value of Curso
         */ 
        public function getCurso(){
                return $this->Curso;
        }

        /**
         * Set the value of Curso
         *
         * @return  self
         */ 
        public function setCurso($Curso){
                $this->Curso = $Curso;

                return $this;
        }

        /**
         * Get the value of Dni
         */ 
        public function getDni(){
                return $this->Dni;
        }

        /**
         * Set the value of Dni
         *
         * @return  self
         */ 
        public function setDni($Dni){
                $this->Dni = $Dni;

                return $this;
        }

        /**
         * Get the value of Sueño
         */ 
        public function getSueño(){
                return $this->Sueño;
        }

        /**
         * Set the value of Sueño
         *
         * @return  self
         */ 
        public function setSueño($Sueño){
                $this->Sueño = $Sueño;

                return $this;
        }
        /**
         * Get the value of Alumno
         */ 
        public static function getAlumnos(){
            $alumnos =  [new alumno("Antonio","Illana","Jubilado","1111112A"), 
                        new alumno("Pepe","Quesada","2DAA","222222B")];
            return $alumnos;
        }

        public static function getAlumnosAsociativo(){
                $alumnos =  ['1111112A'=>new alumno("Antonio","Illana","Jubilado","1111112A"), 
                            '222222B'=>new alumno("Pepe","Quesada","2DAA","222222B")];
                return $alumnos;
            }
    }

    
?>