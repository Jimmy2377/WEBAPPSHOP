<?php
session_start();
if(empty($_SESSION["id"])){
    header("location:index.php");
}
?>
<?php 
if($_SESSION['puesto']==1){
    header("location:Administrador/HomeAdmi.php");
}?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Pagina vendedores</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="Estilos/style_home.css" rel="stylesheet">
        <link href="Estilos/fontello.css" rel="stylesheet">
        <link href="Estilos/style_homevendedor.css" rel="stylesheet">
    </head>
    <body>
    <div id="sidemenu" class="menu-collapsed">
            <div id="header">
                <div id="title"><span><img src="img/profile.png" width="50px"></span></div>
                <div id="menu-btn">
                    <div class="icon-menu"></div>
                </div>
            </div>  
        

        <div id="profile">
            <div id="photo"><img src="data:image/jpg;base64,<?php echo base64_encode($_SESSION['foto']);?>"/></div>
    
            <div id="name">
                <span>
                
                <?php
                echo $_SESSION['nombre'];
                echo " ";
                echo $_SESSION['apellido'];
                $carg = $_SESSION['puesto'];
                if($carg == 1){
                    echo "<p>Cargo: Admistrador</p>";
                }else{
                    echo "<p>Cargo: Cajero</p>";
                }
                echo "<a href='procesos/cerrarsesion.php'>Cerrar Sesión</a>";
                ?>   
                </span>
            </div>
        </div>

            <div id="menu-item">
                <div class="item">
                    <a href="Home.php">
                        <div class="icon"><img src="img/iconos/icon_inicio.png" alt=""></div>
                        <div class="title">Inicio</div>
                    </a>
                </div>
                
                <div class="item">
                    <a href="vistaproductos.php">
                        <div class="icon"><img src="img/iconos/icon_productos.png" alt=""></div>
                        <div class="title">Productos</div>
                    </a>
                </div>
                <div class="item">
                    <a href="ventas/PageVenta.php">
                        <div class="icon"><img src="img/iconos/icon_venta.png" alt=""></div>
                        <div class="title">Venta</div>
                    </a>
                </div>
            </div>
    </div>