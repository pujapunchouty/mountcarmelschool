	<div id="footer">
	  
		<div class="column">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer: Left Column') ) : ?> <?php endif; ?>
			<div class="cleaner">&nbsp;</div>
		</div><!-- end .column -->
		      
		<div class="column">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer: Center Column') ) : ?> <?php endif; ?>
			<div class="cleaner">&nbsp;</div>
		</div><!-- end .column -->
		      
		<div class="column column-last">
			<p class="copy"><?php _e('Copyright', 'wpzoom'); ?> &copy; <?php echo date("Y",time()); ?> <?php bloginfo('name'); ?>. <?php _e('All Rights Reserved', 'wpzoom'); ?>.</p>
			<p class="wpzoom"><a href="http://www.wpzoom.com" target="_blank" title="Education WordPress Themes"><img src="<?php bloginfo('template_url'); ?>/images/wpzoom.png" alt="WPZOOM" /></a> <a href="http://www.wpzoom.com" target="_blank"><?php _e('Education WordPress Theme', 'wpzoom'); ?></a> <?php _e('by', 'wpzoom'); ?></p>
			<div class="cleaner">&nbsp;</div>
		</div><!-- end .column -->
		    
		<div class="cleaner">&nbsp;</div>
	
	</div><!-- end #footer -->

</div><!-- end .wrapper -->
    
</div><!-- end #container -->

<?php wp_footer(); ?>
</body>
</html>