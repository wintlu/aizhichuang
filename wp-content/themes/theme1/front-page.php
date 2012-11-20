<?php get_header(); ?>

<div class="container-fluid" style="padding-top: 10em">
    <div class="row-fluid">
        <div class="span3">
            <div class="sidebar-nav">
                <div>
                	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                </div>
                <ul class="nav nav-list">
                    <li class="active">
                        <a href="#">con</a>
                    </li>
                    <li class="">
                        <a href="#">con</a>

                    </li>
                    <li class="">
                        <a href="#">con</a>
                    </li>
                </ul>

            </div>

        </div>

        <div class="span6">
            Content

        </div>
    </div>

</div>

<?php get_footer(); ?>