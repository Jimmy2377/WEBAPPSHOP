<?php include('../../templates/cabeceracom.php');
include '../../config/bd.php';
include 'carrito.php';
?>
<br>
<h3>Contenido Carrito</h3>
<?php if(!empty($_SESSION['CARRITO'])) {?>
<table class="table table-light table-bordered">
    <tbody>
        <tr>
            <th width="20%">Nombre</th>
            <th width="20%" class="text-center">Lotes</th>
            <th width="20%" class="text-center">Contenido del lote</th>
            <th width="20%"class="text-center">Precio unitario</th>
            <th width="15%"class="text-center">Total</th>
            <th width="5%">--</th>
        </tr>


        <?php $total=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){?>
        <tr>
            <td width="20%"><?php echo $producto['NOMBRE']?></td>
            <td width="20%" class="text-center"><?php echo $producto['CANTIDAD']?></td>
            <td width="20%" class="text-center"><?php echo $producto['UNIDADES']?></td>
            <td width="20%" class="text-center"><?php echo $producto['PRECIO']?></td>
            <td width="15%" class="text-center"><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD']*$producto['UNIDADES'],2) ?></td>
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
        <?php $total=$total+($producto['PRECIO']*$producto['CANTIDAD']*$producto['UNIDADES']); ?>
        <?php } ?>

        <tr>
            <td colspan="4" align="right"><h3>Gran Total</h3></td>
            <td align="right"><h3>Bs<?php echo number_format($total,2);?></h3></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="5">
            <form action="pagar.php" method="POST">
                <div class="alert alert-success">
                    <small id="emailHelp" class="form-text-muted">Una vez terminado la compra ya no se podra realizar cambios</small>    
                </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion">Proceder a Comprar</button> 
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

<?php include('../../templates/piecompra.php');

?>


