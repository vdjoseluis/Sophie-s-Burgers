<?php
    require "model/connection.php";

    function createUser($username, $password, $firstname, $surname, $address, $phone, $email) {
        $db= createConnection();
        $sql= "INSERT INTO customers (username, password, firstname, surname, address, phone, email) VALUES 
            ('$username', '$password', '$firstname', '$surname', '$address', '$phone', '$email')";
        $result= mysqli_query($db,$sql);
        closeConnection($db);
        return $result;
    }

    function existsUser($username){
        $db= createConnection();
        $sql= "SELECT * FROM customers WHERE username='$username'";
        $result= mysqli_query($db,$sql);
        closeConnection($db);
        if (mysqli_fetch_assoc($result)) { return true; }
        return false;
    }

    function existsEmail($email){
        $db= createConnection();
        $sql= "SELECT * FROM customers WHERE email='$email'";
        $result= mysqli_query($db,$sql);
        closeConnection($db);
        return $result;
    }

    function findUser($username,$password){
        $db= createConnection();
        $sql= "SELECT * FROM customers WHERE username='$username' AND password='$password'";
        $result= mysqli_query($db,$sql);
        closeConnection($db);
        return $result;
    }

    function getProducts() {
        $db= createConnection();
        $sql= "SELECT * FROM products";
        $result= mysqli_query($db,$sql);
        closeConnection($db);
        return $result;
    }

function addOrder($connection,$customer_id, $items) {    
    mysqli_autocommit($connection, false);

    $date = date('Y-m-d');
    $total = 0;

    $sql_ticket = "INSERT INTO tickets (date, customer_id, total) VALUES ('$date', '$customer_id', '$total')";
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
?>