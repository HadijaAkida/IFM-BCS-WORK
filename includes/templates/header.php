<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>News Blog</title>
	<link rel="stylesheet" href="css/flexboxgrid.min.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div id="container">
		<main class="flex">
			<header id="mainNav">
				<div class="container flex-layout center">
					<a href="index.php" id="pageTitle">
						News Blog
					</a>
					<span class="flex"></span>
					<div id="userMenu">
						<div id="dp">
							<img src="<?php echo $user->user_photo ?>" alt="">
						</div>

						<div id="details">
							<span>
								<?php
									echo $user->name;
								?>
							</span>
							<a href="logout.php">
								SIGN OUT
							</a>
						</div>
					</div>
				</div>
			</header>
			<div id="mainContent">
				<div class="container">