<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="main">
 */
?><!DOCTYPE html>
<!--[if IE 7 | IE 8]>
<html class="ie" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php bloginfo('name') ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/bootstrap/css/bootstrap.css'?>" type="text/css"/>
<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/bootstrap/css/bootstrap-responsive.css'?>" type="text/css"/>
<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/style.css' ?>" type="text/css"/>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body>
<div id="page-background">
<div id="page-wrapper">
<header id="masthead" class="site-header">
	<div>
		<h1 class="site-title"><a class="light-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<!--h3 class="site-description"><?php bloginfo( 'description' ); ?></h3> -->
	</div>
	<!--menu background wave-->
	<object id="nav-menu-background" data="http://ctc.i.gtimg.cn/qzone/space_item/orig/3/80003.swf" width="528" height="70" type="application/x-shockwave-flash"><param name="allowScriptAccess" value="always">
		<param name="allownetworking" value="all">
		<param name="allowFullScreen" value="true">
		<param name="wmode" value="transparent"><param name="menu" value="false">
		<param name="scale" value="noScale"><param name="salign" value="1">
	</object>
	<?php $args = array('menu_class' => 'nav-menu-wrapper');  wp_page_menu($args); ?>
	
</header><!-- #masthead -->
<div id="page-lace-wrapper">
<div id="page" class="container-narrow">
	<div id="main" class="wrapper">