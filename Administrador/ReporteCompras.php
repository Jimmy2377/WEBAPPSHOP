<?php include('../templates/cabeceraAdmi.php')?>

<div class="buscador">
        <div><a class="icon-home" href="HomeAdmi.php">Home</a></div>
        <div><a class="icon-clipboard" href="ListaProductos.php">Lista Productos</a></div>     
    </div>
</br>
</br>
<div class="main-container">
<div class="tablasVD">
        <table id="tabla">
            <thead>
                <th colspan="6">Listado de Compras</th>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Total Gastado Bs.</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                include("../config/bd.php");
                $query = "SELECT * FROM compra ORDER BY fecha ASC";
                $resultado=$conexion->query($query);
                while($row=$resultado->fetch_assoc()){
                ?>

                <tr>
                    <td><?php echo $row['ID_Compra'];?></td>
                    <td><?php echo $row['fecha'];?></td>
                    <td><?php echo $row['precio_total'];?></td>
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
                <th colspan="6">Detalle de Cada Compra</th>
                <tr>
                    <th>ID Compra</th>
                    <th>Producto</th>
                    <th>Precio Compra</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                
                $query = "SELECT * FROM detalle_compra
                INNER JOIN compra ON detalle_compra.ID_Compra = compra.ID_Compra
                INNER JOIN producto ON detalle_compra.ID_Producto = producto.ID_Producto ";
                $resultado2=$conexion->query($query);
                while($row=$resultado2->fetch_assoc()){
                ?>

                <tr>
                    <td><?php echo $row['ID_Compra'];?></td>
                    <td><?php echo $row['nom_producto'];?></td>
                    <td><?php echo $row['PrecioMayor'];?></td>
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