<?php include('../templates/cabeceraven.php');
include '../config/bd.php';
include 'carritoventa.php';
?>
<br>
<h3>Contenido Carrito</h3>
<?php if(!empty($_SESSION['CARRITO'])) {?>
<table class="table table-light table-bordered">
    <tbody>
        <tr>
            <th width="25%">Nombre</th>
            <th width="25%" class="text-center">Precio</th>
            <th width="20%" class="text-center">Cantidad</th>
            <th width="25%"class="text-center">Total</th>
            <th width="5%">--</th>
        </tr>


        <?php $total=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){?>
        <tr>
            <td width="25%"><?php echo $producto['NOMBRE']?></td>
            <td width="25%" class="text-center"><?php echo $producto['PRECIO']?></td>
            <td width="20%" class="text-center"><?php echo $producto['CANTIDAD']?></td>
            <td width="25%" class="text-center"><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2) ?></td>
            <td width="5%">
                <form action="" method="post">
                <input type="hidden" 
                name="id" 
                id="id" 
                value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">

                    <button class="btn btn-danger"
                     type="submit"
                     name="btnAccion"
                     value="Eliminar"
                     >Eliminar</button>

                </form>
            </td>

        </tr>
        <?php $total=$total+($producto['PRECIO']*$producto['CANTIDAD']); ?>
        <?php } ?>

        <tr>
            <td colspan="3" align="right"><h3>Gran Total</h3></td>
            <td align="right"><h3>Bs<?php echo number_format($total,2);?></h3></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="5">
            <form action="cobrar.php" method="POST">
                <div class="alert alert-success">
                    <div class="form-group">
                        <label for="my-input">CI/NIT</label>
                        <input id="carnetcli" name="carnetcli" class="form-control" type="text" placeholder="Carnet Identidad" ondblclick="Doble_Clic(this.value)" value="" required>
                        <ul id="lista"></ul>
                    
                        <label for="my-input">Nombre</label>
                        <input id="nombrecli" name="nombrecli" class="form-control" type="text" placeholder="Nombre Cliente" required>
                        <input type="hidden" name="codven" id="codven" value="<?php echo $producto['IDVENDEDOR'];?>">
                    </div>
                        <small id="emailHelp" class="form-text-muted">Una vez terminado la venta ya no se podra realizar cambios</small>
                </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion">Proceder Venta</button> 
            </form>
            </td>
        </tr>

    </tbody>
</table>

<?php }else{ ?>
    <div class="alert alert-success">
        No hay productos en el carrito..
    </div>
<?php } ?>



<!-- ESTE SCRIPT GENERA LA LISTA DE COINCIDENCIAS DEL NOMBRE DE CLIENTE -->
      
<!-- jQuery -->      
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 
<!-- jQuery UI -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  
  
<script type="text/javascript">
  $(function() {
     $("#carnetcli").autocomplete({
       source: '../JSDocuments/lista_cliente.php',
     });
  });
</script>       
   
  <!-- ESTE SCRIPT REALIZA EL AUTOLLENADO DEL DNI Y LA DIRECCION LUEGO DE HACER DOBLE CLIK -->
  <script>

		function Doble_Clic(str) {
			if (str.length == 0) {
				
				document.getElementById("nombrecli").value ="";
				return;
			}
			else {

				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function ()
                {

					if (this.readyState == 4 && this.status == 200)
                    {
					var myObj = JSON.parse(this.responseText);
					document.getElementById
					("nombrecli").value = myObj[0];
					}
				};
				xmlhttp.open("GET", "../JSDocuments/busca_dni_dir.php?carnetcli=" + str, true);
				xmlhttp.send();
			}
		}
	</script>


<?php include('../templates/piecompra.php');
