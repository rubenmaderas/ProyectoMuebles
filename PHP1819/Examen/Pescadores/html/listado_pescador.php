<?php
    /*Includes*/
    include_once '../clases/pescador.php';
    include_once '../clases/Repositorio.php';
    include_once '../clases/IRepositorio.php';

    /*Iniciar la sesion*/
    session_start();
    $pescadorsesion=isset($_SESSION["pescador"])?$_SESSION["pescador"]:new repositorio();
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
                <li><?php echo "<span>".@$_GET['numerofederado']."</span>"?></li>
                <li><?php echo "<a href=listado_coches.php>Pescador</a>"; ?></li>
                <li><?php echo "<a href=listado_piezas.php>Pescatas</a>"; ?></li>
            </ul>
        </nav>
            
        <section>
        <div class="contenedorsection">
        <form class="formulario" action="" method="post">
            <fieldset>
                <legend>Listado de Parcelas</legend>
                                <!--************PHP************-->              
                    <?php   
                        $arrayPescador = $pescadorsesion->LeerTodos();   
                        echo "<table border='1' class='listado_tabla'>";
                            echo "<tr>";
                                echo "<th>Numero Federado</th>";
                                echo "<th>Nombre</th>";
                                echo "<th>Apellidos</th>";
                                echo "<th>Dni</th>";
                            echo "</tr>";
                            foreach ($arrayPescador as $numerofederado => $pescador) {
                                echo "<tr>";
                                    echo "<td>". $pescador->getNumeroFederado()."</td>";
                                    echo "<td>". $pescador->getNombre()."</td>";
                                    echo "<td>". $pescador->getApellidos()."</td>";
                                    echo "<td>". $pescador->getDni()."</td>";
                                    echo "<td colspan='2'>". "<a href=./listado_pescatas_de_pescador.php?numerofederado=".$pescador->getNumeroFederado().">"."<img src='../imagenes/añadir.png' alt='Ver' class='imgeliminar'/>"."</a>" ."</td>"; 
                                echo "</tr>";   
                            }
                        echo "</table>";

                    ?>
                    
                    
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

    