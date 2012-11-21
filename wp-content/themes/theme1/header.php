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
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css'?>" type="text/css"/>
<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/bootstrap/css/bootstrap-responsive.min.css'?>" type="text/css"/>
<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/style.css' ?>" type="text/css"/>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="container-narrow">
	<header id="masthead" class="site-header" role="banner">
		<div id="header-meta-container">
			<div id="header-meta">
				<img src="<?php echo get_template_directory_uri() . '/images/user-thumbnail.jpg'?>" alt="header small" />
					<table class="header-meta-info">
						<tr>
							<td>
								131
								<div>VISIT</div>		
							</td>
							<td>
								21
								<div>TODAY</div>
							</td>
							<td>
								51
								<div>COLLECT</div>
							</td>
						</tr>
					</table>
			</div>
		</div>
		<div>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h3 class="site-description"><?php bloginfo( 'description' ); ?></h3>
		</div>
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<!-- <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?> -->
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="main" class="wrapper">