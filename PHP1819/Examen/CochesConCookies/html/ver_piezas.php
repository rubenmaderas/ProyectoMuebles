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

    /**
     * Mi logica para las cookies es la siguiente: 
     *      Cuando seleccione la pieza que quiero mostrar le paso por la URL el IDPIEZA
     *  	que este IDPIEZA lo voy a usar como sufijo del nombre CONTADOR_ par asi poder
     *      crear una cookie para cada pieza
     * */


    /**Comprobamos si existe la cookie CONTADOR_ + (IDPIEZA) en mi caso contador_1 */
    if(isset($_COOKIE["contador_".$_GET['idpieza']])){
        /*  *Si existe CONTADOR_1 cogemos los siguentes 3 argumentos de la funcion setcookie
         *      1º Le decimos la cookie que queremos "contador_1"
         *      2º La cookie que hemos cogido + 1
         *      3º Le indicamos el tiempo de vida
         */
        setcookie("contador_".$_GET['idpieza'],$_COOKIE['contador_'.$_GET['idpieza']]+1,time()+60*24);

        /*
            *Aqui comprobamos que el valor de la cookie CONTADOR_1 sea menos que 3
        */
        if($_COOKIE["contador_".$_GET['idpieza']]<3){
            /**Mientras sea menos va a imprimir el mensaje VISITAS: X */
            echo 'Visitas '.$_COOKIE["contador_".$_GET['idpieza']];
        }else{
            /**Mientras que sea mayor que 3 va a imprimir el mensaje de COMPRA YA QUE LLEVAS : X */
            echo 'Compra ya que llevas '.$_COOKIE["contador_".$_GET['idpieza']].' visitas';
        }
    }else{
        /**En el caso que no exista creamos una cookie llamada CONTADOR_ + (IDPIEZA) y la inicializamos a 1 */
        setcookie("contador_".$_GET['idpieza'],1,time()+60*24);
    }

    
    
?>

<!DOCTYPE html>
<html lang="en">
<div id="contenedor">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/ver_piezas.css">
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
                <li><?php echo "<a href=listado_coches.php>Coches</a>"; ?></li>
                <li><?php echo "<a href=listado_piezas.php>Piezas</a>"; ?></li>
            </ul>
        </nav>
        
        <!--Imprimir los valores del post y escribirlos en un input mediante un solo bucle FOREACH (PHP PHP EMBEBIDO)-->
        <?php 
            $arrayPieza = $piezasesion->LeerTodos();  
            //var_dump($arrayCoche);
            
            foreach ($arrayPieza as $idpieza => $value) {
                //var_dump($value->getIdPieza());
                //var_dump($_GET["idpieza"]);exit;
                if($value->getIdPieza()==$_GET["idpieza"]){     
        ?>
        <section>
            <div class="contenedorsection">
                <form class="formulario" action="" method="post">
                    <fieldset>
                        <legend>Formulario de Registro</legend>
                        <div class="registro">
                            <label for="idpieza">idpieza</label>
                            <br>
                            <input type="input" id="idpieza" placeholder="Introducir idpieza" readonly name="idpieza" value="<?=$value->getIdPieza()?>">
                        </div>

                        <div class="registro">
                            <label for="descripcion">descripcion</label>
                            <br>
                            <input type="input" id="descripcion" placeholder="Introducir descripcion" readonly name="descripcion" value="<?=$value->getDescripcion()?>">
                        </div>
            
                        <div class="registro">
                            <label for="categoria">categoria</label>
                            <br>
                            <input type="text" id="categoria" placeholder="Introducir categoria" readonly name="categoria" value="<?=$value->getCategoria()?>">
                        </div>

                        <div class="registro">
                            <label for="idcoche">idcoche</label>
                            <br>
                            <input type="text" id="idcoche" placeholder="Introducir idcoche" readonly name="idcoche" value="<?=$value->getIdCoche()?>">
                        </div>
            
                        <div class="registro">
                            <label for="stock">stock</label>
                            <br>
                            <input type="text" id="stock" placeholder="Introducir stock" readonly name="stock" value="<?=$value->getStock()?>">
                        </div>

                        <div class="registro">
                            <label for="precio">precio</label>
                            <br>
                            <input type="text" id="precio" placeholder="Introducir precio" readonly name="precio" value="<?=$value->getPrecio()?>">
                        </div>
            
        
                        
                        <div class="botones">
                            <?php echo "<a href=listado_piezas_de_coche.php?idpieza=".$value->getIdPieza()."&"."idcoche=".$_GET["idcoche"].">"."Volver<img src='../imagenes/añadir.png' alt='Ver' class='imgeliminar'/>"."</a>" ."</td>"; ?>
                        </div>
            <?php
                }
            }
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

