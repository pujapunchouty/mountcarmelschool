<?php get_header(); ?>

	<div id="frame">  
	
		<div id="content">
		
			<div id="main" class="home">
			          
				<?php
				if (option::get('featured_enable') == 'on' && is_home() && $paged < 2) { 
					get_template_part('featured-posts', '');
				} 

				if (option::get('featured_page_1_show') == 'on' && is_home() && $paged < 2) { 
					get_template_part('featured-page', '');
				} ?>
				          
				<div id="homeColumns">
				            
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage: Content Widgets') ) : ?> <?php endif; ?>
							
				<div class="cleaner">&nbsp;</div>
				</div><!-- end #homeColumns -->
			          
			</div><!-- end #main -->
			          
			<div id="sidebar">
			          
				<?php get_sidebar(); ?>
			          
			</div><!-- end #sidebar -->
			 
			<div class="cleaner">&nbsp;</div>
		</div><!-- end #content -->
	
	</div><!-- end #frame -->

<?php get_footer(); ?>