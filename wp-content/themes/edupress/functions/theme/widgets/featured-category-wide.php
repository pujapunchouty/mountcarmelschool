<?php

/*------------------------------------------*/
/* WPZOOM: Featured Posts widget (wide)		*/
/*------------------------------------------*/

class wpzoom_widget_feat_posts_wide extends WP_Widget {

/* Widget setup. */
function wpzoom_widget_feat_posts_wide() {
	/* Widget settings. */
	$widget_ops = array( 'classname' => 'wpzoom', 'description' => __('Custom WPZOOM widget for the Homepage Widgets sidebar. Shows posts from one category in a wide column.', 'wpzoom') );
	
	/* Widget control settings. */
	$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'wpzoom-widget-cat-wide' );
	
	/* Create the widget. */
	$this->WP_Widget( 'wpzoom-widget-cat-wide', __('WPZOOM: Featured Posts (wide)', 'wpzoom'), $widget_ops, $control_ops );
}

/* How to display the widget on the screen. */
function widget( $args, $instance ) {

	extract( $args );
	
	/* Our variables from the widget settings. */
	$title1 = apply_filters('widget_title', $instance['title1'] );
	$posts1 = $instance['posts1'];
	$color1 = $instance['color1'];
	$category1 = get_category($instance['category1']);
	$datetime = $instance['datetime'];
	if ($category1) {
		$categoryLink1 = get_category_link($category1);
	}
	global $wpzoomColors;
	echo $before_widget; ?>
	

	<div class="widget wpzoomWidget column column-wide">
		<h3 class="title <?php echo $color1; ?>"><?php if ($categoryLink1) { ?><a href="<?php echo $categoryLink1; ?>"><?php echo $title1; ?></a><?php } else { echo $title1; } ?></h3>
		<ul class="posts">
	
		<?php
		$i = 0;
		$loop = new WP_Query( array( 'posts_per_page' => $posts1, 'orderby' => 'date', 'order' => 'DESC', 'cat' => $instance['category1'] ) );
		while ( $loop->have_posts() ) : $loop->the_post(); $i++; 
		?>
	
			<li>
	
				<?php
				get_the_image( array( 'size' => 'thumbnail', 'width' => 80, 'before' => '<div class="cover">', 'after' => '</div>' ) );
				?>
		
				<h2><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<?php if ($datetime == 'yes') { ?><p class="postmetadata"><?php the_time("M j, Y - G:i"); ?></p><?php } ?>
				<?php the_excerpt(); ?>
				<div class="cleaner">&nbsp;</div>
	
			</li>
			<?php endwhile; wp_reset_query(); ?>
		</ul>
		<div class="cleaner">&nbsp;</div>
	</div><!-- end .widget .wpzoomWidget .column .column-wide -->
	
	<?php 

	echo $after_widget;

	wp_reset_query(); 

	}

	/* Update the widget settings.*/
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title1'] = strip_tags( $new_instance['title1'] );
 		$instance['color1'] = $new_instance['color1'];
		$instance['category1'] = $new_instance['category1'];
		$instance['posts1'] = $new_instance['posts1'];
		$instance['datetime'] = $new_instance['datetime'];
 
		return $instance;
	}

	/** Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function when creating your form elements. This handles the confusing stuff. */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title1' => __('Featured Posts', 'wpzoom'), 'category1' => '0', 'color1' => 'black', 'posts1' => '3', 'datetime' => 'yes' );
		$instance = wp_parse_args( (array) $instance, $defaults );
		global $wpzoomColors;
    ?>

 		<p>
			<label for="<?php echo $this->get_field_id( 'title1' ); ?>"><?php _e('Widget Title:', 'wpzoom'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title1' ); ?>" name="<?php echo $this->get_field_name( 'title1' ); ?>" value="<?php echo $instance['title1']; ?>" style="width:90%;" />
		</p>
    
		<p>
			<label for="<?php echo $this->get_field_id('category1'); ?>"><?php _e('Category:', 'wpzoom'); ?></label>
			<select id="<?php echo $this->get_field_id('category1'); ?>" name="<?php echo $this->get_field_name('category1'); ?>" style="width:90%;">
				<option value="0">Choose category:</option>
				<?php
				$cats = get_categories('hide_empty=0');
				
				foreach ($cats as $cat) {
				$option = '<option value="'.$cat->term_id;
				if ($cat->term_id == $instance['category1']) { $option .='" selected="selected';}
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
			<label for="<?php echo $this->get_field_id('color1'); ?>"><?php _e('Title Background Color:', 'wpzoom'); ?></label>
			<select id="<?php echo $this->get_field_id('color1'); ?>" name="<?php echo $this->get_field_name('color1'); ?>" style="width:90%;">
			<?php
				foreach ($wpzoomColors as $key => $value) {
				$option = '<option value="'.$key;
				if ($key == $instance['color1']) { $option .='" selected="selected';}
				$option .= '">';
				$option .= $value;
				$option .= '</option>';
				echo $option;
				}
			?>
			</select>
		</p>
     
		<p>
			<label for="<?php echo $this->get_field_id('posts1'); ?>"><?php _e('Number of posts to show:', 'wpzoom'); ?></label>
			<select id="<?php echo $this->get_field_id('posts1'); ?>" name="<?php echo $this->get_field_name('posts1'); ?>" style="width:90%;">
			<?php
				$m = 0;
				while ($m < 11) {
				$m++;
				$option = '<option value="'.$m;
				if ($m == $instance['posts1']) { $option .='" selected="selected';}
				$option .= '">';
				$option .= $m;
				$option .= '</option>';
				echo $option;
				}
			?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('datetime'); ?>"><?php _e('Show date and time:', 'wpzoom'); ?></label>
			<select id="<?php echo $this->get_field_id('datetime'); ?>" name="<?php echo $this->get_field_name('datetime'); ?>" style="width:90%;">
				<option value="yes"<?php if ($instance['datetime'] == 'yes') { echo ' selected="selected"';  } ?>>Yes</option>
				<option value="no"<?php if ($instance['datetime'] == 'no') { echo ' selected="selected"';  } ?>>No</option>
			</select>
		</p>
		 
	<?php
	}
}

function wpzoom_register_fpostsw_widget() {
	register_widget('wpzoom_widget_feat_posts_wide');
}
add_action('widgets_init', 'wpzoom_register_fpostsw_widget');
?>