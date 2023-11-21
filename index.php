<?php
session_start();
if(isset($_SESSION['puesto'])){
    switch($_SESSION['puesto']){
        case 1;
        header('location:Administrador/HomeAdmi.php');
        break;
        case 2;
        header('location:Home.php');
        break;

        default;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="Estilos/style_index.css" rel="stylesheet">
    </head>
    <body>
    <span></span>
    <img class="wave" src="img/wave.png">
    <div class="contenedor">
        <div class="img">
            <img src="img/tec.png">
        </div>
        <div class="contenedor_login">
            <form action="procesos/ValidarLogin.php" method="post">
                <img class="iconuser" src="img/profile.png">
                <h2>Welcome</h2>
                <div class="inputs one">
                    <div class="iconos">
                        <img class="icon" src="img/iconUSER.png"></img>
                    </div>
                    <div>
                        <h5>Usuario</h5>
                        <input class="textos" type="text" name="usuario" required>
                    </div>
                </div>
                <div class="inputs two">
                    <div class="iconos">
                    <img class="icon" src="img/iconPASS.png"></img>
                    </div>
                    <div>
                        <h5>Contraseña</h5>
                        <input class="textos" type="password" name="password" required>
                    </div>
                </div>

                <input type="submit" name="iniciar" class="btn" value="Ingresar">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="JSDocuments/main.js"></script>
    </body>
</html>
