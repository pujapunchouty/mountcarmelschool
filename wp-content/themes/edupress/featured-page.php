<div class="single">
<?php

$pagid = option::get('featured_page_1'); 
if ($pagid > 0)
{

	query_posts("page_id=$pagid&showposts=1");
					
	//The Loop
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<h1><?php the_title(); ?></h1>
	<p class="postmetadata"><?php edit_post_link(' Edit this entry','','.'); ?></p>
	<?php the_content(''); ?>

	<?php endwhile; endif; 

} ?>

</div><!-- end .single -->