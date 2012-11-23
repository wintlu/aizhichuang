<?php
/** header.php
 *
 * Displays all of the <head> section and everything up till </header>
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0 - 05.02.2012
 */

?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<?php tha_head_top(); ?>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<title><?php wp_title( '&laquo;', true, 'right' ); ?></title>
		
		<?php tha_head_bottom(); ?>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="top-ads"></div>
		<div class="container">
			<div id="">
				<header id="branding" role="banner" class="clearfix">
					<hgroup class="clearfix">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img id="logo" src="<?php echo get_stylesheet_directory_uri() . '/images/aizhichuang-logo.png'; ?>" alt="logo"/>
						</a>
						<div id="header-controls" class="pull-right clearfix">
							<div class="">
								<?php
										if ( ! is_user_logged_in() ) { // Display WordPress login form:
										   echo '<a href="./wp-login.php">Login</a> | <a href="./wp-login.php?action=register">Register</a>';
										} else { // If logged in:
										    wp_loginout( home_url() ); // Display "Log Out" link.
										    echo " | ";
										    wp_register('', ''); // Display "Site Admin" link.
										}
										?>
							 </div>
							<!--ad--> 
							<a href="#">
								<img id="banner-ad" src="<?php echo get_stylesheet_directory_uri() . '/images/banner-ad.png'; ?>"/>
							</a>
						</div>
					</hgroup>
					<nav id="access" role="navigation">
						<div>
							<div class="">
								 <?php $args = array('menu_class' => 'nav-menu-container', 'show_home' => true);
								wp_page_menu($args); ?>
								
							<?php if ( the_bootstrap_options()->navbar_searchform ) {
									the_bootstrap_navbar_searchform();
								} ?>
						    </div>
						</div>
					</nav><!-- #access -->
				</header><!-- #branding --><?php
				tha_header_after();
				

/* End of file header.php */
/* Location: ./wp-content/themes/the-bootstrap/header.php */