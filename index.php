<?php
	require_once 'includes/session.php';
	
	if($session->is_logged_in()){
		$user = $session->get_user();
	}
	else{
		header("Location: login.php");
	}

	$page = "home";

	include('includes/templates/header.php');
?>	

<div style="padding-top: 24px; padding-bottom: 12px;">
	<div class="row">
		<?php
			for ($i=0; $i < 20; $i++) { 
				echo '<div class="col-md-4">';
					if($i%2 == 0)
						include 'includes/templates/blog-item-text.php';
					else
						include 'includes/templates/blog-item-image.php';
				echo '</div>';
			}
		?>
	</div>
</div>

<?php include('includes/templates/footer.php'); ?>