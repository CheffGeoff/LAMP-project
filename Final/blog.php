<?php
require('Admin/connection.php');

$sql_select = "SELECT * FROM `posts` LIMIT 0, 30";
$result = mysqli_query($conn, $sql_select);
?>

<!DOCTYPE html>
<html>
	<head>
		<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Montserrat|Quicksand" rel="stylesheet">
  	<link rel="stylesheet" href="CSS/animations.css">
  	<link rel="stylesheet" href="CSS/minireset.min.css">
  	<link rel="stylesheet" href="CSS/main.css">
		<title>Blog Page</title>
		
	</head>
	
  <body>
		<header>
		<nav>| 
			<ul class="menu">
      <li><a href="index.php"><i class="fas fa-home"></i></a></li>
      <li><a href="contact.php"><i class="fas fa-envelope-square"></i></a></li>
      <li><a href="blog.php"><i class="far fa-clipboard"></i></a></li>
    </ul>
			
			<div id="wallpaper" class="wallpaper" data-image="Images/lake2.jpg"></div>
			
		</nav>
		</header>
	
			
		<table>
    <thead>
        <tr>
          <th></th>  <br>
					<th>Title</th>
          <th>Blog Posts</th>
        </tr>
    </thead>
    <tbody>
        <!--Use a while loop to make a table row for every DB row-->
        <?php
						if (mysqli_num_rows($result) > 0) {	
    				while($row = mysqli_fetch_assoc($result)) {
			  ?>
        <tr>
					<td></td>
					<td class="blogTitle">Blog Title: <?php echo $row['post_title']; ?></td>
          <td class="blogContent"><?php echo $row['post_content']; ?></td>
					<td></td>
        </tr>
        <?php }
				} else {
    				echo "0 results";
				} 
			
			mysqli_close($conn);
			?>
    </tbody>
</table>
		
		 <footer class="foot"> 
    <p>Thank you for visiting.</p>
  </footer>
		
  </body>
</html>