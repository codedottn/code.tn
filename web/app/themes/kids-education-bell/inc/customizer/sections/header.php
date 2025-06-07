<?php
/**
 * Header options.
 *
 * @package Kids Education Bell
 */

$default = kids_education_bell_get_default_theme_options();

// Header Author Section
$wp_customize->add_section( 'section_home_header',
	array(
		'title'      => __( 'Header Options', 'kids-education-bell' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[header_layout_options]', array(
	'default'           => $default['header_layout_options'],
	'sanitize_callback' => 'kids_education_bell_sanitize_select',
	'type'				=> 'theme_mod',
) );

$wp_customize->add_control( 'theme_options[header_layout_options]', array(
	'label'             => esc_html__( 'Choose Header Layout', 'kids-education-bell' ),
	'section'           => 'section_home_header',
	'type'              => 'radio',
	'choices'				=> array( 
		'header-one'     => esc_html__( 'Header One(Normal)', 'kids-education-bell' ), 
		'header-two'     => esc_html__( 'Header Two(Blog Style)', 'kids-education-bell' ), 
		'header-three'     => esc_html__( 'Header Three(Header Ads)', 'kids-education-bell' ), 
		'header-four'     => esc_html__( 'Header Four(Transparent)', 'kids-education-bell' ), 
		'header-five'     => esc_html__( 'Header Five(Header Contact Info)', 'kids-education-bell' ), 
        'header-six'     => esc_html__( 'Header Six(Modern Header)', 'kids-education-bell' ),
        'modern-menu'     => esc_html__( 'Header Seven(Burger Menu)', 'kids-education-bell' ),
        'kids-menu'     => esc_html__( 'Header Seven(Fancy Menu)', 'kids-education-bell' ),
		)
) );

$wp_customize->add_setting( 'theme_options[disable_header_background_section]',
	array(
		'default'           => $default['disable_header_background_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'kids_education_bell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Kids_Education_Bell_Switch_Control( $wp_customize, 'theme_options[disable_header_background_section]',
    array(
		'label' 			=> __('Enable/Disable Header Background Image', 'kids-education-bell'),
		'section'    		=> 'section_home_header',
		 'settings'  		=> 'theme_options[disable_header_background_section]',
		'on_off_label' 		=> kids_education_bell_switch_options(),
    )
) );

// header title setting and control
$wp_customize->add_setting( 'theme_options[header_background_image]', array(
	'type'              => 'theme_mod',
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_options[header_background_image]', array(
	'label'           	=> esc_html__( 'Select Header Background', 'kids-education-bell' ),
	'section'        	=> 'section_home_header',
	'settings'    		=> 'theme_options[header_background_image]',	
) ) );

// header Ads image setting and control
$wp_customize->add_setting( 'theme_options[header_ads_image]', array(
	'type'              => 'theme_mod',
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_options[header_ads_image]', array(
	'label'           	=> esc_html__( 'Select Header Ads Image', 'kids-education-bell' ),
	'section'        	=> 'section_home_header',
	'settings'    		=> 'theme_options[header_ads_image]',
	'active_callback'	=> 'kids_education_bell_header_three',
) ) );

// Header Ads Url
$wp_customize->add_setting('theme_options[header_ads_image_url]', 
	array(

	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control('theme_options[header_ads_image_url]', 
	array(
	'label'       => esc_html__('Header Ads Url', 'kids-education-bell'),
	'section'     => 'section_home_header',   
	'settings'    => 'theme_options[header_ads_image_url]',	
	'type'        => 'url',
	'active_callback'	=> 'kids_education_bell_header_three',
	)
);

// Header contact enable control and setting
$wp_customize->add_setting( 'theme_options[show_header_contact_info]', array(
    'default'           =>  $default['show_header_contact_info'],
    'sanitize_callback' => 'kids_education_bell_sanitize_switch_control',
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new Kids_Education_Bell_Switch_Control( $wp_customize, 'theme_options[show_header_contact_info]', array(
    'label'             => __( 'Show Contact Info', 'kids-education-bell' ),
    'section'           => 'section_home_header',
    'settings'         => 'theme_options[show_header_contact_info]',
    'on_off_label'      => kids_education_bell_switch_options(),
) ) );

/** Location */
$wp_customize->add_setting( 'theme_options[header_location_text]', array(
    'default'           => $default['header_location_text'],
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control(
    'theme_options[header_location_text]',
    array(
        'label'           => __( 'Location Title Text', 'kids-education-bell' ),
        'section'         => 'section_home_header',
        'active_callback' => 'kids_education_bell_header_five',
    )
);
$wp_customize->add_setting( 'theme_options[header_location_address]', array(
    'default'           => $default['header_location_address'],
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control(
    'theme_options[header_location_address]',
    array(
        'label'           => __( 'Address', 'kids-education-bell' ),
        'description'     => __( 'Enter Location.', 'kids-education-bell' ),
        'section'         => 'section_home_header',
        'active_callback' => 'kids_education_bell_header_five',
    )
);

/** Phone */
$wp_customize->add_setting( 'theme_options[header_phone_text]', array(
    'default'           => $default['header_phone_text'],
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control(
    'theme_options[header_phone_text]',
    array(
        'label'           => __( 'Phone Title Text', 'kids-education-bell' ),
        'section'         => 'section_home_header',
        'active_callback' => 'kids_education_bell_header_five',
    )
);

$wp_customize->add_setting( 'theme_options[header_phone_contact]', array(
    'default'           => $default['header_phone_contact'],
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control(
    'theme_options[header_phone_contact]',
    array(
        'label'           => __( 'Contact', 'kids-education-bell' ),
        'description'     => __( 'Enter phone number.', 'kids-education-bell' ),
        'section'         => 'section_home_header',
        'active_callback' => 'kids_education_bell_header_five',
    )
);

/** Email */
$wp_customize->add_setting( 
    'theme_options[header_email_text]', 
    array(
        'default'           => $default['header_email_text'],
        'sanitize_callback' => 'sanitize_email',
    ) 
);

$wp_customize->add_control(
    'theme_options[header_email_text]',
    array(
        'label'           => __( 'Email Title Text', 'kids-education-bell' ),
        'section'         => 'section_home_header',
        'active_callback' => 'kids_education_bell_header_five',
    )
);
$wp_customize->add_setting( 
    'theme_options[header_email_address]', 
    array(
        'default'           => $default['header_email_address'],
        'sanitize_callback' => 'sanitize_email',
    ) 
);

$wp_customize->add_control(
    'theme_options[header_email_address]',
    array(
        'label'           => __( 'Email', 'kids-education-bell' ),
        'description'     => __( 'Enter valid email address.', 'kids-education-bell' ),
        'section'         => 'section_home_header',
        'active_callback' => 'kids_education_bell_header_five',
    )
);

// Number of items
$wp_customize->add_setting('theme_options[header_top_buttom_padding]', 
    array(
    'default'           => $default['header_top_buttom_padding'],
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',    
    'sanitize_callback' => 'kids_education_bell_sanitize_number_range'
    )
);

$wp_customize->add_control('theme_options[header_top_buttom_padding]', 
    array(
    'label'       => __('Header Padding', 'kids-education-bell'),
    'description' => __('Save & Refresh the customizer to see its effect. Maximum is 100.', 'kids-education-bell'),
    'section'     => 'section_home_header',   
    'settings'    => 'theme_options[header_top_buttom_padding]',      
    'type'        => 'number',
    'input_attrs' => array(
            'min'   => 1,
            'max'   => 100,
            'step'  => 1,
        ),
    )
);