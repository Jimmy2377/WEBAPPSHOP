<?php
include('../../config/bd.php');

$ids=$_REQUEST['id'];

$query = "DELETE FROM proovedor WHERE ID_Proovedor='$ids'";
$resultado = $conexion->query($query);

if($resultado){
    header("location:../Provedores.php");
}else{
    echo "error";
}
?>