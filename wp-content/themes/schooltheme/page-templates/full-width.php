<?php
/**
 * Template Name: Full-width Page Template, No Sidebar
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="" class="site-content">
		<div id="content_front" role="main">

			<div id="home_left_column">
<div id="welcome_msg">
  <div id="welcome_title">
    <h1>Welcome from the Principal</h1>
  </div>
  <div id="welcome_content">
    <div id="BodyContent1" class="bodycontent">

“As we reflect on the past years, we feel overwhelmed by God’s Grace that has been upon our School.How wonderfully God has led us and how faithful He has been. . ”
   
   <img src="<?php the_permalink(); ?>wp-content/themes/schooltheme/images/headmaster_pic.png" style="" alt="">
   </div>
   </div>
   <div id="welcome_read_more">
   <p>
    <a href="/wordpress/?page_id=36">Read Full Message</a>
   </p>
   </div>
</div>
<div id="welcome_vice_principal">
 <div id="BodyContent2" class="bodycontent"> 
  
   <ul class="home_page">
    <div id="welcome_title">
    <h1>Welcome from the Vice Principal</h1>
    </div>  
     <div id="vice_pricipal_words">
      "Mount Carmel School is a Senior Secondary School being run under the aegis of Mount Carmel  boys and girls. ." 
    </div>
   
    <div id="welcome_read_more">
   <p>
    <a href="/wordpress/?page_id=216">Read Full Message</a>
   </p>
   </div>  
  </ul>
  </div>
  </div>



</div><!--#home_left_column -->


<div id="middle_column">
<div id="tabbed_panel_wrapper">



 <div id="my-wordpress-tabs"> 
        <div id="my_tabs">
	<ul>                
		<li class="TabbedPanelsTab"><a id="tab1" class="selected_tab" href="javascript:void(0);">Bible<br> Quotes</a></li>
		<li class="TabbedPanelsTab"><a id="tab2" href="javascript:void(0);">Why Mount Carmel? </a></li>
		<li class="TabbedPanelsTab"><a id="tab3" href="javascript:void(0);">Circulars</a></li>
	</ul>
        </div>
        <div id="tab_content">
	<div id="my-wordpress-tabs-1" class="active_tab">
		<p id="rss_para">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Widgets')) : ?>
	<?php endif; ?>
                </p>
	</div>
	<div id="my-wordpress-tabs-2" class="inactive_tab">
              <h1> Why Mount Carmel School? </h1>
		<p>
                  "Mount Carmel School is a Senior Secondary School being run under the aegis of Mount Carmel Educational Society, Chandigarh (Regd.), a group of Christian teachers, dedicated to the cause of complete moral, intellectual and social development of boys and girls. "<br>
"Mount Carmel School is a Senior Secondary School being run under the aegis of Mount Carmel Educational"
                </p>
	</div>
	<div id="my-wordpress-tabs-3" class="inactive_tab">
		<p>
 
   <h1>Circulars</h1>
   <div id="circular_blog_content">
      <div id="forthcoming_circulars">     
    <?php
	$args = array('post_type=circulars&posts_per_page=5');
	$recent_posts = wp_get_recent_posts( $args );
      
	foreach( $recent_posts as $recent ){
                 
		echo '<li> <p> » </p><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >  ' .   $recent["post_title"].'</a> </li>';}		
?>
       </div><!--#forthcoming_circulars -->
    </div> <!-- #circular_blog_content -->
</p>
	</div>
      </div>
      <div id="welcome_read_more" class="tab_read_more">
      <p>
       <a href="#">Read Full Message</a>
      </p>
   </div>
</div> 


</div><!--#tabbed_panel_wrapper -->
</div><!--#middle_column -->

<div id="right_column">

 <div id="events_panel">
   <h1>Latest News</h1>
   <div id="events_blog_content">
      <div id="forthcoming_posts">     
    <?php
	$args = array('numberposts' => '6' );
	$recent_posts = wp_get_recent_posts( $args );
      
	foreach( $recent_posts as $recent ){
                 
		echo '<li> <p> » </p><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >  ' .   $recent["post_title"].'</a> </li>';}		
?>
       </div><!--#forthcoming_posts -->
    </div><!--#events_blog_content -->
   <div id="events_read_more">
     <p>
     <a href="/wordpress/news/">View all News</a>
     </p>
   </div><!--#events_read_more -->

 </div><!--#events_panel -->
</div><!--#right_column -->

		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main .wrapper -->
</div><!-- #page -->
<?php get_footer(); ?>
