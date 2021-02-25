<?php
require('connection.php');


if ($_GET["post_ID"]) {
  $sql = "DELETE FROM `posts` WHERE `post_ID` = " . $_GET["post_ID"];
  
  mysqli_query($conn, $sql);
  
  mysqli_close($conn);
  
  header('Location: ' . $homeURL . '?status=post-deleted');
}
else {
  echo "error!";
}
?>