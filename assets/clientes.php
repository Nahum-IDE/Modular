<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnover | Dashboard</title>
    <link rel="stylesheet" href="style/custom.min.css">
<!--    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">   -->
<!--    <link rel="stylesheet" href="librerias/bootstrap/bootstrap.css">                                            -->
<!--     <link rel="stylesheet" href="librerias/datatable/dataTables.bootstrap4.min.css">                           -->
<!--    <link rel="preconnect" href="https://fonts.googleapis.com">                                                 -->
<!--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>                                        -->
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,400&display=swap"
        rel="stylesheet">

    <!-- https://material.io/resources/icons/?style=twotone -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Two+Tone" rel="stylesheet">
</head>
<body>
    <main>
        <section class="main-container">
            <?php include_once "includes/menu.php"; ?>           
                 <?php include_once "includes/header.php"; ?> 
                <div class="content">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
			            <h1 class="h3 mb-0 text-gray-800">Clientes | Listado</h1>
			            <span  href="agregar_cliente.php" class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevocliente">
                            Nuevo <span class='fas fa-plus-circle'></span>
                        </span >
                       
		            </div>
                  <!--  <div class="table-container"> --> 
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
                                    $query = mysqli_query($conexion, "SELECT * FROM cliente");
						                        $result = mysqli_num_rows($query);

                                    if ($result > 0) {
                                        while ($data = mysqli_fetch_assoc($query)) { ?>
                                            <tr>
                                                <td><?php echo $data['idcliente']; ?></td>
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
                   <!-- </div> --> 
                </div>
            </div>
        </section>

        
<!-- Modal -->
<div class="modal fade" id="agregarnuevocliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Cliente Nuevo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para agregar cliente-->
                <form id="frmcliente">
                    <div class="cs-field field">  
                        <label for="usuario" class="bold">Nombre o Razon Social</label>
                        <input type="text" placeholder="" name="Rsocial" required="">
                    </div>
                    <div class="cs-field field">  
                        <label for="usuario" class="bold">RFC</label>
                        <input type="text" placeholder="" name="RFC" required="">
                    </div>
                    <div class="cs-field field">
                        <label for="regimen" class="bold">Regimen</label>
                        <input type="text" placeholder="" name="Regimen" required="">
                    </div>
                    <div class="cs-field field">
                        <label for="contraseña" class="bold">Direccion</label>
                        <input type="text" placeholder="" name="Direccion" required="">
                    </div>
                    <div class="cs-field field">
                        <label for="contraseña" class="bold">Correo Electronico</label>
                        <input type="mail" placeholder="" name="Correo" required="">
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" id="btncerrar" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="btnagregar" class="btn btn-primary">Guardar</button>
                </div>
            </div>
           
        </div>
    </div>
</div>
<?php include_once "includes/footer.php"; ?>

<!--  Estructura de la tablas -->
<script type="text/javascript"> 
  $(document).ready(function() {
    $('#btnagregar').onclick(function(){ //funcion del boton agregar
      datos=$('#frmcliente').serialize(); //traer todos los datos del formulario    
      console.log(datos);
      $.ajax({
        type:"POST",
        data:datos,
        url:"agregar_cliente.php",
        success:function(r){
          if(r==1){
            $('#frmcliente')[0].reset(); //borrar datos del frm una vez agregados
              alertify.success("Agregado con exito!!!");
            }else{
              alertify.error("Fallo al agregar");
            }
          }
        });
    });
  });
</script>