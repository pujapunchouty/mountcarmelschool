<?php

/*----------------------------------*/
/* Custom Posts Options				*/
/*----------------------------------*/

add_action('admin_menu', 'wpzoom_options_box');

function wpzoom_options_box() {
	add_meta_box('wpzoom_post_template', 'Post Options', 'wpzoom_post_options', 'post', 'side', 'high');
	add_meta_box('wpzoom_post_layout', 'Post Layout', 'wpzoom_post_layout_options', 'post', 'normal', 'high');
	add_meta_box('wpzoom_slideshow_template', 'Slide Options', 'wpzoom_slideshow_info', 'slideshow', 'side', 'high');
}

add_action('save_post', 'custom_add_save');

function custom_add_save($postID){
	// called after a post or page is saved
	if($parent_id = wp_is_post_revision($postID))
	{
	  $postID = $parent_id;
	}
	
	if ($_POST['save'] || $_POST['publish'] && !$_POST['wpzoom_slide_type']) {
		update_custom_meta($postID, $_POST['wpzoom_post_template'], 'wpzoom_post_template');
		update_custom_meta($postID, $_POST['wpzoom_post_embed_code'], 'wpzoom_post_embed_code');
	}

	if ($_POST['wpzoom_slide_type']) {
		update_custom_meta($postID, $_POST['wpzoom_slide_type'], 'wpzoom_slide_type');
		update_custom_meta($postID, $_POST['wpzoom_slide_caption'], 'wpzoom_slide_caption');
		update_custom_meta($postID, $_POST['wpzoom_slide_embed_code'], 'wpzoom_slide_embed_code');
		update_custom_meta($postID, $_POST['wpzoom_slide_embed_width'], 'wpzoom_slide_embed_width');
		update_custom_meta($postID, $_POST['wpzoom_slide_embed_height'], 'wpzoom_slide_embed_height');
	}

}

function update_custom_meta($postID, $newvalue, $field_name) {
	// To create new meta
	if(!get_post_meta($postID, $field_name)){
		add_post_meta($postID, $field_name, $newvalue);
	}else{
		// or to update existing meta
		update_post_meta($postID, $field_name, $newvalue);
	}
	
}

// Custom Post Layouts
function wpzoom_post_layout_options() {
	global $post;
	$postLayouts = array('side-left' => 'Sidebar on the left', 'side-right' => 'Sidebar on the right', 'full' => 'Full Width');
	?>

	<style>
	.RadioClass{  
		display: none;
	} 
	
	.RadioLabelClass {
		margin-right: 10px;
	}
	
	img.layout-select {
		border: solid 4px #c0cdd6;
		border-radius: 5px;
	}
	
	.RadioSelected img.layout-select{
		border: solid 4px #3173b2;
	}
	</style>

	<script type="text/javascript">  
	jQuery(document).ready(
	function($)
	{
		$(".RadioClass").change(function(){  
		    if($(this).is(":checked")){  
		        $(".RadioSelected:not(:checked)").removeClass("RadioSelected");  
		        $(this).next("label").addClass("RadioSelected");  
		    }  
		}); 
	});  
	</script>

	<fieldset>
		<div>
			 
			<p>
			
			<?php
			foreach ($postLayouts as $key => $value)
			{
				?>
				<input id="<?php echo $key; ?>" type="radio" class="RadioClass" name="wpzoom_post_template" value="<?php echo $key; ?>"<?php if (get_post_meta($post->ID, 'wpzoom_post_template', true) == $key) { echo' checked="checked"'; } ?> />
				<label for="<?php echo $key; ?>" class="RadioLabelClass<?php if (get_post_meta($post->ID, 'wpzoom_post_template', true) == $key) { echo' RadioSelected"'; } ?>">
				<img src="<?php echo wpzoom::$wpzoomPath; ?>/assets/images/layout-<?php echo $key; ?>.png" alt="<?php echo $value; ?>" title="<?php echo $value; ?>" class="layout-select" /></label>
			<?php
			} 
			?>

			</p>
			
  		</div>
	</fieldset>
	<?php
}

function wpzoom_slideshow_info() {
	global $post;
	?>
	<fieldset>
		<div>
			<p>
				<label for="wpzoom_post_type" >Slide Type:</label><br />
				<select name="wpzoom_slide_type" id="wpzoom_slide_type">
					<option<?php selected( get_post_meta($post->ID, 'wpzoom_slide_type', true), 'Image' ); ?>>Image</option>
					<option<?php selected( get_post_meta($post->ID, 'wpzoom_slide_type', true), 'Video' ); ?>>Video</option>
				</select>
			</p>
			<p>
				<label for="wpzoom_slide_caption" >Slide Caption (will appear in the tabs area):</label><br />
				<textarea style="height: 30px; width: 250px;" name="wpzoom_slide_caption" id="wpzoom_slide_caption"><?php echo get_post_meta($post->ID, 'wpzoom_slide_caption', true); ?></textarea>
				<br />
			</p>
			<p>
				<label for="wpzoom_slide_embed_code" >Video Embed Code (only for video slides):</label><br />
				<textarea style="height: 100px; width: 250px;" name="wpzoom_slide_embed_code" id="wpzoom_slide_embed_code"><?php echo get_post_meta($post->ID, 'wpzoom_slide_embed_code', true); ?></textarea>
				<br />
			</p>
			<p>
				<label for="wpzoom_slide_embed_width" >Video Width (only if resize is needed | default: 680):</label><br />
				<textarea style="height: 30px; width: 250px;" name="wpzoom_slide_embed_width" id="wpzoom_slide_embed_width"><?php echo get_post_meta($post->ID, 'wpzoom_slide_embed_width', true); ?></textarea>
				<br />
			</p>
			<p>
				<label for="wpzoom_slide_embed_height" >Video Height (only if resize is needed | default: 300):</label><br />
				<textarea style="height: 30px; width: 250px;" name="wpzoom_slide_embed_height" id="wpzoom_slide_embed_height"><?php echo get_post_meta($post->ID, 'wpzoom_slide_embed_height', true); ?></textarea>
				<br />
			</p>
		</div>
	</fieldset>
	<?php
}

// Regular Posts Options
function wpzoom_post_options() {
	global $post;
	?>
	<fieldset>
		<div>
			<p>
				<label for="wpzoom_post_embed_code" >Video Embed Code (for Multimedia Widget (carousel)):</label><br />
				<textarea style="height: 100px; width: 250px;" name="wpzoom_post_embed_code" id="wpzoom_post_embed_code"><?php echo get_post_meta($post->ID, 'wpzoom_post_embed_code', true); ?></textarea>
				<br />
			</p>
  		</div>
	</fieldset>
	<?php
	}
?>
<?php
$wpzoom_featured_fields = array(
	array(
		"name"		=> "wpzoom_is_featured",
		"label"		=> "Feature this Post",
		"type"		=> "checkbox"
	),	// checkbox
	
	);

function wpzoom_featured_meta( $post_data, $meta_info ) {
	global $post, $wpzoom_featured_fields;
	echo '<div class="wpzoom_panel"><input type="hidden" name="wpzoom_featured_metaes_nonce" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
	foreach( $wpzoom_featured_fields as $o ){
		$val = get_post_meta( $post->ID, $o['name'], true );
		echo '<p>';

		switch ( $o['type'] ){
			case "checkbox":
				$isChecked = ( $val == 1 ? 'checked="checked"' : '' ); // we store checked checkboxes as 1
				echo '<input type="checkbox" name="' . $o['name'] . '" id="' . $o['name'] . '" ' . $isChecked . ' /> <label for="wpzoom_is_featured" >' . $o['label'] . '</label>';
			break; // checkbox

			case "text":
				default:
				echo '<input type="text" name="' . $o['name'] . '" id="' . $o['name'] . '" value="' . $val . '" placeholder="' . $o['label'] . '" />';
			break; // text & default

			 
		}// switch

	}// foreach
	echo '</div>';
?>

<style type="text/css" media="screen">
	.wpzoom_panel input[type="text"],
	.wpzoom_panel textarea {
		width:100%;
	}
	.wpzoom_panel .desc {
		text-align:right;
	}
 
</style>

<?php 
}

function wpzoom_create_featured_meta() {
	if ( function_exists( 'add_meta_box' ) ) {
		add_meta_box( 'wpzoom_featured_meta', 'Feature this Post?', 'wpzoom_featured_meta', 'post', 'side', 'high' );
	}
}

function wpzoom_save_featured_meta( $post_id ) {

	global $post, $post_id, $wpzoom_featured_fields;
	if ( in_array( $_REQUEST['post_type'], array('page') ) ) {
		if ( !current_user_can( 'edit_page', $post_id ) ) {return $post_id;}
	} else {
		if ( !current_user_can( 'edit_post', $post_id ) ) {return $post_id;}
	}

	foreach($wpzoom_featured_fields as $o){
		if ( !wp_verify_nonce( $_REQUEST['wpzoom_featured_metaes_nonce'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		switch ($o['type']){
			case "checkbox":
				update_post_meta( $post_id, $o['name'], isset( $_REQUEST[$o['name']] ) );
			break;
			default:
				update_post_meta($post_id, $o['name'], $_REQUEST[$o['name']]);
			break;
		}
	}
}
add_action( 'admin_menu', 'wpzoom_create_featured_meta' );  
add_action( 'save_post', 'wpzoom_save_featured_meta' );