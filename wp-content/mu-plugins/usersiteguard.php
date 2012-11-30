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
?>
