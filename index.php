<?php 
require('./views/header.php');

# MUESTRA EL CONTENIDO PRINCIPAL DE LA PÁGINA 

if (isset($_GET['content'])) {
    switch ($_GET['content']) {
        case 'carta':
            include('./views/carta.php');
            break;
        case 'menus':
            include('./views/menus.php');
            break;
        case 'pedidos':
            include('./views/pedidos.php');
            break;
        default:
            include('./views/main-content.php');
            break;
    }
} else {
    include('./views/main-content.php');
}

require('./views/footer.php');

?>