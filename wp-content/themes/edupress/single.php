<?php get_header(); ?>
<?php $template = get_post_meta($post->ID, 'wpzoom_post_template', true);?>

	<div id="frame"<?php 
		if ($template == 'full') { echo ' class="full-width"'; }
		elseif ($template == 'side-right') { echo ' class="wrapper-reversed"'; } ?>>
	
		<div id="crumbs"><?php echo '<p>'; wpzoom_breadcrumbs(); echo'</p>'; ?></div>
	
		<div id="content">
		
			<div id="main">
			          
				<?php wp_reset_query(); if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<div class="single">
					<h1><?php the_title(); ?></h1>

					<p class="postmetadata">
						<?php if (option::get('post_author') == 'on') { ?><span class="author"><?php _e('By', 'wpzoom'); ?> <?php the_author_posts_link(); $prev = TRUE; ?></span><?php } ?>
						<?php if (option::get('post_category') == 'on') { if ($prev) {echo ' / '; } ?><span class="category"><?php _e('In ', 'wpzoom'); the_category(', '); $prev = TRUE; ?></span><?php } ?>
						<?php if (option::get('post_date') == 'on') { if ($prev) {echo ' / '; } ?><time datetime="<?php the_time("Y-m-d"); ?>" pubdate><?php the_time("j F Y"); ?></time><?php $prev = TRUE; } ?>
						<?php if (option::get('post_comments') == 'on') { if ($prev) {echo ' / '; } ?><?php comments_popup_link( __('0 comments', 'wpzoom'), __('1 comment', 'wpzoom'), __('% comments', 'wpzoom'), '', __('Comments are Disabled', 'wpzoom')); } 
						edit_post_link( __('Edit post', 'wpzoom'), ' / ', ''); ?>
					</p>

					<?php if (option::get('banner_post_top_enable') == 'on') { ?>
					<div class="banner">
							
						<?php if ( option::get('banner_post_top_html') <> "") { 
							echo stripslashes(option::get('banner_post_top_html'));             
						} else { ?>
							<a href="<?php echo option::get('banner_post_top_url'); ?>" rel="nofollow" title="<?php echo option::get('banner_post_top_alt'); ?>"><img src="<?php echo option::get('banner_post_top'); ?>" alt="<?php echo option::get('banner_post_top_alt'); ?>" /></a>
						<?php } ?>		   	
									
					</div><!-- end .banner -->
			
					<div class="cleaner">&nbsp;</div>
					<?php } ?>
					            
					<?php the_content(); ?>
					<?php wp_link_pages(array('before' => '<p class="pages"><strong>'.__('Pages', 'wpzoom').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					<?php if (option::get('post_tags') == 'on') { ?><?php the_tags( '<p class="tags"><strong>'.__('Tags', 'wpzoom').':</strong> ', ', ', '</p>'); } ?>
					        
					<div class="cleaner">&nbsp;</div>

					<?php if (option::get('banner_post_bottom_enable') == 'on') { ?>
					<div class="banner">
							
						<?php if ( option::get('banner_post_bottom_html') <> "") { 
							echo stripslashes(option::get('banner_post_bottom_html'));             
						} else { ?>
							<a href="<?php echo option::get('banner_post_bottom_url'); ?>" rel="nofollow" title="<?php echo option::get('banner_post_bottom_alt'); ?>"><img src="<?php echo option::get('banner_post_bottom'); ?>" alt="<?php echo option::get('banner_post_bottom_alt'); ?>" /></a>
						<?php } ?>		   	
									
					</div><!-- end .banner -->
					
					<?php } ?>

				</div><!-- end .single -->

				<?php if (option::get('post_share') == 'on') { ?>
				<div class="share_box">
					<p class="title title-small"><span class="share_title"><?php _e('Share This','wpzoom');?></span>
					<span class="share_btn"><a href="http://twitter.com/share" data-url="<?php the_permalink() ?>" class="twitter-share-button" data-count="horizontal">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></span>
					<span class="share_btn"><iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;layout=button_count&amp;show_faces=false&amp;width=80&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:80px; height:21px;" allowTransparency="true"></iframe></span>
					<div class="cleaner">&nbsp;</div>
				</div><!-- end .share_box -->
				<?php } ?>
				          
				<?php if (option::get('post_comments') == 'on') {
					comments_template();
				} ?>
		
				<?php endwhile; else: ?>
		
					<p><?php _e('Sorry, this post doesn\'t exist', 'wpzoom');?>.</p>
		
				<?php endif; ?>
				          
				<div class="cleaner">&nbsp;</div>
			          
			</div><!-- end #main -->
			          
			<?php if ($template != 'full') { ?>
			<div id="sidebar">
			          
				<?php get_sidebar(); ?>
			          
			</div><!-- end #sidebar -->
			<?php } ?>
			 
			<div class="cleaner">&nbsp;</div>
		</div><!-- end #content -->
	
	</div><!-- end #frame -->

<?php get_footer(); ?>