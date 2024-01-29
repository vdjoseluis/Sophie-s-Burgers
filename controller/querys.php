<?php
require "model/connection.php";

function createUser($username, $password, $firstname, $surname, $address, $phone, $email, $deliveryEnabled)
{
    $db = createConnection();
    $sql = "INSERT INTO customers (username, password, firstname, surname, address, phone, email, deliveryEnabled) VALUES 
            ('$username', '$password', '$firstname', '$surname', '$address', '$phone', '$email', '$deliveryEnabled')";
    $result = mysqli_query($db, $sql);
    closeConnection($db);
    return $result;
}

function updateUser($username, $password, $firstname, $surname, $address, $phone, $email, $deliveryEnabled)
{
    $db = createConnection();
    $sql = "UPDATE customers SET firstname='$firstname', surname='$surname', address='$address', phone='$phone', email='$email', deliveryEnabled='$deliveryEnabled' 
                WHERE username='$username'";
    $result = mysqli_query($db, $sql);
    closeConnection($db);
    return $result;
}

function deleteUser($username)
{
    $db = createConnection();
    $sql = "DELETE FROM customers WHERE username='$username'";
    $result = mysqli_query($db, $sql);
    closeConnection($db);
    return $result;
}

function existsUser($username)
{
    $db = createConnection();
    $sql = "SELECT * FROM customers WHERE username='$username'";
    $result = mysqli_query($db, $sql);
    closeConnection($db);
    if (mysqli_fetch_assoc($result)) {
        return true;
    }
    return false;
}

function existsEmail($email)
{
    $db = createConnection();
    $sql = "SELECT * FROM customers WHERE email='$email'";
    $result = mysqli_query($db, $sql);
    closeConnection($db);
    return $result;
}

function findUser($username, $password)
{
    $db = createConnection();
    $sql = "SELECT * FROM customers WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $sql);
    closeConnection($db);
    return $result;
}

function toBook($customer_id, $date, $time, $people)
{
    $tableId = findTable($people);
    if ($tableId !== null) {
        $db = createConnection();
        $sql = "INSERT INTO bookings (customer_id, date, time, people, table_id) VALUES 
            ('$customer_id', '$date', '$time', '$people', '$tableId')";
        $result = mysqli_query($db, $sql);
        closeConnection($db);
        return $result;
    }
    return false;
}

function findTable($people)
{
    $db = createConnection();
    $sqlSelect = "SELECT id, people, reserved FROM tables WHERE reserved = FALSE AND people >= $people ORDER BY people ASC LIMIT 1";
    $resultSelect = mysqli_query($db, $sqlSelect);

    if ($resultSelect && $resultSelect->num_rows > 0) {
        $row = $resultSelect->fetch_assoc();
        $tableId = $row['id'];

        // marcar la mesa como reservada
        $sqlUpdate = "UPDATE tables SET reserved = TRUE WHERE id = $tableId";
        $resultUpdate = mysqli_query($db, $sqlUpdate);

        if ($resultUpdate) {
            // La mesa se ha reservado
            closeConnection($db);
            return $tableId;
        }
    }
    closeConnection($db);
    return false;
}

function findBooking($customer_id, $date, $time)
{
    $db = createConnection();
    $sql = "SELECT * FROM bookings WHERE customer_id='$customer_id' AND date='$date' AND time='$time'";
    $result = mysqli_query($db, $sql);
    closeConnection($db);
    return $result;
}

function findTickets($date, $time)
{
    $db = createConnection();
    $sql = "SELECT * FROM tickets WHERE date='$date' AND time='$time'";
    $result = mysqli_query($db, $sql);
    closeConnection($db);
    return $result;
}

function getProducts()
{
    $db = createConnection();
    $sql = "SELECT * FROM products";
    $result = mysqli_query($db, $sql);
    closeConnection($db);
    return $result;
}

function addOrder($connection, $customer_id, $items, $deliveryOption)
{
    mysqli_autocommit($connection, false);

    $date = date('Y-m-d');
    $time = date('H:i:s');
    $total = 0;

    $sql_ticket = "INSERT INTO tickets (date, time, customer_id, total, delivery_option) VALUES ('$date', '$time', '$customer_id', '$total', '$deliveryOption')";
    mysqli_query($connection, $sql_ticket);
    $ticket_id = mysqli_insert_id($connection);

    foreach ($items as $item) {
        $product_id = $item['product_id'];
        $quantity = $item['quantity'];

        if ($quantity > 0) {
            $price = getProductPrice($connection, $product_id);
            $total_product = $price * $quantity;
            $total += $total_product;

            $sql_item = "INSERT INTO items (ticket_id, product_id, quantity) VALUES ('$ticket_id', '$product_id', '$quantity')";
            mysqli_query($connection, $sql_item);
        }
    }
    $sql_update_total = "UPDATE tickets SET total = $total WHERE id = '$ticket_id'";
    mysqli_query($connection, $sql_update_total);
    mysqli_commit($connection);
    mysqli_autocommit($connection, true);
    closeConnection($connection);
}
