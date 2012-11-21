<?php
// Exit if accessed directly
if (!defined('ABSPATH'))
	exit ;
?>

<?php get_header(); ?>

<div class="container">
	<h2 class="gallery-caption"> Beautify your site with our themes  </h2>
	<div class="row">
		<figure class="span3 theme-preview">
		<figcaption>Autumn</figcaption> 
		<a href="<?php echo get_admin_url()  . 'themes.php'?>">
			<img src="<?php echo get_stylesheet_directory_uri() . '/images/template1-square.jpg'?>"/>
		</a>
		</figure>
		<figure class="span3 theme-preview">
			<figcaption>Ocean</figcaption>
			<a href="./themes?id=2">
				<img src="<?php echo get_stylesheet_directory_uri() . '/images/template2-square.jpg'?>"/>
			</a>
		</figure>
		<figure class="span3 theme-preview">
			<figcaption>Ocean</figcaption>
			<a href="./themes?id=2">
				<img src="<?php echo get_stylesheet_directory_uri() . '/images/template2-square.jpg'?>"/>
			</a>
		</figure>
	</div>
</div>

<?php get_footer(); ?>