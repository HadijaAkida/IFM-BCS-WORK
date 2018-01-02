<?php
	require_once 'includes/session.php';

	if($session->is_logged_in()){
		$user = $session->get_user();
	}
	else{
		header("Location: login.php");
	}

	include('includes/templates/header.php');
?>	

<div style="padding-top: 10px; padding-bottom: 12px;">
	<div class="row">
		<div class="col-md-8">
			<?php
				if(isset($_GET['has_image'])){
					echo '<img src="images/uploads/vac4.jpg" alt="" style="display: block; margin-top: 24px; width: 95%">';
				}
			?>
			<div id="postDetail">
				<div id="postTitle">
					<h1>
						Tips and tricks for anyone travelling to a new country without a tour guide or enough prior research of the particulars.
					</h1>
					<p>
						Published on Jul 3rd 2017 by <strong>Annabelle Worsty</strong>
					</p>
				</div>
				<div id="postDescription">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus perspiciatis quae impedit? Magnam repellendus obcaecati, aliquid alias delectus dolor? Ad odit fugiat nulla quas doloremque repudiandae, fugit, placeat! Perferendis, iure!
					</p>
					<p>
						Totam dolor ab, porro eum eligendi cumque sequi atque odio! Assumenda dolores, debitis? Eius ratione accusantium ut, molestias incidunt iusto sunt animi, delectus, quos labore quaerat. Dolores fugit, provident iure.
					</p>
					<p>
						Fugiat, velit totam temporibus expedita vero eligendi fugit, unde, nobis, ullam ipsam cupiditate repellat illum dignissimos ab asperiores animi. Voluptas beatae eos, sint dignissimos qui amet modi fuga quia quam.
					</p>
					<p>
						Quisquam eaque modi aut, delectus similique quam cum illum illo voluptatum aspernatur consectetur praesentium eum, accusantium aliquam vitae sed iste dignissimos, possimus voluptatibus quis suscipit maxime. Cupiditate quaerat unde repellat.
					</p>
					<p>
						Quam magni provident ducimus ad unde reprehenderit minima temporibus odit saepe obcaecati, esse eum maxime, quos alias molestiae iure cum magnam praesentium molestias quasi similique iste. Libero voluptatem, aut recusandae.
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom: 50px;">
			<h5 id="relatedTitle">Other related posts</h5>
			<?php
				for ($i=0; $i < 5; $i++) { 
					if($i%2 == 0)
						include 'includes/templates/blog-item-text.php';
					else
						include 'includes/templates/blog-item-image.php';
				}
			?>
		</div>
	</div>
</div>

<?php include('includes/templates/footer.php'); ?>