<?php
	session_start();
	require_once('config.php');
	
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-image: url(imgs/bg.jpg)">
	<div id="main-wrapper">
		<center><h1>Hello <?php echo $_SESSION['name']; ?>!!</h1></center>
		<div class="imgcontainer">
				<img src="imgs/avatar.png" alt="Avatar" class="avatar">
			</div>
		<h1>User Details<h1>		
		<h2>email: <?php  echo $_SESSION['id']; ?></h2>
		<h2>Contact no.: <?php  echo $_SESSION['mno']; ?></h2>
		<h2>College: <?php  echo $_SESSION['clg']; ?></h2>
		<h2>year: <?php  echo $_SESSION['year'];  ?></h2>
		
				
		<form action="index.php" method="post">
			<div class="inner_container">
				<center><button class="logout_button" type="submit">Log Out</button><center>	
			</div>
			<br><br>
		</form>
	</div>
</body>
</html>