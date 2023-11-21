<?php
include('../../config/bd.php');

$ids=$_REQUEST['id'];

$query = "DELETE FROM producto WHERE ID_Producto='$ids'";
$resultado = $conexion->query($query);

if($resultado){
    header("location:../ListaProductos.php");
}else{
    echo "<script>Error</script>";
}
?>