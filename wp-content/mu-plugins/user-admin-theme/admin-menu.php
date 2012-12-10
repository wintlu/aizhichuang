<?php 

function aizhichuang_wp_before_admin_bar_render(){
		function print_current_class($link)
		{
			if(is_array($link)){
				foreach ($link as $linkitem) {
					if(strpos($_SERVER['REQUEST_URI'], $linkitem)){
						echo 'class="current"';
						return;	
					}
				}
			}
			else{
				if(strpos($_SERVER['REQUEST_URI'], $link)){
					echo 'class="current"';
				}	
			}
		}

?>
<div id="admin-menu-container">
	<ul>
		<li class="admin-menu-dashboard">
			<a href="index.php" <?php print_current_class('index.php') ?>> </a>
		</li>
		<li class="admin-menu-page">
			<a href="edit.php?post_type=page" <?php print_current_class(array('edit.php','post.php','post-new.php')); ?>> </a>
		</li>
		<li class="admin-menu-comment">
			<a href="edit-comments.php"  <?php print_current_class('edit-comments.php') ?>> </a>
		</li>
		<li class="admin-menu-theme">
			<a href="themes.php"  <?php print_current_class('themes.php') ?>> </a>
		</li>
		<li class="admin-menu-settings">
			<a href="options-general.php"  <?php print_current_class('options-general.php') ?>> </a>
		</li>
	</ul>
</div>

<?php
}
add_action('before_admin_wpbody', 'aizhichuang_wp_before_admin_bar_render');
?>