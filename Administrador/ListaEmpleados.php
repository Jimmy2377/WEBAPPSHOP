<?php include('../templates/cabeceraAdmi.php')?>

<div id="main-container">
        <div class="buscador">
            <div><a class="icon-home" href="HomeAdmi.php">Home</a></div>
            <div><a class="icon-user-add" href="RegistroEmpleado.php">Nuevo Empleado</a></div>
        </div>
</br>
</br>
        <center class="center">
        <table>
            <thead>
            <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>F/N</th>
                    <th>CI</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Correo</th>
                    <th>Sexo</th>
                    <th>Foto</th>
                    <th>Cargo</th>
                    <th>Usuario</th>
                    
                    <th></th>
                    <th></th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                include("../config/bd.php");
                $query = "SELECT * FROM empleado INNER JOIN cargo ON empleado.CARGO_ID_Cargo = cargo.ID_Cargo ORDER BY nom_empleado ASC";
                $resultado=$conexion->query($query);
                while($row=$resultado->fetch_assoc()){
                ?>

                <tr>
                    <td><?php echo $row['ID_Empleado'];?></td>
                    <td><?php echo $row['nom_empleado'];?></td>
                    <td><?php echo $row['apell_empleado'];?></td>
                    <td><?php echo $row['fn_empleado'];?></td>
                    <td><?php echo $row['CI'];?></td>
                    <td><?php echo $row['celular'];?></td>
                    <td><?php echo $row['direccion'];?></td>
                    <td><?php echo $row['correo'];?></td>
                    <td><?php echo $row['sexo'];?></td>
                    <td><img src="data:image/jpg;base64,<?php echo base64_encode($row['foto']);?>" width="40px"/></td>
                    <td><?php echo $row['nombre_cargo'];?></td>
                    <td><?php echo $row['NombreUsuario'];?></td>
                    
                    <td><a class="icon-pencil" href="ModificarEmpleado.php?idm=<?php echo $row['ID_Empleado']; ?>" ></a></td>
                    <td><a class="icon-trash" href="ProcesosAdmi/ElimarEmpleado.php?id=<?php echo $row['ID_Empleado']; ?>" ></a></td>  
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        </center>
    </div>

<?php include('../templates/pieAdmi.php')?>