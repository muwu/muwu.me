<?php
/*
Template Name: Contact Page
*/	
?>
<?php get_header(); ?>
<?php get_template_part(THEME_INCLUDES.'top'); ?>

<?php 
	$mail_to = get_option(THEME_NAME."_contact_mail");	
?>
			<!-- BEGIN .content -->
			<div class="content">
				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">
					
					<div class="content-holder">
						<div class="main-content">
							
						<?php if($mail_to) { ?>
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php $map = get_post_meta ($post->ID, THEME_NAME."_map", true );?>
							<h2 class="main-title very-first"><?php the_title();?></h2>
							<?php if($map) { ?>
								<iframe id="contact-map" width="400" height="800" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $map;?>&amp;iwloc=A&amp;output=embed"></iframe>
							<?php } ?> 
							<div class="contact-info">
								<div class="plain-text with-no-bottom-border">
									<?php the_content(); ?>
								</div>
							
								<h2 class="main-title"><?php _e("Write a Comment",THEME_NAME);?></h2>
								
								<div class="plain-text with-no-bottom-border contact-success-block" style="display:none;">
									<div class="message-sent">
										<h3><?php _e( 'Message Sent Succesfully' , THEME_NAME );?></h3>
										<p><?php _e( 'We will contact with you soon' , THEME_NAME );?></p>
									</div>
								</div>
								
								<div class="plain-text with-no-bottom-border">	
									
									<form id="writecomment" name="writecomment" class="contact-form" action="">
										<p class="comment-notes"><?php _e("Your email address will not be published. Required fields are marked ", THEME_NAME);?> <span class="required">*</span></p>
										<input type="hidden"  name="form_type" value="contact" />
										<p class="comment-form-author">
											<label for="u_name"><?php _e("Nickname:", THEME_NAME);?><span class="required">*</span></label><input type="text" name="u_name" id="contact-name-input" placeholder="<?php _e("Nickname..", THEME_NAME);?>" title="<?php _e("Nickname", THEME_NAME);?>" />
											<font class="comment-error" id="contact-name-error" style="display:none;"><span class="icon">&#9888; </span></font>
										</p>
										<p class="comment-form-email">
											<label for="email"><?php _e("E-mail address:", THEME_NAME);?><span class="required">*</span></label><input type="text" name="email" id="contact-mail-input" placeholder="<?php _e("E-mail address..", THEME_NAME);?>" title="<?php _e("E-mail", THEME_NAME);?>" />
											<font class="comment-error" id="contact-mail-error" style="display:none;"><span class="icon">&#9888; </span></font>
										</p>
										<p class="comment-form-url">
											<label for="url"><?php _e("Your website:", THEME_NAME);?></label><input type="text" name="url" id="url" placeholder="<?php _e("Website..", THEME_NAME);?>" title="<?php _e("Website", THEME_NAME);?>" />
										</p>
										<p class="comment-form-text">
											<label for="comment"><?php _e("Message:", THEME_NAME);?></label><textarea name="message" placeholder="<?php _e("Your message..", THEME_NAME);?>" id="contact-message-input"></textarea>
											<font class="comment-error" id="contact-message-error" style="display:none;"><span class="icon">&#9888; </span></font>
										</p>
										<p class="form-submit">
											<input onClick="Validate(); return false;" name="submit" type="submit" id="contact-submit" value="<?php printf ( __( 'Send Message' , THEME_NAME ));?>" class="button-blue" />
										</p>
									</form>
								</div>	

							</div>
							
							<div class="clear-float"></div>

						<?php endwhile; else: ?>
							<p><?php printf ( __('Sorry, no posts matched your criteria.' , THEME_NAME )); ?></p>
						<?php endif; ?>
						<?php } else { echo "<span style=\"color:#000; font-size:14pt;\">You need to set up Your contact mail!</span>"; } ?>
							</div>
							
							<div class="clear-float"></div>
							
						</div>
<?php get_footer(); ?>