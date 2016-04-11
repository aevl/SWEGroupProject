<?php
	session_start();
	if(!isset($_SESSION['email'])){
		echo"You are not logged in, redirecting";
		header('Location: http://pikachu-swacy.centralus.cloudapp.azure.com/login.php');
	}
	
	if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
           $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
           header('Location: ' . $url);
	}
	
?>
<html>
	<head>
		<title> User Page </title>
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
				<center><h1>Your Profile</h1></center>
			</div>
<?php
$i = $_SESSION['email'];
$link = mysqli_connect("pikachu-swacy.centralus.cloudapp.azure.com", "general", "Thisistheultimatepassword1337", "mydb") or die ("Connection Error " . mysqli_error($link));
$sql = "SELECT first_name, last_name, bio, industry, location, picture from User WHERE email = 'i'";
$stmt = mysqli_query($link, $sql);
$result= mysqli_fetch_assoc($stmt); 

$first_name= $result[first_name];
$last_name= $result[last_name];
$bio= $result[bio];
$industry= $result[industry];
$location= $result[location];
$picture= $result[picture];

echo "$first_name";
echo "$last_name";
echo "$bio";
echo "$industry";
echo "$location";
<img src="<?echo $picture;?>">

?>
</html>