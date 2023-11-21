<?php
session_start();
if(empty($_SESSION["id"])){
    header("location:../index.php");
}
?>
<?php 
if($_SESSION['puesto']==2){
    header("location:../Home.php");
}?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Pagina Admistrador</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../Estilos/style_home.css" rel="stylesheet">
        <link href="../Estilos/fontello.css" rel="stylesheet">
        <link href="../Estilos/style_ListEmp.css" rel="stylesheet">
        <link href="../Estilos/style_RegEmpleado.css" rel="stylesheet">
        <link href="../Estilos/style_RegPro.css" rel="stylesheet">
        <link href="../Estilos/styles_provedores.css" rel="stylesheet">
        <link href="../Estilos/style_homepage.css" rel="stylesheet">
        <link href="../Estilos/style_vistaventas.css" rel="stylesheet">
        <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
        <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
        
    </head>
    <body>
    <div id="sidemenu" class="menu-collapsed">
            <div id="header">
                <div id="title"><span><img src="../img/profile.png" width="50px"></span></div>
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
                echo "<a href='../procesos/cerrarsesion.php'>Cerrar Sesión</a>";
                ?>   
                </span>
            </div>
        </div>

            <div id="menu-item">
                <div class="item">
                    <a href="../Administrador/HomeAdmi.php">
                        <div class="icon"><img src="../img/iconos/icon_inicio.png" alt=""></div>
                        <div class="title">Inicio</div>
                    </a>
                </div>
                <div class="item">
                    <a href="ListaEmpleados.php">
                        <div class="icon"><img src="../img/iconos/icon_person.png" alt=""></div>
                        <div class="title">Empleado</div>
                    </a>
                </div>
                <div class="item">
                    <a href="ListaProductos.php">
                        <div class="icon"><img src="../img/iconos/icon_productos.png" alt=""></div>
                        <div class="title">Productos</div>
                    </a>
                </div>
                <div class="item">
                    <form action=""></form>
                    <a href="../Administrador/Compra/PageCompra.php" >
                        <div class="icon"><img src="../img/iconos/icon_compra.png" alt=""></div>
                        <div class="title">Compra</div>
                    </a>
                    </form>
                </div>
                <div class="item">
                    <a href="RegistroProducto.php">
                        <div class="icon"><img src="../img/iconos/icon_Nuevoproductos.png" alt=""></div>
                        <div class="title">Registro Producto</div>
                    </a>
                </div>
                <div class="item">
                    <a href="Provedores.php">
                        <div class="icon"><img src="../img/iconos/icon_proovedor.png" alt=""></div>
                        <div class="title">Proovedores</div>
                    </a>
                </div>
                <div class="item">
                    <a href="VistaVentas.php">
                        <div class="icon"><img src="../img/iconos/icon_billete.png" alt=""></div>
                        <div class="title">Ventas</div>
                    </a>
                </div>

            </div>
    </div>

            

  