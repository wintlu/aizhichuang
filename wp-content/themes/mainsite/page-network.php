<?php get_header(); ?>

<?php 

/*
 * only for small network!
 */
function get_blog_list_for_small_network( $start = 0, $num = 10, $deprecated = '' ) {
	global $wpdb;
	$blogs = $wpdb->get_results( $wpdb->prepare("SELECT blog_id, domain, path FROM $wpdb->blogs WHERE site_id = %d AND public = '1' AND archived = '0' AND mature = '0' AND spam = '0' AND deleted = '0' ORDER BY registered DESC", $wpdb->siteid), ARRAY_A );

	foreach ( (array) $blogs as $details ) {
		$blog_list[ $details['blog_id'] ] = $details;
		$blog_list[ $details['blog_id'] ]['postcount'] = $wpdb->get_var( "SELECT COUNT(ID) FROM " . $wpdb->get_blog_prefix( $details['blog_id'] ). "posts WHERE post_status='publish' AND post_type='post'" );
	}
	unset( $blogs );
	$blogs = $blog_list;

	if ( false == is_array( $blogs ) )
		return array();

	if ( $num == 'all' )
		return array_slice( $blogs, $start, count( $blogs ) );
	else
		return array_slice( $blogs, $start, $num );
}
 ?>

<div id="front-page-content">
<div class="container">
	<div id="newly-sites" class="row">
		<?php 
			$blog_list = get_blog_list_for_small_network( 0, 'all' );
			foreach ($blog_list AS $blog) :
				if($blog['blog_id']==1)
					continue;
				$detail = get_blog_details($blog['blog_id']);
				?>
				<div class="span3">
					<a target="_blank" href="<?php echo $detail->path ?>">
						<img src="<?php echo get_stylesheet_directory_uri() . '/images/site-image-not-found.png'; ?>"/>
					</a>
					<p>
						<h5 style="text-align: center"><?php echo $detail->blogname ?></h5>
					</p>
				</div>
			<?php endforeach; ?>
	</div>
</div>
</div>
<?php get_footer(); ?>