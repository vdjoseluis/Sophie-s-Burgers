<?php 
	function createConnection() {
		$host = "localhost";
		$user = "root";
		$pass = "";
		$database = "sophies_burgers";

		$connection= mysqli_connect($host,$user,$pass,$database);
		return $connection;
	}
	function closeConnection($connection) {
		mysqli_close($connection);
	}
?>