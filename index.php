<?php 
include 'ISPheader.php';
include('database_connection.php');

$message = '';

if(isset($_SESSION['user_id'])) {
    header('location:ISPPage2.php');
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
                        header("location:ISPPage2.php");
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
<!-- DESKTOP VIEW -->
<div class="container" style="width: 1470px;">
    <div class="deskContent">
        <h1 class="title"></h1>

         <div class="row">
                <div class="col-xs-6">
                    <div class="row" 
                    style="text-align: center;
                    font-size: 1.5em;">
                    <div class="col-xs-14">

                    <div class="mini-box" 
                    style="height: 300px;
                    line-height: 65px;
                    border: 2px solid gray;
                    border-color: #bfa145;
                    margin: 5px; overflow: auto;">Promo Frame
                    </div>
                    </div>
                    <div class="col-xs-14">

                    <div class="mini-box"
                    style="height: 300px;
                    line-height: 65px;
                    border: 2px solid gray;
                    border-color: #bfa145;
                    margin: 5px; overflow: hidden;">
                    <div> <iframe scrolling="no" src="chat/login_users_only.php" style="width: 725px; height: 400px; margin-top: -100px;"></iframe> </div>        
                    </div>

                    </div>
                    </div>
                </div>

                <div class="col-xs-6"
                    style="text-align: center;
                    font-size: 1.5em;">
                    <div class="big-box" style="height:605px;
                    line-height: 65px;
                    border: 2px solid gray;
                    border-color: #bfa145;
                    margin: 5px;">Website Info Frame
                   
                    
                    </div>
                    <br><br>
                    <br><br>
                </div>
            </div>
    </div>
</div>
<!-- DESKTOP VIEW -->


<!-- MOBILE VIEW -->
<div id="information" class="phoneContent ">
<div class="container" >
<div class="row" style="text-align: center; font-size: 1.5em;">
<div class="col-sm-7 col-md-8" >
  
        <div 
                style="height: 300px;
                line-height: 65px;
                border: 2px solid gray;
                border-color: #bfa145;
                margin: 5px; overflow: auto;">Promo Frame
        </div>

        <div 
                style="height: 300px;
                line-height: 65px;
                border: 2px solid gray;
                border-color: #bfa145;
                margin: 5px; overflow: hidden;">
                <div> <iframe scrolling="no" src="chat/login_users_only.php" style="width: 725px; height: 400px; margin-top: -100px; padding-right: 410px;"></iframe> </div>        
        </div>

        
        <div 
                style="height:605px;
                line-height: 65px;
                border: 2px solid gray;
                border-color: #bfa145;
                margin: 5px;">Website Info Frame
                
     
        </div>
                <br><br>
                <br><br>
        </div>
   
    
</div>

</div>  
</div>
</div>
<!-- MOBILE VIEW -->

<?php include 'ISPfooter.php';?>