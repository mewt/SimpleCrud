<?php

/**
 *  @file db_connect.php
 *  @CodeMewt
 */
 
$dbname="bukutamu";
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