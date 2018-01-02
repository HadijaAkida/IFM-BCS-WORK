<?php
	require_once 'includes/User.php';

	$user = new User();
	$user::migrate_down();
	$user::migrate_up();
?>