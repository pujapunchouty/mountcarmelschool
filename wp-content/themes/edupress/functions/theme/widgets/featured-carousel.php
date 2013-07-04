<?php

/*-------------------------------------*/
/* WPZOOM: Multimedia Carousel widget  */
/*-------------------------------------*/

class wpzoom_widget_feat_category extends WP_Widget {

	/* Widget setup. */
	function wpzoom_widget_feat_category() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'wpzoom', 'description' => __('Custom WPZOOM widget for the Homepage Widgets sidebar. Horizontal carousel, showing images and videos from a Category.', 'wpzoom') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'wpzoom-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'wpzoom-widget', __('WPZOOM: Multimedia Carousel', 'wpzoom'), $widget_ops, $control_ops );
	}

	/* How to display the widget on the screen. */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
    	$title = apply_filters('widget_title', $instance['title'] );
		$name = $instance['name'];
		$type = $instance['type'];
		$category = $instance['category'];
		$slugs = $instance['slugs'];
		$posts = $instance['posts'];
		$color = $instance['color'];
		// $category = get_category($instance['category']);

	  if ($type == 'tag')
	  {
		$postsq = $slugs;
	  }
	  elseif ($type == 'cat' && $category)
	  {
		$postsq = implode(",",$category);
	  }

		/* Before widget (defined by themes). */
		//echo $before_widget;
?>

        <div class="cleaner">&nbsp;</div>
		
		<?php if ( $title ) {	echo "<h3 class=\"title $color\">$title</h3>"; } ?>

        <div id="carousel-<?php echo $this->get_field_id('id'); ?>" class="jcarousel wpzoomWidget">
			<ul>
				<?php
				$second_query = new WP_Query( array( $type => $postsq, 'showposts' => $posts, 'orderby' => 'date', 'order' => 'DESC' ) );
				
				$i = 0;
				if ( $second_query->have_posts() ) : while( $second_query->have_posts() ) : $second_query->the_post();  
				$i++;
				global $post;

				get_the_image( array( 'size' => 'carousel', 'width' => 100, 'height' => 80, 'before' => '<li>', 'after' => '</li>' ) ); ?>

				<?php endwhile; ?>
			</ul>
			
			<div class="cleaner">&nbsp;</div>
			<div class="jcarousel-prev" style="display: block;" disabled="false">&laquo; Prev</div>
			<div class="jcarousel-next" style="display: block;" disabled="false">Next &raquo;</div>
               
               <script type="text/javascript">
				function mycarousel_initCallback(carousel)
				{ 
				};

				jQuery(document).ready(function() {
					jQuery('#carousel-<?php echo $this->get_field_id('id'); ?>').jcarousel({
   						scroll: 1,
 						wrap: 'circular',
						initCallback: mycarousel_initCallback
					});
				});
				</script>
              <?php endif; ?>
          <div class="cleaner">&nbsp;</div>
        </div><!-- end #carousel-<?php echo $this->get_field_id('id'); ?> .jcarousel .wpzoomWidget -->
        
 
<?php
		/* After widget (defined by themes). */
		//echo $after_widget;
		wp_reset_query();
	}

	/* Update the widget settings.*/
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['type'] = $new_instance['type'];
		$instance['name'] = strip_tags( $new_instance['name'] );
		$instance['category'] = $new_instance['category'];
		$instance['slugs'] = $new_instance['slugs'];
		$instance['posts'] = $new_instance['posts'];
		$instance['color'] = $new_instance['color'];

		return $instance;
	}

	/** Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function when creating your form elements. This handles the confusing stuff. */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Featured Category', 'wpzoom'), 'type' => 'cat', 'color' => 'black','category' => '', 'posts' => '5' );
		$instance = wp_parse_args( (array) $instance, $defaults );
    	global $wpzoomColors;

	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'wpzoom'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('color'); ?>"><?php _e('Title Background Color:', 'wpzoom'); ?></label>
			<select id="<?php echo $this->get_field_id('color'); ?>" name="<?php echo $this->get_field_name('color'); ?>" style="width:90%;">
			<?php
				foreach ($wpzoomColors as $key => $value) {
				$option = '<option value="'.$key;
				if ($key == $instance['color']) { $option .='" selected="selected';}
				$option .= '">';
				$option .= $value;
				$option .= '</option>';
				echo $option;
				}
			?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('type'); ?>"><?php _e('Posts marked by:', 'wpzoom'); ?></label>
			<select id="<?php echo $this->get_field_id('type'); ?>" name="<?php echo $this->get_field_name('type'); ?>" style="width:90%;">
			<option value="cat"<?php if ($instance['type'] == 'cat') { echo ' selected="selected"';} ?>>Categories</option>
			<option value="tag"<?php if ($instance['type'] == 'tag') { echo ' selected="selected"';} ?>>Tag(s)</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Category(if selected above):', 'wpzoom'); ?></label>
			<?php 
			$activeoptions = $instance['category'];
			if (!$activeoptions)
			{
				$activeoptions = array();
			}
			?>

			<select multiple="true" id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>[]" style="width:90%; height: 100px;">

			<?php
				$cats = get_categories('hide_empty=0');

				foreach ($cats as $cat) {
				$option = '<option value="'.$cat->term_id;
				if ( in_array($cat->term_id,$activeoptions)) { $option .='" selected="selected'; }
				$option .= '">';
				$option .= $cat->cat_name;
				$option .= ' ('.$cat->category_count.')';
				$option .= '</option>';
				echo $option;
				}
			?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'slugs' ); ?>"><?php _e('Tag slugs (if selected above):', 'wpzoom'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'slugs' ); ?>" name="<?php echo $this->get_field_name( 'slugs' ); ?>" value="<?php echo $instance['slugs']; ?>" style="width:90%;" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('posts'); ?>"><?php _e('Posts to show:', 'wpzoom'); ?></label>
			<select id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" style="width:90%;">
			<?php
				$m = 0;
				while ($m < 20) {
				$m++;
				$option = '<option value="'.$m;
				if ($m == $instance['posts']) { $option .='" selected="selected';}
				$option .= '">';
				$option .= $m;
				$option .= '</option>';
				echo $option;
				}
			?>
			</select>
		</p>
	<?php
	}
}

function wpzoom_register_carousel_widget() {
	register_widget('wpzoom_widget_feat_category');
}
add_action('widgets_init', 'wpzoom_register_carousel_widget');
?>