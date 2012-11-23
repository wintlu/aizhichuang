<?php
/** footer.php
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0	- 05.02.2012
 */
	
				tha_footer_before(); ?>
				<footer id="colophon" role="contentinfo">
					<?php tha_footer_top(); ?>
					<div id="page-footer" class="clearfix pull-center" style="text-align: center">
						Copyright 2012
					</div><!-- #page-footer .well .clearfix -->
					<?php tha_footer_bottom(); ?>
				</footer><!-- #colophon -->
				<?php tha_footer_after(); ?>
			</div><!-- #page -->
		</div><!-- .container -->
	<!-- <?php printf( __( '%d queries. %s seconds.', 'the-bootstrap' ), get_num_queries(), timer_stop(0, 3) ); ?> -->
	<?php wp_footer(); ?>
	</body>
</html>
<?php

/* End of file footer.php */
/* Location: ./wp-content/themes/the-bootstrap/footer.php */