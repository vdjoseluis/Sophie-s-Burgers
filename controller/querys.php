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
        if (mysqli_fetch_assoc($result)) { return true; }
        return false;
    }
?>