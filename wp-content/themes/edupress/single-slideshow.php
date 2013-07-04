<?php get_header(); ?>

	<div id="frame">
	
		<div id="crumbs"><?php echo '<p>'; wpzoom_breadcrumbs(); echo'</p>'; ?></div>
	
		<div id="content">
		
			<div id="main">
			          
				<?php wp_reset_query(); if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<div class="single">
					<h1><?php the_title(); ?></h1>

					<?php the_content(); ?>
					<?php wp_link_pages(array('before' => '<p class="pages"><strong>'.__('Pages', 'wpzoom').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					<?php if (option::get('post_tags') == 'on') { ?><?php the_tags( '<p class="tags"><strong>'.__('Tags', 'wpzoom').':</strong> ', ', ', '</p>'); } ?>
					        
					<div class="cleaner">&nbsp;</div>

				</div><!-- end .single -->

				<?php endwhile; else: ?>
		
					<p><?php _e('Sorry, this post doesn\'t exist', 'wpzoom');?>.</p>
		
				<?php endif; ?>
				          
				<div class="cleaner">&nbsp;</div>
			          
			</div><!-- end #main -->
			          
			<div id="sidebar">
			          
				<?php get_sidebar(); ?>
			          
			</div><!-- end #sidebar -->
			 
			<div class="cleaner">&nbsp;</div>
		</div><!-- end #content -->
	
	</div><!-- end #frame -->

<?php get_footer(); ?>