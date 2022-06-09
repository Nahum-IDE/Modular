<?php 
require 'config/conexion.php';
require 'config/validar.php';
//metodo para registrar usuario en db

    $alert = "";
  

    $Rsocial = $_POST['Rsocial'];
    $RFC = $_POST['RFC'];
    $Regimen = $_POST['Regimen'];
    $Direccion = $_POST['Direccion'];
    $Correo = $_POST['Correo'];

    $result = 0;

    $insert = "INSERT INTO cliente(Rsocial, RFC, Regimen, Direccion, Correo) VALUES ('$Rsocial','$RFC','$Regimen', '$Direccion', '$Correo')";

    $query = mysqli_query($conexion, $insert);

    if ($query) {
        echo "<script> alert('Correcto'); </script>"
    }else{
        echo "<script> alert('incorrecto'); </script>"    
    }
    mysqli_close($conexion);

?>