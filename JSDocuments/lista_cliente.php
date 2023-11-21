<?php
// conecta a la base de datos
include("../config/bd.php"); 

if (isset($_GET['term'])) {
 $find_nombre = find_nombre($conexion, $_GET['term']);
 $id_List = array();
 foreach($find_nombre as $nombre){
 $id_List[] = $nombre['ID_Cliente'];
 }
 echo json_encode($id_List);
}
 
function find_nombre($conexion , $term){ 
 $query = "SELECT * FROM cliente WHERE ID_Cliente LIKE '%".$term."%'";
 $result = mysqli_query($conexion, $query); 
 $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
 return $data; 
}
 
?>