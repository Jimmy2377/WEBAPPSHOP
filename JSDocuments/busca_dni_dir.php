<?php

// consigue el nombre desde el formulario
$search_cliente = $_REQUEST['carnetcli'];

// Coneccion a la base de datos

include("../config/bd.php"); 

if ($search_cliente !== "") {
	
	// Se busca el dni y la direccion correspondiente al nombre
	$query = mysqli_query($conexion, "SELECT * FROM cliente WHERE ID_Cliente='$search_cliente'");

	$row = mysqli_fetch_array($query);

	// consigue el dni
	$nom = $row["nombre"];

}

// lo almacena un un arreglo
$result = array("$nom");

// lo envia al formulario
$myJSON = json_encode($result);
echo $myJSON;
?>