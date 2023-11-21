<?php
include('../../config/bd.php');

$nombrevol=$_POST['nombrevol'];
$numvol=$_POST['numvol'];

$query = "INSERT INTO volumen (NombreVolumen, unidades)
                             VALUES ('$nombrevol','$numvol')";
$resultado = $conexion->query($query);

if($resultado){
    header('location:../RegistroProducto.php');
}else{
}
?>