<?php
    /*Includes*/
    include_once '../clases/pescador.php';
    include_once '../clases/Repositorio.php';
    include_once '../clases/IRepositorio.php';
    include_once '../clases/validacion.php';
    /*Iniciar la sesion*/
    session_start();
    $pescadorsesion=isset($_SESSION["pescador"])?$_SESSION["pescador"]:new repositorio();
    
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
            $validar->requerido("numerofederado");
            /*Marca*/
            $validar->requerido("nombre");
            /*Modelo */
            $validar->requerido("apellidos");

            /*Combustible */
            $validar->requerido("dni");

            /*Seguir Validando*/
            
            if($validar->validacionPasada()){
                /*Parcela*/
                $pescador = new pescador($_POST["numerofederado"],$_POST["nombre"],$_POST["apellidos"]
                ,$_POST["dni"]);
                $pescadorsesion->Agregar($pescador);
                $_SESSION["pescador"]=$pescadorsesion;
                

                session_register_shutdown($_SESSION['pescador']);
            
                /*Validar*/
                $validar->borrarTexto("numerofederado");
                var_dump($_SESSION["pescador"]);
                header("Location: listado_pescador.php?numerofederado=".$_POST["numerofederado"]);
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
            <li><?php echo "<a href=listado_coches.php>Coches</a>"; ?></li>
                <li><?php echo "<a href=listado_piezas.php>Piezas</a>"; ?></li>
            </ul>  
        </nav>
            
        <section>
            <div class="contenedorsection">
                <form class="formulario" action="" method="post">
                    <fieldset>
                        <legend>Formulario de Registro</legend>
                        <div class="registro">
                            <label for="numerofederado">numerofederado</label><?= $validar->imprimirError("idcoche")?>
                            <br>
                            <input type="input" id="numerofederado" placeholder="Introducir numerofederado" name="numerofederado" value="<?= $validar->getTexto("numerofederado")?>">
                        </div>

                        <div class="registro">
                            <label for="nombre">nombre</label><?= $validar->imprimirError("nombre")?>
                            <br>
                            <input type="input" id="nombre" placeholder="Introducir nombre" name="nombre" value="<?= $validar->getTexto("nombre")?>">
                        </div>
            
                        <div class="registro">
                            <label for="apellidos">apellidos</label><?=$validar->imprimirError("apellidos")?>
                            <br>
                            <input type="text" id="apellidos" placeholder="Introducir apellidos" name="apellidos" value="<?= $validar->getTexto("apellidos")?>">
                        </div>

                        <div class="registro"><?=$validar->imprimirError("dni")?>
                            <label for="dni">combustible</label>
                            <br>
                            <input type="text" id="dni" placeholder="Introducir dni" name="dni" value="<?= $validar->getTexto("dni")?>">
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

