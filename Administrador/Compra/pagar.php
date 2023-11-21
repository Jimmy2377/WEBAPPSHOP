
<?php 
include '../../config/bd.php';
include 'carrito.php';
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   
    <?php
    if($_POST){

        $total=0;
        
        //$SID=session_id();devuelve una clave de la session carrito
       

        foreach($_SESSION['CARRITO'] as $indice=>$producto){
            $total=$total+($producto['PRECIO']*$producto['CANTIDAD']*$producto['UNIDADES']);
        }
        //INSERT INTO `compra` (`ID_Compra`, `fecha`, `precio_total`, `ID_Empleado`) VALUES (NULL, '2022-11-27', NULL, '20');
        //INSERT INTO `venta` (`ID`, `clavetransaccion`, `paypaldatos`, `fecha`, `correo`, `toal`, `status`)
        //VALUES (NULL, :ClaveTransaccion, '', NOW(), :Correo, :Total, 'pendiente');
        $sentencia=$pdo->prepare("INSERT INTO `compra` (`fecha`, `precio_total`) 
        VALUES ( NOW(), :Total);");
        //echo "<h3>".$total."</h3>";

        $sentencia->bindParam(":Total",$total);
        
        $sentencia->execute();
        
        $idCompra=$pdo->lastInsertId();//devuelve el ultimo id insertado en la BD

        foreach($_SESSION['CARRITO'] as $indice=>$producto){
            $totalunidades=0;
            $totalunidades=$totalunidades+($producto['CANTIDAD']*$producto['UNIDADES']);
        //INSERT INTO `detalle_compra` (`ID_Compra`, `ID_Producto`, `cantidad`) VALUES ('1', '1', '100');
        //INSERT INTO `detalleventa` (`ID`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNIT`, `CANTIDAD`, `DECGARGADO`)
        //VALUES (NULL, :IDVENTA, :IDPRODUCTO, :PRECIOUNIT, :CANTIDAD, '0');
        $sentencia=$pdo->prepare("INSERT INTO `detalle_compra` (`ID_Compra`, `ID_Producto`, `cantidad`) 
        VALUES (:IDCOMPRA, :IDPRODUCTO, :Totalunidades);");//los productos que inserto en la tabla ventas
        
        $sentenciaup=$pdo->prepare("UPDATE `producto` SET `Stock` = `Stock`+$totalunidades WHERE `ID_Producto` = :IDPRODUCTO;");
            

            $sentencia->bindParam(":IDCOMPRA",$idCompra);
            $sentencia->bindParam(":IDPRODUCTO",$producto['ID']);
            $sentenciaup->bindParam(":IDPRODUCTO",$producto['ID']);
            $sentencia->bindParam(":Totalunidades",$totalunidades);
            $sentencia->execute();
            $sentenciaup->execute();

            //UPDATE `producto` SET `Stock` = `Stock`+10 WHERE `producto`.`ID_Producto` = 1 AND `producto`.`ID_Categoria` = 2 AND `producto`.`ID_Proovedor` = 1 AND `producto`.`ID_volumen` = 2;
        }
        //session_destroy();
        $_SESSION['CARRITO'] = null;
    }
    ?>
    
    <div class="jumbotron text-center">
        <h1 class="display-4">¡Compra Procesada!</h1>
        <hr class="my-4">
        <p class="lead">Monto total de la compra:
            <h4>Bs.<?php echo number_format($total,2);?></h4>
        </p>
            <a class="btn btn-primary btn-lg" href="../HomeAdmi.php">OK</a>
    </div>

