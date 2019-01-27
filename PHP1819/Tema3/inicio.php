<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
</head>
<body>
    <p><strong>Tema 3</strong></p>

    <?php
        echo "Uso de comillas simples y dobles";
        echo "<br>";
        $var="Alumnos";
        echo 'Hola $var'; //Lo coge de manera literal
        echo "<br>";
        echo "Hola $var"; //Interpreta la variable por el $
        echo "<br>";

        //Declaracion de booleano particularidad
        //bolean
        $casado=true;
        if($casado){
            echo "Esta casado";
            var_dump($casado);//Para ver el valor de la variable
        }
        echo "<br>";
        //String
        $cadena="0";
        if(!$cadena){
            echo '$cadena esta vacia';
            var_dump($cadena);//Para ver el valor de la variable
        }
        echo "<br>";

        echo "<h1>Ambito de variables</h1>";
        $curso = "2DAA";
        function imprime(){
            $curso="2DAA";
            echo $curso."<br>";
        }
        //Ejecucion de la funcion
        imprime();

        echo "<h2>Utilizacion Global</h2><br>";
        $apellido1="Cano";
        $apellido2="Vela";

        function apellidos (){
            global $apellido1;
            global $apellido2;

            echo "Primer apellido es --> $apellido1 y el segundo es --> $apellido2";
        }
        apellidos();

        echo"<h2>Palabra reservada static</h2><br>";
        function cuenta(){
            static $contador=0;
            echo "contador = $contador<br>";
            $contador++;
        }
        
        for ($i=0; $i<5; $i++){
            cuenta();
        }

        echo "<h2>Variable de variable</h2><br>";
        $sueldo="veinte";
        $$sueldo = "algo mas";

        echo '$sueldo = ' .$sueldo."</br>";
        echo '$veinte = ' .$veinte."</br>";
        echo '${$sueldo} = ' .${$sueldo}."</br>";
    ?>
</body>
</html>