<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Funciones</h1>
    <?php
        //Funcion con parametros pasados por valor
        function suma($a,$b){
            return $a+$b;
        }
        echo suma(7,8);
        echo "<br>";

        //Funcion con parametros pasados por referencia
        function sumadesdefuera(&$numero){
            $numero+=20;
        }   
        $numero=10;

        echo 'El valor de $numero antes de llamar a la funcion es: ' .$numero;
        echo "<br>";
        sumadesdefuera($numero);
        echo 'El valor de $numero despues de llamar a la funcion es: ' .$numero;
        echo "<br>";

        //Funcion con parametros por defecto
        function sumadefecto($a,$b=10){
            return $a+$b;
        }
        echo sumadefecto(20);
        echo "<br>";

        //Funcion con parametros indeterminados
        function sumaindeterminada(...$numeros){
            $acomula=0;
            foreach ($numeros as $numero) {
                $acomula+=$numero;
            }
            return $acomula;
        }
        echo "La suma de numeros es ".sumaindeterminada(7,8,4);
    ?>
</body>
</html>