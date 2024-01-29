<?php
require "../model/connection.php";

function getCustomers() {
    $db = createConnection();
    $sql = "SELECT * FROM customers";
    $result = mysqli_query($db, $sql);
    closeConnection($db);
    return $result;
}

function getOrders() {
    $db = createConnection();
    $sql = "SELECT * FROM tickets";
    $result = mysqli_query($db, $sql);
    closeConnection($db);
    return $result;
}

function getBookings() {
    $db = createConnection();
    $sql = "SELECT * FROM bookings";
    $result = mysqli_query($db, $sql);
    closeConnection($db);
    return $result;
}

function getTables() {
    $db = createConnection();
    $sql = "SELECT * FROM tables";
    $result = mysqli_query($db, $sql);
    closeConnection($db);
    return $result;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sophie's Burgers Control</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="../css/styles.css" />
    <script src="indexControl.js"></script>
</head>

<body>
    <header>
        <div class="logo">
            <a href="../controlRestaurant/indexControl.php"><img src="../img/logo_burger.png" alt="logo" /></a>
        </div>

        <div id="sophies">
            <h1 class="text-success d-none d-lg-block">Sophie's Burgers</h1>
            <h3 class="text-success d-lg-none">Sophie's Burgers</h3>
        </div>

        <nav class="main-bar d-none d-md-block">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="customers();">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="orders();">Pedidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="bookings();">Reservas</a>
                </li>
            </ul>
        </nav>
    </header>

    <section id="customers" class="d-none">
        <h2 class="text-center">Clientes</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Delivery</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $customers= getCustomers();
                while ($row = mysqli_fetch_assoc($customers)) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['firstname']}</td>";
                    echo "<td>{$row['surname']}</td>";
                    echo "<td>{$row['address']}</td>";
                    echo "<td>{$row['phone']}</td>";
                    echo "<td>{$row['email']}</td>";
                    $deliveryEnabled= ($row['deliveryEnabled']==1) ? 'SI' : 'NO';
                    echo "<td>{$deliveryEnabled}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <section id="orders" class="">
        <h2 class="text-center">Pedidos</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Id cliente</th>
                    <th>Entrega/Recogida</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $orders= getOrders();
                while ($row = mysqli_fetch_assoc($orders)) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['date']}</td>";
                    echo "<td>{$row['time']}</td>";
                    echo "<td>{$row['customer_id']}</td>";
                    $deliveryOption = ($row['delivery_option']=='delivery') ? 'Domicilio' : 'Tienda';
                    echo "<td>{$deliveryOption}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <section id="bookings" class="d-none">
        <h2 class="text-center">Reservas</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>                    
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Id cliente</th>
                    <th>Personas</th>
                    <th>Id Mesa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $bookings= getBookings();
                while ($row = mysqli_fetch_assoc($bookings)) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['date']}</td>";
                    echo "<td>{$row['time']}</td>";
                    echo "<td>{$row['customer_id']}</td>";
                    echo "<td>{$row['people']}</td>";
                    echo "<td>{$row['table_id']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <footer>
        <ul class="lh-lg text-success">
            <li>Copyright ® 2024 Sophie's Burgers </li>
        </ul>

    </footer>
</body>

</html>