<?php
include 'config/db_connect.php';
	//delete query
	$query ="DELETE FROM users WHERE id= ?";
	$stmt =$con->prepare($query);
    $stmt->bindParam(1,$_GET['id']);
	  		//eksekusi query
			if($stmt->execute()){
				echo "Berhasil dihapus.";
				header('location:index.php?action=deleted');
			}
			else{
				die('Tidak berhasil dihapus.');
			}
	
	
?>


			