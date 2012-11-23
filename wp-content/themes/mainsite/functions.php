<?php

if (!function_exists('aizhichuang_login_logo')) :

	function aizhichuang_login_logo() {
		echo '<style type="text/css">
     h1 a {height: 150px !important; background: url(' . get_stylesheet_directory_uri() . '/images/aizhichuang-logo.png) 50% 50% no-repeat !important; } </style>';
	}

endif;

add_action('login_head', 'aizhichuang_login_logo');



//redirect users from mainsite admin area to their site admin area
function aizhichuang_access_denied_splash() {
	if ( ! is_user_logged_in() || is_network_admin() )
		return;

	$blogs = get_blogs_of_user( get_current_user_id() );

	if ( wp_list_filter( $blogs, array( 'userblog_id' => get_current_blog_id() ) ) )
		return;

	$blog_name = get_bloginfo( 'name' );

	if ( empty( $blogs ) )
		wp_die( sprintf( __( 'You attempted to access the "%1$s" dashboard, but you do not currently have privileges on this site. If you believe you should be able to access the "%1$s" dashboard, please contact your network administrator.' ), $blog_name ) );

	foreach ($blogs as $blog) {
		$userblog_admin_url =  get_admin_url($blog->userblog_id);
		$uri = $_SERVER['REQUEST_URI'];
		$extra_uri = strchr($uri, 'wp-admin');
		$extra_uri = substr($extra_uri, 9);
		
		wp_redirect($userblog_admin_url . $extra_uri);
		exit;
	}
}

add_action( 'admin_page_access_denied', 'aizhichuang_access_denied_splash', 1);



function aizhichuang__scripts_method() {
    // wp_deregister_script( 'jquery' );
    // wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
    // wp_enqueue_script( 'jquery' );
}    
 
add_action('wp_enqueue_scripts', 'aizhichuang__scripts_method');

?>