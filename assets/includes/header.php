   <!-- Encabezado de las paginas-->
   <?php include_once "functions.php"; ?> 

   <div class="header">
        <div class="role">
            <button class="menu-btn"></button>
            <a href="#" class="home-link d-flex d-lg-none mt-0">
                <img class="logo" src="./images/logos3.svg" alt="">
            </a>
        </div>
        <div class="global-stats">
            <div class="stat-item">
                <img src="images/empresas.svg" alt="">
                <div>
                    <h5>Total empresas</h5>
                    <span><?php
                        include "./config/conexion.php";
                        $result = mysqli_query($conexion, "SELECT COUNT(*) total FROM cliente");
                        $fila = mysqli_fetch_assoc($result);
                        echo $fila['total'];
                    ?></span>
                </div>
            </div>
            <div class="stat-item">
                <img src="images/usuarios.svg" alt="">
                <div>
                    <h5>Usuarios registrados</h5>
                    <span><?php 
                        $result = mysqli_query($conexion, "SELECT COUNT(*) total FROM emisor");
                        $fila = mysqli_fetch_assoc($result);
                        echo $fila['total'];
                    ?></span>
                </div>
            </div>
            <div class="stat-item">
                <img src="images/certificados.svg" alt="">
                <div>
                    <h5>Facturas emitidas</h5>
                    <span><?php
                        $result = mysqli_query($conexion, "SELECT COUNT(*) total FROM facturas");
                        $fila = mysqli_fetch_assoc($result);
                        echo $fila['total'];
                    ?></span>
                </div>
            </div>
        </div>             
        <div class="header-actions">
            <div class="profile-option img-fit">
                <img src="images/perfil.jpg" alt="">
            </div>
            <div class="menu show-menu">
                <a href="#" class="link">
                    Mi perfil <i class="material-icons-two-tone">manage_accounts</i>
                </a>
                <a href="salir.php" class="link">
                    Salir <i class="material-icons-two-tone">logout</i>
                </a>
            </div>
        </div>
    </div>
                    