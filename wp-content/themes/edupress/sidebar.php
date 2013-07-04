<?php if (option::get('menu_sidebar_show') == 'on') { ?>

<div class="widget">

	<div id="navSide">
	
	<?php if (has_nav_menu( 'secondary' )) { 
		wp_nav_menu( array('container' => '', 'container_class' => '', 'menu_class' => '', 'menu_id' => 'menu-header-menu', 'sort_column' => 'menu_order', 'theme_location' => 'secondary' ) );
	}
	else
	{
		echo '<p>Please set your Sidebar Menu on the <strong><a href="'.get_admin_url().'nav-menus.php">Appearance > Menus</a></strong> page.</p><p>If this menu is not required, disable it from the <strong><a href="'.get_admin_url().'admin.php?page=wpzoom_options">WPZOOM Theme Options</a></strong> page, General tab.</p>
		<p>For more information please <strong><a href="http://www.wpzoom.com/documentation/edupress/">read the documentation</a></strong>.</p>';
	}
	?>
	
	</div><!-- end #navSide -->
	
	<div class="cleaner">&nbsp;</div>
</div><!-- end .widget -->

<?php } ?>
            
<?php if (option::get('banner_sidebar_top_enable') == 'on') { ?>
<div class="widget side_ad">
		
	<?php if ( option::get('banner_sidebar_top_html') <> "") { 
		echo stripslashes(option::get('banner_sidebar_top_html'));             
	} else { ?>
		<a href="<?php echo option::get('banner_sidebar_top_url'); ?>" rel="nofollow" title="<?php echo option::get('banner_sidebar_top_alt'); ?>"><img src="<?php echo option::get('banner_sidebar_top'); ?>" alt="<?php echo option::get('banner_sidebar_top_alt'); ?>" /></a>
	<?php } ?>		   	
				
</div><!-- end .widget .side_ad -->
<?php } ?>

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?> <?php endif; ?>

<?php if (option::get('banner_sidebar_bottom_enable') == 'on') { ?>
<div class="widget side_ad">
		
	<?php if ( option::get('banner_sidebar_bottom_html') <> "") { 
		echo stripslashes(option::get('banner_sidebar_bottom_html'));             
	} else { ?>
		<a href="<?php echo option::get('banner_sidebar_bottom_url'); ?>" rel="nofollow" title="<?php echo option::get('banner_sidebar_bottom_alt'); ?>"><img src="<?php echo option::get('banner_sidebar_bottom'); ?>" alt="<?php echo option::get('banner_sidebar_bottom_alt'); ?>" /></a>
	<?php } ?>		   	
				
</div><!-- end .widget .side_ad -->
<?php } ?>

<div class="cleaner">&nbsp;</div>