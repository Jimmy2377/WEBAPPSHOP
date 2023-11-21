<?php
include('../../config/bd.php');

$id=$_REQUEST['id'];
$nom=$_POST['nombre'];
$apell=$_POST['apellido'];
$fechanac=$_POST['FN'];
$ci=$_POST['CI'];
$celu=$_POST['celu'];
$direc=$_POST['direc'];
$email=$_POST['correo'];
$foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
$cargo=$_POST['cargo'];
$usuari=$_POST['user'];
$contra=$_POST['pass'];

$query = "UPDATE empleado SET nom_empleado='$nom', apell_empleado='$apell', fn_empleado='$fechanac', CI='$ci', celular='$celu', direccion='$direc', correo='$email', foto='$foto', CARGO_ID_Cargo='$cargo', NombreUsuario='$usuari', ClaveUsuario='$contra' WHERE ID_Empleado='$id'";
$resultado = $conexion->query($query);

if($resultado){
    header("location:../listaempleados.php");
}else{
}
?>