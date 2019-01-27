
<?php

    //usar FILTER_VAR en todas las que se pueda

    class validacion{
        //coleccion de errores
        public $errores=[];

        public function __construct(){
            $this -> errores=array();
        }

        // metodo para comprobar que le campo no esta vacio o se ha seleccionado en elemento del array
        public function requerido($campo){
            if(empty($_POST[$campo]) || !isset($_POST[$campo]))
            {
                $this->errores[$campo]=" <span>*El campo ".$campo." es necesario</span>";
            }
        }

        //compueba que es un valor entero y opcionamente un rango de valores
        public function enteroRango($campo, $min=PHP_INT_MIN, $max=PHP_INT_MAX){
            if(!filter_var($_POST[$campo], FILTER_VALIDATE_INT, 
            ["options"=>["min_range"=>$min, "max_range"=>$max]]))
            {
                $this->errores[$campo]=" <span style='color: red;'> *Debes introducir un entero entre ".$min." y ".$max."</span>";
                return false;
            }
            return true;
        }

        //comprueba el numero de caracteres de la cadena entre un minimo y un max
        public function cadenaRango($campo,$max,$min=1){
            if(!(strlen($_POST[$campo])>$min && strlen($_POST[$campo])<$max))
            {
                $this->errores[$campo]=" <span style='color: red;'>*Debes introducir una cadena entre ".$min." y ".$max."</span>";
                return false;
            }
            return true;
        }

        public function dni($campo){
            
            if(empty($_POST[$campo]) || (strlen($_POST[$campo])!=9)){

                $this ->errores[$campo]="<span style='color: red;'>*Introduzca un dni con 9 caracteres</span>";
                return false;

            }else{

                $letra=substr($_POST[$campo],8,9);
                $partLetra= strtoupper($letra);

                $partNumero=substr($_POST[$campo],0,8);

                $modulo = $partNumero%23;

                $l=["T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"];

                $esDNI=false;
                if($l[$modulo]==$partLetra){
                    $esDNI=true;
                    return true;
                }

                if($esDNI!=true){
                    $this ->errores[$campo]="<span style='color: red;'>*El dni es incorrecto</span>";
                    return true;
                }

            }

        }

        public function selecciones($campo){

            if($_POST[$campo]=="defecto"){
                $this ->errores[$campo]="<span style='color: red;'>*Escoja una opción</span>";
                return false;
            }
            return true;
        }

        public function validacionPasada(){

            if(count($this->errores)!=0){
                return false;
            }
            return true;
    
        }

        // comprueba si el campo cumple una expresion regular
        public function patron($campo, $patron){
            if(!preg_match($patron,$_POST[$campo]))
            {
                $this->errores[$campo]=" *No cumpre el patron ".$patron;
                return false;
            }
            return true;
        }

        public function imprimirError($campo){
            return isset($this->errores[$campo])?'<span class="error_mensaje">'.$this->errores[$campo].'</span>':'';
        }

        public function getTexto($campo){
            return isset($_POST[$campo])?$_POST[$campo]:'';
            /*Si existe introduces el valor de campo, si no vacio*/
        }

        public function borrarTexto($campo){
            return isset($_POST[$campo])?$_POST[$campo]='':'';
            /*Si existe introduces el valor de campo, si no vacio*/
        }
    }
?>