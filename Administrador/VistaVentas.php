<?php include('../templates/cabeceraAdmi.php')?>
    <div class="buscador">
        <div><a class="icon-home" href="HomeAdmi.php">Home</a></div>      
    </div>
</br>
</br>
<div class="main-container">
<div class="tablasVD">
        <table id="tabla">
            <thead>
                <th colspan="6">Listado de Ventas</th>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Total Bs.</th>
                    <th>Ganancia Bs.</th>
                    <th>Vendedor</th>
                    <th>Cliente</th> 
                </tr>
            </thead>
            <tbody>
                
                <?php
                include("../config/bd.php");
                $query = "SELECT * FROM venta
                INNER JOIN empleado ON venta.ID_Empleado = empleado.ID_Empleado
                INNER JOIN cliente ON venta.ID_Cliente = cliente.ID_Cliente ORDER BY fecha ASC";
                $resultado=$conexion->query($query);
                while($row=$resultado->fetch_assoc()){
                ?>

                <tr>
                    <td><?php echo $row['ID_Venta'];?></td>
                    <td><?php echo $row['fecha'];?></td>
                    <td><?php echo $row['precio_total'];?></td>
                    <td><?php echo $row['ganacia'];?></td>
                    <td><?php echo $row['nom_empleado'];?></td>
                    <td><?php echo $row['nombre'];?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="tablasVD">
    <table id="tabla2">
            <thead>
                <th colspan="6">Detalle de Cada Venta</th>
                <tr>
                    <th>ID Venta</th>
                    <th>Producto</th>
                    <th>Precio Venta</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                
                $query = "SELECT * FROM detalle_venta
                INNER JOIN venta ON detalle_venta.ID_Venta = venta.ID_Venta
                INNER JOIN producto ON detalle_venta.ID_Producto = producto.ID_Producto ";
                $resultado2=$conexion->query($query);
                while($row=$resultado2->fetch_assoc()){
                ?>

                <tr>
                    <td><?php echo $row['ID_Venta'];?></td>
                    <td><?php echo $row['nom_producto'];?></td>
                    <td><?php echo $row['precioUnitario'];?></td>
                    <td><?php echo $row['cantidad'];?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script>
        var tabla= document.querySelector("#tabla");//transformar a datatable
        var dataTable = new DataTable(tabla,{
            perPage:6,
            perPageSelect:[3,6,9,12]
        });
    </script>
    <script>
        var tabla= document.querySelector("#tabla2");//transformar a datatable
        var dataTable = new DataTable(tabla,{
            perPage:6,
            perPageSelect:[3,6,9,12]
        });
    </script>
<?php include('../templates/pieAdmi.php')?>