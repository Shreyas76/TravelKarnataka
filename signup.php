<?php
session_start();
$res = mysqli_connect('localhost','root','');
mysqli_select_db($res,'user');
if($_SERVER['REQUEST_METHOD']=="POST"){
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$s = "select * from users where email = '$email'";
$result = mysqli_query($res,$s);
$num = mysqli_num_rows($result);
if($num==1){
    echo '<script>alert("An account with that email already exists. Try Again!")</script>';
}
else{
    $reg = "insert into users(name,email,pass) values('$name','$email','$pass')";
    mysqli_query($res,$reg);
    echo '<script>alert("User Registered Successfully")</script>';
    
}
}
?>

<html>
<head>
<title>Sign Up</title>
<link rel="stylesheet" href="css/signup.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
  <body>

    <div class="top">
      <h1><p style="color:#000"><b>t<span style="color:#FFD700">K </span></b><span style="color:#000"> travel</span><span style="color:#FFD700">KARNATAKA</span></p></h1>
  </div>

    <div class="sign">
     <img src="images/avatar.png">
      <h1>SIGN UP</h1>
        <form action="signup.php" method="POST">
<div class=input-box">
         <i class="fa fa-user-o"></i>
         <Input type="name" class="input-box" required name="name" placeholder="Username">
     </div>
     <div class=input-box">
         <i class="fa fa-envelope-o"></i>
         <Input type="email" name="email" class="input-box" required placeholder="Email id">
     </div>
     <div class=input-box">
       <i class="fa fa-key"></i>
         <Input type="password" name="pass" id="pass" class="input-box" required placeholder="Password">
         <input type="checkbox" onclick="myFunction()"><span style="color:#fff">Show Password</span>
        </div>

       <button type="submit" class="sibtn" style="color:#000">Sign up</button>
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