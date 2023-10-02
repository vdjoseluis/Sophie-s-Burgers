<?php 
    $envVariables= parse_ini_file('/keys.env');
    $googleMapsApiKey= $envVariables['GOOGLE_MAPS_API_KEY'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sophie's Burger</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="../css/styles.css" />
    <!--<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>-->
    <script src="../js/index.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $googleMapsApiKey; ?>&libraries=places"></script>
</head>

<body>
    <header>
        <div class="logo">
            <a href="../index.php"><img src="../img/logo_burger.png" alt="logo" /></a>
        </div>

        <div id="sophies">
            <h1 class="text-success d-none d-lg-block">Sophie's Burgers</h1>
            <h3 class="text-success d-lg-none">Sophie's Burgers</h3>
        </div>

        <nav class="main-bar d-none d-md-block">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="/index.php?content=carta">Carta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index.php?content=menus">Menús</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Socios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index.php?content=pedidos">Pedidos</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Reservas</a></li>
            </ul>
        </nav>

        <nav class="alt-bar navbar navbar-expand-lg bg-dark d-md-none">
            <div class="container-fluid">
                <button class="navbar-toggler bg-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <h4 class="offcanvas-title text-danger" id="offcanvasDarkNavbarLabel">
                            Sophie's Burgers
                        </h4>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/index.php?content=carta">Carta</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/index.php?content=menus">Menús</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Socios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/index.php?content=pedidos">Pedidos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Reservas</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>