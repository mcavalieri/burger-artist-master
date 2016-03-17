<?php

// Source: Course Slides & WP Codex 

function theme_settings_page(){
 ?>
	    <div class="wrap">
	    <h1>Theme Options</h1>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");      
	            submit_button(); 
	        ?>          
	    </form>
		</div>
	<?php
}
function display_twitter_element()
{
	?>
    	<input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
    <?php
}

function display_facebook_element()
{
	?>
    	<input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
    <?php
}

function display_yelp_element()
{
	?>
    	<input type="text" name="yelp_url" id="yelp_url" value="<?php echo get_option('yelp_url'); ?>" />
    <?php
}

function display_theme_panel_fields()
{
	add_settings_section("section", "Customize The Burger Artist Theme", null, "theme-options");
	
	add_settings_field("twitter_url", "Twitter URL:", "display_twitter_element", "theme-options", "section");
    add_settings_field("facebook_url", "Facebook Page URL:", "display_facebook_element", "theme-options", "section");
	add_settings_field("yelp_url", "Yelp Page URL:", "display_yelp_element", "theme-options", "section");

    register_setting("section", "twitter_url");
    register_setting("section", "facebook_url");
	register_setting("section", "yelp_url");
}

add_action("admin_init", "display_theme_panel_fields");

function add_theme_menu_item()
{
	add_menu_page("Theme Options", "Theme Options", "manage_options", "theme-options", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");





?> 