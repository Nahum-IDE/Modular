<?php 
include "assets/config/conexion.php";
include "assets/config/validar.php";

$alert = '';
session_start();
if (!empty($_SESSION['active'])) {
  header('location: assets/');
} else {
  if (!empty($_POST)) {
    if (empty($_POST['usuario']) || empty($_POST['clave'])) {
      $alert = "<script> alertify.error(' Ingrese su usuario y su clave '); alertify.set('notifier','position', 'top-right'); </script>";
    } else {
      require_once "assets/config/conexion.php";
      $user = mysqli_real_escape_string($conexion, $_POST['usuario']);
      $clave = md5(mysqli_real_escape_string($conexion, $_POST['clave']));
      
      $query = mysqli_query($conexion, "SELECT id,nombre,usuario,clave FROM emisor WHERE usuario = '$user' AND clave = '$clave'");
      mysqli_close($conexion);
      $resultado = mysqli_num_rows($query);
      
      if ($resultado > 0) {
        $dato = mysqli_fetch_array($query);
        $_SESSION['active'] = true;
        $_SESSION['idUser'] = $dato['id'];
        $_SESSION['nombre'] = $dato['nombre'];
        $_SESSION['user'] = $dato['usuario'];
        $_SESSION['clave'] = $dato['clave'];
        header('location: assets/');
        
      } else {
        $alert = "<script> alertify.error(' Usuario o Contraseña Incorrecta '); alertify.set('notifier','position', 'top-right'); </script>";
        session_destroy();
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnover</title>
    <link rel="stylesheet" type="text/css" href="assets/librerias/alertify/css/alertify.min.css">
    <link rel="stylesheet" type="text/css" href="assets/librerias/alertify/css/themes/bootstrap.css">
    
    <link rel="stylesheet" href="assets/style/custom.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,400&amp;display=swap" rel="stylesheet">
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
<!-- seccion login -->     
        <div class="container" id="c1">
          <div class="row">
            <div class="col-md-7 p-0">
              <div id="registro" class="login-wrapper">
                <div class="login-logo">
                  <img class="logo" src="assets/images/logo.svg" alt="">
                </div>
                <div class="login-title">
                <h3 class="black">Iniciar sesión</h3>
                </div>
                <form action="" method="post" autocomplete="off">
                <?php echo isset($alert) ? $alert : ''; ?>
                  <div class="cs-field field">  
                    <label for="usuario" class="bold">Usuario (RFC)</label>
                    <input type="text" placeholder="Escriba su usuario" name="usuario" required="">
                  </div>
                  <div class="cs-field field">
                    <label for="contraseña" class="bold">Contraseña</label>
                    <input type="password" placeholder="Contraseña" name="clave" required="">
                  </div>
                  <button class="login-enviar cs-btn btn-blue">Iniciar sesión</button>
                  <div class="login-secundary-actions">
                      <a id="registrarme" href="registrar_usuario.php">Registrarme</a>  |  <a href="#" class="modal-btn" data-buttonmodal="password">¿Olvidaste tu contraseña?</a>
                  </div>
                </form>
              </div>
            </div>
            <div id="login-img" class="col-md-5 p-0 h-100">
              <div class="img-fit">
                <video width="320" height="240" autoplay="" loop="" muted="" poster="assets/images/login-video.jpg">
                  <source src="assets/images/video-login.mp4" type="video/mp4">
                  <source src="assets/images/video-login.webm" type="video/webm">
                  <source src="assets/images/video-login.ogv" type="video/ogv">
                  Your browser does not support the video tag.
                </video>
              </div>
            </div>
          </div>
        </div>
<!-- fin seccion login -->
        <div class="footer-wrapper">
          <ul class="footer-links">
            <li><a href="">¿Quienes somos?</a></li>
            <li><a href="">Servicios</a></li>
            <li><a href="">Contacto</a></li>
          </ul>
          <div class="copyright"><span class="black">Turnover</span> | Todos los derechos reservados ®</div>
        </div>
    </section>
<!-- seccion olvide contraseña-->
    <div class="cs-modal-container" data-modal="password">
        <div class="modal-shade"></div>
        <div class="cs-modal sm-modal">
            <div class="cs-modal-content">
                <div class="modal_header">
                  <h4 class="m-title">Recupera tu contraseña</h4>
                  <button class="close-modal"><i class="icon-close"></i></button>
                </div>
                <form action="">
                  <div class="cs-field field">  
                    <label for="usuario">Introduce tu correo electrónico y te enviaremos un enlace para restablecer la contraseña.</label>
                    <input type="email" placeholder="Correo electrónico" required="">
                  </div>
                  <button class="cs-btn btn-blue ml-auto">Enviar</button>
                </form>
            </div>
        </div>
    </div>
<!-- seccion olvide contraseña-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/scripts/custom.js"></script>
    <script src="assets/librerias/alertify/alertify.min.js"></script>
</body>
<loom-container id="lo-engage-ext-container"><loom-shadow classname="resolved"></loom-shadow></loom-container>
<loom-container id="lo-companion-container"><loom-shadow classname="resolved"></loom-shadow></loom-container>
</html>