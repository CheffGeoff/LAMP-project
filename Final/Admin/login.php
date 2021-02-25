<?php 
/*
if (!session_id()) session_start();
if (!session_id['logon']){
  header("Location: login.php");
  die();
}
//checks if your logged in
// at the top of all the admin pages 
*/
//login session

if (isset($_POST['password']) && isset($_POST['username'])){
  if ($_POST['password'] == "password" && $_POST['username'] == "admin"){
      if (!session_id())
           session_start();
      $_SESSION['logon'] = true;
    header('Location: index.php');
  }
}

?>
<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initail-scale=1">
    <title>Admin login</title>
  </head>
  
  <body>
    <form action="" method="post">
      User Name: <input type="text" name="username"><br>
      Password: <input type="password" name="password"><br>
      <input type="submit" value="Login">
    </form>
  </body>
  
  
  
</html>