<?php

if (!function_exists('aizhichuang_login_logo')) :

	function aizhichuang_login_logo() {
		echo '<style type="text/css">
     h1 a {height: 150px !important; background: url(' . get_stylesheet_directory_uri() . '/images/aizhichuang-logo.png) 50% 50% no-repeat !important; } </style>';
	}

endif;

add_action('login_head', 'aizhichuang_login_logo');



//redirect users from mainsite admin area to their site admin area
function aizhichuang_admin_page_access_denied() {
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

add_action( 'admin_page_access_denied', 'aizhichuang_admin_page_access_denied', 1);

function reset_default_home_page(){
	$_POST['post_type']    = 'page';
	$_POST['post_content'] = 'My home page';
	$_POST['post_parent']  = 0;
	//$_POST['post_author']  = $user_ID;
	$_POST['post_status']  = 'publish';
	$_POST['post_title']   = 'Home';
	$home_id = wp_insert_post($_POST);
	
	if(is_wp_error($home_id))
		return;
	
	//set home page to static page	
	update_option('show_on_front', 'page');
	update_option('page_on_front', $home_id);
}

//actiavte a new blog
function aizhichuang_wpmu_new_blog($blog_id)
{
	switch_to_blog($blog_id);
	switch_theme('theme1', 'theme1');
	//activate_plugin('debug-bar');

	//insert default home page
	reset_default_home_page();
	restore_current_blog();
}
add_action('wpmu_new_blog', 'aizhichuang_wpmu_new_blog');

//signup page customization
function aizhichuang_signup_css() { ?>
	<style type="text/css">
	
	.widecolumn {margin: 0 auto; width: 600px; line-height: 1.6em;}
	/* defaults from signup page. feel free to override. It's commented out for now.
			.mu_register { width: 90%; margin:0 auto; }
			.mu_register form { margin-top: 2em; }
			.mu_register .error { font-weight:700; padding:10px; color:#333333; background:#FFEBE8; border:1px solid #CC0000; }
			.mu_register #submit,
				.mu_register #blog_title,
				.mu_register #user_email, 
				.mu_register #blogname,
				.mu_register #user_name { width:100%; font-size: 24px; margin:5px 0; }	
			.mu_register .prefix_address,
				.mu_register .suffix_address {font-size: 18px;display:inline; }			
			.mu_register label { font-weight:700; font-size:15px; display:block; margin:10px 0; }
			.mu_register label.checkbox { display:inline; }
			.mu_register .mu_alert { font-weight:700; padding:10px; color:#333333; background:#ffffe0; border:1px solid #e6db55; }
	 */
	</style>
<?php 
} 
function aizhichuang_add_signup_css () { add_action('wp_head','aizhichuang_signup_css', 99); }
add_action('signup_header','aizhichuang_add_signup_css');


?>