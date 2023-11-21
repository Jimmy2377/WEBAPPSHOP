<?php
include '../config/bd.php';
include 'carritoventa.php';
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   
    <?php
    if($_POST){

        $total=0;
        $totalmay=0;
        
        $Codven=$_POST['codven'];
        $Carnetcli=$_POST['carnetcli'];
        $Nombrecli=$_POST['nombrecli'];
        //$SID=session_id();devuelve una clave de la session carrito
       

        foreach($_SESSION['CARRITO'] as $indice=>$producto){
            $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
            $totalmay=$totalmay+($producto['PRECIOMAY']*$producto['CANTIDAD']);
            $ganancia=($total-$totalmay);
        }
        
        //-------------------tabla cliente-----------//
    
        $verfcliente=$conexion->query("SELECT * FROM cliente WHERE ID_Cliente = '$Carnetcli'");
        if($verfcliente->fetch_object()){

        }else{
            $consultacli=$pdo->prepare("INSERT INTO `cliente` (`ID_Cliente`, `nombre`) VALUES (:CIclil, :NomCli);");
        
            $consultacli->bindParam(":CIclil",$Carnetcli);
            $consultacli->bindParam(":NomCli",$Nombrecli);
            $consultacli->execute();  
        }
        
        
        
        //-------------Tabla ventas--------------//
        $sentencia=$pdo->prepare("INSERT INTO `venta` (`ID_Venta`, `fecha`, `precio_total`, `ganacia`, `ID_Empleado`, `ID_Cliente`) 
        VALUES (NULL, NOW(), :Total, :Ganancia, :CODven, :CIclil);");
        

        $sentencia->bindParam(":Total",$total);
        $sentencia->bindParam(":CODven",$Codven);
        $sentencia->bindParam(":CIclil",$Carnetcli);
        $sentencia->bindParam(":Ganancia",$ganancia);
        
        $sentencia->execute();
        $idVenta=$pdo->lastInsertId();//devuelve el ultimo id insertado en la BD

        foreach($_SESSION['CARRITO'] as $indice=>$producto){
            $totalunidades=0;
            $totalunidades=$producto['CANTIDAD'];
        
        
        $sentencia=$pdo->prepare("INSERT INTO `detalle_venta` (`ID_Venta`, `ID_Producto`, `cantidad`) 
        VALUES (:IDVENTA, :IDPRODUCTO, :Totalunidades);");//los productos que inserto en la tabla ventas
        
        $sentenciaup=$pdo->prepare("UPDATE `producto` SET `Stock` = `Stock`-$totalunidades WHERE `ID_Producto` = :IDPRODUCTO;");
            

            $sentencia->bindParam(":IDVENTA",$idVenta);
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
            <a class="btn btn-primary btn-lg" href="../Home.php">OK</a>
    </div>

