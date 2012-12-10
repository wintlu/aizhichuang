<?php 

//remove screen options
function aizhichuang_remove_screen_options() {
	if (is_super_admin())
		return;
	return false;
}

add_filter('screen_options_show_screen', 'aizhichuang_remove_screen_options');

//hide dashboard meta box
function aizhichuang_dashboard_setup() {
	if (is_super_admin())
		return;
	aizhichuang_remove_meta_box();
	
	// other wordpress news
	update_user_meta(get_current_user_id(), 'show_welcome_panel', 0);
	wp_add_dashboard_widget('wedding_date', 'Wedding Date', 'aizhichuang_wedding_date', 'aizhichuang_wedding_date_callback');
	wp_add_dashboard_widget('wedding_visitor_log', 'Site visitors', 'aizhichuang_wedding_visitor_log');
	wp_add_dashboard_widget('wedding_summary', 'Summary', 'aizhichuang_wedding_summary');
	
	aizhichuang_reorder_dashboard_widgets();
}

function aizhichuang_reorder_dashboard_widgets(){
	global $wp_meta_boxes;
	$normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
	$aizhichuang_widget_backup = array('wedding_summary' => $normal_dashboard['wedding_summary']);
	$aizhichuang_widget_backup_end = array('aizhichuang_recent_comments' => $normal_dashboard['dashboard_recent_comments']);

	unset($normal_dashboard['wedding_summary']);
	unset($normal_dashboard['dashboard_recent_comments']);
	
	// Merge the two arrays together so our widget is at the beginning
	$sorted_dashboard = array_merge($aizhichuang_widget_backup, $normal_dashboard, $aizhichuang_widget_backup_end);
	
	// Save the sorted array back into the original metaboxes 
	$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
	
	//make side widgets
	
	// Then we make a backup of your widget
	$aizhichuang_wedding_date_side_widget = $wp_meta_boxes['dashboard']['normal']['core']['wedding_date'];
	$aizhichuang_site_visitor_side_widget = $wp_meta_boxes['dashboard']['normal']['core']['wedding_visitor_log'];
	
	// We then unset that part of the array
	unset($wp_meta_boxes['dashboard']['normal']['core']['wedding_date']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['wedding_visitor_log']);
	
	// Now we just add your widget back in
	$wp_meta_boxes['dashboard']['side']['core']['wedding_date'] = $aizhichuang_wedding_date_side_widget;
	$wp_meta_boxes['dashboard']['side']['core']['wedding_visitor_log'] = $aizhichuang_site_visitor_side_widget;
}

function aizhichuang_remove_meta_box(){
	remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
	remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
	// right now
	//remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // recent comments
	remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
	// plugins
	remove_meta_box('dashboard_quick_press', 'dashboard', 'normal');
	// quick press
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side'); // recent drafts
	remove_meta_box('dashboard_primary', 'dashboard', 'side');
	remove_meta_box('dashboard_secondary', 'dashboard', 'side');
}

function aizhichuang_wedding_summary() {
    aizhichuang_dashboard_quota();
};

function aizhichuang_wedding_visitor_log() {
	echo 'Total visitors: ';
};

function aizhichuang_wedding_date() {
		$wedding_date = get_user_option('wedding_date');
		if(! $wedding_date){
			$wedding_date = date("j, n, Y");
			update_user_option(get_current_user_id(), 'wedding_date', $wedding_date);
		}
    	echo 'your wedding date: ' . date($wedding_date);
};

// Display File upload quota on dashboard
function aizhichuang_dashboard_quota() {
	if ( !is_multisite() || !current_user_can('upload_files') || get_site_option( 'upload_space_check_disabled' ) )
	return true;

	$quota = get_space_allowed();
	$used = get_dirsize( BLOGUPLOADDIR ) / 1024 / 1024;
	
	if ( $used > $quota )
		$percentused = '100';
	else
		$percentused = ( $used / $quota ) * 100;
	$used_color = ( $percentused >= 70 ) ? ' spam' : '';
	$used = round( $used, 2 );
	$percentused = number_format( $percentused );
	
	?>
	<p class="sub musub"><?php _e('Storage Space'); ?></p>
	<div class="table table_content musubtable">
		<code><?php echo $quota . 'MB'; ?> </code> 
		<?php echo _e('Space Allowed'); ?> 
	</div>
	<div>
		<code><?php printf(__('%1$s MB (%2$s%%) '), $used, $percentused); ?></code>
		Space Used
	</div>
	<?php
}

function aizhichuang_wedding_date_callback(){
	echo '<label for="wedding_date_input">My wedding date</label> <input name="wedding_date" id="wedding_date_input" value="' . get_user_option('wedding_date') . '"></input>';
	
	if ( 'POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['wedding_date']) ) {
		$number = $_POST['wedding_date'];// absint( $_POST['widget-recent-comments']['items'] );
		update_user_option(get_current_user_id(), 'wedding_date', $number);
	}
}

add_action('wp_dashboard_setup', 'aizhichuang_dashboard_setup');
	?>