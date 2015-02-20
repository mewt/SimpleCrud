<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Simple PHP CRUD</title>
</head>
<body>
	<!--Kontent Dinamik disini -->
	<h1>Tambahkan Data</h1>
	<?php
	if($_POST){
		//koneksi
		include 'config/db_connect.php';
		
		try{
			//query
			$query = "INSERT INTO users SET firstname=?, lastname=?, username=? , password=?";
			//koneksi 
			$stmt = $con->prepare($query);
			
			//bind parameter
			//melewatkan parameter
			//paramter ke 1
			$stmt->bindParam(1,$_POST['firstname']);
			//parameter ke 2
			$stmt->bindParam(2,$_POST['lastname']);
			//parameter ke 3
			$stmt->bindParam(3,$_POST['username']);
			//paramter ke 4
			$stmt->bindParam(4,$_POST['password']);
			
			//eksekusi query
			if($stmt->execute()){
				echo "Berhasil disimpan.";
			}
			else{
				die('Tidak berhasil disimpan.');
			}
		}
		catch(PDOException $exception){//error handle
			echo "Error: ".$exception->getMessage(); 
			
		}
	}
	?>
	<form action="#" method="post">
	<table>
		<tr>
			<td>FirstName</td>
			<td><input type="text" name='firstname' required/></td>
		</tr>
		<tr>
			<td>LastName</td>
			<td><input type="text" name="lastname" required /></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password" required /></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" value='Simpan'/>
				<a href="index.php">Kembali ke Index</a>
			</td>
		</tr>
	</table>
	</form>
</body>
</html>	