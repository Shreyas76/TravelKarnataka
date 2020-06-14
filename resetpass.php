<?php

$con = mysqli_connect("localhost","root","","user");
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
$email = $_POST['email'];
$pass = $_POST['pass'];
$cpass = $_POST['confirmpass'];
  if($pass==$cpass){
  $query = "UPDATE users set pass='$cpass' where email='$email'";
  mysqli_query($con,$query);
  echo '<script>alert("Password changed Successfully")</script>';
  }
  else{
    echo '<script>alert("Both passwords do not match")</script>';
  }
}

?>

<html>
<head>
<title>RESET PASSWORD</title>
<link rel="stylesheet" href="css/signup.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
  <body>

    <div class="top">
      <h1><p><b>t<span style="color:#FFD700">K </span></b> travel<span style="color:#FFD700">KARNATAKA</span></p></h1>
  </div>

    <div class="sign">
     <img src="images/avatar.png">
      <h1>RESET PASSWORD</h1>
        <form action="resetpass.php" method="POST">
     <div class=input-box">
         <i class="fa fa-envelope-o"></i>
         <Input type="email" name="email" class="input-box" placeholder="Email id">
     </div>
     <div class=input-box">
       <i class="fa fa-key"></i>
         <Input type="password" name="pass" class="input-box" id="pass1" placeholder="New Password">
        </div>

        <div class=input-box">
            <i class="fa fa-key"></i>
              <Input type="password" name="confirmpass" class="input-box" id="pass" placeholder="Confirm Password">
              <input type="checkbox" onclick="myFunction()"><span style="color:#fff">Show Password</span>
             </div>
          
     
    
       <button type="submit" name="submit" class="sibtn" style="color:#000">Change Password</button>
      </form>
     </div>
     <script>
   function myFunction() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

</script>
   </body>
</html>