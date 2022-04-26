<?php 
include "assets/config/conexion.php";
include "assets/config/validar.php";
//metodo para registrar usuario en db
  if (!empty($_POST)) {
    if (empty($_POST['Rsocial']) || empty($_POST['RFC']) || empty($_POST['Regimen'] || 
        empty($_POST['Direccion']) ||  || empty($_POST['Correo']) || )){
    } else {
        $Rsocial = $_POST['Rsocial'];
        $RFC = $_POST['RFC'];
        $Regimen = $_POST['Regimen'];
        $Direccion = $_POST['Direccion'];
        $Correo = $_POST['Correo'];
       
        $query_insert = mysqli_query($conexion, "INSERT INTO cliente(Rsocial,RFC,Regimen,Direccion,Correo) 
        values ('$Rsocial', '$RFC', '$Regimen', '$Direccion', '$Correo')");
    }
    mysqli_close($conexion);
}
?>