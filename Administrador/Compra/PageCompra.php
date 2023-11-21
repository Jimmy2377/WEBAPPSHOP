<?php include('../../templates/cabeceracom.php');
include '../../config/bd.php';
include 'carrito.php';
?>
<div class="container">
        <br>

        <?php if($mensaje!=""){?>
        <div class="alert alert-success">
            <?php echo $mensaje; ?>
            <a href="mostrarcarrito.php" class="badge bg-success">Ver Carrito</a>
        </div>
        <?php }?>
        <div class="row">
            <?php
            $sentencia=$pdo->prepare("SELECT * FROM producto
            INNER JOIN categoria ON producto.ID_Categoria = categoria.ID_Categoria
            INNER JOIN proovedor ON producto.ID_Proovedor = proovedor.ID_Proovedor
            INNER JOIN volumen ON producto.ID_volumen = volumen.ID_volumen ORDER BY nom_producto ASC");
            $sentencia->execute();
            $listaProducto=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProducto);
            ?>
            <?php foreach($listaProducto as $producto){ ?>
                <div class="col-3">
                <div class="card">
                    <img title="<?php echo $producto['detalle'];?>"
                        alt="<?php echo $producto['nom_producto'];?>" 
                        class="card-img-top" 
                        src="data:image/jpg;base64,<?php echo base64_encode($producto['foto']);?>"
                        data-toggle="popover"
                        data-trigger="hover"
                        data-content="<?php echo $producto['nom_producto'];?>"
                        height="120px">
                        
                    <div class="card-body">
                        <span><?php echo $producto['nom_producto'];?></span>
                        <h5 class="card-title">Bs<?php echo $producto['PrecioMayor'];?></h5>
                        <h6 class="card-title">Cantidad por Lote: <?php echo $producto['unidades'];?></h6>
                        <h6 class="card-title">Proveedor: <?php echo $producto['nom_proovedor'];?></h6>
                    
                        <form action="" method="POST">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID_Producto'],COD,KEY);?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nom_producto'],COD,KEY);?>">
                            <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['PrecioMayor'],COD,KEY);?>">
                            <input type="hidden" name="unidades" id="unidades" value="<?php echo openssl_encrypt($producto['unidades'],COD,KEY);?>">
                            <input type="number" class="form-control" min="1" name="cantidad" id="cantidad" value="1">

                            <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al Carrito</button>
                        </form>
                    </div>
                    </div>
                </div>
            <?php } ?>    
        </div>
    </div>
        <script>
        $(function (){
            $('[data-toggle="popover"]').popover();
        });
        </script>


<?php include('../../templates/piecompra.php');?>