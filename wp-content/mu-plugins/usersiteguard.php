<?php
/*
 Plugin Name: main site guard
 Author: Wint Lu
 Description: This plugin can customize wordpress admin panel to aizhichuang.com style. (with more features to be added later) 
 Version: 1.6
 */
 
 //fix login page
if(!function_exists('usersiteguard_custom_login_logo')):
	function usersiteguard_custom_login_logo() {
		echo '<style type="text/css">
	     h1 a {height: 150px !important; background: url(' . get_dashboard_blog()->siteurl . '/wp-content/themes/mainsite/images/aizhichuang-logo.png) 50% 50% no-repeat !important; } </style>';
	}
endif;
add_action('login_head', 'usersiteguard_custom_login_logo');

//hide dashboard meta box
if(!function_exists('usersiteguard_dashboard_setup')) :
	function usersiteguard_dashboard_setup() {
		
		if(is_super_admin())
			return;

		remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
		remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
		remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); // right now
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
		
		global $wp_meta_boxes;
	
		$user_id = get_current_user_id();
	
		if (1 == get_user_meta($user_id, 'show_welcome_panel', true))
			update_user_meta($user_id, 'show_welcome_panel', 0);
	}
	
endif;
add_action('wp_dashboard_setup', 'usersiteguard_dashboard_setup');

// Hint: For Multisite Network Admin Dashboard use wp_network_dashboard_setup instead of wp_dashboard_setup.
if(!function_exists('usersiteguard_remove_menu_pages')):
	function usersiteguard_remove_menu_pages() {
		
		if(is_super_admin())
			return;
		
		//remove_menu_page('index.php');
		remove_menu_page('link-manager.php');
		remove_menu_page('tools.php');
		remove_menu_page('edit.php');
		remove_menu_page('users.php');
		remove_menu_page('upload.php');
		remove_menu_page('edit-comments.php');
		
		//apearance sub menus
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
	
endif;
add_action('admin_menu', 'usersiteguard_remove_menu_pages');

//customize styles and javascript
// We need some CSS to position the paragraph
function usersiteguard_admin_head()
{
	if(is_super_admin())
		return;
    
    // This makes sure that the positioning is also good for right-to-left languages
    $url = get_bloginfo('wpurl');
    $dir = plugins_url( 'wp-admin.css' , __FILE__ );
    echo '<link rel="stylesheet" href="' . $dir . '" type="text/css" />';
	
}
add_action('admin_head', 'usersiteguard_admin_head');

//change footer text
function usersiteguard_footer_text()
{
	echo '2012 by <a href="' . get_dashboard_blog()->siteurl . '">aizhichuang.com</a>';
}
add_filter('admin_footer_text', 'usersiteguard_footer_text');

//remove admin bar
remove_action('in_admin_header', 'wp_admin_bar_render', 0);
?>
