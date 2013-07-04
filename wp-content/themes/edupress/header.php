<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php ui::title(); ?></title>

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
    
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php wp_head(); ?>

	<?php 
	if ($paged < 2 && option::get('featured_enable') == 'on' && is_home()) {
    	ui::js("slides.min.jquery"); 
	}
	?>
  
</head>
<body <?php body_class() ?>>

<div id="container">

<div id="header">

	<div class="wrapper">

		<div id="logo">

			<?php if (!option::get('misc_logo_path')) { ?>
				<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
				<p class="tagline"><?php bloginfo('description'); ?></p>
			<?php } else { ?>
				<a href="<?php bloginfo('url'); ?>"><img src="<?php echo ui::logo(); ?>" alt="<?php bloginfo('name'); ?>" /></a>
			<?php } ?>

		</div><!-- end #logo -->
		
		<?php if (option::get('tel_enable') == 'on') { ?>
		<div id="callInfo">
			<span><?php print(option::get('tel_text')); ?></span>
		</div><!-- end #callInfo -->
		<?php } // if show header text ?>
		<div class="cleaner cleaner-head">&nbsp;</div>
		      
		<?php if (option::get('menu_top_show') == 'on') { ?>

		<div id="navigation">
		          
		<?php if (has_nav_menu( 'primary' )) { ?>
			<nav id="main-menu">
			<?php wp_nav_menu( array('container' => '', 'container_class' => '', 'menu_class' => 'dropdown', 'menu_id' => 'nav', 'sort_column' => 'menu_order', 'theme_location' => 'primary' ) ); ?>
			</nav>
			<?php 
		}
		else
		{
			echo '<p>Please set your Main Menu on the <strong><a href="'.get_admin_url().'nav-menus.php">Appearance > Menus</a></strong> page</p>';
		}
		?>
		    
		</div><!-- end #navigation -->
		
		<?php } ?>

		<div class="cleaner">&nbsp;</div>

	</div><!-- end .wrapper -->

</div><!-- end #header -->

<div class="wrapper">