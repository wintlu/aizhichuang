<?php
/*
 Plugin Name: user admin theme
 Author: Wint Lu
 Version: 1.6
 */

//remove unused meta boxes
function aizhichuang_admin_init() {
	if (is_super_admin())
		return;
		
	//remove_meta_box('pageparentdiv','page','normal');
	//remove_meta_box('revisionsdiv','page','normal');
	
	remove_post_type_support('page', 'comments');
	remove_post_type_support('page', 'author');
	remove_post_type_support('page', 'revisions');

	wp_deregister_script('postbox');
	
	//remove admin bar
	remove_action('in_admin_header', 'wp_admin_bar_render', 0);
}

add_action('admin_init', 'aizhichuang_admin_init');

//remove sreen help
function aizhichuang_admin_head() {
	if (is_super_admin())
		return;

	// This makes sure that the positioning is also good for right-to-left languages
	$url = get_bloginfo('wpurl');
	$dir = plugins_url('wp-admin.css', __FILE__);
	echo '<link rel="stylesheet" href="' . $dir . '" type="text/css" />';

	$screen = get_current_screen();
	$screen -> remove_help_tabs();
}
add_action('admin_head', 'aizhichuang_admin_head');

//admin page title
function aizhichuang_admin_title($admin_title){
	return str_replace('WordPress', get_dashboard_blog()->blogname, $admin_title);
}
add_filter('admin_title', 'aizhichuang_admin_title');

//fix admin bar
function aizhichuang_wp_head(){
	if (is_super_admin())
		return;
	
	echo '<style type="text/css">
		#wp-admin-bar-search{
			display: none;
		}
	</style>';
}
add_action('wp_head', 'aizhichuang_wp_head');

//admin toolbar
function aizhichuang_admin_bar_menu($wp_admin_bar){
	if (is_super_admin())
		return;
	
	$wp_admin_bar->remove_node('wp-logo');
	$wp_admin_bar->remove_node('my-sites');
	$wp_admin_bar->remove_node('new-content');
	$wp_admin_bar->remove_node('site-name');
	
	$wp_admin_bar->add_menu( array(
	'id' => 'mydashboard',
	'title' => __( 'Dashboard'),
	'href' => __(get_admin_url()),
	) );
	
}
add_action('admin_bar_menu', 'aizhichuang_admin_bar_menu', 999);  

//add our header
function aizhichuang_before_menu_header(){
	if (is_super_admin())
		return;
	
	?>
	<header id="admin-branding">
		<div id="admin-branding-logo">
			<a href="<?php echo get_dashboard_blog()->siteurl; ?>">
				<img src='<?php echo plugins_url( 'images/aizhichuang-logo.png', __FILE__);?> '/>
			</a>
		</div>
		<div id="admin-branding-meta">
			<a target="_blank" href="<?php echo home_url(); ?>">Visit Site</a>|<a href="<?php echo wp_logout_url(  network_site_url() )?>">Logout</a>
		</div>
	</header>
	<?php
}
add_action('before_menu_header', 'aizhichuang_before_menu_header');

function aizhichuang_admin_menu() {
	if (is_super_admin())
		return;
	//remove_menu_page('index.php');
	remove_menu_page('link-manager.php');
	remove_menu_page('tools.php');
	remove_menu_page('edit.php');
	remove_menu_page('users.php');
	remove_menu_page('upload.php');
	//remove_menu_page('edit-comments.php');

	//apearance sub menus
	remove_submenu_page('themes.php', 'themes.php?page=custom-header');
	remove_submenu_page('themes.php', 'themes.php?page=custom-background');
	remove_submenu_page('themes.php', 'widgets.php');
	remove_submenu_page('themes.php', 'nav-menus.php');
	
	//settings sub menus
	remove_submenu_page('options-general.php', 'options-writing.php');
	remove_submenu_page('options-general.php', 'options-reading.php');
	remove_submenu_page('options-general.php', 'options-discussion.php');
	remove_submenu_page('options-general.php', 'options-media.php');
	remove_submenu_page('options-general.php', 'options-privacy.php');
	remove_submenu_page('options-general.php', 'options-permalink.php');

	//dashborad sub menus
	remove_submenu_page('index.php', 'my-sites.php');

	//pages sub menus
	remove_submenu_page('edit.php?post_type=page', 'post-new.php?post_type=page');

	//add my menus

	add_menu_page('My Profile', 'Profile', 'add_users', 'profile.php', '', 'icon');
}

add_action('admin_menu', 'aizhichuang_admin_menu');

//before admin header
function aizhichuang_before_admin_header()
{
	if (is_super_admin())
		return;
}
add_action('before_admin_header', 'aizhichuang_before_admin_header', 0);

//change footer text
function aizhichuang_footer_text() {
	echo '2012 by <a href="' .   get_dashboard_blog() -> siteurl . '">aizhichuang.com</a>';
}

add_filter('admin_footer_text', 'aizhichuang_footer_text');

//remove screen options
function aizhichuang_remove_screen_options() {
	if (is_super_admin())
		return;
	return false;
}

add_filter('screen_options_show_screen', 'aizhichuang_remove_screen_options');

//hide dashboard meta box
function aizhichuang_dashboard_setup() {
	if (is_super_admin())
		return;

	remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
	remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
	// right now
	//remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // recent comments
	remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
	// plugins
	remove_meta_box('dashboard_quick_press', 'dashboard', 'normal');
	// quick press
	//remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side'); // recent drafts
	remove_meta_box('dashboard_primary', 'dashboard', 'side');
	// wordpress blog
	remove_meta_box('dashboard_secondary', 'dashboard', 'side');
	// other wordpress news
	update_user_meta(get_current_user_id(), 'show_welcome_panel', 0);
}

add_action('wp_dashboard_setup', 'aizhichuang_dashboard_setup');

//page section
function aizhichuang_manage_pages_columns($columns) {
	if (is_super_admin())
		return $columns;

	unset($columns['author']);
	unset($columns['date']);
	return $columns;
}
add_filter('manage_pages_columns', 'aizhichuang_manage_pages_columns');
add_filter('bulk_actions-' . 'edit-page', '__return_empty_array');
add_filter('show_extra_tablenav', '__return_false');
//add_filter('views_edit-page', '__return_empty_array');

//comments section
add_filter('bulk_actions-' . 'edit-comments', '__return_empty_array' );
//add_filter('views_edit-', '__return_empty_array');


//profile section
function aizhichuang_user_contactmethods($contactmethods) {
	if (is_super_admin())
		return $contactmethods;
	
	//$contactmethods['twitter'] = 'Twitter'; // Add Twitter
	//$contactmethods['facebook'] = 'Facebook'; // Add Facebook
	unset($contactmethods['yim']);
	// Remove Yahoo IM
	unset($contactmethods['aim']);
	// Remove AIM
	unset($contactmethods['jabber']);
	// Remove Jabber

	return $contactmethods;
}
add_filter('user_contactmethods', 'aizhichuang_user_contactmethods', 10, 1);
?>
