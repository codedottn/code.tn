<?php
/**
 * Course slider options.
 *
 * @package Kids Education Bell
 */

$default = kids_education_bell_get_default_theme_options();

// Post Slider Author Section
$wp_customize->add_section( 'section_home_project',
	array(
		'title'      => __( 'Course Section', 'kids-education-bell' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		'active_callback' => 'kids_education_bell_project_design_enable',
		)
);

$wp_customize->add_setting( 'theme_options[disable_project_section]',
	array(
		'default'           => $default['disable_project_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'kids_education_bell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Kids_Education_Bell_Switch_Control( $wp_customize, 'theme_options[disable_project_section]',
    array(
		'label' 			=> __('Enable/Disable Course Section', 'kids-education-bell'),
		'section'    		=> 'section_home_project',
		 'settings'  		=> 'theme_options[disable_project_section]',
		'on_off_label' 		=> kids_education_bell_switch_options(),
    )
) );

// Add posted on enable setting and control.
$wp_customize->add_setting( 'theme_options[project_content_enable]', array(
	'default'           => $default['project_content_enable'],
	'sanitize_callback' => 'kids_education_bell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[project_content_enable]', array(
	'label'             => esc_html__( 'Enable Content', 'kids-education-bell' ),
	'section'           => 'section_home_project',
	'type'              => 'checkbox',
	'active_callback' => 'kids_education_bell_project_active',
) );

//Project Section title
$wp_customize->add_setting('theme_options[project_title]', 
	array(
	'default'           => $default['project_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[project_title]', 
	array(
	'label'       => __('Section Title', 'kids-education-bell'),
	'section'     => 'section_home_project',   
	'settings'    => 'theme_options[project_title]',
	'active_callback' => 'kids_education_bell_project_active',		
	'type'        => 'text'
	)
);

//Project Section Subtitle
$wp_customize->add_setting('theme_options[project_subtitle]', 
	array(
	'default'           => $default['project_subtitle'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_textarea_field'
	)
);

$wp_customize->add_control('theme_options[project_subtitle]', 
	array(
	'label'       => __('Section Sub Title', 'kids-education-bell'),
	'section'     => 'section_home_project',   
	'settings'    => 'theme_options[project_subtitle]',
	'active_callback' => 'kids_education_bell_project_active',		
	'type'        => 'textarea'
	)
);

// Setting  Team Category.
$wp_customize->add_setting( 'theme_options[project_category]',
	array(

	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Kids_Education_Bell_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[project_category]',
		array(
		'label'    => __( 'Select Category', 'kids-education-bell' ),
		'section'  => 'section_home_project',
		'settings' => 'theme_options[project_category]',	
		'active_callback' => 'kids_education_bell_project_active',		
		)
	)
);

$number_of_project_items = kids_education_bell_get_option( 'number_of_project_items' );

for( $i=1; $i<=$number_of_project_items; $i++ ){

	//Project Section title
	$wp_customize->add_setting('theme_options[project_cost_text_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[project_cost_text_'.$i.']', 
		array(
		'label'       => sprintf( __('Course Cost #%1$s', 'kids-education-bell'), $i),
		'section'     => 'section_home_project',   
		'settings'    => 'theme_options[project_cost_text_'.$i.']',
		'active_callback' => 'kids_education_bell_project_active',		
		'type'        => 'text'
		)
	);
}