<?php
$usuario = $_POST['usuario'];
$password = $_POST['password'];

session_start();
$_SESSION['usuario']=$usuario;

setcookie($usuario);
include("../config/bd.php");
$sql=$conexion->query("SELECT * FROM empleado WHERE NombreUsuario = '$usuario' and ClaveUsuario = '$password'");
if ($datos=$sql->fetch_object()) {
    $_SESSION["id"]=$datos->ID_Empleado;
    $_SESSION["nombre"]=$datos->nom_empleado;
    $_SESSION["apellido"]=$datos->apell_empleado;
    $_SESSION["puesto"]=$datos->CARGO_ID_Cargo;
    $_SESSION["foto"]= $datos->foto;
       
    if(isset($_SESSION['puesto'])){
        switch($_SESSION['puesto']){
            case 1;
            header('location:../Administrador/HomeAdmi.php');
            break;
            case 2;
            header('location:../Home.php');
            break;

            default;
        }
    }
    //header('location:../home.php');
}else{   
    echo "Error";
 }
 ?>