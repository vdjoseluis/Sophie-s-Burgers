<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sophie's Burger</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../css/styles.css" />
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="../js/main.js"></script> 
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPmQTdBkiSL8d7BSRywbZWwWCAZV6J7D8&libraries=places"></script>     
</head>

<body>    
    <header>
        <div class="logo">
            <a href="../index.php"><img src="../img/logo_burger.png" alt="logo" /></a>
        </div>

        <nav class="main-bar d-none d-md-block">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?content=carta">Carta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?content=menus">Menús</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Socios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?content=pedidos">Pedidos</a>
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
                            Sophie's Burger
                        </h4>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="carta.html">Carta</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="menus.html">Menús</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Socios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pedidos.html">Pedidos</a>
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