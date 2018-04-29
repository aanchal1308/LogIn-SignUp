<?php
	session_start();
	require_once('config.php');
	
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign Up Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-image: url(imgs/bg.jpg)">
	<div id="main-wrapper">
	<center><h1>SIGN UP</h1></center>
		<form action="register.php" method="post">
			<div class="imgcontainer">
				<img src="imgs/avatar.png" alt="Avatar" class="avatar">
			</div>
			<div class="inner_container">
				
				<input type="text" placeholder="Username" name="name" pattern="[A-Za-z]+" title="letters only" required />
				<br>	
				<input type="email" name="id" placeholder="Email" title="xyz@something.com" required />
				<br>
				<input type="password" name="password" placeholder="Password" pattern=".{5,}" title="Five or more characters" required />	
				<br>
			    <input type="tel" name="mno" placeholder="Contact Number" pattern="^\d{10}$" title="10 digits only" required />	
				<br>
				<input type="text" name="clg" placeholder="College" pattern="[A-Za-z]+" title="letters only" required />
				<br>
				<input type="text" name="year" placeholder="Year" required />
				
				<button name="register" class="sign_up_btn" type="submit">Sign Up</button>
				
				<a href="index.php"><button type="button" class="back_btn"><< Back to Login</button></a>
			</div>
		</form>
		
		<?php
			if(isset($_POST['register']))
			{
				@$name=$_POST['name'];
				@$id=$_POST['id'];
				@$password=$_POST['password'];
				@$mno=$_POST['mno'];
				@$clg=$_POST['clg'];
				@$year=$_POST['year'];
				
				
				
					$query = "select * from userdata where name='$name'";
					//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
							$query = "insert into userdata values('$name','$id','$password','$mno','$clg','$year')";
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
								$_SESSION['name'] = $name;
								$_SESSION['id']= $id;
								$_SESSION['password'] = $password;
								$_SESSION['mno']= $mno;
								$_SESSION['clg']= $clg;
								$_SESSION['year']= $year;
								header( "Location: homepage.php");
							}
							else
							{
								echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
				}
				
				
			
			
			
		?>
	</div>
</body>
</html>