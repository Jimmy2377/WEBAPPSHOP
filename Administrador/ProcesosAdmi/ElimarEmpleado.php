<?php
include('../../config/bd.php');

$ids=$_REQUEST['id'];

$query = "DELETE FROM empleado WHERE ID_Empleado='$ids'";
$resultado = $conexion->query($query);

if($resultado){
    header("location:../ListaEmpleados.php");
}else{
    echo "error";
}
?>