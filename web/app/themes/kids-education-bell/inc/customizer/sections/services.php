<?php
/**
 * Services options.
 *
 * @package Kids Education Bell
 */

$default = kids_education_bell_get_default_theme_options();

// Services Section
$wp_customize->add_section( 'section_home_services',
	array(
		'title'      => __( 'Services Section', 'kids-education-bell' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		'active_callback' => 'kids_education_bell_services_design_enable',
		)
);

$wp_customize->add_setting( 'theme_options[disable_services_section]',
	array(
		'default'           => $default['disable_services_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'kids_education_bell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Kids_Education_Bell_Switch_Control( $wp_customize, 'theme_options[disable_services_section]',
    array(
		'label' 			=> __('Enable/Disable Service Section', 'kids-education-bell'),
		'section'    		=> 'section_home_services',
		 'settings'  		=> 'theme_options[disable_services_section]',
		'on_off_label' 		=> kids_education_bell_switch_options(),
    )
) );

//Services Section title
$wp_customize->add_setting('theme_options[services_title]', 
	array(
	'default'           => $default['services_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[services_title]', 
	array(
	'label'       => __('Section Title', 'kids-education-bell'),
	'section'     => 'section_home_services',   
	'settings'    => 'theme_options[services_title]',
	'active_callback' => 'kids_education_bell_services_active',		
	'type'        => 'text'
	)
);

// Add autoplay enable setting and control.
$wp_customize->add_setting( 'theme_options[disable_services_icon]', array(
	'default'           => $default['disable_services_icon'],
	'sanitize_callback' => 'kids_education_bell_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[disable_services_icon]', array(
	'label' 			=> __('Enable/Disable Service icons', 'kids-education-bell'),
	'description' => __('If Services icons is disable then features image is enable', 'kids-education-bell'),
	'section'    		=> 'section_home_services',
	'settings'  		=> 'theme_options[disable_services_icon]',
	'type'              => 'checkbox',
	'active_callback' => 'kids_education_bell_services_active',
) );


$number_of_services_items = kids_education_bell_get_option( 'number_of_services_items' );

for( $i=1; $i<=$number_of_services_items; $i++ ){

		//Services Section icon
	$wp_customize->add_setting('theme_options[services_icon_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field',
		'default' 			=> $default['services_icon_'.$i],
		)
	);

	$wp_customize->add_control('theme_options[services_icon_'.$i.']', 
		array(
		'label'       => sprintf( __('Icon #%1$s', 'kids-education-bell'), $i),
		'description' => sprintf( __('Please input icon as eg: fa-archive. Find Font-awesome icons %1$shere%2$s', 'kids-education-bell'), '<a href="' . esc_url( 'https://fontawesome.com/v4/icons/' ) . '" target="_blank">', '</a>' ),
		'section'     => 'section_home_services',   
		'settings'    => 'theme_options[services_icon_'.$i.']',
		'active_callback' => 'kids_education_bell_services_active',		
		'type'        => 'text'
		)
	);

	// Additional Information First Post
	$wp_customize->add_setting('theme_options[services_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'kids_education_bell_dropdown_posts'
		)
	);
	$wp_customize->add_control( new Kids_Education_Bell_Dropdown_Chooser( $wp_customize,'theme_options[services_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'kids-education-bell'), $i),
		'section'     => 'section_home_services',  
		'settings'    => 'theme_options[services_post_'.$i.']',	
		'choices'			=> kids_education_bell_post_choices(),	
		'type'        => 'dropdown-posts',
		'active_callback' => 'kids_education_bell_services_active',
		)
	));
	// services hr setting and control
	$wp_customize->add_setting( 'theme_options[services_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Kids_Education_Bell_Customize_Horizontal_Line( $wp_customize, 'theme_options[services_hr_'. $i .']',
		array(
			'section'         => 'section_home_services',
			'active_callback' => 'kids_education_bell_services_active',
			'type'			  => 'hr',
	) ) );
}

