<?php
    /*Includes*/
    include_once '../clases/coche.php';
    include_once '../clases/Repositorio.php';
    include_once '../clases/IRepositorio.php';

    /*Iniciar la sesion*/
    session_start();
    $cochesesion=isset($_SESSION["coche"])?$_SESSION["coche"]:new repositorio();
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
                        $arrayCoches = $cochesesion->LeerTodos();   
                        echo "<table border='1' class='listado_tabla'>";
                            echo "<tr>";
                                echo "<th>Id</th>";
                                echo "<th>Marca</th>";
                                echo "<th>Modelo</th>";
                                echo "<th>Combustible</th>";
                                echo "<th>Año Fabricacion</th>";
                                echo "<th>Observaciones</th>";
                            echo "</tr>";
                            foreach ($arrayCoches as $idcoche => $coche) {
                                echo "<tr>";
                                    echo "<td>". $coche->getIdCoche()."</td>";
                                    echo "<td>". $coche->getMarca()."</td>";
                                    echo "<td>". $coche->getModelo()."</td>";
                                    echo "<td>". $coche->getCombustible()."</td>";
                                    echo "<td>". $coche->getAñoFabricacion()."</td>";
                                    echo "<td>". $coche->getObservaciones()."</td>";
                                    echo "<td colspan='2'>". "<a href=./listado_piezas_de_coche.php?idcoche=".$coche->getIdCoche().">"."<img src='../imagenes/añadir.png' alt='Ver' class='imgeliminar'/>"."</a>" ."</td>"; 
                                echo "</tr>";   
                            }
                        echo "</table>";

                    ?>
                    <div id="añadirparcela">
                        <?php echo "<a href=registro_coches.php>"."<img src='../imagenes/añadir.png' alt='Ver' class='imgeliminar'/>"."Añadir Coche"."</a>";?> 
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

    