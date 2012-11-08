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
		<img src="<?php header_image(); ?>" alt="" width="98%"/>
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
	<!--
	<div id="home-feature-list-container">
		<ul id="home-feature-list">
			<li>
				<a>Our site</a>
				<ul>
					<li>
						<a href="#">Create free account</a> 
					</li>
					<li>
						<a href="#">Website themes</a>
					</li>
				</ul>
			</li>
			<li>
				<a>Our site</a>
				<ul>
					<li>
						<a href="#">Create free account</a> 
					</li>
					<li>
						<a href="#">Website themes</a>
					</li>
				</ul>
			</li>
			<li>
				<a>Our site</a>
				<ul>
					<li>
						<a href="#">Create free account</a> 
					</li>
					<li>
						<a href="#">Website themes</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
	-->
</div><!-- end of #featured -->
<?php get_footer(); ?>