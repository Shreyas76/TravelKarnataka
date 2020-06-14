<?php

$con = mysqli_connect('localhost','root','','user');
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
session_start();
if(isset($_POST['send'])){
	$name = $_POST['Name'];
	$email = $_POST['Email'];
	$subject = $_POST["Subject"];
	$message = $_POST["Message"];
	echo $name . $email . $subject;
	$mail = new PHPMailer(true);
	try {
		$mail->SMTPDebug = 0;              
		$mail->isSMTP();                        
		$mail->Host       = 'smtp.gmail.com';                    
		$mail->SMTPAuth   = true;                          
		$mail->Username   = 'travelkarnataka17@gmail.com';
		$mail->Password   = 'wpproject123';         
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		$mail->Port       = 587;                                  
		$mail->setFrom($email, $name);
		$mail->addAddress('travelkarnataka17@gmail.com','Travel Karnataka'); 
		$mail->isHTML(true);                 
		$mail->Subject = $subject;
		$mail->Body    = "Customer Name: $name <br/>Customer Email: $email <br /> Customer Message: $message";
		$mail->send();
		echo '<script>alert("Message has been sent")</script>';
	} catch (Exception $e) {
		echo '<script>alert("Message could not be sent. Mailer Error: {'.$mail->ErrorInfo.'}")</script>';
	}
	}

$output  ='';
if(isset($_POST['submit'])){
	$searchq =$_POST['query'];
	$query = "SELECT name,images,dist,review FROM table3 where name like '%$searchq%' or dist like '%$searchq%' group by name";
	$result = mysqli_query($con,$query);
	$count= mysqli_num_rows($result);
	if($count==0){
		echo '<script>alert("There is no such place.. Want to Add a new place?")</script>';
	}
	else{
		while($row = mysqli_fetch_array($result)){
			echo '<br> <div class="most" id="most">';
                    echo '<div class="w3-half w3-container w3-margin-bottom w3-margin-top"style="width:50%">';
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($row['images'] ).'" height="250" width="500" class="img-thumnail" /> ';
                    echo '</div>' ;
                    echo '<div class="w3-container w3-white w3-margin-bottom w3-margin-top w3-margin-right" style="width:100%" style="background-color:black;">';
                    echo '<br><b><span style="color:#000;font-family:Lucida Bright">'.$row['name'].'</span></b>';
                    echo '<div class="w3-container w3-white w3-margin-bottom w3-margin-top w3-margin-right"><br>';
                    echo '<b><span style="color:#000;font-family:Lucida Bright">'.$row['review'].'</span></b>';
                    echo ' </div>';
                    echo '</div>'; 
                    echo '</div>';            
     } 	
	}
	}
?>

<html>
 <head>
   <title>Travel Karnataka</title>
	   <link href="css/home.css" rel="stylesheet">
	   <link href="css/display.css" rel="stylesheet">
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
       <link rel="stylesheet" href="flaticon.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <script src='https://kit.fontawesome.com/a076d05399.js'></script>
       <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
  </head>

    <body>
    

    <div class="w3-top">
        <div class="top-bar">
		<a href="#home" class="w3-bar-item w3-button"><b style="color:#fff">t<span style="color:#FFD700">K</span></b><span style="color:#fff"> travel</span><span style="color:#FFD700">KARNATAKA</span></a>
            <div class="w3-right w3-hide-small">

		
		 <a href="#home" class="w3-bar-item w3-button"><i class="fa fa-home" style="font-size:12px; color:#FFD700"></i><span style="color:#FFD700;font-size:12px;">HOME</span></a>
        <a href="#most" class="w3-bar-item w3-button"><i class="fa fa-eye" style="font-size:12px; color:#FFD700"></i><span style="color:#FFD700;font-size:12px;">MOST VISITED</span></a>
        <a href="add.php" class="w3-bar-item w3-button"><i class="fa fa-camera-retro" style="font-size:12px; color:#FFD700"></i><span style="color:#FFD700;font-size:12px;">ADD PLACE</span></a>
        <a href="#contact" class="w3-bar-item w3-button"><i class="fa fa-envelope" style="font-size:12px;  color:#FFD700"></i><span style="color:#FFD700;font-size:12px;">CONTACT</span></a>
	    <div class="dropdown">
  <button class="dropbtn"><i class="fa fa-user" style="font-size:15px; color:#FFD700"></i><span style="color:#FFD700;font-size:12px;"><?php echo $_SESSION['email'];?> </button></span></a>
  <div class="dropdown-content">
    <a href="photos.php">My Photos</a>
    <a href="account.php">Account Settings</a>
    <a href="logout.php">Logout</a>
  </div>
</div>
           </div>
        </div>
         
    </div>
    
    <div class="header" id="home">
	<form action = "home2.php" method = "POST">
            <h1><span style="font-family:Lucida Bright;font-style: italic;color:#fff; font-size:200%;">One State. Many Worlds.<span style="color:#ff545a"></span></h1><br />
             <div class="form-box" style="text-align:center">
		    <input type="text" name = "query" class="search-field b"
			 placeholder="Enter Name of Place to Search" >
			<input type="submit" class="search-btn"  value = "Search" style="color:#000" name = "submit" style="font-size:20px"/>
            </div>
          </form>
		</div>  


    <section id="list-topics" class="list-topics">
			<div class="container" >
				<div class="list-topics-content">
					<ul>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="fa fa-gopuram" style="font-size:30px;"></i>
								</div>
								<h4><a href="temples2.php" style="text-decoration: none">TEMPLES</a></h4>
								
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="fa fa-monument" style="font-size:30px;"></i>
								</div>
								<h4><a href="monuments2.php" style="text-decoration: none">MONUMENTS</a></h4>
								
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="fas fa-water" style="font-size:30px;"></i>
								</div>
								<h4><a href="waterfalls2.php" style="text-decoration: none">WATERFALLS</a></h4>
							
							</div>
						</li>
						
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="fas fa-mountain" style="font-size:30px;" ></i>
								</div>
								<h4><a href="hills2.php" style="text-decoration: none">HILL STATIONS</a></h4>
								
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="fas fa-paw" style="font-size:30px;"></i>
								</div>
								<h4><a href="sanctury2.php" style="text-decoration: none">SANCTURIES</a></h4>
								
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="fas fa-dove" style="font-size:30px;"></i>
								</div>
								<h4><a href="gardens2.php" style="text-decoration: none">GARDENS</a></h4>
								
							</div>
						</li>

                            <li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class='fas fa-swimmer' style='font-size:30px;'></i>
								</div>
								<a href="lakes2.php" style="text-decoration: none"><h4>RIVERS & LAKES</a></h4></a>
						
							</div>

						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="fas fa-umbrella-beach " style="font-size:30px;" ></i>
								</div>
								<h4><a href="beaches2.php" style="text-decoration: none">BEACHES</a></h4>
								
							</div>
						</li>
					</ul>
				</div>
			</div>
		</section>

       
		<h1 class="w3-center" style="color:#FFD700"><b>MOST VISITED PLACES</b></h1>	

 
 
  <div class="most" id="most">
	<hr  class="line">
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="images/hamp.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity" height="280" width="300">
      <div class="w3-container" style="background-color:#0b0c10">
        <p><b><span style="color:#FFD700">HAMPI</span></b></p>
        <p style="color:#fff">Chariot was built in the period of King Krishnadevaraya of Tulu Dynasty.It was Built in a single Monolithic stone.It is one of the beautiful place in Karnataka.</p>
	  <p><span style="color:#FFD700">Visitors: </span><span style="color:#FFD700"><i class="fa fa-eye"></i>5.5 lakh+</span></p>
	</div>
    </div>
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="images/mypal.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity"  height="280" width="300">
      <div class="w3-container" style="background-color:#0b0c10">
        <p><b><span style="color:#FFD700">MYSORE PALACE</span></b></p>
		<p style="color:#fff">Palace is one of the attractive places in Mysore.The chief Engineer who built Palace was Lord Irwin.The Palace was Built in 1912.</p>
		<p><span style="color:#FFD700">Visitors: </span><span style="color:#FFD700"><i class="fa fa-eye"></i>60 lakh+</span></p>
      </div>
    </div>
    <div class="w3-third w3-container">
      <img src="images/ZOO.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity"  height="280" width="300">
      <div class="w3-container" style="background-color:#0b0c10">
        <p><b><span style="color:#FFD700">MYSORE ZOO</span></b></p>
		<p style="color:#fff">Mysore Zoo is one of the oldest and most popular in India.Mysore Zoo was created in 1892.Most rare animals can be found in this zoo.One must visit this.</p>
		<p><span style="color:#FFD700">Visitors: </span><span style="color:#FFD700"><i class="fa fa-eye"></i>31 lakh+</span></p>
      </div>
	</div>
  </div>

  <div class="most">
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="images/jog.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity" height="280" width="280">
      <div class="w3-container" style="background-color:#0b0c10">
        <p><b><span style="color:#FFD700">JOG FALLS</span></b></p>
        <p style="color:#fff">Jog Falls is located near Jog Village in Sagara, Karnataka which is a part of Shimoga district.
	        It is the second highest plunge waterfalls in India.</p>
			<p><span style="color:#FFD700">Visitors: </span><span style="color:#FFD700"><i class="fa fa-eye"></i>10 lakh+</span></p>
      </div>
    </div>
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="images/gol.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity"  height="280" width="280">
      <div class="w3-container" style="background-color:#0b0c10">
        <p><b><span style="color:#FFD700">GOL GUMBAZ</span></b></p>
		<p style="color:#fff">Gol Gumbaz at Bijapur is the mausoleum of king Muhammad Adil Shah. Even a slight whisper by someone in this gallery can be heard everywhere in the gallery.</p>
		<p><span style="color:#FFD700">Visitors: </span><span style="color:#FFD700"><i class="fa fa-eye"></i>8 lakh+</span></p>
      </div>
    </div>
    <div class="w3-third w3-container">
      <img src="images/lal.png" alt="Norway" style="width:100%" class="w3-hover-opacity"  height="280" width="280">
      <div class="w3-container" style="background-color:#0b0c10">
        <p><b><span style="color:#FFD700">LAL BAGH</span></b></p>
		<p style="color:#fff">Lalbagh is an old botanical garden in Bengaluru, India. First planned and laid out during the rule of Hyder Ali.More than 1000 species of plants are here.</p>
		<p><span style="color:#FFD700">Visitors: </span><span style="color:#FFD700"><i class="fa fa-eye"></i>15 lakh+</span></p>
      </div>
	</div>
  </div>
 
  <div class="most">
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="images/dharma.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity" height="280" width="280">
      <div class="w3-container" style="background-color:#0b0c10">
        <p><b><span style="color:#FFD700">DHARMASTHALA</span></b></p>
        <p style="color:#fff">Shri Kshetra Dharmasthala, the land of righteousness and piety, is one of south India’s most renowned religious landmarks with a history as old as 800 years.</p>
			<p><span style="color:#FFD700">Visitors: </span><span style="color:#FFD700"><i class="fa fa-eye"></i>37 lakh+</span></p>
      </div>
    </div>
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="images/ranga.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity"  height="280" width="280">
      <div class="w3-container" style="background-color:#0b0c10">
        <p><b><span style="color:#FFD700">RANGANATHITTU BIRD SANCTUARY</span></b></p>
		<p style="color:#fff">Ranganathittu Bird Sanctuary is located in the Mandya District. It's the largest bird sanctuary in the state and comprises six islets on the banks of the Kaveri river</p>
		<p><span style="color:#FFD700">Visitors: </span><span style="color:#FFD700"><i class="fa fa-eye"></i>3.5 lakh+</span></p>
      </div>
    </div>
    <div class="w3-third w3-container">
      <img src="images/hil.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity"  height="280" width="280">
      <div class="w3-container" style="background-color:#0b0c10">
        <p><b><span style="color:#FFD700">CHAMUNDI HILL</span></b></p>
		<p style="color:#fff">The average elevation is 1,000 metres.The Chamundeshwari Temple is located atop the Chamundi Hills.We can also find a Nandi Statue at the Hill</p>
		<p><span style="color:#FFD700">Visitors: </span><span style="color:#FFD700"><i class="fa fa-eye"></i>21 lakh+</span></p>
      </div>
	</div>
  </div>
 
  <br>
		
  <div class="contact" id="contact">
       
	   </div> <div class="w3-container w3-light-grey" style="background-size:cover;background-position:center;background-image: url('contact5.jpeg');" id="contact" >
					<h3 class="w3-center" style="color:#fff">CONTACT</h3>
					<p class="w3-center w3-large" style="color:#fff">Lets get in touch. Send us a message:</p>
					<div style="margin-top:48px">
				  <p style="color:#fff"><i class="fa fa-map-marker-alt  w3-margin-right" style="color:#fff"></i>Mysuru, INDIA</p>
					 <p style="color:#fff"><i class="fa fa-phone  w3-margin-right" style="color:#fff"></i> Phone: +91 6361924355</p>
				  <p style="color:#fff"><i class="fa fa-envelope  w3-margin-right" style="color:#fff"> </i> Email: travelkarnataka17@gmail.com</p>
				  <br>
				  <form action="home2.php" method="POST">
					<p><input class="w3-input w3-border" type="text" placeholder="Name" required name="Name" style="width:750px;"></p>
					<p><input class="w3-input w3-border" type="text" placeholder="Email" required name="Email" style="width:750px;"></p>
					<p><input class="w3-input w3-border" type="text" placeholder="Subject" required name="Subject" style="width:750px;"></p>
					<p><input class="w3-input w3-border" type="text" placeholder="Message" required name="Message" style="width:750px;"></p>
					<p>
				  <button class="w3-button w3-black" name="send" type="submit">
					<i class="fa fa-paper-plane"></i> SEND MESSAGE
				  </button>
					</p>
				  </form>
				   </div>
			</div>
	  </div>

	  <footer class="w3-center  w3-padding-30" style="background:#0b0c10;">
		<p><span style="color:#FFD700; font-family:Copperplate;">FIND US ON SOCIAL MEDIA & FOLLOW US.</span></p>
 				<a href="#"><i class="fab fa-facebook-f w3-hover-opacity" style="font-size:24px;color:#FFD700"></i></a>
				<a href="https://www.instagram.com/pixchart/?hl=en"><i class="fab fa-instagram w3-hover-opacity" style="font-size:24px;color:#FFD700"></i></a>
				<p  style="color: #FFD700; font-family:Arial; font-size: small; ">
		 		&copy;COPYRIGHT <a href="#"></a>
	  			</p>
				<P><span style="color:#FFD700; font-family:Verdana;">SHREYAS KULKARNI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SHRIESHA NASIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SOURAV G &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; VISHWANATH C B</span></P>
	 </footer>
	
   
  </body>
</html>