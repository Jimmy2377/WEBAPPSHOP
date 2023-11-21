<?php
include('../../config/bd.php');

$nom=$_POST['nombre'];
$ni=$_POST['nit'];
$tel=$_POST['telefono'];
$corr=$_POST['correo'];
$dire=$_POST['direccion'];


$query = "INSERT INTO proovedor (nom_proovedor, NIT, telefono, correo, direccion)
                             VALUES ('$nom','$ni','$tel','$corr','$dire')";
$resultado = $conexion->query($query);

if($resultado){
    header('location:../Provedores.php');
}else{
}
?>