<?php
require('Admin/connection.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $sql = "INSERT INTO contact (sender_name, sender_email, sender_message) 
  VALUES ('" . $_POST["sender_name"] . "', '" . $_POST["sender_email"] . "', '" . $_POST["sender_message"] . "')";
//echo $sql;
  $insert = mysqli_query($conn, $sql);
  
  mysqli_close($conn);
  
//sending me an email
  $to = "peterkalis@mail.weber.edu";
  $subject = "A message from the website";
  $message = $_POST["sender_message"];
  $headers = "From: " . $_POST["sender_email"];
  
  mail($to,$subject,$message,$headers);
  
  //sending email to user
  $toUser = $_POST["sender_email"];
  $subjectUser = "Thank you for the message.";
  $messageUser = "We appreciate your input.";
  $headersUser = "From: peterkalis@mail.weber.edu";
  
  mail($to,$subject,$message,$headers);
  
  echo "The email was sent.";
  header('Location: ' . $homeURL . '?status=message_added');
}
  
?>
<!DOCTYPE html>
<html>
  <head>
     <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
     <link rel="stylesheet" href="CSS/animations.css">
     <link rel="stylesheet" href="CSS/main.css">
     <link rel="stylesheet" href="CSS/minireset.min.css">
     <link href="https://fonts.googleapis.com/css?family=Montserrat|Quicksand" rel="stylesheet">
    <title>Contact Page</title>
  </head>
  
  
  <body>
    <ul class="menu">
      <li><a href="index.php"><i class="fas fa-home"></i></a></li>
      <li><a href="contact.php"><i class="fas fa-envelope-square"></i></a></li>
      <li><a href="blog.php"><i class="far fa-clipboard"></i></a></li>
    </ul>
    
    <div id="wallpaper" class="wallpaper" data-image="Images/lake2.jpg"></div>
    
    
    <form action="" method="post">
      <div class="message">
        Name:  <input type="text" name="sender_name"><br>
        E-mail:<input type="text" name="sender_email"><br>
               <textarea name="sender_message"></textarea><br>
      <input  type="submit" value="Submit Message" class="button"><br>
      </div>
    </form>
    
    <footer class="foot">
   <p>Thank you for visiting.</p> 
  </footer>
  </body>
</html>










