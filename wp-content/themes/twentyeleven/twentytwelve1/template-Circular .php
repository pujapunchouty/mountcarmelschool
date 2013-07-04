<?php
/*
Template Name: Circular Post Type
*/
?>
<?php get_header(); ?>

		<div id="primary_circular" class="site-content">
			<div id="content" role="main">
                            <header class="entry-header">
			<h2 class="entry-title"><?php the_title(); ?></a></h2>
		</header><!-- .entry-header -->
			
	<?php 
    $args = array(
        'post_type' => 'circular',
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'posts_per_page' => -1
    );
    $query = new WP_Query( $args ); ?>
     
<div class="entry-content">
    <ul>
	<?php while ( $query->have_posts() ) : $query->the_post(); 
	?>
	
	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">	
			
		
			<li><a  title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>" rel="bookmark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		

	</article>	
					
	<?php endwhile; ?>
  <ul>
</div><!-- .entry-content -->
	<?php wp_reset_postdata(); ?>
	
			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_sidebar(); ?>
</div><!-- #main .wrapper -->
</div><!-- #page -->
<?php get_footer(); ?>
