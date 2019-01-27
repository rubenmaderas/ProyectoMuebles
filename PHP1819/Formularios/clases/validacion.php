<?php
    class validacion{
        //Propiedades de la clase
            //Coleccion de errores
        private $errores;

        //Constructor
        public function __construct(){
            $this->errores=array();
        }

        //Metodo
            //Metodo para comprobar que el campo no este vacio y si existe la variable
        public function requerido($campo){
            if(empty($_POST[$campo]) || isset($_POST[$campo])){
                $this->errores[$campo]="El campo $campo es necesario";
                return false;
            }else{
                return true;
            }
        }
        //Metodo
            //Metodo que comprueba que el campo es un valor entero y de manera opcional
            //un rango de valores

        public function enterorango($campo,$min=PHP_INT_MIN,$max=PHP_INT_MAX){
            if(!filter_var($_POST[$campo],FILTER_VALIDATE_INT,
            ["options"=>["min_range"=>$min,"max_range"=>$max]])){
                $this->errores[$campo]="Debe ser entero entre $min y $max";
                return false;
            }else{
                return true;
            }
        }

        //Metodo
            //Metodo que comprueba el numero de caracteres de la cadena
            //entre un minimo y un maximo
        public function cadenarango($campo,$max,$min=0){
            if(!(strlen($_POST[$campo])>$min && strlen($_POST[$campo])<$max)){
                $this->errores[$campo]="Debe tener entre $min y $max caracteres";
                return false;
            }else{
                return true;
            }
        }

        //Metodo
            //Metodo que comprueba si el email es valido
        public function validaremail($campo){
            if(!filter_var($_POST[$campo],FILTER_VALIDATE_EMAIL)){
                $this->errores[$campo]="Debe ser un email valido";
                return false;
            }else{
                return true;
            }
        }

        //Metodo
            //Metodo que comprueba el dni
        public function dni($campo){
            $letras="";
            $mensaje="";
            if(preg_match("/^[0-9]{8}[a-zA-Z]{1}$/",$_POST[$campo])==1){
                $numero=substr(($_POST[$campo]),0,8);
                $letra=substr($_POST[$campo],8,1);
                if($letra[$numero%23]==strtoupper($letra)){
                    return true;
                }else{
                    $mensaje="El campo $campo es un Dni con letra no válida";
                }
            }else{
                $mensaje="El campo $campo no es un Dni válido";
            }
        }

        //Metodo
            //Metodo que comprueba si cumple una expresion regular (patron)
        public function patron($campo,$patron){
            if(!preg_match($patron,$_POST[$campo])){
                $this->errores[$campo]="No cumple el patron $patron";
                return false;
            }else{
                return true;
            }
        }

        //Metodo
            //Metodo que sirve para comprobar que no hay errores
        public function noerroes($campo){
            if(count($this->errores)==0){
                return true;
            }else{
                return false;
            }
        }

        //Metodo
            //Metodo que imprime los errores
        public function imprimirerror($campo){
            return isset($this->errores[$campo])?'<span class="error_mensaje>">'.$this->$errores[$campo].'</span>':'';
        }

        //Metodo
            //Metodo para guardar la variable cuando haya algun error
        public function getTexto($campo){
            return isset($_POST[$campo])?$_POST[$campo]:'';
        }

        //Metodo
            //Metodo para guardar los selected marcados
        public function getSelected($campo,$valor){
            return isset($_POST[$campo]) && $_POST[$campo]==$valor?'selected':''; 
        }

        //Metodo
            //Metodo para guardar los cheked seleccionados
        public function getChecked($campo,$valor){
            return isset($_POST[$campo]) && $_POST[$campo]==$valor?'checked':''; 
        }

        //Metodo
            //Metodo para guardar los cheked multiopcionales
        public function getCheckedMulti($campo,$valor){
            return isset($_POST[$campo]) && inarray($valor,$_POST[$campo])?'checked':''; 
        }
        
        public function getRadius($campo, $valor){
            return isset($_POST[$campo]) && $_POST[$campo]==$valor?'checked':'';
            /*Si existe tanto el campo(name) y $_POST[$campo]($campo es la key sexo si el valor que contiene es hombre chequeará hombre) concuerda con alguno de los valores(hombre o mujer) se queda chequeado si no vacio*/
        }
    }
?>