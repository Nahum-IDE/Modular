

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
<!--    <link rel="stylesheet" href="librerias/datatable/dataTables.bootstrap4.min.css">                           -->
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
			            <a  href="agregar_cliente.php" class="btn btn-primary" >
                            Nuevo <span class='fas fa-plus-circle'></span>
                        </a >
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
                                                    <!-- boton editar -->
                                                    <a href="editar_cliente.php?id=<?php echo $data['id_cliente']; ?>" class="btn btn-warning btn-xs"> 
                                                        <span class='fas fa-user-edit'></span>
                                                    </a> 
                                                </td>
                                                <td>   
                                                    <!-- boton borrar -->
                                                    <form action="eliminar_cliente.php?id=<?php echo $data['id_cliente']; ?>" method="post" class="confirmar d-inline">
                                                    <button class="btn btn-danger" type="submit"><i class='fas fa-trash-alt'> </i></button>
                                                    </form> 
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
   
   
        
<!--modal new client -->
<div class="modal fade" id="agregarnuevocliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para agregar cliente-->
                <form method="post" class="needs-validation" novalidate>
                            <?php echo isset($alert) ? $alert : ''; ?>
                            <div class="form-row">
                                <!--formulario razon social -->
                                <div class="col-md-8 mb-3">
                                    <label for="validationCustomRS">Razon social</label>
                                    <input type="text" class="form-control" placeholder="Rason social" id="Rsocial" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                            Please choose a Razon social.
                                    </div>
                                </div>
                                <!--formulario RFC -->
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustomRFC">RFC</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="RFC" id="RFC"required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please choose a RFC.
                                        </div>
                                    </div>
                                </div>
                            </div>                 
                            <div class="form-row">
                                <!--formulario REGIMEN -->
                                <div class="col-md-8 mb-3"> 
                                    <label>Regimen fiscal</label>
                                    <select class="form-select" id="Regimen" value="<?php echo $Regimen; ?>" required>
                                        <option selected disabled value="">Elegir...</option>
                                        <option value="1">Régimen Simplificado de Confianza</option>
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please choose a RFC.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <!--formulario DOMICILIO -->
                                <div class="col-md-12 mb-3">
                                    <label>Domicilio</label>
                                    <input type="text" class="form-control" placeholder="Calle, numero, ciudad, estado y codigo postal" 
                                    id="Direccion" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please choose a RFC.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <!--formulario CORREO -->
                                <div class="col-md-8 mb-3">
                                    <label >Correo electronico</label>
                                    <input type="email" class="form-control" id="validationCustom05" placeholder="Correo electronico" 
                                    id="Correo" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please choose a RFC.
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="btnagregar" class="btn btn-primary"><i class="fas fa-user-edit"></i>Guardar</button>
                            <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </form>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once "includes/footer.php"; ?>


<script>
//filtros de la tabla
$(document).ready(function () {
      $('#table').DataTable();
  });  
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>