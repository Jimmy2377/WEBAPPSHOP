<?php include('../templates/cabeceraven.php');
include '../config/bd.php';
include 'carritoventa.php';
?>
<div class="container">
        <br>

        <?php if($mensaje!=""){?>
        <div class="alert alert-success">
            <?php echo $mensaje; ?>
            <a href="MostrarCarritoVenta.php" class="badge bg-success">Ver Carrito</a>
        </div>
        <?php }?>
        <div class="row">
            <?php
            $sentencia=$pdo->prepare("SELECT * FROM producto
            INNER JOIN categoria ON producto.ID_Categoria = categoria.ID_Categoria
            INNER JOIN proovedor ON producto.ID_Proovedor = proovedor.ID_Proovedor
            INNER JOIN volumen ON producto.ID_volumen = volumen.ID_volumen WHERE Stock>=1 ORDER BY nom_producto ASC");
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
                        height=120px>
                        
                    <div class="card-body">
                        <span><?php echo $producto['nom_producto'];?></span>
                        <h5 class="card-title">Bs<?php echo $producto['precioUnitario'];?></h5>
                        <h5 class="card-title">Stock: <?php echo $producto['Stock'];?></h5>
                        <?php $limite=$producto['Stock']?>
                        <form action="" method="POST">
                            <input type="hidden" name="idpro" id="idpro" value="<?php echo openssl_encrypt($producto['ID_Producto'],COD,KEY);?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nom_producto'],COD,KEY);?>">
                            <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precioUnitario'],COD,KEY);?>">
                            <input type="hidden" name="preciomay" id="preciomay" value="<?php echo openssl_encrypt($producto['PrecioMayor'],COD,KEY);?>">
                            <input type="hidden" name="idvendedor" id="idvendedor" value="<?php echo openssl_encrypt($_SESSION['id'],COD,KEY);?>">
                            <input type="number" class="form-control" min="1" max="<?php echo $producto['Stock']?>" name="cantidad" id="cantidad" value="1">

                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al Carrito</button>
                            </div>
                            
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


<?php include('../templates/piecompra.php');?>