<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/inicio.css">
    <title>Document</title>
</head>
<body>
    <div class="topnav">
        <a class="active" href="#inicio">Inicio</a>
        <a href="#nosotros">Nosotros</a>
        <a href="#contact">Contacto</a>
        <div class="login-container">
            <form action="/action_page.php">
                <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Iniciar Sesion</button>
                <a href="registro.php" style.display='block' style="width:auto;">Registrate</a>
            </form>
        </div>
    </div> 
    <!--------------------------------------Inicio sesion Formulario--------------------------------------------------->
    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <form class="modal-content" action="/action_page.php">
            <div class="container">
                <h1>Inicio Sesion</h1>
                <p>Porfavor rellene el formulario para iniciar sesion.</p>
                <hr>
                <label for="dni"><b>DNI</b></label>
                <input type="text" placeholder="Introducir DNI" name="dni" required>
            
                <label for="psw"><b>Contraseña</b></label>
                <input type="password" placeholder="Introducir Contraseña" name="contraseña" required>
                
                <label>
                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Recordar
                </label>
            
                <div class="clearfix">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancelar</button>
                    <button type="submit" class="signupbtn">Iniciar Sesion</button>
                </div>
            </div>
        </form>
    </div>
          
    <script>
        // Get the modal
        var modal = document.getElementById('id01');
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            console.log(event);
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <footer>
        <a href="https://es-es.facebook.com/" target="_blank"><img src="imagenes/Footer/facebook.png" width="25px" height="25px "/></a>
        <a href="https://twitter.com/?lang=es" target="_blank"><img src="imagenes/Footer/twitter.PNG" width="25px" height="25px "/></a>
        <a href="https://www.instagram.com/?hl=es" target="_blank"><img src="imagenes/Footer/instagram.PNG" width="25px" height="25px "/></a>
        <p>Redes Sociales</p>
        
    </footer>

</body>
</html>