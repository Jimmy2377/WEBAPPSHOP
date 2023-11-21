<?php include('../templates/cabeceraAdmi.php')?>
<div class="buscador">
                <div><a class="icon-home" href="HomeAdmi.php">Home</a></div>
                <div><a class="icon-clipboard" href="ListaProductos.php">Lista Productos</a></div>
                <button class="icon-plus" id="abrir_modal_prov">Nueva Categoria</button>
                <button class="icon-plus" id="abrir_modal_vol">Nuevo Lote</button>
                <div><a class="icon-clipboard" href="Provedores.php">Nuevo Proveedor</a></div>
            </div>


    <dialog id="modalprov">
      <form action="ProcesosAdmi/ProcesoRegCat.php" method="POST">
        <h4>Registrar Categoria</h4>
        <input type="text" class="txtmodal" name="nombrecate" id="nombrecate" required placeholder="Nombre Categoria">
        <input type="submit" value="Registrar">
        <input type="button" id="cerra_modal_prov" value="Cancelar">
      </form>
    </dialog>

    <dialog id="modalvol">
      <form action="ProcesosAdmi/ProcesoRegVol.php" method="POST">
        <h4>Registrar Lote</h4>
        <input type="text" class="txtmodal" name="nombrevol" required placeholder="Nombre lote">
        <input type="number" class="txtmodal" name="numvol" required placeholder="Unidades dentro del lote">
        <input type="submit">
        <input type="button" id="cerra_modal_vol" value="Cancelar">
      </form>
    </dialog>

    <center>
    <div id="main-container">
    <div class="formulariopro">
        <form  action="ProcesosAdmi/ProcesoRegProd.php" method="post" enctype="multipart/form-data">
        <div class="encabezado_titulopro">
        <img src="../img/registrar.png" alt="" width="50px">
            <h2>Registro Producto</h2>
        </div>   
            <div class="campoApro">
                <div class="Datospro">
                    <div class="wrapper">
                    <input type="file" class="my_file" name="foto">
                    </div>   
                </div>
                <div class="Datospro">
                    <div class="textospro"><input type="text" name="nombre" required placeholder="Nombre" ></div>
                    <div class="textospro"><input type="number" name="preciounit" placeholder="Precio Unitario" step="0.01" min="0" required ></div>  
                    <div class="boxpro"><select name="categoria" required>
                      <option selected disabled value="">Categoria</option>
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
                    <textarea class="campotexto" rows="7" name="campotext" placeholder="Describir detalle del producto..."  required></textarea>
                </div>
            </div>
            <div class="campoApro">
                <div class="Datospro">
                    <div class="boxpro"><select name="provedor" required>
                      <option selected disabled value="">Proveedor</option>
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
                      include('../config/bd.php');
                      $sql = $conexion->query("SELECT * FROM volumen ORDER BY unidades ASC");
                      while($resultado = $sql->fetch_assoc()){
                        echo "<option value='".$resultado['ID_volumen']."'>".$resultado['NombreVolumen']."</option>";
                      }
                      ?>                                            
                    </select></div>
                </div>
                <div class="Datospro">
                    <div class="textospro"><input type="number" name="preciomay" placeholder="Precio por Mayor" step="0.01" min="0" required></div>
                </div>
            </div>
            <div class="campoBpro">
            <input type="submit" value="Registrar" class="botoningreso">
            </div>
            
        </form>
    </div>
    </div>
    </center>
                    
    <script>
      const abrirmodalprov = document.querySelector("#abrir_modal_prov");
    const cerrarmodalprov = document.querySelector("#cerra_modal_prov");
    const modalprov = document.querySelector("#modalprov");

    abrirmodalprov.addEventListener("click",()=>{modalprov.showModal();})
    cerrarmodalprov.addEventListener("click",()=>{modalprov.close();})
    </script>

    <script>
      const abrirmodalvol = document.querySelector("#abrir_modal_vol");
    const cerrarmodalvol = document.querySelector("#cerra_modal_vol");
    const modalvol = document.querySelector("#modalvol");

    abrirmodalvol.addEventListener("click",()=>{modalvol.showModal();})
    cerrarmodalvol.addEventListener("click",()=>{modalvol.close();})
    </script>
    
    

<?php include('../templates/pieAdmi.php')?>