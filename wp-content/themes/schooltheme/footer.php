<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	
	<footer id="colophon" role="contentinfo">
		<div id="footer_container">
                    <div id="footer_wrapper">
                    <div id="footer_content" class="logo">
		<h1>
		<a target="_blank" href="<?php echo get_option('home'); ?>">Mount Carmel School</a>
		</h1>
		</div><!-- #footer_content -->


	<div id="footer_content" class="quicklinks">
		<h2>Quicklinks</h2>
		<ul>
		<li>
			<a target="_blank" href="<?php echo get_permalink(get_page_by_title( 'Online Admission' )); ?> ">Online Admission</a>
		</li>
		<li>
			<a target="_blank" href="<?php echo get_permalink(get_page_by_title( 'Circulars' )); ?>">Circulars</a>
		</li>
                <li>
			<a target="_blank" href="<?php echo get_permalink(get_page_by_title( 'Photo Gallery' )); ?>">Photo Gallery</a>
		</li>
		<li>
			<a target="_blank" href="<?php echo get_permalink(get_page_by_title( 'About Us' )); ?>">About Us</a>
		</li>
		<li>
			<a target="_blank" href="<?php echo get_permalink(get_page_by_title( 'Home Work' )); ?>">Home Work</a>
		</li>		

		</ul>	
		
</div><!-- #footer_content -->


<div id="footer_content" class="sharing_options">
	<h2>Sharing Options</h2>
	            
       <?php 
       juiz_sps();
       ?>
	</ul>
</div><!-- #footer_content -->

<div id="footer_content" class="contact_details">
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer Widgets')) : ?>
	<?php endif; ?>
</div><!-- #footer_content -->


<div id="footer_content" class="maps">
<h2 id="maps_id">Map</h2>
<a href="http://www.map-generator.org/79eeadb6-456a-4203-8cca-3773e4d30620/large-map.aspx" target="_blank" style="color: #ffffff; margin-left: 50px"><div id="static_map" style="height: 130px; width: 150px;margin-top: -26px;"></div><a/>
</div><!-- #footer_content -->
                    </div><!-- #footer_wrapper --> 
                </div><!-- #footer_container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>