
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
                        <h4 class="page-title">Mis facturas | Listado</h4>
                        <div class="content-header">
                            <div class="table-search">
                                <form action="" class="search-data-form">
                                    <button class="search-btn"><i class="material-icons-two-tone">search</i></button>
                                    
                                    <input type="text" placeholder="Buscar">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>
                                        <div class="cs-field" id="all-rows"><input type="checkbox"></div>
                                    </th>
                                    <td>Folio</td>
                                    <th class="sorting_asc" tabindex="0" aria-controls="table" rowspan="1" colspan="1" aria-label="ACCIONES: Activar orden de columna desendente" style="width: 163.062px;" aria-sort="ascending">
                                    Nombre Receptor</th>
                                    <th>RFC Receptor</th>
                                    <th class="big-col">Descripcion</th>
                                    <th>Subtotal</th>
                                    <th>Impuesto</th>
                                    <th>Total</th>
                                    <th class="sm-col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="cs-field"><input type="checkbox"></div>
                                    </td>
                                    <td>01</td>
                                    <td>Publico en general</td>
                                    <td>XAXX010101000</td>
                                    <td>Vestas del mes de marzo</td>
                                    <td>$8400.00</td>
                                    <td>$1600.00</td>
                                    <td>$10000.00</td>
                                    <td>
                                        <div class="table-row-actions">
                                            <button><i class="bi bi-file-earmark-pdf"></i></button>  
                                            <button></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-controlers">
                        <p>25 elementos</p>
                        <div class="cs-pagination">
                            <button class="pagination-arrow"><i class="material-icons-two-tone">chevron_left</i></button>
                            <ul class="pages-list">
                                <li>1</li>
                                <li class="active">2</li>
                                <li>3</li>
                                <li>4</li>
                                <li>5</li>
                            </ul>
                            <button class="pagination-arrow"><i class="material-icons-two-tone">chevron_right</i></button>
                        </div>
                    </div>
                </div>  
            </div>
        </section>
        <?php include_once "includes/footer.php"; ?>