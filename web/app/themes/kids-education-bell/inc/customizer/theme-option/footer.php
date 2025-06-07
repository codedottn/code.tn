<?php 
/**
 * Theme Options.
 *
 * @package Kids Education Bell
 */

$default = kids_education_bell_get_default_theme_options();

// Footer Setting Section starts
$wp_customize->add_section('section_footer', 
	array(    
	'title'       => __('Footer Option', 'kids-education-bell'),
	'panel'       => 'theme_option_panel'    
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'kids_education_bell_sanitize_textarea_content',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
	'label'    => __( 'Copyright Text', 'kids-education-bell' ),
	'section'  => 'section_footer',
	'type'     => 'text', 
	'priority' => 10,
	)
);

// Setting Powered_by_text.
$wp_customize->add_setting( 'theme_options[powered_by_text]',
	array(
	'default'           => $default['powered_by_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'kids_education_bell_santize_allow_tag',
	)
);
$wp_customize->add_control( 'theme_options[powered_by_text]',
	array(
	'label'    => __( 'Powered By Text', 'kids-education-bell' ),
	'section'  => 'section_footer',
	'type'     => 'textarea',
	'priority' => 10,
	)
);

// scroll top visible
$wp_customize->add_setting( 'theme_options[scroll_top_visible]',
	array(
		'default'           => $default['scroll_top_visible'],
		'sanitize_callback' => 'kids_education_bell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Kids_Education_Bell_Switch_Control( $wp_customize, 'theme_options[scroll_top_visible]',
    array(
		'label'      			=> esc_html__( 'Display Scroll Top Button', 'kids-education-bell' ),
		'section'    			=> 'section_footer',
		'on_off_label' 			=> kids_education_bell_switch_options(),
		'priority' 				=>20,
    )
) );

$wp_customize->add_setting( 'theme_options[footer_widget_background_color]', array(
	'default'		=> '#000',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
	
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_options[footer_widget_background_color]', array(
	'label'    => esc_html__( 'Background Color of Footer Widget Area', 'kids-education-bell' ),
	'section'  => 'section_footer',
) ) );


$wp_customize->add_setting( 'theme_options[footer_widget_font_color]', array(
	'default'		=> '#fff',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
	
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_options[footer_widget_font_color]', array(
	'label'    => esc_html__( 'Font Color of Footer Widget Area', 'kids-education-bell' ),
	'section'  => 'section_footer',
) ) );


$wp_customize->add_setting( 'theme_options[footer_copyright_background_color]', array(
	'default'           => $default['footer_copyright_background_color'],
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
	
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_options[footer_copyright_background_color]', array(
	'label'    => esc_html__( 'Background Color of Footer CopyRight Area', 'kids-education-bell' ),
	'section'  => 'section_footer',
) ) );

$wp_customize->add_setting( 'theme_options[footer_copyright_font_color]', array(
	'default'           => $default['footer_copyright_font_color'],
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
	
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_options[footer_copyright_font_color]', array(
	'label'    => esc_html__( 'Font Color of Footer CopyRight Area', 'kids-education-bell' ),
	'section'  => 'section_footer',
) ) );
 ?>