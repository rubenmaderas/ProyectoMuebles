<?php
    /*Includes*/
    include_once '../clases/pieza.php';
    include_once '../clases/Repositorio.php';
    include_once '../clases/IRepositorio.php';

    /*Iniciar la sesion*/
    session_start();
    $piezasesion=isset($_SESSION["pieza"])?$_SESSION["pieza"]:new repositorio();
?>

                                <!--************HTML************-->

<!DOCTYPE html>
<html lang="en">
<div id="contenedor">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/listado.css">
        <title>IES Las Fuentezuelas</title>
    </head>

    <body>
        <header>            
            <div id="imagencabecera">
                <img src="../imagenes/cabecera.jpg">
            </div>
            <div id="textocabecera">
                    <h1>Asociación de Agricultores Libres</h1>
            </div>
            
            <div id="imagencabecera2">
               <img src="../imagenes/cabecera2.png">
            </div>
        </header>

        <nav>
            <ul>
                <li><?php echo "<span>".@$_GET['dni']."</span>"?></li>
                <li><?php echo "<a href=listado_coches.php>Coches</a>"; ?></li>
                <li><?php echo "<a href=listado_piezas.php>Piezas</a>"; ?></li>
            </ul>
        </nav>
            
        <section>
        <div class="contenedorsection">
        <form class="formulario" action="" method="post">
            <fieldset>
                <legend>Listado de Parcelas</legend>
                                <!--************PHP************-->              
                    <?php   
                        $arrayPiezas = $piezasesion->LeerTodos();   
                        echo "<table border='1' class='listado_tabla'>";
                            echo "<tr>";
                                echo "<th>Id</th>";
                                echo "<th>descripcion</th>";
                                echo "<th>categoria</th>";
                                echo "<th>idcoche</th>";
                                echo "<th>stock</th>";
                                echo "<th>precio</th>";
                            echo "</tr>";
                            foreach ($arrayPiezas as $idpieza => $pieza) {
                                echo "<tr>";
                                    echo "<td>". $pieza->getIdPieza()."</td>";
                                    echo "<td>". $pieza->getDescripcion()."</td>";
                                    echo "<td>". $pieza->getCategoria()."</td>";
                                    echo "<td>". $pieza->getIdCoche()."</td>";
                                    echo "<td>". $pieza->getStock()."</td>";
                                    echo "<td>". $pieza->getPrecio()."</td>";
                                    //echo "<td colspan='2'>". "<a href=./modificar_parcelas.php?dni=".$_GET['dni']."&idparcela=".$parcela->getIdParcela().">"."<img src='../imagenes/añadir.png' alt='Modificar' class='imgeliminar'/>"."</a>" ."</td>"; 
                                    //echo "<td>" ."<a href=./eliminar_parcelas.php?dni=".$_GET['dni']."&idparcela=".$parcela->getIdParcela().">"."<img src='../imagenes/eliminar.png' alt='Eliminar' class='imgeliminar'/>"."</a>" ."</td>";  
                                echo "</tr>";   
                            }
                        echo "</table>";         
                    ?>
                    <div id="añadirparcela">
                        
                    </div>
                    
            </fieldset>
        </form>
        </div>
        </section>
        
        <footer>
            <p id="redes">Redes Sociales</p>
            <a href="https://www.facebook.com/pages/Ies-Las-Fuentezuelas/111326685558851" target="_blank"><img src="../imagenes/facebook.png" alt="facebook"/></a>
            <a href="https://twitter.com/lasfuentezuelas?lang=es" target="_blank"><img src="../imagenes/instagram.png" alt="instagram"/></a>

            <div id="anio">
                <p >2013 © IES Las Fuentezuelas</p>
            </div>

            <div id="autor">
                <p>Diseño y Programación Rubén Maderas</p>
            </div> 
        </footer>
    </body> 
</div>
</html>

    