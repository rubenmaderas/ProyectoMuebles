<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <?php
         //include_once './misfunciones'; //Para coger las funciones de otro archivo
        //Funcion de Ruben Maderas
        function numeroceldas($ancho,$largo){
            echo "<table border='1'>";
            

            for($i=0;$i<$ancho;$i++){
                echo "<tr>";
                for($j=0;$j<$largo;$j++){
                    echo "<td>$i,$j</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        
        echo numeroceldas(6,6);
        echo "<br>";

        //Funcion de Profesor
        function creartablas($filas,$columnas){
            $html="<table border=1>";
            for($i=0;$i<$filas;$i++){
                $html.="<tr>";
                for($j=0;$j<$columnas;$j++){
                    $html.="<td>$i,$j</td>";
                }
                $html.="</tr>";
            }
            $html.="</table>";
            return $html;
        }

        echo creartablas(5,3);
        echo "<br>";
    ?>
    
    
</body>
</html>