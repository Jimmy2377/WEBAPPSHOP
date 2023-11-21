<?php
include('../../config/bd.php');

$id=$_REQUEST['idp'];
$foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
$nom=$_POST['nombre'];
$preunit=$_POST['preciounit'];
$cat=$_POST['categoria'];
$descrip=$_POST['detalle'];
$prov=$_POST['provedor'];
$lote=$_POST['Tamlote'];
$premay=$_POST['preciomay'];


$query = "UPDATE producto SET nom_producto='$nom', foto='$foto', PrecioUnitario='$preunit', ID_Categoria='$cat', detalle='$descrip', ID_Proovedor='$prov', ID_volumen='$lote', PrecioMayor='$premay' WHERE ID_Producto='$id'";
$resultado = $conexion->query($query);

if($resultado){
    header("location:../ListaProductos.php");
}else{
}
?>