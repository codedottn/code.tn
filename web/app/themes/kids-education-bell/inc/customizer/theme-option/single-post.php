<?php 
/**
 * Theme Options.
 *
 * @package Kids Education Bell
 */

$default = kids_education_bell_get_default_theme_options();

// Single Post Setting Section starts
$wp_customize->add_section('section_single_post', 
	array(    
	'title'       => __('Single Post Option', 'kids-education-bell'),
	'panel'       => 'theme_option_panel'    
	)
);

// Add Single Header Image enable setting and control.
$wp_customize->add_setting( 'theme_options[single_post_header_image_as_header_image_enable]', array(
	'default'           => $default['single_post_header_image_as_header_image_enable'],
	'sanitize_callback' => 'kids_education_bell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[single_post_header_image_as_header_image_enable]', array(
	'label'             => esc_html__( 'Enable Header Image As Header Image', 'kids-education-bell' ),
	'description' => __('If this option is Enable then Display Header Image as Header Image Otherwise display Featured Image as Header Image  ', 'kids-education-bell'),
	'section'           => 'section_single_post',
	'type'              => 'checkbox',

) );

// Add Single Header Image enable setting and control.
$wp_customize->add_setting( 'theme_options[single_post_header_title_enable]', array(
	'default'           => $default['single_post_header_title_enable'],
	'sanitize_callback' => 'kids_education_bell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[single_post_header_title_enable]', array(
	'label'             => esc_html__( 'Enable Header Title', 'kids-education-bell' ),
	'section'           => 'section_single_post',
	'type'              => 'checkbox',

) );
// Add Single Header Image enable setting and control.
$wp_customize->add_setting( 'theme_options[single_post_header_image_enable]', array(
	'default'           => $default['single_post_header_image_enable'],
	'sanitize_callback' => 'kids_education_bell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[single_post_header_image_enable]', array(
	'label'             => esc_html__( 'Enable Header Image', 'kids-education-bell' ),
	'section'           => 'section_single_post',
	'type'              => 'checkbox',

) );
// Add Single Post Image enable setting and control.
$wp_customize->add_setting( 'theme_options[single_post_image_enable]', array(
	'default'           => $default['single_post_image_enable'],
	'sanitize_callback' => 'kids_education_bell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[single_post_image_enable]', array(
	'label'             => esc_html__( 'Enable Featured Image', 'kids-education-bell' ),
	'section'           => 'section_single_post',
	'type'              => 'checkbox',

) );

// Add category enable setting and control.
$wp_customize->add_setting( 'theme_options[single_post_category_enable]', array(
	'default'           => $default['single_post_category_enable'],
	'sanitize_callback' => 'kids_education_bell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[single_post_category_enable]', array(
	'label'             => esc_html__( 'Enable Category', 'kids-education-bell' ),
	'section'           => 'section_single_post',
	'type'              => 'checkbox',

) );

// Add category enable setting and control.
$wp_customize->add_setting( 'theme_options[single_post_author_enable]', array(
	'default'           => $default['single_post_author_enable'],
	'sanitize_callback' => 'kids_education_bell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[single_post_author_enable]', array(
	'label'             => esc_html__( 'Enable Author', 'kids-education-bell' ),
	'section'           => 'section_single_post',
	'type'              => 'checkbox',
) );

// Add posted on enable setting and control.
$wp_customize->add_setting( 'theme_options[single_post_posted_on_enable]', array(
	'default'           => $default['single_post_posted_on_enable'],
	'sanitize_callback' => 'kids_education_bell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[single_post_posted_on_enable]', array(
	'label'             => esc_html__( 'Enable Date', 'kids-education-bell' ),
	'section'           => 'section_single_post',
	'type'              => 'checkbox',

) );

// Add Single Post Video enable setting and control.
$wp_customize->add_setting( 'theme_options[single_post_video_enable]', array(
	'default'           => $default['single_post_video_enable'],
	'sanitize_callback' => 'kids_education_bell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[single_post_video_enable]', array(
	'label'             => esc_html__( 'Enable Featured Video', 'kids-education-bell' ),
	'section'           => 'section_single_post',
	'type'              => 'checkbox',

) );

// Add Single Post Pagimation enable setting and control.
$wp_customize->add_setting( 'theme_options[single_post_pagination_enable]', array(
	'default'           => $default['single_post_pagination_enable'],
	'sanitize_callback' => 'kids_education_bell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[single_post_pagination_enable]', array(
	'label'             => esc_html__( 'Enable Pagination', 'kids-education-bell' ),
	'section'           => 'section_single_post',
	'type'              => 'checkbox',

) );

// Add Single Post Comment enable setting and control.
$wp_customize->add_setting( 'theme_options[single_post_comment_enable]', array(
	'default'           => $default['single_post_comment_enable'],
	'sanitize_callback' => 'kids_education_bell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[single_post_comment_enable]', array(
	'label'             => esc_html__( 'Enable Comment', 'kids-education-bell' ),
	'section'           => 'section_single_post',
	'type'              => 'checkbox',

) );