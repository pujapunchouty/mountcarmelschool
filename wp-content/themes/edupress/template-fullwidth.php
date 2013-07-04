<?php
/*
Template Name: Full-width Page
*/
?>
<?php get_header(); ?>

	<div id="frame" class="full-width">
	
		<div id="crumbs"><?php echo '<p>'; wpzoom_breadcrumbs(); echo'</p>'; ?></div>
	
		<div id="content">
		
			<div id="main">
			          
				<?php wp_reset_query(); if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<div class="single">
					<h1><?php the_title(); ?></h1>
					            
					<?php the_content(); ?>
					<?php wp_link_pages(array('before' => '<p class="pages"><strong>'.__('Pages', 'wpzoom').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					<?php edit_post_link( __('Edit page &raquo;', 'wpzoom'), '', ''); ?>
					        
					<div class="cleaner">&nbsp;</div>
				</div><!-- end .single -->
				          
				<?php if (option::get('page_comments') == 'on') { ?>
					<?php comments_template(); ?>  
				<?php } ?>
		
				<?php endwhile; else: ?>
		
					<p><?php _e('Sorry, this page doesn\'t exist', 'wpzoom');?>.</p>
		
				<?php endif; ?>
				          
				<div class="cleaner">&nbsp;</div>
			          
			</div><!-- end #main -->
			 
			<div class="cleaner">&nbsp;</div>
		</div><!-- end #content -->
	
	</div><!-- end #frame -->

<?php get_footer(); ?>