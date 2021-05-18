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

<html> 
	
	<head>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" href="css/styleXa.css">
	</head>
	
<body style="background-color: #252423;">
	<br /><br /><br /><br /><br />
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<h1 class="text-center login-title font" style="text-transform: uppercase; font-weight:bold;">Enter name and address to search services available at your office and home office</h1>
				<div class="account-wall">
					
					<form method="POST" class="form-signin">
						
					<input type="text" name="username" class="form-control" placeholder="Your Name"  required="">
					<input type="hidden" name="password" class="form-control" placeholder="Enter Password" value="admin" >
					<input type="text" name="address" class="form-control" placeholder="Your Address" required="" required="">
					<button class="btn btn-lg btn-primary btn-block" id="login" name="login" type="submit">
						Submit</button>
					
					
					</form>
					<center><font size="4"><p class="text-danger font"><?php echo $message; ?></p></font></center>
					
					
					</center>
				</div>
				
			</div>
		</div>
	</div>
</body>
<script>
		$(function(){
			$("#login").click(function(){
				$(this).after("<br /><br /><center><img src='images/prijava.gif' width='25px' alt='loading' />").fadeIn();
				window.open('../screenleapShareSample.php');   // loader icon
			});
		});
</script>  
</html>
