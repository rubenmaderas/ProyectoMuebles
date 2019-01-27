<?php
    /*Includes*/
    //include_once './registro_coches.php';
    include_once '../clases/Repositorio.php';
    include_once '../clases/IRepositorio.php';

    include_once '../clases/coche.php';
    /*Iniciar la sesion*/
    session_start();
    $cochesesion = isset($_SESSION["coche"])?$_SESSION["coche"]:new Repositorio();
?>

                                <!--************HTML************-->

<!DOCTYPE html>
<html lang="en">
<div id="contenedor">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/registro_coches.css">
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
                <li><a href="#">Parcelas</a></li>
                <li><a href="#">Actividades</a></li>
            </ul>
            <p><a href="../html/inicio.php">Cerrar sesion</a></p>
            <a href="../html/inicio.php"><img src="../imagenes/iniciosesion.png"></a>   
        </nav>
            
        <section>
        <div class="contenedorsection">
        <form class="formulario" action="" method="post">
            <fieldset>
                <legend>Listado de Parcelas</legend>
                
                                <!--************PHP************-->              
                    <?php
                        
                        
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

    