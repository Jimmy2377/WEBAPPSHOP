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

<html><link href="../Estilos/style_RegEmpleado.css" rel="stylesheet"></html>
<center>
    <div id="main-container">
    <div class="formulario">
                <?php
                $id=$_REQUEST['idm'];
                include("../config/bd.php");
                $query = "SELECT * FROM empleado WHERE ID_Empleado='$id'";
                $resultado=$conexion->query($query);
                $row=$resultado->fetch_assoc();
                ?>
        <form  action="ProcesosAdmi/ProcesoModEmpleado.php?id=<?php echo $row['ID_Empleado'];?>" method="post" enctype="multipart/form-data">
            <div class="encabezado_titulo">
            <img src="../img/registrar.png" alt="" width="50px">
                <h2>Modificar Datos del Empleado</h2>
            </div> 
            <div class="campoA">
            <div class="Datos">

                <div class="wrapper"> 
                    <input type="file" class="my_file" name="foto" aria-selected="$row['foto']" required >
                </div>
            </div>
            <div class="Datos">
                <div class="textos"><label>Nombre</label><input type="text" name="nombre" required placeholder="Nombre" value="<?php echo $row['nom_empleado']?>"></div>
                <div class="textos"><label>Apellido</label><input type="text" name="apellido" required placeholder="Apellido" value="<?php echo $row['apell_empleado']?>"></div>
                <div class="textos"><label>CI</label><input type="text" name="CI" required placeholder="CI" value="<?php echo $row['CI']?>"></div>
                <div class="textos"><label>Fecha Nacimineto</label><input type="date" name="FN" required placeholder="Fecha de Nacimineto" value="<?php echo $row['fn_empleado']?>"></div>
                <div class="textos"><label>Celular</label><input type="text" name="celu" maxlength="8" placeholder="Telefono/Celular" required value="<?php echo $row['celular']?>"></div>
            </div>
            </div>
            <div class="campoA">
            <div class="Datos">
                <div class="textos"><label>Direccion</label><input type="text" name="direc" placeholder="Direccion" required value="<?php echo $row['direccion']?>"></div>
                <div class="textos"><label>Correo Electronico</label><input type="email" name="correo" placeholder="Correo Electronico" required value="<?php echo $row['correo']?>"></div>
            </div>
            <div class="Datos">
                
                <div class="textos"><label>Nombre Uusario</label><input type="text" name="user" placeholder="Nombre de Usuario" required value="<?php echo $row['NombreUsuario']?>"></div>
                <div class="textos"><label>Contraseña</label><input type="password" name="pass" placeholder="Contraseña" required value="<?php echo $row['ClaveUsuario']?>"></div>
                <div class="box">
                <select class="cargos" name="cargo" required>
                <option selected disabled >Elegir Cargo</option>
                      <?php
                      include("procesos/conector.php");
                      $sql1 = "SELECT * FROM cargo WHERE ID_Cargo=".$row['CARGO_ID_Cargo'];
                      $resultado1 = $conexion->query($sql1);
                      $row1 = $resultado1->fetch_assoc();
                      echo "<option selected value='".$row1['ID_Cargo']."'>".$row1['nombre_cargo']."</option>"
                      ?>
                      <?php
                      include('procesos/conector.php');
                      $sql = $conexion->query("SELECT * FROM cargo");
                      while($resultado = $sql->fetch_assoc()){
                        echo "<option value='".$resultado['ID_Cargo']."'>".$resultado['nombre_cargo']."</option>";
                      }
                      ?>                    
                    </select>
                </div>
            </div>
            </div>
            <div class="campoB">
            <input type="submit" value="Modificar" class="botoningreso">
            
            <a href="ListaEmpleados.php">
            <input type="button" value="Cancelar" class="botoningreso">
            </a>
            
            </div>
            </form>
    </div>
    </div>
    </center>