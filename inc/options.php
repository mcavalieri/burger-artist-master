<?php
	
function burger_artist_master_add_submenu() {
		add_submenu_page( 'themes.php', 'The Burger Artist Theme Options', 'Theme Options', 'manage_options', 'theme_options', 'my_theme_options_page');
	}
add_action( 'admin_menu', 'burger_artist_master_add_submenu' );
	

function burger_artist_master_settings_init() { 
	register_setting( 'theme_options', 'burger_artist_master_options_settings' );
	
	add_settings_section(
		'burger_artist_master_options_page_section', 
		'Customize Your WordPress Theme!', 
		'burger_artist_master_options_page_section_callback', 
		'theme_options'
	);
	
	function burger_artist_master_options_page_section_callback() { 
		echo 'Configure your WordPress theme with the options below';
	}

	add_settings_field( 
		'burger_artist_master_text_field', 
		'Custom Text', 
		'burger_artist_master_text_field_render', 
		'theme_options', 
		'burger_artist_master_options_page_section' 
	);
	
	add_settings_field( 
		'burger_artist_master_checkbox_field', 
		'Check your preference', 
		'burger_artist_master_checkbox_field_render', 
		'theme_options', 
		'burger_artist_master_options_page_section'  
	);

	add_settings_field( 
		'burger_artist_master_radio_field', 
		'Choose an option', 
		'burger_artist_master_radio_field_render', 
		'theme_options', 
		'burger_artist_master_options_page_section'  
	);
	
	add_settings_field( 
		'burger_artist_master_textarea_field', 
		'Enter content in the textarea', 
		'burger_artist_master_textarea_field_render', 
		'theme_options', 
		'burger_artist_master_options_page_section'  
	);
	
	add_settings_field( 
		'burger_artist_master_select_field', 
		'Choose from the dropdown', 
		'burger_artist_master_select_field_render', 
		'theme_options', 
		'burger_artist_master_options_page_section'  
	);

	function burger_artist_master_text_field_render() { 
		$options = get_option( 'burger_artist_master_options_settings' );
		?>
		<input type="text" name="burger_artist_master_options_settings[burger_artist_master_text_field]" value="<?php if (isset($options['burger_artist_master_text_field'])) echo $options['burger_artist_master_text_field']; ?>" />
		<?php
	}
	
	function burger_artist_master_checkbox_field_render() { 
		$options = get_option( 'burger_artist_master_options_settings' );
	?>
		<input type="checkbox" name="burger_artist_master_options_settings[burger_artist_master_checkbox_field]" <?php if (isset($options['burger_artist_master_checkbox_field'])) checked( 'on', ($options['burger_artist_master_checkbox_field']) ) ; ?> value="on" />
		<label>Turn it On</label> 
		<?php	
	}
	
	function burger_artist_master_radio_field_render() { 
		$options = get_option( 'burger_artist_master_options_settings' );
		?>
		<input type="radio" name="burger_artist_master_options_settings[burger_artist_master_radio_field]" <?php if (isset($options['burger_artist_master_radio_field'])) checked( $options['burger_artist_master_radio_field'], 1 ); ?> value="1" /> <label>Option One</label><br />
		<input type="radio" name="burger_artist_master_options_settings[burger_artist_master_radio_field]" <?php if (isset($options['burger_artist_master_radio_field'])) checked( $options['burger_artist_master_radio_field'], 2 ); ?> value="2" /> <label>Option Two</label><br />
		<input type="radio" name="burger_artist_master_options_settings[burger_artist_master_radio_field]" <?php if (isset($options['burger_artist_master_radio_field'])) checked( $options['burger_artist_master_radio_field'], 3 ); ?> value="3" /> <label>Option Three</label>
		<?php
	}
	
	function burger_artist_master_textarea_field_render() { 
		$options = get_option( 'burger_artist_master_options_settings' );
		?>
		<textarea cols="40" rows="5" name="burger_artist_master_options_settings[burger_artist_master_textarea_field]"><?php if (isset($options['burger_artist_master_textarea_field'])) echo $options['burger_artist_master_textarea_field']; ?></textarea>
		<?php
	}

	function burger_artist_master_select_field_render() { 
		$options = get_option( 'burger_artist_master_options_settings' );
		?>
		<select name="burger_artist_master_options_settings[burger_artist_master_select_field]">
			<option value="1" <?php if (isset($options['burger_artist_master_select_field'])) selected( $options['burger_artist_master_select_field'], 1 ); ?>>Option 1</option>
			<option value="2" <?php if (isset($options['burger_artist_master_select_field'])) selected( $options['burger_artist_master_select_field'], 2 ); ?>>Option 2</option>
		</select>
	<?php
	}
	
	function my_theme_options_page(){ 
		?>
		<form action="options.php" method="post">
			<h2>The Burger Artist Customization Options</h2>
			<?php
			settings_fields( 'theme_options' );
			do_settings_sections( 'theme_options' );
			submit_button();
			?>
		</form>
		<?php
	}

}

add_action( 'admin_init', 'burger_artist_master_settings_init' );

?>