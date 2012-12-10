<?php 

//restrict internal themes
function aizhichuang_allowed_themes($themes){
	if(is_super_admin())
		return $themes;
	
	if(isset($themes['mainsite']))
		unset($themes['mainsite']);
	if(isset($themes['twentyeleven']))
		unset($themes['twentyeleven']);
	if(isset($themes['twentytwelve']))
		unset($themes['twentytwelve']);
	if(isset($themes['bootstrap']))
		unset($themes['the-bootstrap']);
	return $themes;
}
add_filter('allowed_themes', 'aizhichuang_allowed_themes');

add_filter('show_themes_search_box', '__return_false');

 ?>