<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Update Data</title>
</head>
<body>
<?php
include 'config/db_connect.php';
if ($_POST) {
  try {
    //query
	$query="update users
			set firstname =	:firstname,lastname= :lastname, username= :username, password= :password
			where id =:id";
	//prepare query
	$stmt =$con->prepare($query);
	
	//bindparameter
	$stmt->bindParam(':firstname',$_POST['firstname']);
	$stmt->bindParam(':lastname',$_POST['lastname']);
	$stmt->bindParam(':username',$_POST['username']);
	$stmt->bindParam(':password',$_POST['password']);
	$stmt->bindParam(':id',$_POST['id']);
	
	//execute query
	
    if ($stmt->execute()) {
  		echo "Data telah tersimpan!";
		}

	else {
       die('Gagal menyimpan data.');

		}
    
  }catch(PDOException $exception){//error handling
      echo "Error: ".$exception->getMessage();
  }
}	
?>

	<?php
	include 'config/db_connect.php';
	try {
	  $query="select id, firstname,lastname,username,password from users where id =? limit 0,1"; 
	  //prepare query
	  $stmt= $con->prepare($query);
	  //bind paramter $_REQUEST
	  $stmt->bindParam(1,$_REQUEST['id']);
	  //execute query
	  $stmt->execute();
	  $row=$stmt->fetch(PDO::FETCH_ASSOC);
	  
	  //mengisi nilai ke form
	  $id =$row['id'];
	  $firstname = $row['firstname'];
	  $lastname  = $row['lastname'];
	  $username	 = $row['username'];
	  $password  = $row['password'];
	  
	}catch(PDOException $exception){//error handling
	    echo "Error :".$exception->getMessage();
		
	}
	?>
	<!-- input data user baru disini -->
	<h1>EDIT FILE</h1>
	<form action="" method="post">
		<table>
			<tr>
				<td>Firstname</td>
				<td><input type='text' name='firstname' value='<?php echo $firstname;?>' /></td>
			</tr>
			<tr>
				<td>Lastname</td>
				<td><input type='text' name='lastname' value='<?php echo $lastname;?>'/></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type='text' name='username' value='<?php echo $username;?>'/></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type='password' name='password' value='<?php echo $password;?>'/></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type='hidden' name='id' value='<?php echo $id?>' />
					<input type='submit' value='Edit'/>
					<a href='index.php'>Back to Index</a>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>