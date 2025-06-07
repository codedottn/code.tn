<?php
/**
 * Slider options.
 *
 * @package Kids Education Bell
 */

$default = kids_education_bell_get_default_theme_options();

// Featured Slider Section
$wp_customize->add_section( 'section_featured_slider',
	array(
		'title'      => __( 'Banner Section', 'kids-education-bell' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		'active_callback' => 'kids_education_bell_slider_design_enable',
		)
);

$wp_customize->add_setting( 'theme_options[disable_featured-slider_section]',
	array(
		'default'           => $default['disable_featured-slider_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'kids_education_bell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Kids_Education_Bell_Switch_Control( $wp_customize, 'theme_options[disable_featured-slider_section]',
    array(
		'label' 	=> __('Disable Slider Section', 'kids-education-bell'),
		'section'    			=> 'section_featured_slider',
		'on_off_label' 		=> kids_education_bell_switch_options(),
    )
) );

// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[slider_arrow_enable]', array(
	'default'           => $default['slider_arrow_enable'],
	'sanitize_callback' => 'kids_education_bell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[slider_arrow_enable]', array(
	'label'             => esc_html__( 'Enable Slider Arrow', 'kids-education-bell' ),
	'section'           => 'section_featured_slider',
	'type'              => 'checkbox',
	'active_callback' => 'kids_education_bell_slider_active',
) );

// Add autoplay enable setting and control.
$wp_customize->add_setting( 'theme_options[slider_autoplay_enable]', array(
	'default'           => $default['slider_autoplay_enable'],
	'sanitize_callback' => 'kids_education_bell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[slider_autoplay_enable]', array(
	'label'             => esc_html__( 'Enable Slider Autoplay', 'kids-education-bell' ),
	'section'           => 'section_featured_slider',
	'type'              => 'checkbox',
	'active_callback' => 'kids_education_bell_slider_active',
) );

// Add autoplay enable setting and control.
$wp_customize->add_setting( 'theme_options[slider_infinite_enable]', array(
	'default'           => $default['slider_infinite_enable'],
	'sanitize_callback' => 'kids_education_bell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[slider_infinite_enable]', array(
	'label'             => esc_html__( 'Enable Slider Slide Infinite', 'kids-education-bell' ),
	'section'           => 'section_featured_slider',
	'type'              => 'checkbox',
	'active_callback' => 'kids_education_bell_slider_active',
) );

// Add autoplay enable setting and control.
$wp_customize->add_setting( 'theme_options[slider_fade_enable]', array(
	'default'           => $default['slider_fade_enable'],
	'sanitize_callback' => 'kids_education_bell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[slider_fade_enable]', array(
	'label'             => esc_html__( 'Enable Slider Fade Effect', 'kids-education-bell' ),
	'section'           => 'section_featured_slider',
	'type'              => 'checkbox',
	'active_callback' => 'kids_education_bell_slider_active',
) );

// Add autoplay enable setting and control.
$wp_customize->add_setting( 'theme_options[slider_title_enable]', array(
	'default'           => $default['slider_title_enable'],
	'sanitize_callback' => 'kids_education_bell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[slider_title_enable]', array(
	'label'             => esc_html__( 'Enable Slider Title', 'kids-education-bell' ),
	'section'           => 'section_featured_slider',
	'type'              => 'checkbox',
	'active_callback' => 'kids_education_bell_slider_active',
) );

// Add category enable setting and control.
$wp_customize->add_setting( 'theme_options[slider_content_enable]', array(
	'default'           => $default['slider_content_enable'],
	'sanitize_callback' => 'kids_education_bell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[slider_content_enable]', array(
	'label'             => esc_html__( 'Enable Content', 'kids-education-bell' ),
	'section'           => 'section_featured_slider',
	'type'              => 'checkbox',
	'active_callback' => 'kids_education_bell_slider_active',
) );

// Add posted on enable setting and control.
$wp_customize->add_setting( 'theme_options[slider_posted_on_enable]', array(
	'default'           => $default['slider_posted_on_enable'],
	'sanitize_callback' => 'kids_education_bell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[slider_posted_on_enable]', array(
	'label'             => esc_html__( 'Enable Author & Date', 'kids-education-bell' ),
	'section'           => 'section_featured_slider',
	'type'              => 'checkbox',
	'active_callback' => 'kids_education_bell_slider_active',
) );

// Number of items
$wp_customize->add_setting('theme_options[slider_speed]', 
	array(
	'default' 			=> $default['slider_speed'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'kids_education_bell_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[slider_speed]', 
	array(
	'label'       => __('Slider Speed', 'kids-education-bell'),
	'description' => __('Slider Speed Default speed 800', 'kids-education-bell'),
	'section'     => 'section_featured_slider',   
	'settings'    => 'theme_options[slider_speed]',		
	'type'        => 'number',
	'active_callback' => 'kids_education_bell_slider_active',
	)
);

$wp_customize->add_setting( 'theme_options[slider_dot]',
	array(

		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'kids_education_bell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Kids_Education_Bell_Switch_Control( $wp_customize, 'theme_options[slider_dot]',
    array(
		'label' 	=> __('Disable Slider Dots', 'kids-education-bell'),
		'section'    			=> 'section_featured_slider',
		'on_off_label' 		=> kids_education_bell_switch_options(),
		'active_callback' => 'kids_education_bell_slider_active',
    )
) );

// Number of items
$wp_customize->add_setting('theme_options[number_of_sr_items]', 
	array(
	'default' 			=> $default['number_of_sr_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'kids_education_bell_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_sr_items]', 
	array(
	'label'       => __('Number Of Slides', 'kids-education-bell'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 44.', 'kids-education-bell'),
	'section'     => 'section_featured_slider',   
	'settings'    => 'theme_options[number_of_sr_items]',		
	'type'        => 'number',
	'active_callback' => 'kids_education_bell_slider_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 4,
			'step'	=> 1,
		),
	)
);

$number_of_sr_items = kids_education_bell_get_option( 'number_of_sr_items' );

for( $i=1; $i<=$number_of_sr_items; $i++ ){

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[slider_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'kids_education_bell_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[slider_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'kids-education-bell'), $i),
		'section'     => 'section_featured_slider',   
		'settings'    => 'theme_options[slider_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'kids_education_bell_slider_active',
		)
	);

	// Cta Button Text
	$wp_customize->add_setting('theme_options[slider_custom_btn_text_' . $i . ']', 
		array(

		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[slider_custom_btn_text_' . $i . ']', 
		array(
		'label'       => sprintf( __('Button Label %d', 'kids-education-bell'),$i ),
		'section'     => 'section_featured_slider',   
		'settings'    => 'theme_options[slider_custom_btn_text_' . $i . ']',	
		'active_callback' => 'kids_education_bell_slider_active',	
		'type'        => 'text',
		)
	);

	// slider hr setting and control
	$wp_customize->add_setting( 'theme_options[slider_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Kids_Education_Bell_Customize_Horizontal_Line( $wp_customize, 'theme_options[slider_hr_'. $i .']',
		array(
			'section'         => 'section_featured_slider',
			'active_callback' => 'kids_education_bell_slider_active',
			'type'			  => 'hr',
	) ) );
}
// Slider Button Text
$wp_customize->add_setting('theme_options[slider_alt_custom_btn_text]', 
	array(

	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[slider_alt_custom_btn_text]', 
	array(
	'label'       => __('Alternative Button Label', 'kids-education-bell'),
	'section'     => 'section_featured_slider',   
	'settings'    => 'theme_options[slider_alt_custom_btn_text]',	
	'active_callback' => 'kids_education_bell_slider_active',	
	'type'        => 'text',
	)
);

	// Slider Button Url
$wp_customize->add_setting('theme_options[slider_alt_custom_btn_url]', 
	array(

	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control('theme_options[slider_alt_custom_btn_url]', 
	array(
	'label'       => __('Alternative Button Url', 'kids-education-bell'),
	'section'     => 'section_featured_slider',   
	'settings'    => 'theme_options[slider_alt_custom_btn_url]',	
	'active_callback' => 'kids_education_bell_slider_active',	
	'type'        => 'url',
	)
);

$wp_customize->add_setting( 'theme_options[disable_blog_banner_section]',
	array(
		'default'           => $default['disable_blog_banner_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'kids_education_bell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Kids_Education_Bell_Switch_Control( $wp_customize, 'theme_options[disable_blog_banner_section]',
    array(
		'label' 			=> __('Disable Blog Header Section', 'kids-education-bell'),
		'description' 		=> __('If you want only header image then disable featured slider and actiove this option.', 'kids-education-bell'),
		'section'    		=> 'section_featured_slider',
		'on_off_label' 		=> kids_education_bell_switch_options(),
    )
) );