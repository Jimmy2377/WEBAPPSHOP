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
<html><link href="../Estilos/style_RegPro.css" rel="stylesheet"></html>
<center>
    <div id="main-container">
    <div class="formulariopro">
                <?php
                $idp=$_REQUEST['idm'];
                include("../config/bd.php");
                $query = "SELECT * FROM producto WHERE ID_Producto='$idp'";
                $resultado=$conexion->query($query);
                $row=$resultado->fetch_assoc();
                ?>
        <form  action="ProcesosAdmi/ProcesoModProducto.php?idp=<?php echo $row['ID_Producto'];?>" method="post" enctype="multipart/form-data">
        <div class="encabezado_titulopro">
        <img src="../img/registrar.png" alt="" width="50px">
            <h2>Modificar Producto</h2>
        </div>   
            <div class="campoApro">
                <div class="Datospro">
                    <div class="wrapper">
                    <input type="file" class="my_file" name="foto" required>
                    </div>   
                </div>
                <div class="Datospro">
                    <div class="textospro"><input type="text" name="nombre" required placeholder="Nombre" value="<?php echo $row['nom_producto']?>"></div>
                    <div class="textospro"><input type="number" name="preciounit" placeholder="Precio Unitario" step="0.01" min="0" required value="<?php echo $row['precioUnitario']?>"></div>  
                    <div class="boxpro"><select name="categoria" required>
                      <option selected disabled>Categoria</option>
                      <?php
                      include("../config/bd.php");
                      $sql1 = "SELECT * FROM categoria WHERE ID_Categoria=".$row['ID_Categoria'];
                      $resultado1 = $conexion->query($sql1);
                      $row1 = $resultado1->fetch_assoc();
                      echo "<option selected value='".$row1['ID_Categoria']."'>".$row1['nom_categoria']."</option>"
                      ?>

                      <?php
                      include('../config/bd.php');
                      $sql = $conexion->query("SELECT * FROM categoria");
                      while($resultado = $sql->fetch_assoc()){
                        echo "<option value='".$resultado['ID_Categoria']."'>".$resultado['nom_categoria']."</option>";
                      }
                      ?>  
                                                                
                    </select></div>
                </div>
                <div class="Datospro">
                <div class="textospro"><input type="text" name="detalle" required placeholder="detalle" value="<?php echo $row['detalle']?>"></div>
                </div>
            </div>
            <div class="campoApro">
                <div class="Datospro">
                    <div class="boxpro"><select name="provedor" required>
                    <option selected disabled>Proovedor</option>

                      <?php
                      include("../config/bd.php");
                      $sql1 = "SELECT * FROM proovedor WHERE ID_Proovedor=".$row['ID_Proovedor'];
                      $resultado1 = $conexion->query($sql1);
                      $row1 = $resultado1->fetch_assoc();
                      echo "<option selected value='".$row1['ID_Proovedor']."'>".$row1['nom_proovedor']."</option>"
                      ?>

                      <?php
                      include('../config/bd.php');
                      $sql = $conexion->query("SELECT * FROM proovedor");
                      while($resultado = $sql->fetch_assoc()){
                        echo "<option value='".$resultado['ID_Proovedor']."'>".$resultado['nom_proovedor']."</option>";
                      }
                      ?>                                            
                    </select></div>
                </div>
                <div class="Datospro">
                    <div class="boxpro"><select name="Tamlote" required>
                      <option selected disabled value="">Tamaño Lote</option>
                      <?php
                      include("../config/bd.php");
                      $sql1 = "SELECT * FROM volumen WHERE ID_volumen=".$row['ID_volumen'];
                      $resultado1 = $conexion->query($sql1);
                      $row1 = $resultado1->fetch_assoc();
                      echo "<option selected value='".$row1['ID_volumen']."'>".$row1['NombreVolumen']."</option>"
                      ?>

                      <?php
                      include('../config/bd.php');
                      $sql = $conexion->query("SELECT * FROM volumen");
                      while($resultado = $sql->fetch_assoc()){
                        echo "<option value='".$resultado['ID_volumen']."'>".$resultado['NombreVolumen']."</option>";
                      }
                      ?>                                            
                    </select></div>
                </div>
                <div class="Datospro">
                    <div class="textospro"><input type="number" name="preciomay" placeholder="Precio por Mayor" step="0.01" min="0" required value="<?php echo $row['PrecioMayor']?>"></div>
                </div>
            </div>
            <div class="campoBpro">
            <input type="submit" value="Modificar" class="botoningreso">
            <a href="ListaProductos.php">
            <input type="button" value="Cancelar" class="botoningreso">
            </a>
            </div>
            
        </form>
    </div>
    </div>
    </center>