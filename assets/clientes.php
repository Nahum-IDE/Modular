<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnover | Dashboard</title>
    <link rel="stylesheet" href="style/custom.min.css">
    <link rel="stylesheet" href="librerias/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="librerias/datatable/dataTables.bootstrap4.min.css">
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
			            <h1 class="h3 mb-0 text-gray-800">Clientes | Listado</h1>
			            <a class="btn btn-primary">Nuevo</a>
		            </div>
                    <div class="table-container">
                        <table class="table table-striped table-bordered" id="table">
                            <thead class="thead-dark">
                                <tr>
                                    <td>ID</td>
                                    <td>Razon Social</td>
                                    <td>RFC</td>
                                    <td>Regimen</td>
                                    <td>Direccion</td>
                                    <td>E-mail</td>
                                </tr>
                            </thead>
                            <tfoot style="background-color: #ccc;color: white; font-weigth: bold;">
                                <tr>
                                    <td>ID</td>
                                    <td>Razon Social</td>
                                    <td>RFC</td>
                                    <td>Regimen</td>
                                    <td>Direccion</td>
                                    <td>E-mail</td>
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
                                                <td><?php echo $data['Nombre o razon social']; ?></td>
                                                <td><?php echo $data['RFC']; ?></td>
                                                <td><?php echo $data['Regimen']; ?></td>
                                                <td><?php echo $data['Direccion']; ?></td>
                                                <td><?php echo $data['E-mail']; ?></td>
                                                <?php } ?>
                                            </tr>
                                    <?php }
                                ?>
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
        </section>
<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Turnover <?php echo date("Y"); ?></span>
    </div>
  </div>
</footer>
<!-- fin de  Footer -->
    </main>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="librerias/datatable/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="librerias/datatable/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>
</body>
</html>

<!--  Estructura de la tablas -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      language: {
        "decimal": "",
        "emptyTable": "No hay datos",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
        "infoEmpty": "Mostrando 0 a 0 de 0 registros",
        "infoFiltered": "(Filtro de _MAX_ total registros)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ registros",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "No se encontraron coincidencias",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        },
        "aria": {
          "sortAscending": ": Activar orden de columna ascendente",
          "sortDescending": ": Activar orden de columna desendente"
        }
      }
    });
  });
</script>