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

	// other wordpress news
	update_user_meta(get_current_user_id(), 'show_welcome_panel', 0);
	
	wp_add_dashboard_widget('wedding_date', 'Wedding Date', 'aizhichuang_wedding_date', 'aizhichuang_wedding_date_callback');
	function aizhichuang_wedding_date() {
		$wedding_date = get_user_option('wedding_date');
		if(! $wedding_date){
			$wedding_date = date("j, n, Y");
			update_user_option(get_current_user_id(), 'wedding_date', $wedding_date);
		}
    	echo 'your wedding date: ' . date($wedding_date);
    };
	
	wp_add_dashboard_widget('wedding_visitor_log', 'Site visitors', 'aizhichuang_wedding_visitor_log');
	function aizhichuang_wedding_visitor_log() {
    	echo 'Total visitors: ';
    };
	
	wp_add_dashboard_widget('wedding_summary', 'Summary', 'aizhichuang_wedding_summary');
	function aizhichuang_wedding_summary() {
    	aizhichuang_dashboard_quota();
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
		<p class="sub musub"><?php _e( 'Storage Space' ); ?></p>
		<div class="table table_content musubtable">
		<table>
			<tr class="first">
				<td class="first b b-posts"><?php printf( __( '<a href="%1$s" title="Manage Uploads" class="musublink">%2$sMB</a>' ), esc_url( admin_url( 'upload.php' ) ), $quota ); ?></td>
				<td class="t posts"><?php _e( 'Space Allowed' ); ?></td>
			</tr>
		</table>
		</div>
		<div class="table table_discussion musubtable">
		<table>
			<tr class="first">
				<td class="b b-comments"><?php printf( __( '<a href="%1$s" title="Manage Uploads" class="musublink">%2$sMB (%3$s%%)</a>' ), esc_url( admin_url( 'upload.php' ) ), $used, $percentused ); ?></td>
				<td class="last t comments<?php echo $used_color;?>"><?php _e( 'Space Used' );?></td>
			</tr>
		</table>
		</div>
		<br class="clear" />
		<?php
	}
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