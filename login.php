<?php
	session_start();
	
?>
<html>
        <head>
             <title>Login</title>   
        <link rel="stylesheet" href="../bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="../bootstrap/3.3.5/css/bootstrap-theme.min.css"> 
        <link rel="stylesheet"  href="main.css">
        <link rel="stylesheet"  href="w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        </head>
        <style type="text/css">
            	.form-control:focus{
			border-color: #ff9900;
        		box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgb(255, 153, 0);
		}
        </style>
        <body>
            <header>
            </header>
            <nav class="w3-topnav w3-black">
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
                <div class="container"  id="container">
                        <div class="row" id="content">
                                <div class="col-md-4 col-sm-4 col-xs-3"></div>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                        <h2>Login</h2>
                                        <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                                                <div class="row form-group">
                                                                <input class='form-control' type="text" name="email" placeholder="E-mail">
                                                </div>
                                                <div class="row form-group">
                                                                <input class='form-control' type="password" name="password" placeholder="Password">
                                                </div>
                                                <div class="row form-group">
                                                                <input class=" btn btn-warning" type="submit" name="submit" value="Login"/>
                                                </div>
                                        </form>
                                </div>
                                                           
                            </div>
                        </div>
                    
<?php
    session_start();
    if(isset($_POST['submit'])) { // Was the form submitted?         
        $link = mysqli_connect("localhost", "root", "Thisistheultimatepassword1337", "mydb") or die ("Connection Error " . mysqli_error($link));
        $i = $_POST['email'];                      	
        $sql = "SELECT  password, id FROM user WHERE email ="." '".$i."' ";
        $stmt = mysqli_query($link, $sql);
        if ($result = mysqli_fetch_assoc($stmt)){
            $hashed = $result['password'];
            $j = $result['id'];
        }
        if (password_verify($_POST['password'], $hashed)){
             echo 'Password is valid!'; 
                $_SESSION['id'] = $j;
                $_SESSION['email'] = $i;
                header('Location: /page4.php');
            }
        } else if(!empty($_POST['email'])) {
            echo 'Invalid password.';     
        }
       
            ?>

                </div>
        </body>
</html>
                                
