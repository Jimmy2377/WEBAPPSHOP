<?php include('../templates/cabeceraAdmi.php')?>
<div id="main-container">
            
            <div class="buscador">
            <div><a class="icon-home" href="HomeAdmi.php">Home</a></div>
                <div><a class="icon-cart-plus" href="RegistroProducto.php">Nuevo Producto</a></div>
                <div><a class="icon-cart-plus" href="ReporteCompras.php">Reporte de Compras</a></div>
            </div>
            
    <div class="center">
        <table id="tabla">
            <thead>
            <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Foto</th>
                    <th>Detalle</th>
                    <th>Stock</th>
                    <th>Precio Venta</th>
                    <th>Precio Compra</th>
                    <th>Volumen Compra</th>
                    <th>Categoria</th>
                    <th>Proveedor</th>
                    <th>Modificar</th>
                    <th>Eliminar</th> 
                </tr>
            </thead>
            <tbody>
                
                <?php
                include("../config/bd.php");
                $query = "SELECT * FROM producto
                INNER JOIN categoria ON producto.ID_Categoria = categoria.ID_Categoria
                INNER JOIN proovedor ON producto.ID_Proovedor = proovedor.ID_Proovedor
                INNER JOIN volumen ON producto.ID_volumen = volumen.ID_volumen ORDER BY nom_producto ASC";
                $resultado=$conexion->query($query);
                while($row=$resultado->fetch_assoc()){
                ?>

                <tr>
                    <td><?php echo $row['ID_Producto'];?></td>
                    <td><?php echo $row['nom_producto'];?></td>
                    <td><img src="data:image/jpg;base64,<?php echo base64_encode($row['foto']);?>" width="50px"/></td>
                    <td><?php echo $row['detalle'];?></td>
                    <td><?php echo $row['Stock'];?></td>
                    <td><?php echo $row['precioUnitario'];?></td>
                    <td><?php echo $row['PrecioMayor'];?></td>
                    <td><?php echo $row['NombreVolumen'];?></td>
                    <td><?php echo $row['nom_categoria'];?></td>
                    <td><?php echo $row['nom_proovedor'];?></td>
                    
                    <td><a class="icon-pencil" href="modificarproducto.php?idm=<?php echo $row['ID_Producto']; ?>" ></a></td>
                    
                    <?php if($row['Stock']<= 0){?>
                        <td><a class="icon-trash" href="procesosAdmi/eliminarproducto.php?id=<?php echo $row['ID_Producto']; ?>" ></a></td> 
                    <?php } ?>
                    
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        </div>

    <script>
        var tabla= document.querySelector("#tabla");//transformar a datatable
        var dataTable = new DataTable(tabla,{
            perPage:6,
            perPageSelect:[3,6,9,12]
        });
    </script>
    </div>

    <?php include('../templates/pieAdmi.php')?>