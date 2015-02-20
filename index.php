<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<script type="text/javascript">
	function delete_user(id){
		
		var jawaban = confirm('Apa Anda yakin?');
		if (jawaban){
			//direct ke delete.php
			window.location='delete.php?id='+id;
		}
	}
	
	</script>
	<title>Index ~ Data Tersimpan</title>
</head>
<body>
	<!--dinamik kontent-->
	<h1>Data Tersimpan</h1>
	<?php
	//koneksi database
	include 'config/db_connect.php';
	$action = isset($_GET['action'])?$_GET['action']:"";
	//kondisi cek
	if ($action=='deleted') {
	  	echo "<div>Data telah dihapus</div>";
	}
	
	//pilih semua data
	$query ="SELECT id, firstname,lastname,username FROM users";
	$stmt =$con->prepare($query);
	$stmt->execute();
	
	//
	$num = $stmt->rowCount();
	//
	if($num>0){
		//table
		echo "<table border='1'>";
		
		//membuat table
		echo "<tr>";
			echo "<th>Firstname</th>";
			echo "<th>Lastname</th>";
			echo "<th>Username</th>";
			echo "<th>Action</th>";
		echo "<tr/>";
		//menerima data dari database dengan fungsi fetch
		while ($row =$stmt->fetch(PDO::FETCH_ASSOC)) {
		     extract($row);
			 //membuat table baru
			 echo "<tr>";
			 	echo "<td>{$firstname}</td>";
				echo "<td>{$lastname}</td>";
				echo "<td>{$username}</td>";
				echo "<td>";
				echo "<a href='edit.php?=id={$id}'>EDIT</a>";
				echo "/";			
				echo "<a href='#' onclick='delete_user({$id});'>Delete</a>";
				echo "</td>";
			echo "</tr>";
				
		}
	}
		//akhir table
		else {
		       echo "Tidak ada data";
		
		}
		
	?>
</body>
</html>