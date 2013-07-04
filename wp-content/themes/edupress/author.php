<?php get_header(); ?>

	<div id="frame">
	
		<div id="crumbs"><?php echo '<p>'; wpzoom_breadcrumbs(); echo'</p>'; ?></div>
	
		<div id="content">
		
			<div id="main">
			          
				<?php get_template_part('loop', 'author'); ?>
				          
			</div><!-- end #main -->
			          
			<div id="sidebar">
			          
				<?php get_sidebar(); ?>
			          
			</div><!-- end #sidebar -->
			 
			<div class="cleaner">&nbsp;</div>
		</div><!-- end #content -->
	
	</div><!-- end #frame -->

<?php get_footer(); ?>