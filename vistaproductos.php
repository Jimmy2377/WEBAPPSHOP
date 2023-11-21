<?php include('templates/cabecera.php')?>

<div id="main-container">
    
            <div class="buscador">
                <div><a class="icon-home" href="Home.php">Home</a></div>
                <div><a class="icon-attention" href="procesos/cerrarsesion.php">Cerrar Sesion</a></div>
            </div>
</br>  
</br> 
    <center>
    <div class="center">
        <table>
            <thead>
                <tr>
                    <th colspan="7">Lista Productos</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Producto</td>
                    <td>Foto</td>
                    <td>Detalle</td>
                    <td>Stock</td>
                    <td>Precio Unitario</td>
                    <td>Categoria</td>
                    <td>Proveedor</td>  
                </tr>
                <?php
                include("config/bd.php");
                $query = "SELECT * FROM producto
                INNER JOIN categoria ON producto.ID_Categoria = categoria.ID_Categoria
                INNER JOIN proovedor ON producto.ID_Proovedor = proovedor.ID_Proovedor
                INNER JOIN volumen ON producto.ID_volumen = volumen.ID_volumen WHERE Stock>=1 ORDER BY nom_producto ASC";
                $resultado=$conexion->query($query);
                while($row=$resultado->fetch_assoc()){
                ?>

                <tr>
                    
                    <td><?php echo $row['nom_producto'];?></td>
                    <td><img src="data:image/jpg;base64,<?php echo base64_encode($row['foto']);?>" width="80px"/></td>
                    <td><?php echo $row['detalle'];?></td>
                    <td><?php echo $row['Stock'];?></td>
                    <td><?php echo $row['precioUnitario'];?></td>
                    <td><?php echo $row['nom_categoria'];?></td>
                    <td><?php echo $row['nom_proovedor'];?></td>
                    
                      
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        </div>
        </center>
    </div>
<?php include('templates/pieAdmi.php')?>