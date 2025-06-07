<?php
/**
 * Blog & News options.
 *
 * @package Kids Education Bell
 */

$default = kids_education_bell_get_default_theme_options();

// Blog & News Section
$wp_customize->add_section( 'section_home_mustread',
	array(
		'title'      => __( 'Blog And News', 'kids-education-bell' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		'active_callback' => 'kids_education_bell_mustread_design_enable',
		)
);

$wp_customize->add_setting( 'theme_options[disable_mustread_section]',
	array(
		'default'           => $default['disable_mustread_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'kids_education_bell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Kids_Education_Bell_Switch_Control( $wp_customize, 'theme_options[disable_mustread_section]',
    array(
		'label' 			=> __('Enable/Disable Blog & News Section', 'kids-education-bell'),
		'section'    		=> 'section_home_mustread',
		 'settings'  		=> 'theme_options[disable_mustread_section]',
		'on_off_label' 		=> kids_education_bell_switch_options(),
    )
) );


// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[mustread_content_align]', array(
	'default'           => $default['mustread_content_align'],
	'sanitize_callback' => 'kids_education_bell_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[mustread_content_align]', array(
	'label'             => esc_html__( 'Choose Content Align', 'kids-education-bell' ),
	'section'           => 'section_home_mustread',
	'type'              => 'radio',
	'active_callback' => 'kids_education_bell_mustread_active',
	'choices'				=> array( 
		'content-right'     => esc_html__( 'Right Side', 'kids-education-bell' ), 
		'content-center'     => esc_html__( 'Center Side', 'kids-education-bell' ), 
		'content-left'     => esc_html__( 'Left Side', 'kids-education-bell' ), 
		'content-justify'     => esc_html__( 'Justify', 'kids-education-bell' )
		)
) );

//Blog & News Section title
$wp_customize->add_setting('theme_options[mustread_title]', 
	array(
	'default'           => $default['mustread_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[mustread_title]', 
	array(
	'label'       => __('Section Title', 'kids-education-bell'),
	'section'     => 'section_home_mustread',   
	'settings'    => 'theme_options[mustread_title]',
	'active_callback' => 'kids_education_bell_mustread_active',		
	'type'        => 'text'
	)
);

// Add category enable setting and control.
$wp_customize->add_setting( 'theme_options[mustread_category_enable]', array(
	'default'           => $default['mustread_category_enable'],
	'sanitize_callback' => 'kids_education_bell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[mustread_category_enable]', array(
	'label'             => esc_html__( 'Enable Category', 'kids-education-bell' ),
	'section'           => 'section_home_mustread',
	'type'              => 'checkbox',
	'active_callback' => 'kids_education_bell_mustread_active',
) );	

// Setting  Team Category.
$wp_customize->add_setting( 'theme_options[mustread_category]',
	array(

	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Kids_Education_Bell_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[mustread_category]',
		array(
		'label'    => __( 'Select Category', 'kids-education-bell' ),
		'section'  => 'section_home_mustread',
		'settings' => 'theme_options[mustread_category]',	
		'active_callback' => 'kids_education_bell_mustread_active',		
		)
	)
);
