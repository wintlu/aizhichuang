<?php
/*
 Plugin Name: main site guard
 Author: Wint Lu
 Description: This plugin can customize wordpress admin panel to aizhichuang.com style. (with more features to be added later) 
 Version: 1.6
 */
 
//fix login page
function custom_login_logo() {
	echo '<style type="text/css">
     h1 a {height: 150px !important; background: url(' . get_dashboard_blog()->siteurl . '/wp-content/themes/mainsite/images/aizhichuang-logo.png) 50% 50% no-repeat !important; } </style>';
}

add_action('login_head', 'custom_login_logo');
 
//fix admin menus
function usersiteguard_remove_metabox_cms() {
	remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
	//remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); // right now
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
}

/*
 * hide welcome panel
 */
function usersiteguard_hide_welcome_panel() {
	global $wp_meta_boxes;

	$user_id = get_current_user_id();

	if (1 == get_user_meta($user_id, 'show_welcome_panel', true))
		update_user_meta($user_id, 'show_welcome_panel', 0);
}

function usersiteguard_main() {
	usersiteguard_remove_metabox_cms();
	usersiteguard_hide_welcome_panel();
}

add_action('wp_dashboard_setup', 'usersiteguard_main');
// Hint: For Multisite Network Admin Dashboard use wp_network_dashboard_setup instead of wp_dashboard_setup.

function usersiteguard_remove_menu_pages() {
	remove_menu_page('link-manager.php');
	remove_menu_page('tools.php');
	remove_menu_page('edit.php');
	remove_menu_page('users.php');
	remove_menu_page('upload.php');
	
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
}

add_action('admin_menu', 'usersiteguard_remove_menu_pages');
?>
