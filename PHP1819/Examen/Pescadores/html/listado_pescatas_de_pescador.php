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
                <li><?php echo "<a href=listado_pescador.php>Coches</a>"; ?></li>
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
                    foreach ($arrayPescador as $key => $value) {
                        if($value->getNumeroFederado()==$_GET["numerofederado"]){
                            var_dump($value);
                        }
                        
                    }
                    
                ?>
                <div class="botones">
                    <?php echo "<a href=registro_pescatas.php?numerofederado=".$_GET["numerofederado"].">"."Añadir</a>" ."</td>"; ?>
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

    