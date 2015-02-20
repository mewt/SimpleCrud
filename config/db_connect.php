<?php

$host="localhost";
$db_name="bukutame";
$username="root";
$password="";

try{
	$con= new PDO("mysql:host={$host};dbname={$dbname}",$username,$password);
}
//jika koneksi error
catch (PDOException $exception){
	echo "Koneksi Error , Mas!".$exception->getMessage();
}
?>