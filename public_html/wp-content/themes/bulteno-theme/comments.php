<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php printf ( __( 'This post is password protected. Enter the password to view comments.' , THEME_NAME ));?></p>
	<?php
		return;
	}
	
?>
<?php //You can start editing here. ?>
<?php $commentNr=1; ?>
<?php if ( have_comments() && comments_open()) : ?>
		<ol class="comments" id="comments">
			<?php wp_list_comments('type=comment&callback=orangethemes_comment'); ?>
		</ol>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->	
			<div class="no-comments">
				<span class="icon-text">&#59168;</span>
				<h2><?php _e( 'No Comments Yet!' , THEME_NAME );?></h2>
				<p><?php _e( 'No one have left a comment for this post yet!' , THEME_NAME );?></p>
				<a href="#respond" class="text-button"><span class="icon-text">&#59160;</span><?php _e( 'WRITE A COMMENT ON THIS POST' , THEME_NAME );?></a>
			</div>
	<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : ?>


	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	<p><?php printf ( __( 'Only <a href="%1$s"> registered </a> users can comment.', THEME_NAME ), wp_login_url( get_permalink() ));?> </p>
	<?php else : ?>
		<h2 class="main-title"><span class="main-title-text" title="Write a Comment"><span class="title-icon">&#9998;</span><?php _e( 'Write a Comment' , THEME_NAME );?></span><span class="main-title-bg">&nbsp;</span></h2>
		<a href="#" name="respond"></a>
		<a href="#" name="comments"></a>
			<?php 
				$defaults = array(
					'comment_field'       	=> '<p class="comment-form-text"><label for="comment">'.__("Comment:",THEME_NAME).'</label><textarea name="comment" id="comment" placeholder="'.__("Your comment..",THEME_NAME).'"></textarea></p>',
					//'must_log_in'          => '',
					'comment_notes_before' 	=> '',
					'comment_notes_after'  	=> '',
					'id_form'              	=> 'writecomment',
					'id_submit'            	=> 'submit',
					'title_reply'          => '',
					'title_reply_to'       => '',
					'cancel_reply_link'    	=> '',
					'label_submit'         	=> ''.__( 'Post a Comment', THEME_NAME ).'',
				);
				comment_form($defaults);			
			?>


	<?php endif; // if you delete this the sky will fall on your head ?>

<?php endif; ?>