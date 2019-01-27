
<?php
    class validacion{
        public $errores=[];

        public function __construct(){
            $this->errores=array();
        }

        //Metodo para comprobar si el campo esta vacio
        public function requerido($campo){
            if(empty($campo) || !isset($_POST[$campo])){
                $this->errores[$campo]=" <span style='color: red;'>*El campo ".$campo." es necesario</span>";
            }
        }

        //Metodo para comprobar que es un valor entero y opcianalmente un rango de valores
        public function enteroRango($campo,$max=PHP_INT_MIN,$min=PHP_INT_MAX){
            if(!filter_var($_POST[$campo],FILTER_VALIDATE_INT,
            ["options"=>["min_range"=>$min,"max_range"=>$max]])){
                $this->errores[$campo]=" <span style='color: red;'> *Debes introducir un entero entre ".$min." y ".$max."</span>";
                return false;
            }else{
                return true;
            }
        }

        //Metodo que comprueba el numero de caracteres en un minimo y un maximo
        public function cadenaRango($campo,$max,$min=1){
            if(!strlen($_POST[$campo])<$min && strlen($_POST[$campo])>$max){
                $this->errores[$campo]=" <span style='color: red;'>*Debes introducir una cadena entre ".$min." y ".$max."</span>";
                return false;
            }else{
                return true;
            }
        }

        //Metodo que comprueba que un email es valido
        public function validarEmail($campo){
            if(!$_POST[$campo]==FILTER_VALIDATE_EMAIL){
                $this->errores[$campo]=" <span style='color: red;'>*Debes introducir un email valido </span>";
                return false;
            }
            return true;
        }

        //Metodo que comprueba que ha pasado la validacion
        public function validacionPasada(){
            if(count($this->errores)!=0){
                return false;
            }else{
                return true;
            }
        }

        //Metodo para imprimirError
        public function imprimirError($campo){
            return isset($this->errores[$campo])?'<span class="error_mensaje">'.$this->errores[$campo].'</span>':'';
        }

        //Metodo para obtener el texto introducido
        public function getTexto($campo){
            return isset($_POST[$campo])?$_POST[$campo]:"";
        }

        //Metodo para borrar el texto introducido
        public function borrarTexto($campo){
            return isset($_POST[$campo])?$_POST[$campo]="":"";
        }
    }
        
?>