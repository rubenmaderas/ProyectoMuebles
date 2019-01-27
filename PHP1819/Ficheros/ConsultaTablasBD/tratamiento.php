<?php
    $conexion = new PDO("mysql:host=127.0.0.1;dbname=northwind","root","");
    //$conexion->setAtribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    echo "Conexión realizada<br>";
    $stm=$conexion->query("show full tables where table_type like 'BASE TABLE'");

    $stm=$conexion->prepare("show full tables where table_type like 'BASE TABLE'");
    var_dump($stm);
    file_put_contents("./ficheros/estaca.txt",$stm);
?>