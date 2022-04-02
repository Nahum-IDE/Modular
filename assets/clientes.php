<?php 
    include "config/conexion.php";
    include "config/validar.php";

    $obj= new conectar();
    $conexion=$obj->conexion();

    $sql="SELECT idcliente, 
                    Nombre o razon social, 
                    RFC, 
                    Regimen, 
                    Direccion, 
                    E-mail 
        from cliente";
    $result=mysqli_query($conexion,$sql);
?>


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
            <div class="page-content"> 
            <?php include_once "includes/header.php"; ?>
                <div class="content">
                <div class="">
                        <h4 class="page-title">Clientes | Listado</h4>
                    </div>
                    <div class="table-container">
                        <table class"table table-hover table-condensed" id="iddatatable">
                            <thead style=background-color: #dc3545;clor:>
                            
                                <tr>
                                   
                                </tr>
                            </thead>
                           
                        </table>
                    </div>
                </div>  
            </div>
        </section>
    </main>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scripts/custom.js"></script>
</body>

</html>