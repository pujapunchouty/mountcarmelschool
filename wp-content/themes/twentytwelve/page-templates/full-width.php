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
		<div id="content" role="main">

			<div id="home_left_column">
<div id="welcome_msg">
  <div id="welcome_title">
    <h1>Welcome from the Head</h1>
  </div>
  <div id="welcome_content">
    <div id="BodyContent1" class="bodycontent">

“We are an independent, girls’ school in Ealing, west London with a long tradition of academic excellence and creativity within an exceptionally warm and friendly community”

   <img src="/wordpress/wp-content/themes/twentytwelve/images/headmaster_pic.png" style="" alt="Ms Lucinda Hunt BSc, ARCS, London">
   </div>
   </div>
   <div id="welcome_read_more">
   <p>
    <a href="/wordpress/?page_id=36">Read Full Message</a>
   </p>
   </div>
</div>
<div id="helping_others">
  <div id="BodyContent2" class="bodycontent">
   <ul class="home_page">
    <li>
      <h2>
       <a href="#">Helping Others</a>
      </h2>
    <p>Every class chooses a charity and raises money</p>
    <p>
      <img src="/wordpress/wp-content/themes/twentytwelve/images/helping_others_girls_pic.png" style="">
    </p>
   </li>
  </ul>
  </div>
  </div>
</div><!--#home_left_column -->


<div id="middle_column">
<div id="tabbed_panel_wrapper">
</div><!--#tabbed_panel_wrapper -->
</div><!--#middle_column -->

<div id="right_column">

 <div id="events_panel">
   <h1>Latest News</h1>
   <div id="events_blog_content">
      <div id="forthcoming_posts">     
    <?php
	$args = array('numberposts' => '5' );
	$recent_posts = wp_get_recent_posts( $args );
      
	foreach( $recent_posts as $recent ){
                 
		echo '<li> <p> » </p><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >  ' .   $recent["post_title"].'</a> </li>';}		
?>
       </div><!--#forthcoming_posts -->
    </div><!--#events_blog_content -->
   <div id="events_read_more">
     <p>
     <a href="#">View School Calendar</a>
     </p>
   </div><!--#events_read_more -->

 </div><!--#events_panel -->
</div><!--#right_column -->

		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main .wrapper -->
</div><!-- #page -->
<?php get_footer(); ?>
