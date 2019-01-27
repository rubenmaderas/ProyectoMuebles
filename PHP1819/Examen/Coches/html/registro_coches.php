<?php
    /*Includes*/
    include_once '../clases/coche.php';
    include_once '../clases/Repositorio.php';
    include_once '../clases/IRepositorio.php';
    include_once '../clases/validacion.php';
    /*Iniciar la sesion*/
    session_start();
    $cochesesion=isset($_SESSION["coche"])?$_SESSION["coche"]:new repositorio();
?>

<!DOCTYPE html>
<html lang="en">
<div id="contenedor">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/registro.css">
        <title>IES Las Fuentezuelas</title>
    </head>

    <?php
        $validar = new validacion();
        if(isset($_POST["btnenviar"])){
            /*IdCoche*/
            $validar->requerido("idcoche");
            /*Marca*/
            $validar->requerido("marca");
            $validar->cadenaRango("marca",10);
            /*Modelo */
            $validar->requerido("modelo");
            $validar->cadenaRango("modelo",10);
            /*Combustible */
            $validar->requerido("combustible");
            $validar->cadenaRango("combustible",10);
            /*Año Fabricacion */
            $validar->requerido("annofabricacion");
            $validar->enteroRango("annofabricacion",1900,2018);
            /*Observaciones*/
            $validar->requerido("observaciones");
            /*Seguir Validando*/
            
            if($validar->validacionPasada()){
                /*Parcela*/
                $coche = new coche($_POST["idcoche"],$_POST["marca"],$_POST["modelo"]
                ,$_POST["combustible"],$_POST["annofabricacion"],$_POST["observaciones"]);
                $cochesesion->Agregar($coche);
                $_SESSION["coche"]=$cochesesion;
                

                session_register_shutdown($_SESSION['coche']);
            
                /*Validar*/
                $validar->borrarTexto("idcoche");

                header('Location: listado_coches.php');
            }
        }        
    ?>

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
                <li><a href="../index.html">Inicio</a></li>
            </ul>
            <p><a href="../html/inicio.php">Iniciar sesion</a></p>
            <a href="../html/inicio.php"><img src="../imagenes/iniciosesion.png"></a>   
        </nav>
            
        <section>
            <div class="contenedorsection">
                <form class="formulario" action="" method="post">
                    <fieldset>
                        <legend>Formulario de Registro</legend>
                        <div class="registro">
                            <label for="idcoche">idcoche</label><?= $validar->imprimirError("idcoche")?>
                            <br>
                            <input type="input" id="idcoche" placeholder="Introducir idcoche" name="idcoche" value="<?= $validar->getTexto("idcoche")?>">
                        </div>

                        <div class="registro">
                            <label for="marca">marca</label><?= $validar->imprimirError("marca")?>
                            <br>
                            <input type="input" id="marca" placeholder="Introducir marca" name="marca" value="<?= $validar->getTexto("marca")?>">
                        </div>
            
                        <div class="registro">
                            <label for="modelo">modelo</label><?=$validar->imprimirError("modelo")?>
                            <br>
                            <input type="text" id="modelo" placeholder="Introducir modelo" name="modelo" value="<?= $validar->getTexto("modelo")?>">
                        </div>

                        <div class="registro"><?=$validar->imprimirError("combustible")?>
                            <label for="combustible">combustible</label>
                            <br>
                            <input type="text" id="combustible" placeholder="Introducir contraseña" name="combustible" value="<?= $validar->getTexto("combustible")?>">
                        </div>
            
                        <div class="registro">
                            <label for="annofabricacion">annofabricacion</label><?=$validar->imprimirError("annofabricacion")?>
                            <br>
                            <input type="text" id="annofabricacion" placeholder="Introducir annofabricacion" name="annofabricacion" value="<?= $validar->getTexto("annofabricacion")?>">
                        </div>

                        <div class="registro">
                            <label for="observaciones">observaciones</label><?=$validar->imprimirError("observaciones")?>
                            <br>
                            <input type="text" id="observaciones" placeholder="Introducir observaciones" name="observaciones" value="<?= $validar->getTexto("observaciones")?>">
                        </div>
            
                        
                        
                        <div class="botones">
                            <button type="submit" class="btnenviar" name="btnenviar">Enviar</button>
                            <button type="reset" class="btnlimpiar">Limpiar  </button>
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

