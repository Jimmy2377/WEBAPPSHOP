<?php include('../templates/cabeceraAdmi.php');
include '../config/bd.php';
?>
<div id="main-container">
    
            <div class="buscador">
                <div><a class="icon-home" href="HomeAdmi.php">Home</a></div>
                <div><a class="icon-attention" href="../procesos/cerrarsesion.php">Cerrar Sesion</a></div>
            </div>
    <center>
    
    <div class="barraestadistica">
        
        <a href="VistaVentas.php" class="tarjeta">
            <center>
            <div class="cabecera">
                <h4 class="titulotarjeta">Ganancias del mes</h4>
            </div> 
            <div>
            <?php    
               
                    $consulta = "SELECT SUM(ganacia) AS 'Ganancias' FROM venta";
                    $result=mysqli_query($conexion,$consulta);
                    $data=mysqli_fetch_array($result);
                    $caja=$data['Ganancias'];                 
                ?>
                <h2 class="icon-chart-bar"><?php echo $caja;?></h2>
            </div>
            </center>
        </a>
        
        <a href="VistaVentas.php" class="tarjeta">
            <center>
            <div class="cabecera">
                <h4 class="titulotarjeta">Ventas en el mes</h4>
            </div> 
            <div>
            <?php
                    $consulta = "SELECT COUNT(ID_Venta) AS numeroventas FROM venta";
                    $result=mysqli_query($conexion,$consulta);
                    $data=mysqli_fetch_array($result);
                    $caja=$data['numeroventas'];
                    
                ?>
                <h2 class="icon-chart-bar"><?php echo $caja;?></h2>
            </div>
            </center>
        </a>
        <a href="ReporteCompras.php" class="tarjeta">
            <center>
            <div class="cabecera">
                <h4 class="titulotarjeta">Gastos en compras</h4>
            </div> 
            <div>
                <?php                  
                    $consulta = "SELECT SUM(precio_total) AS 'Gastos' FROM compra";
                    $result=mysqli_query($conexion,$consulta);
                    $data=mysqli_fetch_array($result);
                    $caja=$data['Gastos']; 
                ?>
                <h2 class="icon-chart-bar"><?php echo $caja;?></h2>
            </div>
            </center>
        </a>

        <a href="ListaProductos.php" class="tarjeta">
            <center>
            <div class="cabecera">
                <h4 class="titulotarjeta">Productos con stock bajo</h4>
            </div> 
            <div>
                <?php                  
                    $consulta = "SELECT COUNT(Stock) AS minstock FROM producto WHERE Stock<=12";
                    $result=mysqli_query($conexion,$consulta);
                    $data=mysqli_fetch_array($result);
                    $caja=$data['minstock'];
                ?>
                <h2 class="icon-chart-bar"><?php echo $caja;?></h2>
            </div>
            </center>
        </a>
    
    </div>
    </center> 
    <img src="../img/fotoproductos/banner.png">
</div>
<?php include('../templates/pieAdmi.php')?>