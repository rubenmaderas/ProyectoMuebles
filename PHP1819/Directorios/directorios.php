<?php
include './dirtool.php';
    //Directorio actual
    echo getcwd();
    file_put_contents("prueba.txt","Hola mundo");
    //cambiar el directorio actual
    chdir("c:/wamp64");
    file_put_contents("prueba.txt","prueba.txt");
    //recorrer un directorio
    $ficheros = scandir("c:/wamp64/www");
   // var_dump($ficheros);

    //Hacer arbol de directorios
    $datos = dirtool::arboldir("c:/wamp64/www/Proyecto_PHP/");
    var_dump($datos);
?>