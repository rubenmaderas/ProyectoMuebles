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
        function creartabla(){
            if ($n<1 or $n>10) {
                echo "no has escrito un nùmero entre el 1 y el 10.";
            }
            else {
                echo "<h4>Tabla del $n:</h4>";
                $i=1;
                while ($i<=10) {
                    echo "$n x $i = " .$n * $i. "<br/>";
                    $i++;
                } 
            }
        }
        echo creartabla(5);
    ?>
</body>
</html>