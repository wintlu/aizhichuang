<?php

function loveisland_login_logo() {
	echo '<style type="text/css">
 h1 a {height: 150px !important; background: url(' . get_stylesheet_directory_uri() . '/images/aizhichuang-logo.png) 50% 50% no-repeat !important; } </style>';
}

add_action('login_head', 'loveisland_login_logo');

//add_action('after_delete_post', 'loveisland_after_delete_post');
function loveisland_alert_no_homepage(){
	echo '<div class="alert">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Warning!</strong> You must have a home page for this theme to work properly</div>';
}

function loveisland_init(){
	//try to fix home page
	if(get_option('show_on_front') == 'posts'){
		$home_page = get_page_by_title('Home');
		if($home_page){
			update_option('show_on_front', 'page');
			update_option('page_on_front', $home_page->ID);
		}
		else {
			add_action('loveisland_before_header', 'loveisland_alert_no_homepage');
		}	}
}
add_action('init', 'loveisland_init');


function loveisland_comment_form_defaults( $defaults ) {
	return wp_parse_args( array(
		'comment_field'			=>	'<div class="comment-form-comment control-group"><label class="control-label" for="comment">' . _x( 'Comment', 'noun', 'the-bootstrap' ) . '</label><div class="controls"><textarea class="span7" id="comment" name="comment" rows="8" aria-required="true"></textarea></div></div>',
		'comment_notes_before'	=>	'',
		'comment_notes_after'	=>	'',
		'title_reply'			=>	'<legend class=""> Leave a reply </legend>',
		'title_reply_to'		=>	'<legend>' . __( 'Leave a reply to %s', 'the-bootstrap' ). '</legend>',
		'must_log_in'			=>	'<div class="must-log-in control-group controls">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'the-bootstrap' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) ) ) . '</div>',
		'logged_in_as'			=>	'<div class="logged-in-as control-group controls">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'the-bootstrap' ), admin_url( 'profile.php' ), wp_get_current_user()->display_name, wp_logout_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) ) ) . '</div>',
	), $defaults );
}
//add_filter( 'comment_form_defaults', 'loveisland_comment_form_defaults' );
?>