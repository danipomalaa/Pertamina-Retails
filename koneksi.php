<?php

$host = "localhost";
$user = "root";
$pass = "";
$dtbs = "db_pertamina_retails";

$conn = mysqli_connect($host,$user,$pass,$dtbs);

if($conn->connect_error){
	echo "DATABASE CONNECTION ERROR";
}

?>