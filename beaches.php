<?php
$con = mysqli_connect("localhost","root","","user");
$query = "SELECT * FROM table3 where type='4'";  
$result = mysqli_query($con, $query);
echo '<br><br>
<h2 style="text-align:center;color:#FFD700;">BEACHES</h2>';   

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
   <title>Beaches</title>
       <link href="css/home.css" rel="stylesheet">
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
       <link rel="stylesheet" href="flaticon.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <script src='https://kit.fontawesome.com/a076d05399.js'></script>
       <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
       <style>
         .top-bar{
    background: #0b0c10;
    text-decoration: none;
    padding:5px;

}
</style>
  </head>

    <body>

    <div class="w3-top">
        <div class="top-bar">
         <a href="home.php" class="w3-bar-item w3-button"><b style="color:#fff">t<span style="color:#FFD700">K</span></b><span style="color:#fff"> travel</span><span style="color:#FFD700">KARNATAKA</span></a>
            <div class="w3-right w3-hide-small">
		
		<a href="home.php#home" class="w3-bar-item w3-button"><i class="fa fa-home" style="font-size:12px; color:#FFD700"></i><span style="color:#FFD700;font-size:12px;">HOME</span></a>
        <a href="home.php#most" class="w3-bar-item w3-button"><i class="fa fa-eye" style="font-size:12px; color:#FFD700"></i><span style="color:#FFD700;font-size:12px;">MOST VISITED</span></a>
        <a href="login.php" class="w3-bar-item w3-button"><i class="fa fa-camera-retro" style="font-size:12px; color:#FFD700"></i><span style="color:#FFD700;font-size:12px;">ADD PLACE</span></a>
        <a href="home.php#contact" class="w3-bar-item w3-button"><i class="fa fa-envelope" style="font-size:12px;  color:#FFD700"></i><span style="color:#FFD700;font-size:12px;">CONTACT</span></a>
	    <a href="login.php" class="w3-bar-item w3-button"><i class="fa fa-user" style="font-size:12px; color:#FFD700"></i><span style="color:#FFD700;font-size:12px;">LOGIN</span></a>
	 
           </div>
        </div>
    </div>
</body>
</html>
