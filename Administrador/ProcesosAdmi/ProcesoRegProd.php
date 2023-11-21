<?php
include('../../config/bd.php');
$foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
$nom=$_POST['nombre'];
$preunit=$_POST['preciounit'];
$cat=$_POST['categoria'];
$descrip=$_POST['campotext'];
$prov=$_POST['provedor'];
$lote=$_POST['Tamlote'];
$premay=$_POST['preciomay'];
$stock= '0';


$query = "INSERT INTO producto (nom_producto, foto, precioUnitario, ID_Categoria, detalle, ID_Proovedor, ID_volumen, PrecioMayor,Stock)
                             VALUES ('$nom','$foto','$preunit','$cat','$descrip','$prov','$lote','$premay',$stock)";
$resultado = $conexion->query($query);

if($resultado){
    header('location:../ListaProductos.php');
}else{
    echo "error";
}
?>