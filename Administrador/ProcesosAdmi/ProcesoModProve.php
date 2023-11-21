<?php
include('../../config/bd.php');

$id=$_REQUEST['idd'];
$nom=$_POST['nombre'];
$nit=$_POST['nit'];
$tel=$_POST['telefono'];
$emal=$_POST['correo'];
$direcc=$_POST['direccion'];

$query = "UPDATE proovedor SET nom_proovedor='$nom', NIT='$nit', telefono='$tel', correo='$emal', direccion='$direcc' WHERE ID_Proovedor='$id'";
$resultado = $conexion->query($query);

if($resultado){
    header("location:../Provedores.php");
}else{
}
?>