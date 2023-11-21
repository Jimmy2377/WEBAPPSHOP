<?php include('../templates/cabeceraAdmi.php')?>

            <div class="buscador">
                <div><a class="icon-home" href="HomeAdmi.php">Home</a></div>
                <div><a class="icon-clipboard" href="RegistroProducto.php">Registro de Producto</a></div>
            </div>

<div class="main-container">
<div class="formularioprove">
        <form  action="ProcesosAdmi/ProcesoRegProve.php" method="post">
        <img src="img/registrar.png" alt="" width="80px">
            <h2>Registro Proveedor</h2>
            <div class="camposprove">
                <div class="textosprove"><input type="text" name="nombre" required placeholder="Nombre" ></div>
                <div class="textosprove"><input type="number" max="999999999999" name="nit" required placeholder="NIT" ></div>
                <div class="textosprove"><input type="number" name="telefono" max="99999999" required placeholder="Telefono" ></div>
                <div class="textosprove"><input type="email" name="correo" required placeholder="Correo" ></div>
                <div class="textosprove"><input type="text" name="direccion" required placeholder="Direccion" ></div>
                
            </div>
            <input type="submit" value="Registrar" class="botoningreso">
    </div>

<div class="centerprove">
    <br/>
        <table id="tabla">
            <thead>
            <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>NIT</th>
                    <th>Telefono</th>
                    <th>Corroe</th>
                    <th>Dirección</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                    
                </tr>
            </thead>
            <tbody>
                
                <?php
                include("../config/bd.php");
                $query = "SELECT * FROM proovedor";
                $resultado=$conexion->query($query);
                while($row=$resultado->fetch_assoc()){
                ?>

                <tr>
                    <td><?php echo $row['ID_Proovedor'];?></td>
                    <td><?php echo $row['nom_proovedor'];?></td>
                    <td><?php echo $row['NIT'];?></td>
                    <td><?php echo $row['telefono'];?></td>
                    <td><?php echo $row['correo'];?></td>
                    <td><?php echo $row['direccion'];?></td>
                    <td><a class="icon-pencil" href="ModificarProv.php?idmod=<?php echo $row['ID_Proovedor']; ?>" ></a></td>
                    <td><a class="icon-trash" href="ProcesosAdmi/EliminarProvedor.php?id=<?php echo $row['ID_Proovedor']; ?>" ></a></td>
                    
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
<?php include('../templates/pieAdmi.php')?>