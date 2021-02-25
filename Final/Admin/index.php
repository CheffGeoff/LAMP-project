<?php 

if (!session_id()) session_start();
if (!$_SESSION['logon']){
  header("Location: login.php");
  die();
}
//checks if your logged in
// at the top of all the admin pages 

require('connection.php');

$sql_select = "SELECT * FROM `posts` LIMIT 0, 30";
$result = mysqli_query($conn, $sql_select);

$sql_select2 = "SELECT * FROM `contact` LIMIT 0, 30";
$result2 = mysqli_query($conn, $sql_select2);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Blog Admin</title>
		<link rel="stylesheet" href="css/admin.css">
		<link rel="stylesheet" href="css/minireset.min.css">
	</head>
  <body>
		<header>
		<nav>
		<nav>| 
			<ul class="menu">
      <li><a href="index.php">Home</a></li>
      <li><a href="blog-add.php">Add Post</a></li>
			<li><a href="logout.php">Logout</a></li>
    </ul>
		</nav>
		</header>
		<section>
		<table>
			<thead>
					<tr>
						 <th></th> <br>
						 <th>Post ID</th>
						 <th>Post Title</th>
						 <th>Post Content</th>
						 
					</tr>
			</thead>
			<tbody>
					<!--Use a while loop to make a table row for every DB row-->
					<?php
							if (mysqli_num_rows($result) > 0) {	
							while($row = mysqli_fetch_assoc($result)) {
					?>
					<tr>
						<td class="blogTitle"><a href="blog-delete.php?post_ID=<?php echo $row['post_ID']; ?>">Del</a> - 
							<a href="blog-edit.php?post_ID=<?php echo $row['post_ID']; ?>">Edit</a></td>  
						<td class="blogTitle"><?php echo $row['post_ID']; ?></td>
						<td class="blogTitle" ><?php echo $row['post_title']; ?></td>
						<td class="blogContent"><?php echo $row['post_content']; ?></td>
					</tr>
					<?php }
					} else {
							echo "0 results";
					} 

				mysqli_close($conn);
				?>
			</tbody>
</table>
		</section>
			
		<section>	
			<table>
			<thead>
					<tr>
						 <th></th> <br>
						 <th>Message ID</th>
						 <th>Username</th>
						 <th>Users Email</th>
						 <th>Message</th>
					</tr>
			</thead>
			<tbody>
					<!--Use a while loop to make a table row for every DB row-->
					<?php
							if (mysqli_num_rows($result2) > 0) {	
							while($row = mysqli_fetch_assoc($result2)) {
					?>
					<tr>
						<!--<td class="blogTitle"><a href="blog-delete.php?post_ID=">Del</a> - 
							<a href="blog-edit.php?post_ID=">Edit</a></td>-->  
						<td></td>
						<td class="blogTitle"><?php echo $row['message_id']; ?></td>
						<td class="blogTitle" ><?php echo $row['sender_name']; ?></td>
						<td class="blogTitle"><?php echo $row['sender_email']; ?></td>
						<td class="blogContent"><?php echo $row['sender_message']; ?></td>
					</tr>
					<?php }
					} else {
							echo "0 results";
					} 

				mysqli_close($conn);
				?>
			</tbody>
 </table>
</section>	
			
			
			
  </body>
</html>