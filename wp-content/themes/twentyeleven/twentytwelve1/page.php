<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>				
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
                                 <div id="previous_page_link">         
                       <?php if(is_page("Facilities")) : ?>
                       <a href="<?php echo get_option('home'); ?>">« Return to Home page</a>
                      <?php else : ?>
                  <a href="javascript:history.back();">« Return to previous page</a>
                   <?php endif; // is_page() ?>
                                </div>
	</div><!-- #primary -->

<?php get_sidebar(); ?>
</div><!-- #main .wrapper -->
</div><!-- #page -->
<?php get_footer(); ?>