<?php
// conecta a la base de datos
include "config/conexion.php";

if (isset($_GET['term'])) {
 $find_nombre = find_nombre($conn, $_GET['term']);
 $id_List = array();
 foreach($find_nombre as $Rsocial){
 $id_List[] = $Rsocial['Rsocial'];
 }
 echo json_encode($id_List);
}
 
function find_nombre($conexion , $term){ 
 $query = "SELECT * FROM clientes WHERE Rsocial LIKE '%".$term."%'";
 $result = mysqli_query($conexion, $query); 
 $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
 return $data; 
}
 
?>