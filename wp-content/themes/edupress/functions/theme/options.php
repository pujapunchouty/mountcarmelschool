<?php return array(


/* Theme Admin Menu */
"menu" => array(
    array("id"    => "1",
          "name"  => "General"),
    
    array("id"    => "2",
          "name"  => "Homepage"),
          
	array("id"    => "7",
          "name"  => "Banners"),
),

/* Theme Admin Options */
"id1" => array(
    array("type"  => "preheader",
          "name"  => "Theme Settings"),

	 array("name"  => "Logo Image",
          "desc"  => "Upload a custom logo image for your site, or you can specify an image URL directly.",
          "id"    => "misc_logo_path",
          "std"   => "",
          "type"  => "upload"),

    array("name"  => "Favicon URL",
          "desc"  => "Upload a favicon image (16&times;16px).",
          "id"    => "misc_favicon",
          "std"   => "",
          "type"  => "upload"),
          
    array("name"  => "Custom Feed URL",
          "desc"  => "Example: <strong>http://feeds.feedburner.com/wpzoom</strong>",
          "id"    => "misc_feedburner",
          "std"   => "",
          "type"  => "text"),

    array("name"  => "Display Header Text",
          "desc"  => "Leave this checked if you want to display the special text in header (demo: telephone number).",
          "id"    => "tel_enable",
          "std"   => "on",
          "type"  => "checkbox"), 
 
    array("name"  => "Header Text",
          "desc"  => "Example: Call today: 0800-123-456",
          "id"    => "tel_text",
          "std"   => "Change this text in WPZOOM Theme Options > Theme Settings",
          "type"  => "text"),

 	array("type"  => "preheader",
          "name"  => "Global Menu Options"),

    array("name"  => "Show top menu",
          "id"    => "menu_top_show",
          "std"   => "on",
          "type"  => "checkbox"),

    array("name"  => "Show sidebar menu",
          "id"    => "menu_sidebar_show",
          "std"   => "on",
          "type"  => "checkbox"),

 	array("type"  => "preheader",
          "name"  => "Global Posts Options"),
	
    array("name"  => "Excerpt length",
          "desc"  => "Default: <strong>35</strong> (words)",
          "id"    => "excerpt_length",
          "std"   => "35",
          "type"  => "text"),
          
 	array("type"  => "preheader",
          "name"  => "Recent Posts Options"),
          
    array("name"  => "Show Date/time",
          "desc"  => "<strong>Date/Time format</strong> can be changed <a href='options-general.php' target='_blank'>here</a>.",
          "id"    => "display_date",
          "std"   => "on",
          "type"  => "checkbox"),  

    array("name"  => "Show Category",
          "id"    => "display_category",
          "std"   => "on",
          "type"  => "checkbox"),           

    array("name"  => "Show Comments Count",
          "id"    => "display_comments",
          "std"   => "on",
          "type"  => "checkbox"), 

	array("type"  => "preheader",
          "name"  => "Single Post Options"),
          
	array("name"  => "Show Date/time",
          "desc"  => "<strong>Date/Time format</strong> can be changed <a href='options-general.php' target='_blank'>here</a>.",
          "id"    => "post_date",
          "std"   => "on",
          "type"  => "checkbox"),  
          
    array("name"  => "Show Category",
          "id"    => "post_category",
          "std"   => "off",
          "type"  => "checkbox"), 
          
    array("name"  => "Show Author Profile",
          "desc"  => "You can edit your profile on this <a href='profile.php' target='_blank'>page</a>.",
          "id"    => "post_author",
          "std"   => "on",
          "type"  => "checkbox"),
          
    array("name"  => "Show Tags",
          "id"    => "post_tags",
          "std"   => "on",
          "type"  => "checkbox"),
          
	array("name"  => "Show Social Buttons",
          "id"    => "post_share",
          "std"   => "on",
          "type"  => "checkbox"),
          
    array("name"  => "Show Related Posts",
          "desc"  => "Display 3 most recent posts in the same category as the active post.",
		  "id"    => "post_related",
          "std"   => "on",
          "type"  => "checkbox"),

    array("name"  => "Show Comments",
          "id"    => "post_comments",
          "std"   => "on",
          "type"  => "checkbox"),

	array("type"  => "preheader",
          "name"  => "Single Page Options"),
          
	array("name"  => "Show Social Buttons",
          "id"    => "page_share",
          "std"   => "on",
          "type"  => "checkbox"),
          
    array("name"  => "Show Comments",
          "id"    => "page_comments",
          "std"   => "on",
          "type"  => "checkbox"),

),

"id2" => array(          

	array("type"  => "preheader",
          "name"  => "Homepage Settings"),

	array("name"  => "Display Slideshow",
          "desc"  => "Do you want to display featured posts slider on the homepage? You can add the slides on the <a href=\"edit.php?post_type=slideshow\">Slideshow Page</a>.<br />If you have troubles displaying posts in this section, please <a href='http://www.wpzoom.com/documentation/morning/#featured' target='_blank'>read the documentation</a>.",
          "id"    => "featured_enable",
          "std"   => "on",
          "type"  => "checkbox"),

	array("name"  => "Slideshow Autoplay Interval",
          "desc"  => "Select the interval (in miliseconds) at which the slider should change posts. Default: 5000 (5 seconds).<br />Set to 0 to disable autoplay.",
          "id"    => "featured_interval",
          "std"   => "5000",
          "type"  => "text"),

	array("type"  => "preheader",
          "name"  => "Homepage Static Content"),
    
	array("name"  => "Display the content of a static page on homepage",
          "id"    => "featured_page_1_show",
          "std"   => "on",
          "type"  => "checkbox"),

	array("name"  => "Static page",
          "desc"  => "Select the static page.",
          "id"    => "featured_page_1",
          "std"   => "",
          "type"  => "select-page"),

    ),

"id7" => array(

	array("type"  => "preheader",
          "name"  => "Sidebar Top Ad"),
          
	array("name"  => "Enable ad in sidebar, before menu and widgets",
          "id"    => "banner_sidebar_top_enable",
          "std"   => "off",
          "type"  => "checkbox"),
          
    array("name"  => "HTML Code (Adsense)",
          "desc"  => "Enter complete HTML code for your banner (or Adsense code) or upload an image below.",
          "id"    => "banner_sidebar_top_html",
          "std"   => "",
          "type"  => "textarea"),
          
	array("name"  => "Upload your image",
          "desc"  => "Upload a banner image or enter the URL of an existing image.",
          "id"    => "banner_sidebar_top",
          "std"   => "",
          "type"  => "upload"),
          
	array("name"  => "Destination URL",
          "desc"  => "Enter the URL where this banner ad points to.",
          "id"    => "banner_sidebar_top_url",
          "type"  => "text"),
          
	array("name"  => "Banner Title",
          "desc"  => "Enter the title for this banner which will be used for ALT tag.",
          "id"    => "banner_sidebar_top_alt",
          "type"  => "text"),
          
          
	array("type"  => "preheader",
          "name"  => "Sidebar Bottom Ad"),
          
	array("name"  => "Enable ad in sidebar, after menu and widgets",
          "id"    => "banner_sidebar_bottom_enable",
          "std"   => "off",
          "type"  => "checkbox"),
          
    array("name"  => "HTML Code (Adsense)",
          "desc"  => "Enter complete HTML code for your banner (or Adsense code) or upload an image below.",
          "id"    => "banner_sidebar_bottom_html",
          "std"   => "",
          "type"  => "textarea"),
          
	array("name"  => "Upload your image",
          "desc"  => "Upload a banner image or enter the URL of an existing image.",
          "id"    => "banner_sidebar_bottom",
          "std"   => "",
          "type"  => "upload"),
          
	array("name"  => "Destination URL",
          "desc"  => "Enter the URL where this banner ad points to.",
          "id"    => "banner_sidebar_bottom_url",
          "type"  => "text"),
          
	array("name"  => "Banner Title",
          "desc"  => "Enter the title for this banner which will be used for ALT tag.",
          "id"    => "banner_sidebar_bottom_alt",
          "type"  => "text"),

	array("type"  => "preheader",
          "name"  => "Posts Top Ad"),
          
	array("name"  => "Enable ad in single posts, before title and content",
          "id"    => "banner_post_top_enable",
          "std"   => "off",
          "type"  => "checkbox"),
          
    array("name"  => "HTML Code (Adsense)",
          "desc"  => "Enter complete HTML code for your banner (or Adsense code) or upload an image below.",
          "id"    => "banner_post_top_html",
          "std"   => "",
          "type"  => "textarea"),
          
	array("name"  => "Upload your image",
          "desc"  => "Upload a banner image or enter the URL of an existing image.",
          "id"    => "banner_post_top",
          "std"   => "",
          "type"  => "upload"),
          
	array("name"  => "Destination URL",
          "desc"  => "Enter the URL where this banner ad points to.",
          "id"    => "banner_post_top_url",
          "type"  => "text"),
          
	array("name"  => "Banner Title",
          "desc"  => "Enter the title for this banner which will be used for ALT tag.",
          "id"    => "banner_post_top_alt",
          "type"  => "text"),

	array("type"  => "preheader",
          "name"  => "Posts Bottom Ad"),
          
	array("name"  => "Enable ad in single posts, after post content",
          "id"    => "banner_post_bottom_enable",
          "std"   => "off",
          "type"  => "checkbox"),
          
    array("name"  => "HTML Code (Adsense)",
          "desc"  => "Enter complete HTML code for your banner (or Adsense code) or upload an image below.",
          "id"    => "banner_post_bottom_html",
          "std"   => "",
          "type"  => "textarea"),
          
	array("name"  => "Upload your image",
          "desc"  => "Upload a banner image or enter the URL of an existing image.",
          "id"    => "banner_post_bottom",
          "std"   => "",
          "type"  => "upload"),
          
	array("name"  => "Destination URL",
          "desc"  => "Enter the URL where this banner ad points to.",
          "id"    => "banner_post_bottom_url",
          "type"  => "text"),
          
	array("name"  => "Banner Title",
          "desc"  => "Enter the title for this banner which will be used for ALT tag.",
          "id"    => "banner_post_bottom_alt",
          "type"  => "text"),

)

/* end return */);