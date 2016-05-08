<?php
   //start the session.
   session_start();

  require_once "db.conf";

   if(isset($_POST['submit'])){
    $_SESSION['login'] = false;


    $link = mysqli_connect($host, $user, $password, $database) or die("Connect Error ". mysqli_error($link));
    $sql = "SELECT password FROM user where username = ?";
    $_SESSION['user'] = $_POST['user'];
    if($stmt = mysqli_prepare($link, $sql)){
       mysqli_stmt_bind_param($stmt, "s", $_SESSION['user']);
       if(mysqli_stmt_execute($stmt)){
          mysqli_stmt_bind_result($stmt, $password);

          if(mysqli_stmt_fetch($stmt)!= NULL){

              if($_POST['pass'] == $password){
                     $_SESSION['login'] = true;
                     header("Location: home.php");
              }

          }

       }
       mysqli_stmt_close($stmt);
    }
   mysqli_close($link);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">

    <!-- JavaScript -->
    <script src="assets/js/jquery-1.12.3.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/myScript.js"></script>

</head>
<body >
    <br>
    <div class="container">
      <div class="col-md-5">
          <form role="form"  method="post" action="index.php" class="login_form">

            <h2>Please sign in</h2>
             <?php
                                     if( $_SESSION['login'] == false && isset($_POST['submit'])){
                                       echo "<div class='alert alert-danger'>";
                                       echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                       echo "<strong>Error!</strong> Invalid username or password.";
                                       echo "</div> ";

                                     }
                ?>
              <div class="input-group margin_input_group">
                 <span class="input-group-addon group-addon-myStyle"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                 <input type="text" name="user" class="form-control input-hover" placeholder="Username" autofocus>
              </div>

              <div class="input-group margin_input_group">
                <span class="input-group-addon group-addon-myStyle"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                <input type="password" name="pass" class="form-control input-hover" placeholder="Password">
              </div>
              <button class="btn btn-lg btn-block myButton" name = "submit" type="submit">Sign in</button>

          </form>
      </div>
    </div>
    <br>
    <hr>
     <div class="container">
        <div class="col-md-5">
         <p>Username: test</p>
          <p>Password: pass</p>
        </div>
         <p>For some reasons, I didn't add register functionalities. </p>
         <p>Use the information on the leftside to login.</p>
    </div>

</body>
</html>
