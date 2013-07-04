<?php
 
/* Custom Posts Types for Slideshow  */
add_action('init', 'slideshow_register');

function slideshow_register() {
	$labels = array(
		'name' => _x('Slideshow', 'post type general name'),
		'singular_name' => _x('Slideshow Item', 'post type singular name'),
		'add_new' => _x('Add a New Slide', 'slideshow item'),
		'add_new_item' => __('Add New Slideshow Item'),
		'edit_item' => __('Edit Slideshow Item'),
		'new_item' => __('New Slideshow Item'),
		'view_item' => __('View Slideshow Item'),
		'search_items' => __('Search Slideshow'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
 		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 20,
		'supports' => array('title','editor','thumbnail', 'excerpt', 'custom-fields')
	  ); 
 
	register_post_type( 'slideshow' , $args );
}

function admin_init(){
	add_meta_box("faq_excerpt", "Important Notices", "faq_excerpt_completed", "slideshow", "side", "high");
}
  
function faq_excerpt_completed(){
	global $post;
	$custom = get_post_custom($post->ID);
	$faq_excerpt_completed = $custom["faq_excerpt_completed"][0];
	?>
	<p>If you get a <strong>404 Error</strong> when trying to view a post from slideshow, simply access <a href='options-permalinks.php' target='_blank'>Permalinks</a> section, and this will fix the problem.<br/><br/>
	<em>Example of call-to-action button:</em> <br /><br /><code><?php print(htmlentities('<a class="button" href="your-url"><span></span>Learn More</a>')); ?></code></p>
	<?php
}

function save_details(){
	global $post;
	update_post_meta($post->ID, "faq_excerpt_completed", $_POST["faq_excerpt_completed"]);
}