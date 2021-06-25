<?php
	if ( post_password_required() ) {
		return;
	}
	$profile_id = um_profile_id();
	$args = array(
		'comment_field' => '<div class="comment-form-comment">' .
		 	'<div class="comment-form-user">' . get_avatar($profile_id) . '</div>' .
			'<textarea id="comment" name="comment" placeholder="Commenting publicly as '. um_user( 'first_name' ) . '" cols="45" rows="4" aria-required="true"></textarea>' .
			'</div>',
		'submit_field' => '<div class="form-submit"><a href="#" class="cancel-btn">Cancel</a> %1$s %2$s</div>',
		'title_reply' => '',
		'logged_in_as' => false,
		'label_submit' => 'Comment'
	);
?>

<div id="comments" class="comments-area">
	<?php
		comment_form($args);
	?>

	<?php if ( have_comments() ) : ?>

	<ul class="comment-list">
		<?php
			wp_list_comments(
				array(
					'avatar_size' => 72,
					'style'       => 'ul',
					'short_ping'  => true,
					'callback' 		=> 'theme_comment'
				)
			);
		?>
	</ul>

	<?php
		the_comments_pagination(
			array(
				'prev_text' => '<span class="screen-reader-text">' . __( '<', 'wis' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( '>', 'wis' ) . '</span>',
			)
		);

	endif;
	?>
</div><!-- #comments -->
