<?php
$con = mysqli_connect("localhost","root","","user");
$query = "SELECT * FROM table3 where type='2'";  
$result = mysqli_query($con, $query);  

while($res = mysqli_fetch_array($result))  
                {	
                  echo ' <div class="most" id="most">';
                    echo '<div class="w3-half w3-container w3-margin-bottom w3-margin-top"style="width:50%">';
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($res['images'] ).'" height="250" width="500" class="img-thumnail" /> ';
                    echo '</div>' ;
                    echo '<div class="w3-container w3-white w3-margin-bottom w3-margin-top w3-margin-right" style="width:100%" style="background-color:black;">';
                    echo '<b><span style="color:#ff545a">'.$res['name'].'</span></b>';
                    echo '<div class="w3-container w3-white w3-margin-bottom w3-margin-top w3-margin-right"><br><br>';
                    echo '<b><span style="color:#ff545a">'.$res['review'].'</span></b>';
                    echo ' </div>';
                    echo '</div>'; 
                    echo '</div>';
      echo '<br>' ;   
      echo '<hr>';           
     }
     
   
     echo '<br><br>';  
?>


<html>
<head>
  <title>display img</title>
  <link href="display.css" rel="stylesheet">
       <meta charset="UTF-8">
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
</body>
</html>
