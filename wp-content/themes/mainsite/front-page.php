<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
	exit ;

/**
 * Home Page
 *
 * Note: You can overwrite home.php as well as any other Template in Child Theme.
 * Create the same file (name) include in /responsive-child-theme/ and you're all set to go!
 * @see            http://codex.wordpress.org/Child_Themes
 *
 * @file           home.php
 * @package        Responsive
 * @author         Wint Lu
 * @copyright
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/home.php
 * @link           http://codex.wordpress.org/Template_Hierarchy
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

<div id="myCarousel" class="carousel slide">
  <!-- Carousel items -->
  <div class="carousel-inner">
    <div class="active item">
    	<a href="<?php echo site_url() . '/shaoliang'; ?>" >
    		<img src="<?php echo get_stylesheet_directory_uri() . '/images/template4-thumbnail.jpg' ?>" />
    	</a>
    </div>
    <div class="item">
    	<img src="<?php echo get_stylesheet_directory_uri() . '/images/template2-thumbnail.jpg' ?>" />
    </div>
    <div class="item">
    	<img src="<?php echo get_stylesheet_directory_uri() . '/images/template3-thumbnail.jpg' ?>" />
    </div>
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>

<!--TODO: should be move to function.php-->
<script type="text/javascript" charset="utf-8">
	$('#myCarousel').carousel();
</script>

<hr class="lace1">

<div id="site-themes-preview" class="rows clearfix">
	<div class="span3">
		<a href="<?php echo wp_login_url() . '?action=register'?>">
			<img src="<?php echo get_stylesheet_directory_uri() . '/images/create-account.png'?>"/>
		</a>
	</div>
	<div class="span3 theme-preview">
		<p class="figcaption">Autumn</p>
		<a href="./themes?id=1">
			<img src="<?php echo get_stylesheet_directory_uri() . '/images/template1-square.jpg'?>"/>
		</a>
	</div>
	<div class="span3 theme-preview">
		<p class="figcaption">Ocean</p>
		<a href="./themes?id=2">
			<img src="<?php echo get_stylesheet_directory_uri() . '/images/template2-square.jpg'?>"/>
		</a>
	</div>
	
</div>

<div id="site-navigation" class="rows clearfix">
	<div class="span3">
		<h4>Our services</h4>
		<ul class="feature-sublist">
			<li>
				<a href="#">Publish your pages</a> 
			</li>
			<li>
				<a href="#">Share your photos</a>
			</li>
			<li>
				<a href="#">Beautify with themes</a>
			</li>
			<li>
				<a href="#">Track your site visitors</a>
			</li>
			<li>
				<a href="#">Connect with social networks</a>
			</li>
			<li>
				<a href="#">Mobile support</a>
			</li>
		</ul>
	</div>
	<div class="span3">
		<h4>Site map</h4>
		<ul class="feature-sublist">
			<li>
				<a href="#">Themes</a> 
			</li>
			<li>
				<a href="#">Support</a>
			</li>
			<li>
				<a href="#">Register</a>
			</li>
			<li>
				<a href="./wp-login.php">Login</a>
			</li>
			<li>
				<a href="#">Demo</a>
			</li>
		</ul>
	</div>
	<div class="span3">
		<h4>See popular couples</h4>
		<ul class="feature-sublist">
			<li>
				<a href="#">Tian & Mike</a> 
			</li>
			<li>
				<a href="#">Shao & Will</a>
			</li>
		</ul>
	</div>
</div>

<?php get_footer(); ?>