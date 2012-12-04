<?php 

//page section
function aizhichuang_manage_pages_columns($columns) {
	if (is_super_admin())
		return $columns;

	unset($columns['author']);
	unset($columns['date']);
	return $columns;
}
add_filter('manage_pages_columns', 'aizhichuang_manage_pages_columns');
add_filter('bulk_actions-' . 'edit-page', '__return_empty_array');
add_filter('show_extra_tablenav', '__return_false');
//add_filter('views_edit-page', '__return_empty_array');
 ?>