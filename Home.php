<?php include('templates/cabecera.php');
include 'config/bd.php';
?>

<div id="main-container">
    
            <div class="buscador">
                <div><a class="icon-home" href="Home.php">Home</a></div>
                <div><a class="icon-attention" href="procesos/cerrarsesion.php">Cerrar Sesion</a></div>
            </div>
    <section>
    <div class="barraestadistica">
        
    <a href="#" class="tarjeta">
            <center>
            <div class="cabecera">
                <h4 class="titulotarjeta">Ventas Realizadas</h4>
            </div> 
            <div>
                <?php
                    $consul=$_SESSION["id"];                
                    $consulta = "SELECT COUNT(ID_Empleado) AS NumeroVentas FROM venta WHERE ID_Empleado=$consul";
                    $result=mysqli_query($conexion,$consulta);
                    $data=mysqli_fetch_array($result);
                    $caja=$data['NumeroVentas'];
                ?>
                <h2 class="icon-chart-bar"><?php echo $caja;?></h2>
            </div>
            </center>
        </a>
        <a href="#" class="tarjeta">
            <center>
            <div class="cabecera">
                <h4 class="titulotarjeta">Ganancias Personal</h4>
            </div> 
            <div>
                <?php
                    $consul=$_SESSION["id"];                
                    $consulta = "SELECT SUM(precio_total) AS 'tuganancia' FROM venta WHERE ID_Empleado=$consul";
                    $result=mysqli_query($conexion,$consulta);
                    $data=mysqli_fetch_array($result);
                    $caja=$data['tuganancia'];
                ?>
                <h2 class="icon-chart-bar"><?php echo $caja;?></h2>
            </div>
            </center>
        </a>
    
    </div>
    </section>
    <div><img src="img/fotoproductos/banner.png"></div>
</div>
<?php include('templates/pieAdmi.php')?>