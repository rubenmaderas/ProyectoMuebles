<?php 
    //Crear un fichero
    //Crear fichero de texto
    $f=fopen("./ficheros/text.txt","wt");
    //Escribir una linea
    fwrite($f,"Linea 1\n");
    fwrite($f,"Linea 2\n");
    fclose($f);

    //Crear fichero binario
    $f=fopen("./ficheros/text.bin","wb");
    //Escribir una linea
    fwrite($f,"Linea 1\n");
    fwrite($f,"Linea 2\n");
    fclose($f);

    //Leer fichero texto
    $f=fopen("./ficheros/text.txt","rt");
    while($linea=fgets($f)){
        echo $linea."<br>";
    }

    //Leer fichero binario
    $f=fopen("./ficheros/text.bin","rb");
    while(!feof($f)){
        $dato=fread($f,3);
        echo $dato."<br>";
    }

    fclose($f);

    //Crear fichero de una estacada
    file_put_contents("./ficheros/estaca.txt","Esto es una prueba de fichero");
    echo file_get_contents("./ficheros/estaca.txt");
?>