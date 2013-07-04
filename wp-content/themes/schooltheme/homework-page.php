<?php
/**
 * Template Name: Homework Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
                           <header class="entry-header">
			<h2 class="entry-title"><?php the_title(); ?></a></h2>
		</header><!-- .entry-header -->

<div id="display_msg">
  <div id="error_msg">
  <p>please select fields </p>
 </div>
  <div id="success_msg">
   <p>success</p>
   </div>

</div>


<div id="form">

			
                   <form action="#">
Select Class:
<select name="classlist" id="class_select">
<option value=''>select</option>
<?php 
$sql = mysql_query("SELECT id,classname FROM classnames");
while ($row = mysql_fetch_array($sql)){
echo "<option value=".$row['id'].">" . $row['classname'] . "</option>";
}
?>
</select>


<br>
<br>             

		 Select Date:	<input type="date" id="homework_date" />
<br><br>
     <input type="submit" value="submit"/> 
                </form>

</div>
<div id="display_homework">

</div>





<?php global $user_ID; if( $user_ID ) : ?>
<?php if( current_user_can('level_10') ) : ?>

<div id="form2">
			
                   <form action="#">
Select Class:
<select name="classlist2" id="class_select2">
<option value=''>select</option>
<?php 
$sql = mysql_query("SELECT id,classname FROM classnames");
while ($row = mysql_fetch_array($sql)){
echo "<option value=".$row['id'].">" . $row['classname'] . "</option>";
}
?>
</select>


<br>
<br>             

		 Select Date:	<input type="date" id="homework_date2" />
<br><br>

   Homework:  <textarea id="class_homework" rows="10" cols="40"></textarea>
   
<br><br>
     <input id="insert_homework" type="submit" value="insert"/> 
                </form>

</div>

<?php endif; ?>
<?php endif; ?>

		</div><!-- #content -->
<div id="previous_page_link">
                                <a href="javascript:history.back();">« Return to previous page</a>
                                </div>
	</div><!-- #primary -->

<?php get_sidebar(  ); ?>
</div><!-- #content .wrapper --></div><!-- #main .wrapper -->
</div><!-- #page --><?php get_footer(); ?>
