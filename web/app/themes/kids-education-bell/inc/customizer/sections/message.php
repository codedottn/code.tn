<?php
/**
 * About options.
 *
 * @package Kids Education Bell
 */

$default = kids_education_bell_get_default_theme_options();
$home_layout = kids_education_bell_get_option( 'homepage_design_layout_options' );

// About section
$wp_customize->add_section( 'section_home_message',
	array(
		'title'      => __( 'About Section', 'kids-education-bell' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		'active_callback' => 'kids_education_bell_message_design_enable',
		)
);


$wp_customize->add_setting( 'theme_options[disable_message_section]',
	array(
		'default'           => $default['disable_message_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'kids_education_bell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Kids_Education_Bell_Switch_Control( $wp_customize, 'theme_options[disable_message_section]',
    array(
		'label' 			=> __('Disable About section', 'kids-education-bell'),
		'section'    		=> 'section_home_message',
		'on_off_label' 		=> kids_education_bell_switch_options(),
    )
) );

// Number of items
$wp_customize->add_setting('theme_options[message_excerpt_length]', 
	array(
	'default' 			=> $default['message_excerpt_length'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'kids_education_bell_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[message_excerpt_length]', 
	array(
	'label'       => __('Content Excerpt Length', 'kids-education-bell'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 1000.', 'kids-education-bell'),
	'section'     => 'section_home_message',   
	'settings'    => 'theme_options[message_excerpt_length]',		
	'type'        => 'number',
	'active_callback' => 'kids_education_bell_message_active',
	'input_attrs' => array(
			'min'	=> 0,
			'max'	=> 1000,
			'step'	=> 1,
		),
	)
);

// message title setting and control
$wp_customize->add_setting( 'theme_options[message_background_img]', array(
	'type'              => 'theme_mod',
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_options[message_background_img]', array(
	 'label'           	=> esc_html__( 'Select Side Top Image ', 'kids-education-bell' ), 
	'section'        	=> 'section_home_message',
	'settings'    		=> 'theme_options[message_background_img]',	
	'active_callback' 	=> 'kids_education_bell_message_active',
) ) );

// message title setting and control
$wp_customize->add_setting( 'theme_options[message_second_background_img]', array(
	'type'              => 'theme_mod',
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_options[message_second_background_img]', array(
	 'label'           	=> esc_html__( 'Select Side Bottom Image ', 'kids-education-bell' ), 
	'section'        	=> 'section_home_message',
	'settings'    		=> 'theme_options[message_second_background_img]',	
	'active_callback' 	=> 'kids_education_bell_message_active',
) ) );

// Additional Information First Page
$wp_customize->add_setting('theme_options[message_page]', 
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'kids_education_bell_dropdown_pages'
	)
);

$wp_customize->add_control('theme_options[message_page]', 
	array(
	'label'       => __('Select Page', 'kids-education-bell'),
	'section'     => 'section_home_message',   
	'settings'    => 'theme_options[message_page]',		
	'type'        => 'dropdown-pages',
	'active_callback' => 'kids_education_bell_message_active',
	)
);



//Message Section Btn Text
$wp_customize->add_setting('theme_options[message_btn_text]', 
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[message_btn_text]', 
	array(
	'label'       => __('Button Text', 'kids-education-bell'),
	'section'     => 'section_home_message',   
	'settings'    => 'theme_options[message_btn_text]',
	'active_callback' => 'kids_education_bell_message_active',		
	'type'        => 'text'
	)
);
