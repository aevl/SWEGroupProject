<?php
	session_start();
?>
<!DOCTYPE html>
<html><!--Sign-up Page (PCFp)-->
	<head> <!--Head-->
		<title>Register</title>
		<link rel="stylesheet" href="../bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="../bootstrap/3.3.5/css/bootstrap-theme.min.css"> 
 		<link rel="stylesheet"  href="main.css">
 		<link rel="stylesheet"  href="w3.css">
 		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	</head>
	<style type="text/css">
		.form-control:focus{
			border-color: #0099ff;
        		box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgb(0, 153, 255);
		}
	</style>
	<body> <!--Body-->
		<!--Header-->
		<header>

		</header>
		<!--Nav Bar-->
		<nav class="w3-topnav w3-blue">
			<div>
				<ul class="nav navbar-nav">
					<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				</ul>
			</div>
		   <div class="pull-right">
		   	<ul class="nav navbar-nav">
		   		<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
        		<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
           </div>
		</nav>
		<!--Sign-up Form-->
<?php		if(isset($_POST['submit'])) { // Was the form submitted?
        	$link = mysqli_connect("localhost", "root", "Thisistheultimatepassword1337", "mydb") or die ("Connection Error " . mysqli_error($link));
                $sql = "INSERT INTO user(first_name, last_name, password, email, bio, location, industry, salt) VALUES(?,?,?,?,?,?,?,?)"; 
                if ($stmt = mysqli_prepare($link, $sql)) {
                    $fname = $_POST['fname'];
					$lname = $_POST['lname'];
					$email = $_POST['email'];
                    $_SESSION['email'] = $email;
                    $bio = $_POST['bio'];
                
                    $location = $_POST['location'];
                    $industry = $_POST['industry'];
	                		$salt = mt_rand();
					$password = password_hash($salt.$_POST['pass'], PASSWORD_BCRYPT)  or die("bind param");
					//echo "before bind";
                    mysqli_stmt_bind_param($stmt, "ssssssss", $fname, $lname, $password, $email, $bio, $location, $industry, $salt) or die("bind param");
                    //echo "after bind";
		if(mysqli_stmt_execute($stmt)) {
                      		  echo "<h4><b><center>Success</center></b></h4>";
				//this redirects to user.php - but still need to log in
				 $idsql = "SELECT id FROM user WHERE email ='$email'";
				if($stmt2 = mysqli_query($link, $idsql)){
					while($idresult = mysqli_fetch_assoc($stmt2)){
					$_SESSION['user_id'] = $idresult['id'];
					}
				
				}
 				
				header('location: page4.php');
                    } else {
                    	echo "<h4><b><center>Failed</center></b></h4>";
						printf("<b><center>Error: %s</center></b>.\n", mysqli_stmt_error($stmt));
					}
                $result = mysqli_stmt_get_result($stmt);
                }
            } 
            else { ?>
			<div class="jumbotron">
				<center><h1>Register for a New Account</h1></center>
				<br><br>
			<div class="container">
				<form action="<?=$_SERVER['PHP_SELF']?>" role="form" method="POST"> <!-- formElement -->
				  <!--Fname-->
				  	<div class="row form-group">
				  		<label class="control-label col-md-2" for="fname">First Name:</label>
				  		<div class="col-md-10">
				  		<input type="text" required class="form-control" id="fname" name="fname">
				  		</div>
				  	</div>
				  <!--Lname-->
				  	<div class="row form-group">
				  		<label class="control-label col-md-2" for="lname">Last Name:</label>
				  		<div class="col-md-10">
				  			<input type="text" required class="form-control" id="lname" name="lname">
			  			</div>
				  	</div>
                    <!--Email-->
				  	<div class="row form-group">
				  		<label class="control-label col-md-2" for="email">E-Mail:</label>
				  		<div class="col-md-10">
				  		<input type="email" required class="form-control" id="email" name="email">
				  		</div>
				  	</div>
                    <!--Password-->
					<div class="row form-group">
						<label class="control-label col-md-2" for="pass">Password:</label>
						<div class="col-md-10">
						<input type="password" required class="form-control" id="pass" name="pass">
						</div>
					</div>
                     <!-- Bio -->
				  	<div class="row form-group">
						<label class="control-label col-md-2" for="bio"> Bio: </label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="bio" name="bio">
						</div>
					</div>
				  <!--Location-->
				  	<div class="row form-group">
				  		<label class="control-label col-md-2" for="location">Location:</label>
				  		<div class="col-md-10">
				  			<input type="text" class="form-control" id="location" name="location">
				  		</div>
				  	</div>
				  <!--Industry-->
				  	<div class="row form-group">
				  		<label class="control-label col-md-2" for="industry">Industry:</label>
				  		<div class="col-md-10">
				  			<input type="text" required class="form-control" id="industry" name="industry">
				  		</div>
						<br><br>
				  		<div class="col-md-8">
						<input type='file' name='UploadImage'>
				  		</div>
					<br><br>
				  <!--Submit-->
				 	<div class="row form-group">
				 		<button type="submit" class="btn btn-primary btn-block" name="submit">Create Account</button>
				 	</div>
				</form> <!-- end formElement -->
                <!--Profile Photo-->    
                <!--<form method='POST' action='UploadImage.php' enctype="multipart/form-data">
                    <input type='file' name='UploadImage'>
                    <input type='submit' value="submit">
                </form>    
			
			</div><!--End input Form-->
	
			<!--PHP for signup-->
<?php	}     ?>

	</div>


		<!--Credits & Links @ bottom-->
			
	</body>
</html> 
