<?php

function aizhichuang__scripts_method() {
    // wp_deregister_script( 'jquery' );
    // wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
    // wp_enqueue_script( 'jquery' );
}    
add_action('wp_enqueue_scripts', 'aizhichuang__scripts_method');

//add_action('after_delete_post', 'simplelove_after_delete_post');
function simplelove_alert_no_homepage(){
	echo '<div class="alert">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Warning!</strong> You must have a home page for this theme to work properly</div>';
}

function simplelove_init(){
	//try to fix home page
	if(get_option('show_on_front') == 'posts'){
		$home_page = get_page_by_title('Home');
		if($home_page){
			update_option('show_on_front', 'page');
			update_option('page_on_front', $home_page->ID);
		}
		else {
			add_action('simplelove_before_header', 'simplelove_alert_no_homepage');
		}	}
}
add_action('init', 'simplelove_init');

?>