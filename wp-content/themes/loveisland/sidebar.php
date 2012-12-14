<div class="span3 well">
    <div id="meta-container">
        <div id="header-meta">
            <img src="<?php echo get_template_directory_uri() . '/images/user-thumbnail.jpg'?>" alt="header small" />
            <div class="meta-info">
               <div class="meta-info-item">
               		Wedding date: <strong> <?php echo get_user_option('wedding_date') ?></strong>
               </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="sidebar-nav">
        <div>
            <?php
			$args = array('menu_class' => 'page-nav-menu');
			wp_page_menu($args);
 ?>
        </div>
    </div>
</div>