<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnover | Dashboard</title>
    <link rel="stylesheet" href="style/custom.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,400&display=swap"
        rel="stylesheet">

    <!-- https://material.io/resources/icons/?style=twotone -->
<link href="https://fonts.googleapis.com/css2?family=Material+Icons+Two+Tone"
      rel="stylesheet">
</head>
<body>
    <main>
        <section class="main-container">
            <?php include_once "includes/menu.php"; ?>           
            <?php include_once "includes/header.php"; ?>
                <div class="content">
                <div class="">
                        <h4 class="page-title">Productos o servicios | Listado</h4>
                    </div>

                    <table class="table table-striped table-bordered" id="table">
                            <thead class="thead-dark">
                                <tr>
                                    <td>ID </td>
                                    <td>Razon Social</td>
                                    <td>RFC</td>
                                    <td>Regimen</td>
                                    <td>Direccion</td>
                                    <td>Correo</td>
                                    <td>Editar</td>
                                    <td>Eliminar</td>
                                </tr>
                            </thead>
                            <tfoot style="background-color: #ccc;color: white; font-weigth: bold;">
                                <tr>
                                    <td>ID </td>
                                    <td>Razon Social</td>
                                    <td>RFC</td>
                                    <td>Regimen</td>
                                    <td>Direccion</td>
                                    <td>Correo</td>
                                    <td>Editar</td>
                                    <td>Eliminar</td>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                    include "config/conexion.php";
                                    $query = mysqli_query($conexion, "SELECT * FROM clientes");
						                        $result = mysqli_num_rows($query);

                                    if ($result > 0) {
                                        while ($data = mysqli_fetch_assoc($query)) { ?>
                                            <tr>
                                                <td><?php echo $data['id_cliente']; ?></td>
                                                <td><?php echo $data['Rsocial']; ?></td>
                                                <td><?php echo $data['RFC']; ?></td>
                                                <td><?php echo $data['Regimen']; ?></td>
                                                <td><?php echo $data['Direccion']; ?></td>
                                                <td><?php echo $data['Correo']; ?></td>
                                                <td>
                                                    <span class="btn btn-warning btn-xs">
                                                        <span class='fas fa-user-edit'></span>
                                                    </span>  
                                                </td>
                                                <td>
                                                    <span class="btn btn-danger btn-xs">
                                                        <span class='fas fa-trash-alt'></span>
                                                    </span> 
                                                </td>
                                                <?php } ?>
                                            </tr>
                                    <?php }
                                ?>
                            </tbody>
                        </table>
                </div>  
            </div>
        </section>
        <?php include_once "includes/footer.php"; ?>