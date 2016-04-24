<?php
session_start();
$userId = $_SESSION["user_id"];
if(is_null($userId))
  $userId = 0;
echo $userId;

$conn = new mysqli("localhost", "root", "Thisistheultimatepassword1337");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT first_name, last_name, email, bio, picture, location, industry FROM user WHERE id = ".$userId." LIMIT 1";
if($result = mysqli_query($conn, $sql)){
	echo "here";
	$row = mysqli_fetch_row($result);
}
echo $row[0];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>User Home Page</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="profile.css">
  </head>
  <body>
    <div class="header-user-home">
        <a class="header-homebutton" href="">Home</a>
        <ul class="header-rightbuttons">
          <li class="header-button-inline">Messages</li>
          <li class="header-button-inline">Logout</li>
        </ul>
    </div>
    <div class="container-fluid">

      <!-- Content goes here -->
      <div class="row mycontainer-content">
        <!-- Left thinner column -->
        <div class="col-md-4">
          <h3>Name goes here</h3>
          <img src="" alt="..." class="img-rounded img-profile img-responsive">
          <button type="submit" class="btn btn-default">Update Profile</button>
          <div class="profile-text">
            <input type="text" class="form-control" placeholder="Location goes here" value="Location from database">
          </div>
          <div class="profile-text">
            <input type="text" class="form-control" placeholder="Language goes here" value="Language from database">
          </div>
          <div class="profile-text">
            <input type="text" class="form-control" placeholder="Bio goes here" value="Bio from database">
          </div>
        </div>

        <!-- Right thicker column -->
        <div class="col-md-8">

          <h3>Published Posts</h3>
          <button type="submit" class="btn btn-default inline right">Create Post</button>
          <div class="mycontainer-scrollable">
            <!-- items get placed here otherwise some indicator of no items -->
          </div>

          <div class="row">
            <div class="col-md-6">
              <h3>Education</h3>
              <div class="mycontainer-scrollable">
                <!-- items get placed here otherwise some indicator of no items -->
              </div>
            </div>
            <div class="col-md-6">
              <h3>Skills</h3>
              <div class="mycontainer-scrollable">
                <!-- items get placed here otherwise some indicator of no items -->
              </div>
            </div>
            <div class="col-md-6">
              <h3>Organizations</h3>
              <div class="mycontainer-scrollable">
                <!-- items get placed here otherwise some indicator of no items -->
              </div>
            </div>
            <div class="col-md-6">
              <h3>Experience</h3>
              <div class="mycontainer-scrollable">
                <!-- items get placed here otherwise some indicator of no items -->
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  </body>
</html>

