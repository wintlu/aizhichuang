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
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12 well">
            <div id="content" role="main">
            	
            	<?php 
            		$args = array('post_type' => 'page', 'orderby' => 'menu_order, post_title');
	            	query_posts( $args );
						$defaults = array('sort_column' => 'menu_order, post_title');
	            		$pages = get_pages($defaults);
						
						if(have_posts() && count($pages) > 0){
							$firstpageID = $pages[0]->ID;
							while ( have_posts() ) : the_post();
								if(get_the_ID() == $firstpageID)
								{
									get_template_part( 'content', 'page' ); 
									comments_template( '', true );
									break;
								}
							endwhile;
						}
						else{
							echo '<div class="alert alert-error">Oops, seems you don\' have any page, please create one now~ </div>';
						}
					wp_reset_query();
            	 ?>
            	 
			</div><!-- #content -->
        </div>
    </div>
</div>

<?php get_footer(); ?>