<?php 
include "assets/config/conexion.php";
include "assets/config/validar.php";
//metodo para registrar usuario en db
  if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre']) || empty($_POST['usuario']) || empty($_POST['clave'])){
         $alert = "<script> 
                      alertify.error('Favor de llenar todos los campos',3); 
                      alertify.set('notifier','position', 'top-right');
                   </script>";
    } else {

      $nombre = $_POST['nombre'];
      $usuario = $_POST['usuario'];
      $clave = md5($_POST['clave']);
      $result = 0;

      $query = mysqli_query($conexion, "SELECT * FROM emisor where usuario = '$usuario'");
      $result = mysqli_fetch_array($query);

      if ($result > 0) {
        $alert = "<script> alertify.error('El RFC ya existe'); </script>";
      }elseif(valida_rfc($usuario) == false){
        $alert = "<script> alertify.error('El RFC es incorrecta'); </script>";
        }else{
                $query_insert = mysqli_query($conexion, "INSERT INTO emisor(nombre,usuario,clave) values ('$nombre', '$usuario', '$clave')");
            if ($query_insert) {
                $alert = "<script> alertify.notify('Usuario Registrado', 'success', 5); </script>";
                } else {
                    $alert = "<script> alertify.error('Error al Guardar'); </script>";
                }
            }
        }
    mysqli_close($conexion);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnover</title>
    <link rel="stylesheet" type="text/css" href="assets/librerias/alertify/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="assets/librerias/alertify/css/themes/bootstrap.css">
    <script src="assets/librerias/alertify/alertify.min.js"></script>

    <link rel="stylesheet" href="assets/style/custom.min.css">
<!--    <link rel="preconnect" href="https://fonts.googleapis.com"> -->
<!--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""> -->
<!--    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,400&amp;display=swap" rel="stylesheet"> -->
    <style type="text/css">
        @font-face {
          font-weight: 400;
          font-style:  normal;
          font-family: 'Circular-Loom';
        
          src: url('https://cdn.loom.com/assets/fonts/circular/CircularXXWeb-Book-cd7d2bcec649b1243839a15d5eb8f0a3.woff2') format('woff2');
        }
        
        @font-face {
          font-weight: 500;
          font-style:  normal;
          font-family: 'Circular-Loom';
        
          src: url('https://cdn.loom.com/assets/fonts/circular/CircularXXWeb-Medium-d74eac43c78bd5852478998ce63dceb3.woff2') format('woff2');
        }
        
        @font-face {
          font-weight: 700;
          font-style:  normal;
          font-family: 'Circular-Loom';
        
          src: url('https://cdn.loom.com/assets/fonts/circular/CircularXXWeb-Bold-83b8ceaf77f49c7cffa44107561909e4.woff2') format('woff2');
        }
        
        @font-face {
          font-weight: 900;
          font-style:  normal;
          font-family: 'Circular-Loom';
          src: url('https://cdn.loom.com/assets/fonts/circular/CircularXXWeb-Black-bf067ecb8aa777ceb6df7d72226febca.woff2') format('woff2');}
    </style>
</head>
<body>
    
    <section id="login">
          <div class="container-xxl" id="c1">
            <div class="row overflow-hidden">
              <div class="col-md-7 p-0 h-100">
                <div id="registro" class="login-wrapper">
                  <div class="login-logo">
                    <img class="logo" src="assets/images/logos.svg" alt="">
                  </div>
                  <div class="login-title">
                    <h3 class="black">Registrarme</h3>
                  </div>
                  <form action="" method="post" autocomplete="off"> 
                    <?php echo isset($alert) ? $alert : ''; ?>
                    <div class="cs-field field">
                      <label for="contraseña" class="bold">Nombre completo o razon social</label>
                      <input type="text" placeholder="Escriba su nombre o razon social" name="nombre" id="nombre">
                    </div>
                    <div class="cs-field field">
                      <label for="contraseña" class="bold">RFC</label>
                      <input type="text" placeholder="Escriba su RFC" name="usuario" id="usuario">
                    </div>
                    <div class="cs-field field">
                      <label for="contraseña" class="bold">Contraseña</label>
                      <input type="password" placeholder="Escriba su contraseña" name="clave" id="clave">
                    </div>
                  
                    <div class="login-terminos">
                      Al hacer clic en Registrarse, indicas que has leído y aceptas los <a href="">Términos y condiciones</a>
                    </div>
                    <button class="login-rut cs-btn btn-blue">Registrarme</button>
                    <div class="login-secundary-actions">
                      <a id="iniciar" href="index.php">Iniciar sesión</a>
                    </div>
                  </form>
                </div>
              </div>
              <div id="login-img" class="col-md-5 p-0 h-100">
                <div class="img-fit">
                  <video width="320" height="240" autoplay="" loop="" muted="">
                    <source src="assets/images/video.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                  </video>
                </div>
              </div>
            </div>
          </div>
        <div class="footer-wrapper">
          <ul class="footer-links">
            <li><a href="">¿Quienes somos?</a></li>
            <li><a href="">Servicios</a></li>
            <li><a href="">Contacto</a></li>
          </ul>
          <div class="copyright"><span class="black">Turnover</span> | Todos los derechos reservados ®</div>
        </div>
    </section>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
    <script src="assets/scripts/custom.js"></script>
</body>
<loom-container id="lo-engage-ext-container"><loom-shadow classname="resolved"></loom-shadow></loom-container>
<loom-container id="lo-companion-container"><loom-shadow classname="resolved"></loom-shadow></loom-container>
</html>