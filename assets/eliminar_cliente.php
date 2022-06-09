<?php
if (!empty($_GET['id'])) {
    $alert = "";
    require("config/conexion.php");
    $id = $_GET['id'];

    $query_delete = mysqli_query($conexion, "DELETE FROM cliente WHERE idcliente = $id");

    if ($query_delete) {
        $alert = "alertify.notify('Cliente borrado', 'success', 5)";
    } else {
        $alert = "<script> alertify.error('Error al borrar'); </script>";
    }

    mysqli_close($conexion);
    header("location: clientes.php");
}
?>