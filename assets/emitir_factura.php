<?php 
include "config/conexion.php";
include "config/validar.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnover | Dashboard</title>
    <link rel="stylesheet" href="style/custom.min.css">
<!--    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet"> -->
<!--    <link rel="preconnect" href="https://fonts.googleapis.com"> -->
<!--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,400&display=swap"
        rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Material+Icons+Two+Tone"
      rel="stylesheet">
</head>
<body>
    <main>
        <section class="main-container">
            <?php include_once "includes/menu.php"; ?>           
            <?php include_once "includes/header.php"; ?>
            <div class="content">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Emitir factura</h1>
	            </div>
                <div class="row"> 
                    <div class="col">
                        <form  action="generar_pdf.php" method="post" class="needs-validation" novalidate>
                        <fieldset class="border p-2">
                            <legend  class="float-none w-auto p-2">Cliente</legend>
                            <div class="form-row">
                                <!-- campo rfc  -->
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustomRFC">RFC</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="RFC" name="RFC" value="" required>
                                    </div>
                                </div>
                                <!-- campo razon social -->
                                <div class="col-md-9 mb-3">
                                    <label for="validationCustomRS">Nombre o Razon social</label>
                                    <input type="text" class="form-control" placeholder="Razon social" name="Rsocial" id="Rsocial" 
                                    ondblclick="doble_click(this.value)" value="" required>  <!-- carga el valor al hacer doble click -->
                                </div>
                                <!-- campo regimen 
                                <div class="col-md-3 mb-3">
                                    <li id="li_3" >
                                    <label>Regimen fiscal</label>
                                    <input type="text" class="form-control" placeholder="Regimen" name="Regimen" value=""  required>
                                    </li>
                                </div>-->
                                <div class="col-md-12 mb-3">
                                    <label>Uso CFDI</label>
                                    <select class="form-select" id="Uso" name="Uso"  required>
                                        <option selected disabled value="">Elegir...</option>
                                        <option value="1">Adquisición de mercancías</option>
                                        <option value="2">Devoluciones, descuentos o bonificaciones</option>
                                        <option value="3">Gastos en general</option>
                                        <option value="4">Construcciones</option>
                                        <option value="5">Mobiliario y equipo de oficina por inversiones</option>
                                        <option value="6">Equipo de transporte</option>
                                        <option value="7">Equipo de cómputo y accesorios</option>
                                        <option value="8">Dados, troqueles, moldes, matrices y herramental</option>
                                        <option value="9">Comunicaciones telefónicas</option>
                                        <option value="10">Comunicaciones satelitales</option>
                                        <option value="11">Otra maquinaria y equipo</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>   
                        <fieldset class="border p-2">
                            <legend  class="float-none w-auto p-2">Comprobante</legend>
                            <div class="form-row">
                                <!-- Fecha y hora de expedicion  -->
                                <div class="col-md-4 mb-3">
                                    <label>Fecha y hora de expedicion</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <!-- Codigo postal -->
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustomRS">Codigo postal</label>
                                    <input type="text" class="form-control">
                                </div>
                                <!-- Moneda -->
                                <div class="col-md-4 mb-3">
                                    <label>Moneda</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <!-- Forma de pago -->
                                <div class="col-md-5 mb-3">
                                    <label>forma de pago</label>
                                    <select class="form-select" required>
                                        <option selected disabled value="">Elegir...</option>
                                        <option value="1">01 Efectivo</option>
                                        <option value="2">02 Cheque nominativo</option>
                                        <option value="3">03 Transferencia electrónica de fondos</option>
                                        <option value="4">04 Tarjeta de crédito</option>
                                        <option value="5">05 Monedero electrónico</option>
                                        <option value="6">06 Dinero electrónico</option>
                                        <option value="7">08 Vales de despensa</option>
                                        <option value="8">12 Dación en pago</option>
                                        <option value="9">13 Pago por subrogación</option>
                                        <option value="">14 Pago por consignación</option>
                                        <option value="">15 Condonación</option>
                                        <option value="">17 Compensación</option>
                                        <option value="">23 Novación</option>
                                        <option value="">24 Confusión</option>
                                        <option value="">25 Remisión de deuda</option>
                                        <option value="">26 Prescripción o caducidad</option>
                                        <option value="">27 A satisfacción del acreedor</option>
                                        <option value="">28 Tarjeta de débito</option>
                                        <option value="">29 Tarjeta de servicios</option>
                                        <option value="">30 Aplicación de anticipos</option>
                                        <option value="">31 Intermediario pagos</option>
                                        <option value="">99 Por definir</option>
                                    </select>
                                </div>
                                <!-- Método de pago: -->
                                <div class="col-md-5 mb-3">
                                    <label>Método de pago</label>
                                    <select class="form-select" required>
                                        <option selected disabled value="">Elegir...</option>
                                        <option value="1">PPD Pago en parcialidades o diferido</option>
                                        <option value="2">PUE Pago en una sola exhibicion</option>
                                    </select>
                                </div>
                                <!-- Tipo de cambio -->
                                <div class="col-md-2 mb-3">
                                    <label>Tipo de cambio</label>
                                    <input type="text" class="form-control" required>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="border p-2">
                            <legend  class="float-none w-auto p-2">Conceptos</legend>
                            <div class="form-row">
                                <!-- Clave de producto o servicio  -->
                                <div class="col-md-4 mb-3">
                                    <label>Clave de producto o servicio</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <!-- Clave de unidad -->
                                <div class="col-md-4 mb-3">
                                    <label>Clave de unidad</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <!-- Cantidad -->
                                <div class="col-md-4 mb-3">
                                    <label>Cantidad</label>
                                    <input type="number" class="form-control" required>
                                </div>
                                <!-- Unidad -->
                                <div class="col-md-4 mb-3">
                                    <label>Unidad</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <!-- Descripción -->
                                <div class="col-md-4 mb-3">
                                    <label>Descripción</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <!-- Valor unitario -->
                                <div class="col-md-4 mb-3">
                                    <label>Valor unitario</label>
                                    <input type="text" class="form-control" required>
                                </div>
                            </div>
                        </fieldset>                     
                        <button type="submit" id="btnagregar" class="btn btn-primary"><i class="fas fa-user-edit"></i>Guardar</button>
                        </form>
                    </div>
                </div>
            </div>  
        </section>
        <?php include_once "includes/footer.php"; ?>

<!-- ESTE SCRIPT GENERA LA LISTA DE COINCIDENCIAS DEL NOMBRE DE CLIENTE -->      
<!-- jQuery -->      
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 
<!-- jQuery UI -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  
<script type="text/javascript">
  $(function() {
     $( "#Rsocial" ).autocomplete({
       source: 'lista_cliente.php',
     });
  });
</script>     
<!-- script que genera lista de coincidencias en el formulario seccion cliente -->
<script>
    function doble_click(str{
        if(str.legth == 0){
            document.getElementById("RFC").value="";
            document.getElementById("Regimen").value="";
            return;
        }else{
            var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function ()
            {
				if (this.readyState == 4 && this.status == 200){
					var myObj = JSON.parse(this.responseText);
					document.getElementById("RFC").value = myObj[0];
             		document.getElementById("Regimen").value = myObj[1];
					}
			};
				xmlhttp.open("GET", "buscar_nombre.php?Rsocial=" + str, true);
				xmlhttp.send();
			}
        }
    )
</script>
<!-- fin del script  -->