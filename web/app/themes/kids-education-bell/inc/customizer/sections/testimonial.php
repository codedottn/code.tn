<?php
/**
 * Testimonial options.
 *
 * @package Kids Education Bell
 */

$default = kids_education_bell_get_default_theme_options();

// Testimonial Section
$wp_customize->add_section( 'section_home_testimonial',
	array(
		'title'      => __( 'Testimonial Section', 'kids-education-bell' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		'active_callback' => 'kids_education_bell_testimonial_design_enable',
		)
);

$wp_customize->add_setting( 'theme_options[disable_testimonial_section]',
	array(
		'default'           => $default['disable_testimonial_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'kids_education_bell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Kids_Education_Bell_Switch_Control( $wp_customize, 'theme_options[disable_testimonial_section]',
    array(
		'label' 			=> __('Enable/Disable Testimonial Section', 'kids-education-bell'),
		'section'    		=> 'section_home_testimonial',
		 'settings'  		=> 'theme_options[disable_testimonial_section]',
		'on_off_label' 		=> kids_education_bell_switch_options(),
    )
) );

// Testimonial Image
$wp_customize->add_setting('theme_options[testimonial_side_image]', 
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'kids_education_bell_sanitize_image'
	)
);
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
	'theme_options[testimonial_side_image]', 
	array(
	'label'       => __('Section Background Image', 'kids-education-bell'),
	'section'     => 'section_home_testimonial',   
	'settings'    => 'theme_options[testimonial_side_image]',		
	'active_callback' => 'kids_education_bell_testimonial_active',
	'type'        => 'image',
	)
	)
);

//Testimonial Section title
$wp_customize->add_setting('theme_options[testimonial_title]', 
	array(
	'default'           => $default['testimonial_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[testimonial_title]', 
	array(
	'label'       => __('Section Title', 'kids-education-bell'),
	'section'     => 'section_home_testimonial',   
	'settings'    => 'theme_options[testimonial_title]',
	'active_callback' => 'kids_education_bell_testimonial_active',		
	'type'        => 'text'
	)
);

//Testimonial Section Subtitle
$wp_customize->add_setting('theme_options[testimonial_subtitle]', 
	array(
	'default'           => $default['testimonial_subtitle'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_textarea_field'
	)
);

$wp_customize->add_control('theme_options[testimonial_subtitle]', 
	array(
	'label'       => __('Section Sub Title', 'kids-education-bell'),
	'section'     => 'section_home_testimonial',   
	'settings'    => 'theme_options[testimonial_subtitle]',
	'active_callback' => 'kids_education_bell_testimonial_active',		
	'type'        => 'textarea'
	)
);


$number_of_testimonial_items = kids_education_bell_get_option( 'number_of_testimonial_items' );

for( $i=1; $i<=$number_of_testimonial_items; $i++ ){
	// Posts
	$wp_customize->add_setting('theme_options[testimonial_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'kids_education_bell_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[testimonial_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'kids-education-bell'), $i),
		'section'     => 'section_home_testimonial',   
		'settings'    => 'theme_options[testimonial_post_'.$i.']',		
		'type'        => 'select',
		'choices'	  => kids_education_bell_post_choices(),
		'active_callback' => 'kids_education_bell_testimonial_active',
		)
	);

	$wp_customize->add_setting( 'theme_options[testimonial_position_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'theme_options[testimonial_position_' . $i . ']', array(
		'label'           	=> sprintf( __( 'Position %d', 'kids-education-bell' ), $i ),
		'section'        	=> 'section_home_testimonial',	
		'active_callback' 	=> 'kids_education_bell_testimonial_active',
		'type'				=> 'text',
	) );

}