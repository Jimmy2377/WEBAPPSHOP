<?php
include('../../config/bd.php');

$nomrecate=$_POST['nombrecate'];

$query = "INSERT INTO categoria (nom_categoria)
                             VALUES ('$nomrecate')";
$resultado = $conexion->query($query);

if($resultado){
    header('location:../RegistroProducto.php');
}else{
}
?>