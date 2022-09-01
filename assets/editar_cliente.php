<?php 
include "config/conexion.php";
include "config/validar.php";

// Mostrar Datos
if (empty($_REQUEST['id'])) {
    header("Location: clientes.php");
  }
  $idcliente = $_REQUEST['id'];
  $sql = mysqli_query($conexion, "SELECT * FROM clientes WHERE id_cliente = $idcliente");
  $result_sql = mysqli_num_rows($sql);
  if ($result_sql == 0) {
    header("Location: clientes.php");
  } else {
    while ($data = mysqli_fetch_array($sql)) {
      $idcliente = $data['id_cliente'];
      $Rsocial = $data['Rsocial'];
      $RFC = $data['RFC'];
      $Regimen = $data['Regimen'];
      $Direccion = $data['Direccion'];
      $Correo = $data['Correo'];
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnover | Dashboard</title>
    <link rel="stylesheet" href="style/custom.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Two+Tone" rel="stylesheet">
</head>
<body>
    <main>
        <section class="main-container">
            <?php include_once "includes/menu.php"; ?>           
            <?php include_once "includes/header.php"; ?> 
            <div class=" content">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
			        <h1 class="h3 mb-0 text-gray-800">Editar Clientes</h1>
		        </div>
               <!-- <div class="container-fluid "> revisar si se puede quitar-->
                <!--table-container-->
                <div class="row"> 
                    <div class="col-lg-6 m-auto">
                        <form class="needs-validation" novalidate>
                            <div class="form-row">
                                <!--formulario razon social -->
                                <div class="col-md-8 mb-3">
                                    <label for="validationCustomRS">Razon social</label>
                                    <input type="text" class="form-control" placeholder="Rason social" id="Rsocial" value="<?php echo $Rsocial; ?>" required>
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
                                        <input type="text" class="form-control" placeholder="RFC" id="RFC" value="<?php echo $RFC; ?>" required>
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
                                    id="Direccion" value="<?php echo $Direccion; ?>" required>
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
                                    id="Correo" value="<?php echo $Correo; ?>" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please choose a RFC.
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Editar Cliente</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

<?php include_once "includes/footer.php"; ?>


<script>
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