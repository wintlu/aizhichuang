<?php

if (!function_exists('aizhichuang_login_logo')) :

	function aizhichuang_login_logo() {
		echo '<style type="text/css">
     h1 a {height: 150px !important; background: url(' . get_stylesheet_directory_uri() . '/images/aizhichuang-logo.png) 50% 50% no-repeat !important; } </style>';
	}

endif;

add_action('login_head', 'aizhichuang_login_logo');
?>