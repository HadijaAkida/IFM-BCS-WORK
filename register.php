<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title> urio branch Library IS</title>

	<link rel="stylesheet" href="css/authpages.css">
</head>
<body>
	<?php
		if(isset($_POST['submit'])){
			require_once 'includes/User.php';

			$user = new User();
			$user->name = $_POST['name'];
			$user->username = $_POST['username'];
			$user->password = md5($_POST['password']);
			$user->role = "user"; //$_POST['role'];
			$user->user_photo = "images/profile_pictures/default_dp.png";

			if(!$user->exists("username = '". $_POST['username']."'")){
				if($user->save()){
					header("Location: login.php?registered");
				}else{
					header("Location: register.php?register_failed");
				}
			}else{
				header("Location: register.php?user_exists");
			}
		}

		if(isset($_GET['register_failed'])){
			$alert_type="error";
			$dismiss_link="register.php";
			$alert_message = "<strong>Success!</strong> Registration failed.";
		}else if(isset($_GET['user_exists'])){
			$alert_type="error";
			$dismiss_link="register.php";
			$alert_message = "<strong>Success!</strong> Registration failed.";
		}
	?>
	<form action="register.php" method="POST" style="padding-bottom: 5px;">
		<div class="round-bg"></div>
		<a class="link" href="login.php">LOGIN</a>
		<div class="form-header">
			<h1>Register</h1>
		</div>
		<div>
			<?php
				if(isset($alert_type))
					include 'includes/templates/alert.php';
			?>
		</div>
		<div class="input-wrapper">
			<span>Name:</span> 
			<input required id="name" name="name" type="text">
		</div>
		<div class="input-wrapper">
			<span>Username:</span> <input required id="username" name="username" type="text">
		</div>
		<div class="input-wrapper">
			<span>Password:</span> <input required id="password" name="password" type="password">
		</div>
		<div style="margin-botto: -25px;">&nbsp;</div>
		<input type="submit" name="submit" value="Register Now">&emsp;
		<!-- <button type="reset">Clear Form</button> -->
	</form>
</body>
</html>