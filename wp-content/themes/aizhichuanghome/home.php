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

<div id="home-container" class="">
	<div id="home-slider">
		<a href="./shaoliang/" title="Visit our couple's site">
			<img src="<?php header_image(); ?>" alt="" width="98%"/>
		</a>
	</div>
	<div id="home-create-account" align="center">
		<a href="./wp-login.php?action=register"><img width="45%" src="<?php echo get_stylesheet_directory_uri() . '/create-free-account-off.png' ?>"/> </a>
	</div>
	<div id="home-news">
		
			<?php if ( have_posts() ) : ?>

				<?php twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; ?>

				<?php twentyeleven_content_nav( 'nav-below' ); ?>
			<?php endif ?>
	</div>
	<div id="home-feature-list-container">
		<ul id="home-feature-list">
			<li class="list-item">
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
			</li>
			<li class="list-item">
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
			</li>
			<li class="list-item">
				<h4>See popular couples</h4>
				<ul class="feature-sublist">
					<li>
						<a href="#">Tian & Mike</a> 
					</li>
					<li>
						<a href="#">Shao & Will</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div><!-- end of #featured -->
<?php get_footer(); ?>