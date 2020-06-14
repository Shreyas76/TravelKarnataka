<?php
$con = mysqli_connect("localhost","root","","user");
session_start();
$uploaded_by = $_SESSION['email'];
$query = "SELECT name,pass from users where email='$uploaded_by'";
$result = mysqli_query($con,$query);
$res = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Account Details</title>
	<link rel="stylesheet" href="css/account.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="top">
      <h1><p><b>t<span style="color:#38d39f">K </span></b> travel<span style="color:#38d39f">KARNATAKA</span></p></h1>
  </div>
	<img class="wave" src="images/wave.png">
	<div class="container">
		<div class="img">
			<img src="images/bg">
		</div>
		<div class="login-content">
			<form action="index.html">
				<img src="images/avatar.png">
				<h3 class="title">Account Details</h3>
           		<div class="input-div one">
           		   <div class="div">
           		   		<h5><?php echo '<span style="color:#38d39f">Username</span> : '.$res['name'].'';?></h5>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div id="abc" class="div">
           		    	<h5><?php echo '<span style="color:#38d39f">Email</span> : '.$_SESSION['email'].'';?></h5>
            	   </div>
				</div>
           		   

            	<input type="button" onClick="location.href='resetpass.php'" class="btn" value="Change Password">
				<input type="button" onClick="location.href='logout.php'" class="btn" value="LOGOUT">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>