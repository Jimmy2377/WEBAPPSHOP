<?php
include('../../config/bd.php');

$nom=$_POST['nombre'];
$apell=$_POST['apellido'];
$fechanac=$_POST['FN'];
$ci=$_POST['CI'];
$celu=$_POST['celu'];
$direc=$_POST['direc'];
$email=$_POST['correo'];
$sexo=$_POST['sexo'];
$foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
$cargo=$_POST['cargo'];
$usuari=$_POST['user'];
$contra=$_POST['pass'];


$query = "INSERT INTO empleado (nom_empleado, apell_empleado, fn_empleado, CI, celular, direccion, correo, sexo, foto, CARGO_ID_Cargo, NombreUsuario, ClaveUsuario)
                             VALUES ('$nom','$apell','$fechanac','$ci','$celu','$direc','$email','$sexo','$foto','$cargo','$usuari','$contra')";
$resultado = $conexion->query($query);

if($resultado){
    header('location:../ListaEmpleados.php');
}else{
}
?>