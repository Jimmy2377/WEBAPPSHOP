<?php include('../templates/cabeceraAdmi.php')?>
<center>
    <div id="main-container">
    <div class="formulario">
        <form  action="ProcesosAdmi/ProcesoRegEmp.php" method="post" enctype="multipart/form-data">
            <div class="encabezado_titulo">
            <img src="img/registrar.png" alt="" width="80px">
                <h2>Registro Empleado</h2>
            </div> 
            <div class="campoA">
            <div class="Datos">
                <div class="wrapper">
                    <input type="file" class="my_file" name="foto" required>
                </div>
            </div>
            <div class="Datos">
                <div class="textos"><input type="text" name="nombre" required placeholder="Nombre" ></div>
                <div class="textos"><input type="text" name="apellido" required placeholder="Apellido" ></div>
                <div class="textos"><input type="number" max="9999999999" name="CI" required placeholder="CI" ></div>
                <div class="textos"><input type="date" name="FN" required placeholder="Fecha de Nacimineto" ></div>
                <div class="textos"><input type="number" name="celu" max="99999999" placeholder="Telefono/Celular" required></div>
            </div>
            </div>
            <div class="campoA">
            <div class="Datos">
                <div class="textos"><input type="text" name="direc" placeholder="Direccion" required></div>
                <div class="textos"><input type="email" name="correo" placeholder="Correo Electronico" required></div>
                <div class="box">
                    <select class="sexo" name="sexo" required>
                      <option selected disabled value="">Elegir Sexo</option>
                      <option value="M">Hombre</option>
                      <option value="F">Mujer</option>                                              
                    </select>
                </div>
            </div>
            <div class="Datos">
                <div class="box">
                    <select class="cargos" name="cargo" required>
                      <option selected disabled value="">Elegir Cargo</option>
                      <?php
                      include('../config/bd.php');
                      $sql = $conexion->query("SELECT * FROM cargo");
                      while($resultado = $sql->fetch_assoc()){
                        echo "<option value='".$resultado['ID_Cargo']."'>".$resultado['nombre_cargo']."</option>";
                      }
                      ?>                                           
                    </select>
                </div>
                <div class="textos"><input type="text" name="user" placeholder="Nombre de Usuario" required></div>
                <div class="textos"><input type="password" name="pass" placeholder="Contraseña" required></div>
            </div>
            </div>
            <div class="campoB">
            <input type="submit" value="Registrar" class="botoningreso">
            </div>
            </form>
    </div>
    </div>
    </center>

    <?php include('../templates/pieAdmi.php')?>