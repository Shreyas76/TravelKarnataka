<?php

$connect = mysqli_connect("localhost","root","","user");
session_start();

if(isset($_POST['insert']))
{
     //$fl_name = basename($_FILES["image"]["name"]);
     $tmp_file = $_FILES["image"]["tmp_name"];

  $file = addslashes(file_get_contents($tmp_file));

  $dist=$_POST['dist'];
  $type=$_POST['type'];
  $name=$_POST['name'];
  $review=$_POST['review'];
  $uploaded_by = $_SESSION['email'];

  $query="INSERT INTO table3 (`dist`,`type`,`name`,`images`,`review`,`uploaded_by`) VALUES ('$dist','$type','$name','$file','$review','$uploaded_by')";

  if(mysqli_query($connect, $query))  
      {  
           echo '<script>alert("The Place has been added!")</script>';  
      }
      else 
      {
          echo "Error description: " . mysqli_error($connect);
      }
}

mysqli_close($connect);

?>
<html>
<head>
<title>ADD PLACE</title>
<link rel="stylesheet" href="css/add.css">
<meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
  
  .dropdown-content a:hover {background-color:#FFD700}
  
  .dropdown:hover .dropdown-content {display: block; background-color: rgb(255, 254, 255);}
  
  .dropdown:hover .dropbtn {background-color: #fff;}

</style> 
</head>

<body>

<div class="w3-top">
        <div class="top-bar">
         <a href="home2.php" class="w3-bar-item w3-button" style="text-decoration:none"><b style="color:#fff">t<span style="color:#FFD700">K</span></b><span style="color:#fff"> travel</span><span style="color:#FFD700">KARNATAKA</span></a>
         <div class="w3-right w3-hide-small">

		
        <a href="home2.php" class="w3-bar-item w3-button" style="text-decoration:none"><i class="fa fa-home" style="font-size:15px; color:#FFD700"></i><span style="color:#FFD700;font-size:15px;">HOME</span></a>
          <a href="home2.php#most" class="w3-bar-item w3-button" style="text-decoration:none"><i class="fa fa-eye" style="font-size:15px; color:#FFD700"></i><span style="color:#FFD700;font-size:15px;">MOST VISITED</span></a>
        <a href="home2.php#contact" class="w3-bar-item w3-button" style="text-decoration:none"><i class="fa fa-envelope" style="font-size:15px;  color:#FFD700"></i><span style="color:#FFD700;font-size:15px;">CONTACT</span></a>
        <div class="dropdown" style="text-decoration:none">
  <button class="dropbtn" style="text-decoration:none"><i class="fa fa-user" style="font-size:15px; color:#FFD700"></i><span style="color:#FFD700;font-size:15px;"><?php echo $_SESSION['email'];?> </button></span></a>
  <div class="dropdown-content">
    <a href="photos.php">My Photos</a>
    <a href="account.php">Account Settings</a>
    <a href="logout.php">Logout</a>
  </div>
</div>
           </div>
        </div>
         
    </div>


    <div class="sign">
                <form method="post" enctype="multipart/form-data">
                <br><br><input  type="file" class="input-box" name="image" id="image" />
                 
                    <input type="text" class="input-box" name="dist" id = "dist" placeholder="District" /><br>

                    <select class="input-box" name="type"  id = "type">
                      <option value="" disabled selected><strong>Type of Place</strong></option>
                      <option value="1">TEMPLES</option>
                      <option value="2">WATERFALLS</option>
                      <option value="3">MONUMENTS</option>
                      <option value="4">BEACHES</option>
                      <option value="5">SANCTURIES</option>
                      <option value="6">GARDENS</option>
                      <option value="7">RIVERS & LAKES</option>
                      <option value="8">HILL STATIONS</option>
                    </select><br>

                     <input type="text" class="input-box" name="name" id = "name" placeholder="Place Name" /> <br>

                    
             
                     <input type="text" class="input-box" name="review" id = "review" placeholder="Write few sentences about the place" /><br>
                 
                      <input type="submit" name="insert" id="insert" class="but1" value="ADD" style="color:#000" />
                 
                  </form>
     </div>
</body>
</html>

<script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script> 


