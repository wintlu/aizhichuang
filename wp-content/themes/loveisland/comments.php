<?php
if ( post_password_required() )
	return;
?>
<div id="comments" class="comments-area">
	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<div class="comments-title muted">
		</div>

		<ul class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'loveisland_comment' ) ); ?>
		</ul><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'twentytwelve' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentytwelve' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentytwelve' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>
	<?php endif; ?>

	<?php 
	simplelove_comment_form(); 
	?>

</div><!-- #comments .comments-area -->

<?php function loveisland_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	?>
	<li id="li-comment-<?php comment_ID(); ?>" class="clearfix">
		<hr/>
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-author-avatar span1">
				<?php echo get_avatar($comment, 70); ?>
			</div>
			<footer class="span11">
				<p class="comment-author vcard muted">
						<span><?php echo get_comment_author_link(); ?></span>
						<span><?php echo get_comment_date() . ' at ' . get_comment_time();  ?></span>
						<?php if ( !$comment->comment_approved ) : ?>
							<span class="alert">Your comment is awaiting moderation</span>
						<?php endif; ?>
				</p><!-- .comment-author .vcard -->
				<div class="comment-content">
				<?php
					comment_text();
				?>
				</div>
			</footer>
		</article>
	</li>
	<?php
} ?>


<?php 
function simplelove_comment_form( $args = array()) {
	global $id;
	$post_id = $id;

	$commenter = wp_get_current_commenter();
	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$fields =  array(
		'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
		            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
		'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
		            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
		'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label>' .
		            '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
	);

	$required_text = sprintf( ' ' . __('Required fields are marked %s'), '<span class="required">*</span>' );
	$defaults = array(
		'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
		'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) . '</p>',
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => __( 'Leave a Reply' ),
		'title_reply_to'       => __( 'Leave a Reply to %s' ),
		'cancel_reply_link'    => __( 'Cancel reply' ),
		'label_submit'         => __( 'Post Comment' ),
	);

	$args = $defaults;

	?>
		<?php if ( comments_open( $post_id ) ) : ?>
			<?php do_action( 'comment_form_before' ); ?>
			<div id="respond">
				<h3 id="reply-title"><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?> <small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small></h3>
				<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
					<?php echo $args['must_log_in']; ?>
					<?php do_action( 'comment_form_must_log_in_after' ); ?>
				<?php else : ?>
					<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="commentform">
						<?php if ( is_user_logged_in() ) : ?>
							<?php echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>
							<?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>
						<?php else:?>
							<div>
								<input type="text" class="input-small" placeholder="Name" name="author">
							    <input type="email" class="input" placeholder="Email" name="email">
							    <span class="muted">
							    	OR 	<a href="<?php echo wp_login_url(); ?>">Login</a>
							    </span>
							    
						    </div>
						<?php endif; ?>
						
						<textarea class="input" placeholder="Type your comment" rows="5" name="comment"></textarea>
						<p class="form-submit">
							<input name="submit" type="submit" class="btn" id="<?php echo esc_attr( $args['id_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
							<?php comment_id_fields( $post_id ); ?>
						</p>
					</form>
				<?php endif; ?>
			</div><!-- #respond -->
		<?php else : ?>
		<?php endif; ?>
	<?php
}


 ?>
