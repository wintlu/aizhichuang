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
        <div class="span3 well">
            <div class="sidebar-nav">
                <div>
                	<?php 
                	 $args = array(
							'menu_class'  => 'page-nav-menu',
							'show_home' => true);
					wp_page_menu($args); ?>
                </div>
            </div>
        </div>

        <div class="span8 well">
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