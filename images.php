<?php  
 $connect = mysqli_connect("localhost", "root", "","user");
 if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
      $names = $_POST['names'];
      $dist = $_POST['dist'];
      $types = $_POST['types'];
      $review = $_POST['review'];
      $query = "INSERT INTO image(images,names,dist,types,review) VALUES ('$file','$names','$dist','$types','$review')";  
      if(mysqli_query($connect, $query))  
      {  
           echo '<script>alert("Image Inserted into Database")</script>';  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Insert and Display Images From Mysql Database in PHP</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3>Insert and Display Images From Mysql Database in PHP</h3>  
                <br />  
                <form method="post" enctype="multipart/form-data">  
                     <input type="file" name="image" id="image" /><br />
                     <input type="text" name="names" id="names" /><br />

                    <input type="text" class="input-box" name="dist" id="dist" placeholder="District" /><br>

          

                <select class="input-box" name="types"  id="types">
                      <option value="" disabled selected><strong>Type of Place</strong></option>
                      <option value="1">TEMPLES</option>
                      <option value="2">WATERFALLS</option>
                      <option value="3">BEACHES</option>
                      <option value="4">SANCTURIES</option>
                      <option value="5">GARDENS</option>
                      <option value="6">LAKES</option>
                </select><br>
             
                     <input type="text" name="review" id="review"/>  
                     <br />  
                     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
                </form>  
                <br />  
                <br />

                <table class="table table-bordered">  
                     <tr>  
                          <th>Image</th>  
                     </tr>  
                <?php  
                $query = "SELECT * FROM image ORDER BY id DESC";  
                $result = mysqli_query($connect, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                    echo "<tr><td>$row[names]</td></tr>";
                     echo '
                     <tr>
                     <td><img src="data:image/jpeg;base64,'.base64_encode($row['images'] ).'" height="300" width="300" class="img-thumnail" />; 
                     </td>
                     </tr>';
                     echo "<tr><td>$row[review]</td></tr>";
                }  
                ?>  
                </table>  
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