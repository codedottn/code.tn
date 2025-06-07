<?php
/**
 * Kids Education Bell Theme Customizer
 *
 * @package Kids Education Bell
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function kids_education_bell_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
		// Register custom section types.
	$wp_customize->register_section_type( 'Kids_Education_Bell_Customize_Section_Upsell' );
	$wp_customize->add_section(
		new Kids_Education_Bell_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Kids Education Bell Pro', 'kids-education-bell' ),
				'pro_text' => esc_html__( 'Buy Pro', 'kids-education-bell' ),
				'pro_url'  => 'http://www.sensationaltheme.com/downloads/kids-education-bell-pro/',
				'priority'  => 1,
			)
		)
	);

	// Add Panel.
	$wp_customize->add_panel( 'theme_option_panel',
		array(
		'title'      => __( 'Theme Options', 'kids-education-bell' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		)
	);	

	// Load customize sanitize.
	include get_template_directory() . '/inc/customizer/sanitize.php';

	// Load customize options.
	include get_template_directory() . '/inc/customizer/options.php';

	// Load customize control.
	include get_template_directory() . '/inc/customizer/control.php';

	// Load customize sanitize.
	include get_template_directory() . '/inc/customizer/active-callback.php';

	// Load header sections option.
	include get_template_directory() . '/inc/customizer/theme-option/footer.php';

	// Load header sections option.
	include get_template_directory() . '/inc/customizer/theme-option/general.php';

	// Load header sections option.
	include get_template_directory() . '/inc/customizer/theme-option/header-image.php';

	// Load header sections option.
	include get_template_directory() . '/inc/customizer/theme-option/archives.php';

	// Load Single Post sections option.
	include get_template_directory() . '/inc/customizer/theme-option/single-post.php';

	// Load Single Page sections option.
	include get_template_directory() . '/inc/customizer/theme-option/single-page.php';

	// Load home page sections option.
	include get_template_directory() . '/inc/customizer/home-section.php';


	
}
add_action( 'customize_register', 'kids_education_bell_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function kids_education_bell_customize_preview_js() {
	wp_enqueue_script( 'kids_education_bell_customizer', get_template_directory_uri() . '/inc/customizer/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'kids_education_bell_customize_preview_js' );
/**
 *
 */
function kids_education_bell_customize_backend_scripts() {

	wp_enqueue_style( 'kids-education-bell-admin-customizer-style', get_template_directory_uri() . '/inc/customizer/css/customizer-style.css' );
	wp_enqueue_script( 'kids-education-bell-admin-customizer', get_template_directory_uri() . '/inc/customizer/js/customizer-scipt.js', array( 'jquery', 'customize-controls' ), '20151215', true );
}
add_action( 'customize_controls_enqueue_scripts', 'kids_education_bell_customize_backend_scripts', 10 );
