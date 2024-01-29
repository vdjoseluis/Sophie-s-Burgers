<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sophie's Burgers</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="css/styles.css" />
    <script src="js/index.js"></script>
</head>

<body>
    <header>
        <div class="logo">
            <a href="index.php"><img src="img/logo_burger.png" alt="logo" /></a>
        </div>

        <div id="sophies">
            <h1 class="text-success d-none d-lg-block">Sophie's Burgers</h1>
            <h3 class="text-success d-lg-none">Sophie's Burgers</h3>
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
                    <a class="nav-link" href="index.php?content=partners">Socios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?content=orders">Pedidos</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="index.php?content=bookings">Reservas</a></li>
            </ul>
        </nav>

        <nav class="alt-bar navbar navbar-expand-lg bg-dark d-md-none">
            <div class="container-fluid">
                <button class="navbar-toggler bg-secondary" title="view images" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
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
                                <a class="nav-link" href="index.php?content=carta">Carta</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?content=menus">Menús</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?content=partners">Socios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?content=orders">Pedidos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?content=bookings">Reservas</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

<?php
if (isset($_GET['content'])) {
    switch ($_GET['content']) {
        case 'carta':
            include('views/carta.php');
            break;
        case 'menus':
            include('views/menus.php');
            break;
        case 'partners':
            include('views/partners.php');
            break;
        case 'orders':
            include('views/orders.php');
            break;
        case 'login':
            include('views/login.php');
            break;
        case 'formUser':
            include('views/formUser.php');
            break;
        case 'bookings':
            include('views/bookings.php');
            break;
        case 'aboutUs':
            include('views/aboutUs.php');
            break;
        case 'contactUs':
            include('views/contactUs.php');
            break;
        case 'job':
            include('views/job.php');
            break;
        case 'formJob':
            include('views/formJob.php');
            break;
        default:
            include('views/main-content.php');
            break;
    }
} else {
    include('views/main-content.php');
}

?>
    <footer>
    <ul class="lh-lg text-success">
        <li>Copyright ® 2024 Sophie's Burgers </li>
    </ul>
    <div class="logo">
        <a href="index.php">
            <img src="img/logo_burger.png" alt="logo" />
        </a>
    </div>
    <div class="rrss">
        <a href="http://instagram.com" target="_blank"><img src="img/logos-rrss/logo-instagram.png" alt="logoInstagram" /></a>
        <a href="http://facebook.com" target="_blank"><img src="img/logos-rrss/logo-facebook.png" alt="logoFacebook" /></a>
        <a href="http://linkedin.com" target="_blank"><img src="img/logos-rrss/logo-linkedin.png" alt="logoLinkedin" /></a>
        <a href="https://wa.me/34622161340" target="_blank"><img src="img/logos-rrss/logo-whatsapp.png" alt="logoWhatsApp" /></a>
    </div>
</footer>
<script src="js/index.js"></script>
</body>
</html>