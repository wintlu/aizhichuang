<div class="span3 well">
    <div id="meta-container">
        <div id="header-meta">
            <img src="<?php echo get_template_directory_uri() . '/images/user-thumbnail.jpg'?>" alt="header small" />
            <div class="meta-info">
               <div class="meta-info-item">
               		Wedding days: <strong> 200 </strong>days
               </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="sidebar-nav">
        <div>
            <?php
			$args = array('menu_class' => 'page-nav-menu', 'show_home' => true);
			wp_page_menu($args);
 ?>
        </div>
    </div>
</div>