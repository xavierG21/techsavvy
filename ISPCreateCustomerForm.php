<?php 
include 'ISPheader.php';
require 'PHPMailer/PHPMailerAutoload.php';
	
    $alert = "";
    if($_POST){
    $message = $_POST["contentTextArea"];
	$emailAdd = $_POST["email"];
	$subj = $_POST["subject"];
        if(!$_POST["email"]){
            $alert = "The email field is required <br> ";
        }

        if (!$_POST["contentTextArea"]) {
            $alert .= "The content field is required <br> ";
        }

        if (!$_POST["subject"]) {
            $alert .= "The subject field is required <br> ";
        }

        if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
            $alert .= "Invalid email address <br> ";
        }

        if ($alert != "") {
            $alert =  ' <div class=" container alert alert-danger role= "alert"><p><strong>There were error(s):</strong></p>'. $alert .'</div>';
        }
        else{
            $mail = new PHPMailer;
            $mail->isSMTP();                            // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers if using gmail
            $mail->SMTPAuth = true;                     // Enable SMTP authentication
            $mail->Username = 'xavierkpop@gmail.com';       // SMTP username
            $mail->Password = 'POWDER97';           // SMTP password
            $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                          // TCP port to connect to

            $mail->setFrom($_POST["email"]);
            $mail->addReplyTo($_POST["email"]);
            $mail->addAddress("xavierkpop@gmail.com");          // Add a recipient

            $mail->Subject = $_POST["subject"];
            $mail->Body    = "Name:$subj Email:$emailAdd Message:$message";

            if(!$mail->send()) {
                $error = 'Message could not be sent <br>';
                $error .= 'Mailer Error: ' . $mail->ErrorInfo;
                $alert = '<div class="alert alert-danger container" role="alert"><strong>'.$error.'</strong></div>';
            } else {
                $alert .= '<div class="alert alert-success container" role="alert"><strong>Message sent. We will get back to you soon.</strong></div>';
            }

        }
    }
?>
<div class="container">



<!-- form -->
<div class="contact">

	<div id="error"><?php echo $alert; ?></div>
    <div class="row">
       	<div class="col-sm-12">
    		<div class="col-sm-6 col-sm-offset-3">
			<div class="spacer">   		

       		<form method = "post">

       		<h1 class="title">Customer</h1>
			<h3>Contact Information</h3>	
			<div class="form-group">	
			<input type="text" class="form-control" name="subject" id="subject" placeholder="First Name">
			</div>
			<div class="form-group">	
			<input type="text" class="form-control" name="subject" id="subject" placeholder="Middle Name">
			</div>
			<div class="form-group">	
			<input type="text" class="form-control" name="subject" id="subject" placeholder="Last Name">
			</div>
			<div class="form-group">	
			<input type="text" class="form-control" name="subject" id="subject" placeholder="Suffix(Optional)">
			</div>
			<div class="form-group">	
			<input type="text" class="form-control" name="subject" id="subject" placeholder="Primary Phone">
			</div>
			<div class="form-group">	
			<input type="text" class="form-control" name="subject" id="subject" placeholder="Secondary Phone(Optional)">
			</div>
			<div class="form-group">
			<input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
			<p>why email is important: <a href="#"><i class="fa fa-question"></i></a></p>
			</div>
			<div class="form-group">
			<input type="email" class="form-control" name="email" id="email" placeholder="Confirmed Email Address">
			</div>			

			<h3>Service Address</h3>

			<div class="form-group">
            <input type="text" class="form-control" id="name"  placeholder="Service Street Address" name="name" required="">
            <p id="help-name">Service Street Address</p>
        </div>
        <div class="form-group">
            <input type="email" id="email" class="form-control email"  placeholder="Service Street Address 2" name="email" required="">
            <p id="help-email">Service Street Address 2</p>
        </div>
        <div class="form-group">
            <input type="number" id="phone" class="form-control phone"  placeholder="Phone" name="phone" required="">
            <p id="help-phone">Please enter a valid phone number above</p>
        </div>        
        <div class="form-group">
            <div class="row">

            <div class="col-xs-4">
	            <input type="number" id="phone" class="form-control phone"  placeholder="City" name="phone" required="">
	            <p id="help-phone">City</p>
            </div>     

            <div class="col-xs-4">
            			<select class="form-control" name="countries">
                        <option>State</option>
                        <?php 
                        // Fetching the from the database
                        $query = mysqli_query($con, "SELECT * FROM countries");
                        $count = mysqli_num_rows($query);
                        while ($fetch = mysqli_fetch_array($query)) {
                          ?>
                          <option value="<?php echo $fetch['name']; ?>"><?php echo $fetch['name']; ?></option>
                          <?php
                        }
                         ?>
                        </select>
            </div>  

            <div class="col-xs-4">
            <input type="number" id="phone" class="form-control phone"  placeholder="Zip" name="phone" required="">
	            <p id="help-phone">Zip</p>
            </div>

        	</div>
        </div>
        <div class="form-group ">
          <div class="row">
                     <div class="col-xs-6">
                   <input type="text" name="add" placeholder="Enter address" class="form-control">
                  </div>
                    <div class="col-xs-6">
                          <select class="form-control" name="countries">
                        <option>Select Country</option>
                        <?php 
                        // Fetching the from the database
                        $query = mysqli_query($con, "SELECT * FROM countries");
                        $count = mysqli_num_rows($query);
                        while ($fetch = mysqli_fetch_array($query)) {
                          ?>
                          <option value="<?php echo $fetch['name']; ?>"><?php echo $fetch['name']; ?></option>
                          <?php
                        }
                         ?>
                    </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="hidden" readonly="" name="roomID" class="form-control" value="<?php echo $id;  ?>">
                  <input type="hidden" name="no_night" id="no_night" value="">
                </div>
      
       
       		<h3>Billing Address</h3>

			<div class="form-group">
            <input type="text" class="form-control" id="name"  placeholder="Billing street adddress" name="name" required="">
            <p id="help-name">Billing street adddress</p>
        </div>
        <div class="form-group">
            <input type="email" id="email" class="form-control email"  placeholder="Billing street adddress 2" name="email" required="">
            <p id="help-email">Billing street adddress 2</p>
        </div>
        
       
        <div class="form-group ">
          <div class="row">
                    <div class="col-xs-6">
                   		<input type="text" name="add" placeholder="City" class="form-control">
                  	</div>
                    <div class="col-xs-6">
                          <select class="form-control" name="countries">
                        <option>State</option>
                        <?php 
                        // Fetching the from the database
                        $query = mysqli_query($con, "SELECT * FROM countries");
                        $count = mysqli_num_rows($query);
                        while ($fetch = mysqli_fetch_array($query)) {
                          ?>
                          <option value="<?php echo $fetch['name']; ?>"><?php echo $fetch['name']; ?></option>
                          <?php
                        }
                         ?>
                    </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="hidden" readonly="" name="roomID" class="form-control" value="<?php echo $id;  ?>">
                  <input type="hidden" name="no_night" id="no_night" value="">
                </div>


			<button type="submit" class="btn btn-default">Submit</button>
			</form>

			</div>
       		</div>
   		</div>
	</div>
</div>
<!-- form -->

</div>
<?php include 'ISPfooter.php';?>