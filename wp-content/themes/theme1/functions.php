<?php

function aizhichuang__scripts_method() {
    // wp_deregister_script( 'jquery' );
    // wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
    // wp_enqueue_script( 'jquery' );
}    
 
add_action('wp_enqueue_scripts', 'aizhichuang__scripts_method');

?>