<?php wp_reset_query(); ?>

<div class="archive">

	<?php if (have_posts()) : $i = 0; ?>
	
	<ul class="posts">
	
		<?php    
		while (have_posts()) : the_post(); $i++;
		?>
	
		<li>
	
			<?php
			get_the_image( array( 'size' => 'loop-main', 'width' => 120, 'height' => 80, 'before' => '<div class="cover">', 'after' => '</div>' ) );
			?>
	
			<div class="postcontent">
				<h2 class="title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<p class="postmetadata"><time datetime="<?php the_time("Y-m-d"); ?>" pubdate><?php printf( __('%s', 'wpzoom'),  get_the_date()); ?></time> / <?php the_category(', '); ?></p>
				<?php the_excerpt(); ?>
			</div>
			<div class="cleaner">&nbsp;</div>
	
		</li>
	
		<?php endwhile; //  ?>
	
	</ul>
	
	<div class="cleaner">&nbsp;</div>
	
	<?php get_template_part( 'pagination'); ?>
	
	<?php else : ?>
	  
	<?php if (is_search()) { _e('No posts matched your search criteria', 'wpzoom'); } else { ?>
	
	<p class="title"><?php _e('There are no posts in this category', 'wpzoom');?></p>
	  
	<?php } // if is search
	
	endif; ?>
	<div class="cleaner">&nbsp;</div>

</div><!-- end .archive -->

<div class="cleaner">&nbsp;</div>