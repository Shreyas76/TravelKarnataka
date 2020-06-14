<?php
$con = mysqli_connect("localhost","root","","user");
session_start();
$uploaded_by = $_SESSION['email'];
$query = "SELECT * FROM table3 where type='6'";  
$result = mysqli_query($con, $query);  
echo '<br><br>
<h2 style="text-align:center;color:#FFD700;">GARDENS</h2>'; 

while($res = mysqli_fetch_array($result))  
                {	
                  echo ' <div class="most" id="most">';
                    echo '<div class="w3-half w3-container w3-margin-bottom w3-margin-top"style="width:50%">';
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($res['images'] ).'" height="250" width="500" class="img-thumnail" /> ';
                    echo '</div>' ;
                    echo '<div class="w3-container w3-white w3-margin-bottom w3-margin-top w3-margin-right" style="width:100%" style="background-color:black;">';
                    echo '<br><b><span style="color:#000000;font-family:Lucida Bright;font-size:20px;text-transform:uppercase">'.$res['name'].'</span></b>';
                    echo '<div class="w3-container w3-white w3-margin-bottom w3-margin-top w3-margin-right"><br>';
                    echo '<span style="color:#2B2D2F">'.$res['review'].'</span>';
                    echo ' </div>';
                    echo '</div>'; 
                    echo '</div>';
              
     }
     
   
     echo '<br><br>';  
?>
<html>
<head>
<title>Gardens</title>
<meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
       <link rel="stylesheet" href="css/display.css">
       <link rel="stylesheet" href="flaticon.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <script src='https://kit.fontawesome.com/a076d05399.js'></script>
       <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
.top-bar{
    background: #0b0c10;
    text-decoration: none;
    padding:5px;

}
.dropbtn {
    opacity: 0.75;
    background-color: #0b0c10;
    padding: 5px;
    font-size: 15px;
    border: none;
  }
  
  .dropdown {
    position: relative;
    display: inline-block;
  }
  
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #ffffff;
    text-decoration: none;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }
  
  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }
  
  .dropdown-content a:hover {background-color:#FFD700;}
  
  .dropdown:hover .dropdown-content {display: block; background-color: rgb(255, 254, 255);}
  
  .dropdown:hover .dropbtn {background-color: #ffffff;}

</style> 
</head>

<body style="background-color:#0b0c10">

<div class="w3-top">
        <div class="top-bar" >
         <a href="home2.php" class="w3-bar-item w3-button" style="text-decoration:none"><b style="color:#fff">t<span style="color:#FFD700">K</span></b><span style="color:#FFF"> travel</span><span style="color:#FFD700">KARNATAKA</span></a>
         <div class="w3-right w3-hide-small">

		
        <a href="home2.php" class="w3-bar-item w3-button" style="text-decoration: none;"><i class="fa fa-home" style="font-size:15px; color:#FFD700"></i><span style="color:#FFD700;font-size:15px;">HOME</span></a>
        <a href="add.php" class="w3-bar-item w3-button" style= "text-decoration: none;"><i class="fa fa-eye" style="font-size:15px; color:#FFD700"></i><span style="color:#FFD700;font-size:15px;">ADD PLACE</span></a>
		<a href="home2.php#most" class="w3-bar-item w3-button" style= "text-decoration: none;"><i class="fa fa-eye" style="font-size:15px; color:#FFD700"></i><span style="color:#FFD700;font-size:15px;">MOST VISITED</span></a>
        <a href="home2.php#contact" class="w3-bar-item w3-button" style="text-decoration: none;"><i class="fa fa-envelope" style="font-size:15px;  color:#FFD700"></i><span style="color:#FFD700;font-size:15px;">CONTACT</span></a>
        <div class="dropdown">
  <button class="dropbtn"><i class="fa fa-user" style="font-size:15px; color:#FFD700"></i><span style="color:#FFD700;font-size:15px;"><?php echo $_SESSION['email'];?> </button></span></a>
  <div class="dropdown-content">
  <a href="photos.php">My Photos</a>
    <a href="#">Account Settings</a>
    <a href="logout.php">Logout</a>
  </div>
</div>
           </div>
        </div>
         
    </div>
    
    </body>
    </html>