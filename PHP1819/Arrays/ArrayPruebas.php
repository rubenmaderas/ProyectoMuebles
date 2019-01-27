<?php
    //Arrays indexados
    //1º Forma
    $numeros=array(6,8,9);
    //2º Forma
    $otrosnumeros=[8,12,10];
    //Añadir datos a arrays indexados
    var_dump($numeros);
    var_dump($otrosnumeros);
    //Añade el numero 20 en la posicion 10 (array[posicionarray]=valorintroducir)
    $numeros[10]=20;
    $otrosnumeros[]=35;
    echo '$numeros antes de borrar';
    var_dump($numeros);
    var_dump($otrosnumeros);
    //Borrar un elemento
    unset($numeros[10]);
    echo '$numeros despues de borrar';
    var_dump($numeros);
    $numeros[]=46;
    echo '$numeros con  nuevo elemento sin indice';
    var_dump($numeros);
    $numeros[1000]=5;
    echo '$numeros se ha añadido en posicion mil';      
    var_dump($numeros);
    //Reindexar el array
    echo '$numeros reindexados';
    $numeros=array_values($numeros);
    var_dump($numeros);
    //Recorrer un array indexado
    foreach ($numeros as $indice => $numero) {
        echo "Posicion $indice = $numero<br>";
    }
    //Recorrer el array indexado y cambiar los varoles 8 por 10
    foreach ($numeros as $indice => $numero) {
        if($numero==8){
            $numeros[$indice]=10;
        }
    }
    var_dump($numeros);
    //Recorrer el array por referencia y cambiar los varoles 8 por 10
    foreach ($numeros as $indice => &$numero) {
        if($numero==8){
            $numeros=10;
        }
    }
    var_dump($numeros);
    //Ordenar array
    sort($numeros);
    var_dump($numeros);

    //Array asociativos
    $peliculas=['El graduado'=>'Un director','El Hobbit'=>"NPI"];
    var_dump($peliculas);
    //Recorrer el array asociativo
    //echo 'El director de la pelicula El graduado es ' .$peliculas["El Graduado"];

    
    include_once 'Pelicula.php';

    $peliculas=[new Pelicula('Peli1','dire1',120),
                new Pelicula('meli1','dire2',60)];
    var_dump($peliculas);

    
    usort($peliculas,array("pelicula","comparapelisdura"));
    var_dump($peliculas);

?>