<?php
include('database_connection.php');
session_start();
$message = '';

if(isset($_SESSION['user_id'])) {
	header('location:index_users_only.php');
}

if(isset($_POST["login"])) {
	$username = $_POST['username'];
	$address = $_POST['address'];
    $password = PASSWORD_HASH($_POST["password"],PASSWORD_DEFAULT);		
	$query = mysqli_query($con, "INSERT INTO login (username,password,address) VALUES('$username', '$password', '$address') ");
	
	if(isset($_POST['username']) != "") {
		$query = "SELECT * FROM login WHERE username = :username";
		$statement = $connect->prepare($query);
		$statement->execute(array(':username' => $_POST["username"]));
		$count = $statement->rowCount();
			if($count > 0) {
					$result = $statement->fetchAll();
				foreach($result as $row){
					if(password_verify($_POST["password"], $row["password"])){
						$_SESSION['user_id'] = $row['user_id'];
						$_SESSION['username'] = $row['username'];
						$sub_query = "INSERT INTO login_details (user_id) VALUES ('".$row['user_id']."')";
						$statement = $connect->prepare($sub_query);
						$statement->execute();
						$_SESSION['login_details_id'] = $connect->lastInsertId();
						header("location:index_users_only.php");
						sleep(2); // to show gif loading icon
					} else {
						$message = "<label>Wrong Password</label>";
					}
				}
			} else {
				$message = "<label>Wrong Username</labe>";
			}
	} else {
		$message = "<label>Enter Username</labe>";
	}
}
?>