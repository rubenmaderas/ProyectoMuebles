<?php
    /*Includes*/
    include_once '../clases/coche.php';
    include_once '../clases/pieza.php';
    include_once '../clases/Repositorio.php';
    include_once '../clases/IRepositorio.php';
    /*Iniciar la sesion*/
    session_start();
    $cochesesion=isset($_SESSION["coche"])?$_SESSION["coche"]:new repositorio();
    $piezasesion = isset($_SESSION["pieza"])?$_SESSION["pieza"]:new repositorio();
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
        if(isset($_POST["btnenviar"])){
            /*Inicio*/
            $pieza = new pieza($_POST["idpieza"],$_POST["descripcion"],$_POST["categoria"]
            ,$_POST["idcoche"],$_POST["stock"],$_POST["precio"]);            
            $piezasesion->Agregar($pieza);
            $_SESSION["pieza"]=$piezasesion;
           // var_dump($piezasesion);

            $arrayCoche = $cochesesion->LeerTodos();  
            //var_dump($arrayCoche);
            
            foreach ($arrayCoche as $idcoche => $value) {
                if($value->getIdCoche()==$_POST["idcoche"]){
                    $value->AnnadirPiezas($pieza);
                }
            }
            $_SESSION["coche"]=$cochesesion;

            foreach ($arrayCoche as $idcoche => $coche) {
                var_dump($coche); 
            }

            session_register_shutdown($_SESSION['pieza']);
            session_register_shutdown($_SESSION['coche']);

            //header('Location: listado_coches.php');

            
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
                            <label for="idpieza">idpieza</label>
                            <br>
                            <input type="input" id="idpieza" placeholder="Introducir idpieza" name="idpieza" value="">
                        </div>

                        <div class="registro">
                            <label for="descripcion">descripcion</label>
                            <br>
                            <input type="input" id="descripcion" placeholder="Introducir descripcion" name="descripcion" value="">
                        </div>
            
                        <div class="registro">
                            <label for="categoria">categoria</label>
                            <br>
                            <input type="text" id="categoria" placeholder="Introducir categoria" name="categoria" value="">
                        </div>

                        <div class="registro">
                            <label for="idcoche">idcoche</label>
                            <br>
                            <input type="text" id="idcoche" placeholder="Introducir idcoche" name="idcoche" value="">
                        </div>
            
                        <div class="registro">
                            <label for="stock">stock</label>
                            <br>
                            <input type="text" id="stock" placeholder="Introducir stock" name="stock" value="">
                        </div>

                        <div class="registro">
                            <label for="precio">precio</label>
                            <br>
                            <input type="text" id="precio" placeholder="Introducir precio" name="precio" value="">
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

