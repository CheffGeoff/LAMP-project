<?php



if (!session_id()) session_start();
if (!$_SESSION['logon']){
  header("Location: login.php");
  die();
}
//checks if your logged in, add to the at the top of all the admin pages 

require('connection.php');

//adds a blog post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $sql = "INSERT INTO posts (post_title, post_content) 
  VALUES ('" . $_POST["post_title"] . "', '" . $_POST["post_content"] . "')";
//echo $sql;
  $insert = mysqli_query($conn, $sql);
  
  mysqli_close($conn);
  
 header('Location: ' . $homeURL . '?status=post_added');
}
  
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/admin.css">
		<link rel="stylesheet" href="css/minireset.min.css">
  </head>
  
  
  <body>
    <form action="" method="post">
      <div class="message">
      Post Title: <input type="text" name="post_title"><br>
      Post Content: <textarea name="post_content" rows="25" cols="75"></textarea><br>
      <input type="submit" value="Add Post">
      </div>
    </form>
  </body>
</html>