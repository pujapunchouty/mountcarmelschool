<div id="featPosts">
          
	<ul class="slides_container">
	          
		<?php $loop = new WP_Query( array( 'post_type' => 'slideshow', 'posts_per_page' => 4 ) ); $m = 0; ?>
		            
		<?php while ( $loop->have_posts() ) : $loop->the_post(); $m++; ?>
		
		<li class="slide">
		
		<?php 
		unset($posttype, $image,$cropLocation);
		$posttype = get_post_meta($post->ID, 'wpzoom_slide_type', true);
		$cropLocation = get_post_meta($post->ID, 'wpzoom_thumb_crop', true); // get crop location from post meta

		if ($posttype == 'Image') {
		            
			get_the_image( array( 'size' => 'homepage-slider', 'width' => 680, 'height' => 300, 'before' => '<div class="cover">', 'after' => '</div>' ) );
			
			?>

				<div class="postcontent">
					<h2 class="title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<?php the_excerpt(); ?>
				</div><!-- end .postcontent -->

		<?php 
		} // if image
		elseif ($posttype == 'Video')
		{

			$videocode = get_post_meta($post->ID, 'wpzoom_slide_embed_code', true);
			$videowidth = get_post_meta($post->ID, 'wpzoom_slide_embed_width', true);
			$videoheight = get_post_meta($post->ID, 'wpzoom_slide_embed_height', true);
			          
			$wpzoom_slider_width = 680;
			$wpzoom_slider_height = 300;
			          
			if ($videowidth)
			{
				$wpzoom_slider_width = $videowidth;
			}
			if ($videoheight)
			{
				$wpzoom_slider_height = $videoheight;
			}
			          
			if (strlen($videocode) > 10){
				$videocode = preg_replace("/(width\s*=\s*[\"\'])[0-9]+([\"\'])/i", "$1 $wpzoom_slider_width $2", $videocode);
				$videocode = preg_replace("/(height\s*=\s*[\"\'])[0-9]+([\"\'])/i", "$1 $wpzoom_slider_height $2", $videocode);
				$videocode = str_replace("<embed","<param name='wmode' value='transparent'></param><embed",$videocode);
				$videocode = str_replace("<embed","<embed wmode='transparent' ",$videocode);
								
				?><div class="cover"><?php echo "$videocode"; ?></div><?php 
								
			} // if strlen of video > 10
		          
		} // if video ?>
		</li>
		            
		<?php endwhile; ?>
		
	</ul><!-- end .slides_container -->
	          
	<ul id="postsSmall" class="pagination">
	
		<?php while ( $loop->have_posts() ) : $loop->the_post(); 
		unset($caption);
		$caption = get_post_meta($post->ID, 'wpzoom_slide_caption', true);
		if (!$caption) { $caption = get_the_title(); }
		echo "<li><a href=\"#\" rel=\"nofollow\">$caption</a></li>";
	
		endwhile; ?>
	
	</ul>
	          
	<div class="cleaner">&nbsp;</div>
	
	<?php if ($m == 0) { echo '<p><strong>You are now ready to set-up your Slideshow content.</strong></p>
	<p>Start adding slideshow custom posts in the <strong><a href="'.get_admin_url().'edit.php?post_type=slideshow">Slideshow</a></strong> tab. <br />If homepage slideshow is not required, disable it from the <strong><a href="'.get_admin_url().'admin.php?page=wpzoom_options">WPZOOM Theme Options</a></strong> page, Homepage tab. Otherwise this notice will be up until you add at least 1 slideshow post.</p>
	<p>For more information please <strong><a href="http://www.wpzoom.com/documentation/edupress/">read the documentation</a></strong>.</p>'; } ?>
          
</div><!-- end #featPosts -->
          
<div class="cleaner">&nbsp;</div>

<script type="text/javascript">
	jQuery(document).ready(
	function($)
	{
		$('#featPosts').slides({
			preload: true,
			effect: 'slide',
			<?php if (option::get('featured_interval') > 0) { ?>play: <?php echo option::get('featured_interval') . ','; } ?>
			hoverPause: true,
			autoHeight: true,
			generatePagination: false,
			generateNextPrev: false
		});
	});
</script>