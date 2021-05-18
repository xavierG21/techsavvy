<!-- Modal for generating pin for every user -->
<div class="modal fade" id="addadmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Please Enter Your Name</h5>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
            <label>Username</label>
            <input type="text" name="user" class="form-control" placeholder="Enter Username" required=""> <br>
            <label hidden>Password</label>
            <input type="password" name="pass" class="form-control" placeholder="Enter Password" required="" value="admin" hidden> <br>
            
            <button type="submit" class="form-control btn btn-primary" name="addadmin">ADD ADMIN</button>
          </form>
      </div>
      
    </div>
  </div>
</div>

<!-- End of modal for generating pin for every user -->

<?php 
    include('database_connection.php');
	
    if (isset($_POST['addadmin'])) {
        //$user = "Xavier";
		//$pass = "admin";
		$user = $_POST['user'];
        $pass = PASSWORD_HASH($_POST['pass'],PASSWORD_DEFAULT);
		
		$query = mysqli_query($con, "INSERT INTO login (username,password) VALUES('$user', '$pass') ");

        if ($query) {
            echo "<script> alert('You have successfully added a new admin'); </script>";
          }
          else{
            echo "<script> alert('Unable to add a new admin'); </script>";
          }
        //$query = "INSERT INTO login (name,password) VALUES('$user', '$pass')";
		//$query = "SELECT username FROM login WHERE user_id = '$user_id'";
		//$statement = $connect->prepare($query);
		
		$query = "INSERT INTO chat_message (to_user_id, from_user_id, chat_message, status) VALUES ('36', '2', '1', '0')";
		$statement = $connect->prepare($query);
		
        /*if ($query) {
            echo "<script> alert('You have successfully added a new admin'); </script>";
          }
          else{
            echo "<script> alert('Unable to add a new admin'); </script>";
          }*/
    }
 ?>