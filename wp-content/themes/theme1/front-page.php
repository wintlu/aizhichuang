<?php get_header(); ?>

<div class="container-fluid" style="padding-top: 10em">
    <div class="row-fluid">
        <div class="span3 well">
            <div class="sidebar-nav">
                <div>
                	<?php 
                	 $args = array(
							'menu_class'  => 'page-nav-menu',
							'show_home' => true);
					wp_page_menu($args); ?>
                </div>
            </div>
        </div>

        <div class="span8 well">
			%Welcome text%
        </div>
    </div>

</div>

<?php get_footer(); ?>