<?php
    /*Includes*/
    include_once '../clases/pescador.php';
    include_once '../clases/pescatas.php';
    include_once '../clases/Repositorio.php';
    include_once '../clases/IRepositorio.php';
    /*Iniciar la sesion*/
    session_start();
    $pescadorsesion=isset($_SESSION["pescador"])?$_SESSION["pescador"]:new repositorio();
    $pescatasesion=isset($_SESSION["pescata"])?$_SESSION["pescata"]:new repositorio();
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
            $pescata = new pescata($_POST["especie"],$_POST["hora"],$_POST["peso"]
            ,$_POST["talla"]);            
            $pescatasesion->Agregar($pescata);
            $_SESSION["pescata"]=$pescatasesion;
           // var_dump($piezasesion);


            $arrayPescador = $pescadorsesion->LeerTodos();  
            //var_dump($arrayPescador);
            
            foreach ($arrayPescador as $numerofederado => $value) {
                if($value->getNumeroFederado()==$_GET["numerofederado"]){
                    $value->AnnadirPescatas($pescata);
                }
            }
            $_SESSION["pescador"]=$pescadorsesion;

            foreach ($arrayPescador as $key => $value) {
                var_dump($value);
            }
            

            session_register_shutdown($_SESSION['pescata']);
            session_register_shutdown($_SESSION['pescador']);

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
                <li><?php echo "<a href=listado_pescador.php>Pescador</a>"; ?></li>
                
            </ul>
              
        </nav>
            
        <section>
            <div class="contenedorsection">
                <form class="formulario" action="" method="post">
                    <fieldset>
                        <legend>Formulario de Registro</legend>
                        <div class="registro">
                            <label for="especie">Especie</label>
                            <br>
                            <input type="input" id="especie" placeholder="Introducir especie" name="especie" value="">
                        </div>

                        <div class="registro">
                            <label for="hora">hora</label>
                            <br>
                            <input type="input" id="hora" placeholder="Introducir hora" name="hora" value="">
                        </div>
            
                        <div class="registro">
                            <label for="peso">peso</label>
                            <br>
                            <input type="text" id="peso" placeholder="Introducir peso" name="peso" value="">
                        </div>

                        <div class="registro">
                            <label for="talla">talla</label>
                            <br>
                            <input type="text" id="talla" placeholder="Introducir talla" name="talla" value="">
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

