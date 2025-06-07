<?php
/**
 * Admission Process options.
 *
 * @package Kids Education Bell
 */

$default = kids_education_bell_get_default_theme_options();

// Admission Process Section
$wp_customize->add_section( 'section_home_admissionprocess',
	array(
		'title'      => __( 'Admission Process Posts', 'kids-education-bell' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		'active_callback' => 'kids_education_bell_admissionprocess_design_enable',
		)
);

$wp_customize->add_setting( 'theme_options[disable_admissionprocess_section]',
	array(
		'default'           => $default['disable_admissionprocess_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'kids_education_bell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Kids_Education_Bell_Switch_Control( $wp_customize, 'theme_options[disable_admissionprocess_section]',
    array(
		'label' 			=> __('Enable/Disable Admission Process Section', 'kids-education-bell'),
		'section'    		=> 'section_home_admissionprocess',
		 'settings'  		=> 'theme_options[disable_admissionprocess_section]',
		'on_off_label' 		=> kids_education_bell_switch_options(),
    )
) );

//Admission Process Section title
$wp_customize->add_setting('theme_options[admissionprocess_title]', 
	array(
	'default'           => $default['admissionprocess_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[admissionprocess_title]', 
	array(
	'label'       => __('Section Title', 'kids-education-bell'),
	'section'     => 'section_home_admissionprocess',   
	'settings'    => 'theme_options[admissionprocess_title]',
	'active_callback' => 'kids_education_bell_admissionprocess_active',		
	'type'        => 'text'
	)
);

$wp_customize->add_setting('theme_options[admissionprocess_subtitle]', 
	array(
	'default'           => $default['admissionprocess_subtitle'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_textarea_field'
	)
);

$wp_customize->add_control('theme_options[admissionprocess_subtitle]', 
	array(
	'label'       => __('Section Sub Title', 'kids-education-bell'),
	'section'     => 'section_home_admissionprocess',   
	'settings'    => 'theme_options[admissionprocess_subtitle]',
	'active_callback' => 'kids_education_bell_admissionprocess_active',		
	'type'        => 'textarea'
	)
);

for( $i=1; $i<=4; $i++ ){

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[admissionprocess_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'kids_education_bell_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[admissionprocess_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'kids-education-bell'), $i),
		'section'     => 'section_home_admissionprocess',   
		'settings'    => 'theme_options[admissionprocess_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'kids_education_bell_admissionprocess_active',
		)
	);
}