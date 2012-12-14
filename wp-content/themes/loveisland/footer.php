
					</div><!-- #main .wrapper -->
				</div><!-- #page -->
			</div><!--page-lace-wrapper-->
		<div id="page-lace-bottom">
		</div>
		<footer id="colophon" role="contentinfo">
			<p class="text-info">Host by <a href="<?php echo network_site_url(); ?>">aizhichuang.com</a></p>
			<?php if( !is_user_logged_in()): ?>
			<p>
				<a href="<?php echo network_site_url() . './wp-login.php' ?>">Login</a> | 
				<a href="<?php echo network_site_url() . './wp-login.php?action=register'?>">Register</a>
			</p>
			<?php endif; ?>
	</footer><!-- #colophon -->
	</div><!--lace-wrapper-->
 </div><!--page-background-->
<?php wp_footer(); ?>
</div>
</body>
</html>