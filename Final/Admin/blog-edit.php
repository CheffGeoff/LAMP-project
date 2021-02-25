<?php

if (!session_id()) session_start();
if (!$_SESSION['logon']){
  header("Location: login.php");
  die();
}
//chekcs if your logged in
// at the top of all the admin pages 

require('connection.php');



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $sql = "UPDATE posts SET
	post_title = '" . $_POST["post_title"] . "', 
	post_content = '" . $_POST["post_content"] . "' 
	WHERE post_ID = " . $_GET["post_ID"];
	
echo $sql;
  $insert = mysqli_query($conn, $sql);
  
  mysqli_close($conn);
  
 header('Location: ' . $homeURL . '?status=post-updated');
}

$sql = "SELECT * FROM `posts` WHERE `posts`.`post_ID` = " . $_GET["post_ID"];

$getUser = mysqli_query($conn, $sql);
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
      <?php
						if (mysqli_num_rows($getUser) > 0) {
              $row = mysqli_fetch_assoc($getUser);
            }
      ?>
      Post Title: <input type="text" name="post_title" value="<?php echo $row['post_title']; ?>"><br>
			Post Content: <textarea name="post_content" value="<?php echo $row['post_content']; ?>"rows="25" cols="75"></textarea><br>
      <input type="submit" value="Edit Post">
			</div>
    </form>
  </body>
</html>