<?php 

//profile section
function aizhichuang_user_contactmethods($contactmethods) {
	if (is_super_admin())
		return $contactmethods;
	
	//$contactmethods['twitter'] = 'Twitter'; // Add Twitter
	//$contactmethods['facebook'] = 'Facebook'; // Add Facebook
	unset($contactmethods['yim']);
	// Remove Yahoo IM
	unset($contactmethods['aim']);
	// Remove AIM
	unset($contactmethods['jabber']);
	// Remove Jabber

	return $contactmethods;
}
add_filter('user_contactmethods', 'aizhichuang_user_contactmethods', 10, 1);

 ?>