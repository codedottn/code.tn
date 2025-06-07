<?php
/**
 * Category options.
 *
 * @package Kids Education Bell
 */

$default = kids_education_bell_get_default_theme_options();

// Category Author Section
$wp_customize->add_section( 'section_home_layout',
	array(
		'title'      => __( 'Homepage Layout', 'kids-education-bell' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[homepage_layout_options]', array(
	'default'           => $default['homepage_layout_options'],
	'sanitize_callback' => 'kids_education_bell_sanitize_select',
	'type'				=> 'theme_mod',
) );

$wp_customize->add_control( 'theme_options[homepage_layout_options]', array(
	'label'             => esc_html__( 'Choose HomePage Color Layout', 'kids-education-bell' ),
	'section'           => 'section_home_layout',
	'type'              => 'radio',
	'choices'				=> array( 
		'lite-layout'     => esc_html__( 'Lite HomePage', 'kids-education-bell' ), 
		'dark-layout'     => esc_html__( 'Dark HomePage', 'kids-education-bell' ),
		)
) );
$wp_customize->add_setting('theme_options[homepage_design_layout_options]', 
	array(
	'default' 			=> $default['homepage_design_layout_options'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'kids_education_bell_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[homepage_design_layout_options]', 
	array(
	'label'             => esc_html__( 'Choose HomePage Layout', 'kids-education-bell' ),
	'description' => __('Save & Refresh the customizer to see its effect.', 'kids-education-bell'),
	'section'     => 'section_home_layout',   
	'settings'    => 'theme_options[homepage_design_layout_options]',		
	'type'        => 'select',
	'choices'	  => array(  
		'home-education'     => esc_html__( 'Education HomePage', 'kids-education-bell' ), 
		),
	)
);


