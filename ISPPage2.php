<?php include 'ISPheader.php';
if(!isset($_SESSION['screenLeap'])){
    header("location:index.php");
    
}
$screenLeap = $_SESSION['screenLeap'];

include('database_connection.php');

/*if(!isset($_SESSION['user_id'])){
    header("location:login_users_only.php");
}*/
?>
<!--                                         ----------DESKTOP VIEW---------------                                   -->

<div class="container" style="width: 1470px;">
<div class="deskContent">
     <div class="row">

            <div class="col-xs-6">
                <div class="row" 
                style="text-align: center;
        		font-size: 1.5em;">
                <div class="col-xs-14">
                <div class="mini-box" 
                style="height: 420px;
        		line-height: 65px;
        		border: 2px solid gray;
                border-color: #bfa145;
        		margin: 5px; overflow: hidden;">
                <div> 
                    <iframe scrolling="no" src="chat/login_users_only.php" style="width: 400px; height: 420px;"></iframe>
                </div>
        		</div>
        		</div>

                <div class="col-xs-14">

                <div class="mini-box"
                style="height: 420px;
        		line-height: 65px;
        		border: 2px solid gray;
                border-color: #bfa145;
        		margin: 5px; overflow: auto;">

                <form method = "post" style="overflow:auto; overflow-x: hidden;">
                <h1 class="title"></h1>
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
                </div>
                <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Confirmed Email Address">
                </div>          

                <h3 style="color:#bfa145;">Service Address</h3>

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
          
           
                <h3 style="color:#bfa145;">Billing Address</h3>

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
            <div class="col-xs-6"
            	style="text-align: center;
        		font-size: 1.5em;">
                <div class="big-box" style="height:843px;
        		line-height: 65px;
        		border: 2px solid gray;
                border-color: #bfa145;
        		margin: 5px;">
                <iframe src="<?php echo $screenLeap ?>" style="width: 690px; height: 843px; border-style: hidden;"></iframe>
                </div>                
                <br><br>
                <br><br>
            </div>
        </div>
    </div>
</div>
<!--                -----------------               DESKTOP VIEW         ----------------------                          -->

<!-- MOBILE VIEW -->
<div id="information" class="phoneContent ">
<div class="container" >
<div class="row" style="text-align: center; font-size: 1.5em;">
<div class="col-sm-7 col-md-8" >
  
        <div
                style="height: 420px;
                line-height: 65px;
                border: 2px solid gray;
                border-color: #bfa145;
                margin: 5px; overflow: hidden;">
                <div> 
                    <iframe scrolling="no" src="chat/login_users_only.php" style="width: 400px; height: 420px;"></iframe>
                </div>
        </div>

        <div 
                style="height: 420px;
                line-height: 65px;
                border: 2px solid gray;
                border-color: #bfa145;
                margin: 5px; overflow: auto;">

                <form method = "post" style="overflow:auto; overflow-x: hidden;">
                <h1 class="title"></h1>
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
                </div>
                <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Confirmed Email Address">
                </div>          

                <h3 style="color:#bfa145;">Service Address</h3>

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
          
           
                <h3 style="color:#bfa145;">Billing Address</h3>

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

        
        <div 
                class="big-box" style="height:843px;
                line-height: 65px;
                border: 2px solid gray;
                border-color: #bfa145;
                margin: 5px; overflow: auto;">
                <iframe src="<?php echo $screenLeap ?>" style="width: 690px; height: 843px; border-style: hidden;"></iframe>
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