
<html><link href="../Estilos/style_modprov.css" rel="stylesheet"></html>
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
<div class="main-container">
    <div class="formulario">
                <?php
                $idg=$_REQUEST['idmod'];
                include("../config/bd.php");
                $query = "SELECT * FROM proovedor WHERE ID_Proovedor='$idg'";
                $resultado=$conexion->query($query);
                $row=$resultado->fetch_assoc();
                ?>
        <form  action="ProcesosAdmi/ProcesoModProve.php?idd=<?php echo $row['ID_Proovedor'];?>" method="post">
          
        <h2>Acualizar Datos</h2>
            <div class="campos">
                <div class="textos"><label>Nombre</label><input type="text" name="nombre" required placeholder="Nombre" value="<?php echo $row['nom_proovedor']?>"></div>
                <div class="textos"><label>NIT</label><input type="text" name="nit" maxlength="12" required placeholder="NIT" value="<?php echo $row['NIT']?>"></div>
                <div class="textos"><label>Telefono</label><input type="text" name="telefono" maxlength="8" required placeholder="Telefono" value="<?php echo $row['telefono']?>"></div>
                <div class="textos"><label>Correo</label><input type="email" name="correo" required placeholder="Correo" value="<?php echo $row['correo']?>"></div>
                <div class="textos"><label>Direccion</label><input type="text" name="direccion" required placeholder="Direccion" value="<?php echo $row['direccion']?>"></div>
                
            </div>
            <input type="submit" value="Modificar" class="botoningreso">
            <a href="Provedores.php">
            <input type="button" value="Cancelar" class="botoningreso">
            </a>
    </div>
    </div>