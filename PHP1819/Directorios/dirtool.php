<?php
    class dirtool{
        public static $ficheros=array();

        public static function arboldir($path){
            self::$ficheros[$path] = scandir($path);

            foreach(self::$ficheros[$path] as $fichero){
                if(is_dir($path."/".$fichero) && $fichero != "." && $fichero = ".."){
                    self::arboldir($path."/".$fichero);
                }
            }
            return self::$ficheros;
        }
    }

?>