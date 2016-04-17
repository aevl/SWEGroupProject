<?php
	session_start();
	if(!isset($_SESSION['id'])){
		echo"You are not logged in, redirecting";
		header('Location: http://pikachu-swacy.centralus.cloudapp.azure.com/login.php');
	}
	
	$link = mysqli_connect("pikachu-swacy.centralus.cloudapp.azure.com", "general", "Thisistheultimatepassword1337", "mydb") or die ("Connection Error " . mysqli_error($link));
	$i = $_SESSION['id'];
	$sql = "SELECT first_name, last_name, password, bio, picture, location, industry FROM user WHERE id = '$i'";        
	$stmt = mysqli_query($link, $sql); 
	$result= mysqli_fetch_assoc($stmt);

?>
<html>
	<head>
		<title>Edit Page</title>
		<link rel="stylesheet" href="../bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="../bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="w3.css">
		<link rel="stylesheet" href="https://fonts.googleeapis.com/icon?family=Material+Icons">
	</head>
	<style type="text/css">
	.form-control:focus{
			border-color: #ff9900;
        		box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgb(255, 153, 0);
		}
	
	</style>
	<body>
		<header class="w3-topnav w3-black">
			<p class="header"><center><?php $j = $_SESSION['email']; echo '<h1>' . "Welcome $j" . '</h1>';?></center></p>
		</header>
		
		<nav class="w3-topnav w3-black">
			<div>
			<ul class="nav navbar-nav">
				<li><a href="http://pikachu-swacy.centralus.cloudapp.azure.com/user.php"><span class="glyphicon glyphicon-user"></span> User Page </a></li></ul>
			</div>
			
			<div class="pull-right">
			<ul class="nav navbar-nav">
			<li><a href="http://pikachu-swacy.centralus.cloudapp.azure.com/logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
			</ul>
			</div>

</nav>

<div class="jumbotron">
				<center><h1>Edit Your Profile</h1></center>
			</div>
			<div class="container">
				<form action="<?=$_SERVER['PHP_SELF']?>" role="form" method="POST"> <!-- formElement -->
				  <!--Fname-->
				  	<div class="row form-group">
				  		<label class="control-label col-md-2" for="fname">First Name:</label>
				  		<div class="col-md-10">
				  		<input type="text" class="form-control" id="fname" name="fname" placeholder="<?=$result['first_name']?>">
				  		</div>
				  	</div>
				  <!--Lname-->
				  	<div class="row form-group">
				  		<label class="control-label col-md-2" for="lname">Last Name:</label>
				  		<div class="col-md-10">
				  			<input type="text" class="form-control" id="lname" name="lname" placeholder="<?=$result['last_name']?>">
			  			</div>

				  	</div>
				  <!--Password-->
				  	<div class="row form-group">
				  		<label class="control-label col-md-2" for="email">E-Mail:</label>
				  		<div class="col-md-10">
				  		<input type="password" class="form-control" id="password" name="password" placeholder="<?=$result['password']?>">
				  		</div>
				  	</div>
				  <!--Bio-->
				  	<div class="row form-group">
				  		<label class="control-label col-md-2" for="bio">Bio:</label>
				  		<div class="col-md-10">
				  			<input type="text"class="form-control" id="bio" name="bio" placeholder="<?=$result['bio']?>">
				  		</div>
					<br>
					<br>
                        <!--Industry-->
				  	<div class="row form-group">
				  		<label class="control-label col-md-2" for="industry">Bio:</label>
				  		<div class="col-md-10">
				  			<input type="text"class="form-control" id="industry" name="industry" placeholder="<?=$result['industry']?>">
				  		</div>
					<br>
					<br>
                        <!--Location-->
				  	<div class="row form-group">
				  		<label class="control-label col-md-2" for="location">Bio:</label>
				  		<div class="col-md-10">
				  			<input type="text"class="form-control" id="location" name="location" placeholder="<?=$result['location']?>">
				  		</div>
					<br>
					<br>
				  <!--Submit-->
				 	<div class="row form-group">
				 		<button type="submit" class="btn btn-warning btn-block" name="submit">Submit</button>
				 	</div>
				</form> <!-- end formElement -->
			
			</div><!--End input Form-->


<?php	
		if(isset($_SESSION['id'])) {
				
                $fname = $_POST['fname'];
		$lname = $_POST['lname'];
                $password = $_POST['password'];
                $bio = $_POST['bio'];
		$industry = $_POST['industry'];
                $location = $_POST['location'];

                $link = mysqli_connect("pikachu-swacy.centralus.cloudapp.azure.com", "general", "Thisistheultimatepassword1337", "mydb") or die ("Connection Error " . mysqli_error($link));
				
                $sql2 = "UPDATE user SET first_name =? WHERE id = ?";
		$sql3 = "UPDATE user SET last_name =? WHERE id = ?";
		$sql4 = "UPDATE user SET password =? WHERE id =?";
		$sql5 = "UPDATE user SET bio =? WHERE id =?";
                $sql6 = "UPDATE user SET industry =? WHERE id =?";
                $sql7 = "UPDATE user SET location =? WHERE id =?";
                                               
				if(isset($_POST['fname'])){
					if ($stmt = mysqli_prepare($link, $sql2)) {
						mysqli_stmt_bind_param($stmt, "ss",$fname,$id) or die("bind param1");
						if(mysqli_stmt_execute($stmt)) {
                            echo "<h4>Successfully updated First Name.</h4>";
                        }	
						else {
                             echo "<h4>Failed</h4>";
						}
						
					}								
                                                
                }
				if(isset($_POST['lname'])){
					if ($stmt2 = mysqli_prepare($link, $sql3)) {
						mysqli_stmt_bind_param($stmt2, "ss",$lname,$id) or die("bind param2");
						if(mysqli_stmt_execute($stmt2)) {
                            echo "<h4>Successfully updated Last Name.</h4>";
                        }	
						else {
                             echo "<h4>Failed</h4>";
						}
						
					}								
                                                
                }
				if(isset($_POST['password'])){
					if ($stmt4 = mysqli_prepare($link, $sql4)) {
						mysqli_stmt_bind_param($stmt4, "ss",$password,$id) or die("bind param3");
						if(mysqli_stmt_execute($stmt4)) {
                            echo "<h4>Successfully updated password.</h4>";
                        }	
						else {
                             echo "<h4>Failed</h4>";
						}
						
					}								
                                                
                }
				if(isset($_POST['bio'])){
					if ($stmt5 = mysqli_prepare($link, $sql5)) {
						mysqli_stmt_bind_param($stmt5, "ss",$bio,$id) or die("bind param4");
						if(mysqli_stmt_execute($stmt5)) {
                            echo "<h4>Successfully updated Bio.</h4>";
                        }	
						else {
                             echo "<h4>Failed</h4>";
						}
						
					}								
                                                
                }
                if(isset($_POST['industry'])){
					if ($stmt6 = mysqli_prepare($link, $sql6)) {
						mysqli_stmt_bind_param($stmt5, "ss",$industry,$id) or die("bind param5");
						if(mysqli_stmt_execute($stmt5)) {
                            echo "<h4>Successfully updated Industry.</h4>";
                        }	
						else {
                             echo "<h4>Failed</h4>";
						}
						
					}								
                                                
                }
                if(isset($_POST['location'])){
					if ($stmt7 = mysqli_prepare($link, $sql7)) {
						mysqli_stmt_bind_param($stmt7, "ss",$location,$id) or die("bind param6");
						if(mysqli_stmt_execute($stmt7)) {
                            echo "<h4>Successfully updated Location.</h4>";
                        }	
						else {
                             echo "<h4>Failed</h4>";
						}
						
					}								
                                                
                }
        }         						
		else {
           die("failed");
        }
                                

?>
