<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<?php get_header(); ?>

<div class="container-fluid" style="padding-top: 10em">
    <div class="row-fluid">
        <div class="span3">
            <div class="sidebar-nav">
                	<?php 
                	$args = array('theme_location' => 'primary',
                				  'menu_class' => 'nav nav-list',
                				  'container_class' => 'xxxx' );
                	wp_nav_menu( $args ); ?>
            </div>
        </div>

        <div class="span6">
            <div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php comments_template( '', true ); ?>
				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
        </div>
    </div>
</div>

<?php get_footer(); ?>