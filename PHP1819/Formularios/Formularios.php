<!--La clase Formulario es la main de la clase validacion, el codigo empieza ejecutarse desde aqui-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <?php
        include_once './clases/validacion.php';
        $validar= new validacion();
        if(isset($_POST["enviar"]))
        {
            $validar->cadenaRango("nombre",100);
            $validar->requerido("nombre");
            $validar->enteroRango("edad",18,30);
            $validar->requerido("sexo");
            $validar->requerido("aficiones");
            $validar->selecciones("provincia");
            $validar->dni("dni");
            $validar->email("email");
            

            if($validar->validacionPasada())
            {
                // hacer cosas, por ejemplo crear un registro en base de datos o rellenar un array
            }
        }
    ?>
    
    <h1>Formulario con POST validado</h1>
    <form action="" method="post">
        Nombre:<input type="text" name="nombre" id="nombre" value="<?=$validar->getTexto("nombre") ?>">
        <?= $validar -> imprimirError("nombre")?><br>
        <br>
        Edad:<input type="number" name="edad" id="edad" value="<?=$validar->getTexto("edad") ?>">
        <?= $validar -> imprimirError("edad")?>
        <br><br>
        Dni: <input type="text" name="dni" id="dni" value="<?=$validar->getTexto("dni") ?>"><?= $validar -> imprimirError("dni")?> 
        <br><br>Sexo:<?= $validar -> imprimirError("sexo")?>
        <br><input type="radio" name="sexo" id="sexo" value="Hombre"<?=$validar->getRadius("sexo","Hombre") ?>> Hombre
        <br><input type="radio" name="sexo" id="sexo" value="Mujer"<?=$validar->getRadius("sexo","Mujer") ?>> Mujer
        <br><br>
        Email:<input type="text" name="email" id="email" value="<?=$validar->getTexto("email") ?>"><?= $validar -> imprimirError("email")?>

        <br><br>Provincia:
            <select name="provincia">
                <option value="defecto">-- Escoje una opcion --</option>
                <option value="Jaen"    <?=$validar->getSelect("provincia","Jaen") ?>>Jaén</option>
                <option value="Cordoba" <?=$validar->getSelect("provincia","Cordoba") ?>>Córdoba </option>
                <option value="Granada" <?=$validar->getSelect("provincia","Granada") ?>>Granada </option>
                <option value="Sevilla" <?=$validar->getSelect("provincia","Sevilla") ?>>Sevilla </option>
            </select>
            <?= $validar -> imprimirError("provincia")?>
        <br>
        <br>Aficiones:<?= $validar -> imprimirError("aficiones")?>
            <br>
            <input type="checkbox" id="aficiones" name="aficiones[]" value="Futbol" > Futbol 
            <br>
            <input type="checkbox" id="aficiones" name="aficiones[]" value="Baloncesto" > Baloncesto
            <br>
            <input type="checkbox" id="aficiones" name="aficiones[]" value="Videojuegos" > Videojuegos
            <br>
            
        <br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</head>
<body>
    
</body>
</html>