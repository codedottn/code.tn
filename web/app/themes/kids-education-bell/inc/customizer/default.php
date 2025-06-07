<?php
/**
 * Default theme options.
 *
 * @package Kids Education Bell
 */


if ( ! function_exists( 'kids_education_bell_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	
	function kids_education_bell_get_default_theme_options() {

		$theme_data = wp_get_theme();
		$defaults = array();

		$defaults['show_header_contact_info'] 	= true;
		$defaults['disable_homepage_content_section'] 			= true;
		$defaults['show_topbar'] 			= true;
		$defaults['topbar_layout_option'] 			= 'contact-info-option';
	    $defaults['header_email']             	= __( 'info@sensationaltheme.com','kids-education-bell' );
	    $defaults['header_phone' ]            	= __( '+1-541-754-3010','kids-education-bell' );
	    $defaults['header_location' ]           = __( 'London, UK','kids-education-bell' );
	    $defaults['enable_header_contact_info'] 	= true;
	    $defaults['header_email_text']             	= __( 'Email ID','kids-education-bell' );
	    $defaults['header_phone_text' ]            	= __( 'Free Call','kids-education-bell' );
	    $defaults['header_location_text' ]           = __( 'Visit Us','kids-education-bell' );
	    $defaults['header_email_address']             	= __( 'info@sensationaltheme.com','kids-education-bell' );
	    $defaults['header_phone_contact' ]            	= __( '+1-541-754-3010','kids-education-bell' );
	    $defaults['header_location_address' ]           = __( 'London, UK','kids-education-bell' );
	    $defaults['show_header_social_links'] 	= true;
	    $defaults['show_menu_social_links'] 	= true;
	    $defaults['header_social_links']		= array();
	    $defaults['disable_header_background_section'] = false;
	    $defaults['show_header_search'] 	= true;
	    $defaults['show_current_date'] 	= true;
	    $defaults['colorscheme_hue'] 	= '#bd3804';
	    $defaults['medi_text_color'] 	= '#191B1D';
	    $defaults['medi_secondary_color'] 	= '#14457B';
	    $defaults['topbar_background_color'] 	= '#03A0B3';
	    $defaults['topbar_color'] 	= '#ffffff';


	    $defaults['menu_background_color'] 	= '#fff';
	    $defaults['menu_text_hover'] 	= 'menu-hover-none';
	    $defaults['header_text_hover'] 	= 'title-hover-none';
	    $defaults['number_of_menu_items'] 	= 6;
	    $defaults['preloader_loader_enable'] 	= false;
	    $defaults['preloader_loader_options'] 	= 'loader-1';
	    $defaults['header_text_transform_options'] 	= 'none';
	    $defaults['header_text_decoration_options'] 	= 'none';
	    $defaults['header_font_style_options'] 	= 'none';
	    $defaults['header_text_design'] 	= false;
	    $defaults['homepage_layout_options']			= 'lite-layout';
	    $defaults['header_layout_options']			= 'kids-menu';
	    $defaults['homepage_design_layout_options']			= 'home-education';
	    $defaults['homepage_sidebar_position']			= 'home-right-sidebar';
	    $defaults['header_top_buttom_padding']			= 10;

		// Featured Slider Section
		$defaults['disable_featured-slider_section']	= false;
		$defaults['number_of_sr_items']			= 4;
		$defaults['number_of_sr_column']		= 1;
		$defaults['slider_layout_option']			= 'fullwidth-slider';
		$defaults['slider_content_position_option']			= 'default-position';
		$defaults['sr_content_type']			= 'sr_category';
		$defaults['slider_speed']				= 800;
		$defaults['disable_white_overlay']		= false;
		$defaults['slider_arrow_enable']		= true;
		$defaults['slider_fade_enable']		 	= true;
		$defaults['slider_autoplay_enable']		= true;
		$defaults['slider_infinite_enable']		= true;
		$defaults['slider_title_enable']		= true;
		$defaults['slider_category_enable']		= true;
		$defaults['slider_content_enable']		= false;
		$defaults['slider_posted_on_enable']		= false;
		$defaults['disable_blog_banner_section']		= false;
		$defaults['slider_social_title_text']	   		= esc_html__( 'Follow Me:', 'kids-education-bell' );

		//Cta Section	
		$defaults['disable_message_section']	   	= false;
		$defaults['message_title']	   	= esc_html__( 'Hello, I am Nijasi Thitak', 'kids-education-bell' );
		$defaults['message_description']	   	= esc_html__( 'I’ve been working with a company this month doing blogger outreach for a project. Part of my job is to vet blogs and determine their audience, their traffic, and whether they’re a good fit for this particular project. Having spent several hours reviewing blogs in several markets, I’ve come to a conclusion: We all need to work on our About pages.', 'kids-education-bell' );
		$defaults['message_button_label']	   	 	= esc_html__( 'Know More', 'kids-education-bell' );
		$defaults['message_button_url']	   	 		= '#';
		$defaults['message_content_type']			= 'message_custom';
		$defaults['message_background_color']	   	= '#6aedae';
		$defaults['message_content_enable']			= true;
		$defaults['message_excerpt_enable']			= true;
		$defaults['message_excerpt_length']			= 20;
		$defaults['disable_about_counter_section']	= true;
		$defaults['number_of_about_counter_items']	= 3;
		$defaults['about_counter_value_1']	   	= esc_html__( '1400+', 'kids-education-bell' );
		$defaults['about_counter_value_2']	   	= esc_html__( '500+', 'kids-education-bell' );
		$defaults['about_counter_value_3']	   	= esc_html__( '600+', 'kids-education-bell' );
		$defaults['about_counter_value_4']	   	= esc_html__( '70', 'kids-education-bell' );
		$defaults['about_counter_text_1']	   	= esc_html__( 'Client', 'kids-education-bell' );
		$defaults['about_counter_text_2']	   	= esc_html__( 'Project', 'kids-education-bell' );
		$defaults['about_counter_text_3']	   	= esc_html__( 'Employee', 'kids-education-bell' );
		$defaults['about_counter_text_4']	   	= esc_html__( 'Branches', 'kids-education-bell' );

		// Project Section
		$defaults['disable_project_section']	= false;
		$defaults['number_of_project_items']			= 5;
		$defaults['project_layout_option']			= 'default-project';
		$defaults['project_content_type']			= 'project_category';
		$defaults['project_title']	   	 		= esc_html__( 'Cources', 'kids-education-bell' );
		$defaults['project_viewall_text']	   	 		= esc_html__( 'View All Projects', 'kids-education-bell' );
		$defaults['project_subtitle']	   	 	= esc_html__( 'A cultural icon is a person or artifact that is recognized by members of a culture or sub-culture as representing.', 'kids-education-bell' );
		$defaults['project_excerpt_length']			= 20;
		$defaults['project_content_align']			= 'content-left';
		$defaults['project_category_enable']		= true;
		$defaults['project_posted_on_enable']		= true;
		$defaults['project_arrow_enable']		= true;
		$defaults['project_dots_enable']		= true;
		$defaults['project_content_enable']		= true;
		$defaults['project_background_color']	   	= '#14457b';

		//Must Read Section
		$defaults['disable_mustread_section']	= false;
		$defaults['mustread_title']	   	 		= esc_html__( 'Blog And News', 'kids-education-bell' );
		$defaults['number_of_mustread_items']			= 3;
		$defaults['number_of_mustread_column']			= 3;
		$defaults['mustread_excerpt_length']			= 20;
		$defaults['mustread_content_type']			= 'mustread_category';
		$defaults['mustread_content_align']			= 'content-center';
		$defaults['mustread_background_color']			= '#fff';
		$defaults['mustread_category_enable']		= true;
		$defaults['mustread_posted_on_enable']		= true;
		$defaults['mustread_author_enable']		= true;
		$defaults['mustread_content_enable']		= true;
		$defaults['mustread_see_all_txt']			= esc_html__( 'See All', 'kids-education-bell' );

		//Travel Section
		$defaults['disable_admissionprocess_section']	= false;
		$defaults['admissionprocess_title']	   	 		= esc_html__( 'Admission Process', 'kids-education-bell' );
		$defaults['admissionprocess_subtitle']	   	 		= esc_html__( 'A cultural icon is a person or artifact that is recognized by members of a culture or sub-culture as representing some aspect of cultural identity.', 'kids-education-bell' );
		$defaults['number_of_admissionprocess_items']			= 4;
		$defaults['number_of_admissionprocess_column']			= 4;
		$defaults['admissionprocess_excerpt_length']			= 20;
		$defaults['admissionprocess_content_type']			= 'admissionprocess_category';
		$defaults['admissionprocess_background_color']			= '#fff';
		$defaults['admissionprocess_content_align']			= 'content-center';
		$defaults['admissionprocess_category_enable']		= true;
		$defaults['admissionprocess_posted_on_enable']		= true;
		$defaults['admissionprocess_author_enable']		= true;
		$defaults['admissionprocess_content_enable']		= true;
		$defaults['admissionprocess_see_all_txt']			= esc_html__( 'See All', 'kids-education-bell' );

		// Our Service Section
		$defaults['disable_services_section']	= false;
		$defaults['services_title']	   	 		= esc_html__( 'Reasons to Choose My Services', 'kids-education-bell' );
		$defaults['services_subtitle']	   		= esc_html__( 'Services', 'kids-education-bell' );
		$defaults['number_of_services_column']	= 3;
		$defaults['number_of_services_items']	= 6;
		$defaults['services_content_type']		= 'services_category';
		$defaults['services_background_color']			= '#fff';
		$defaults['services_content_enable']	= true;
		$defaults['disable_services_icon']		= true;
		$defaults['disable_services_background']		= true;
		$defaults['services_content_align']			= 'content-center';
		$defaults['services_excerpt_length']			= 20;
		$defaults['services_icon_1']	   	= esc_html__( 'fa-snowflake-o', 'kids-education-bell' );
		$defaults['services_icon_2']	   	= esc_html__( 'fa-leaf', 'kids-education-bell' );
		$defaults['services_icon_3']	   	= esc_html__( 'fa-diamond', 'kids-education-bell' );
		$defaults['services_icon_4']	   	= esc_html__( 'fa-snowflake-o', 'kids-education-bell' );
		$defaults['services_icon_5']	   	= esc_html__( 'fa-leaf', 'kids-education-bell' );
		$defaults['services_icon_6']	   	= esc_html__( 'fa-diamond', 'kids-education-bell' );

		// Testimonial Section
		$defaults['disable_testimonial_section']	= false;
		$defaults['number_of_testimonial_items']			= 4;
		$defaults['testimonial_excerpt_length']			= 25;
		$defaults['testimonial_layout_option']			= 'default-testimonial';
		$defaults['testimonial_content_type']			= 'testimonial_category';
		$defaults['testimonial_title']	   	 		= esc_html__( 'Our clients reviews.', 'kids-education-bell' );
		$defaults['testimonial_viewall_text']	   	 		= esc_html__( 'View All Projects', 'kids-education-bell' );
		$defaults['testimonial_subtitle']	   	 	= esc_html__( 'Testimonials', 'kids-education-bell' );
		$defaults['testimonial_category_enable']		= true;
		$defaults['testimonial_posted_on_enable']		= true;
		$defaults['testimonial_arrow_enable']		= true;
		$defaults['testimonial_dots_enable']		= true;
		$defaults['testimonial_content_enable']		= true;

		// Latest Posts Section
		$defaults['latest_posts_title']	   	 	= esc_html__( 'My Latest Stories', 'kids-education-bell' );
		$defaults['latest_section_posts_title']	   	 	= esc_html__( 'I love natural beauty, and I think it’s your best look, but I think makeup as an artist is so transformative.', 'kids-education-bell' );
		$defaults['number_of_latest_posts_column']	= 2;
		$defaults['pagination_type']		= 'numeric';
		$defaults['latest_category_enable']		= true;
		$defaults['latest_author_enable']		= true;
		$defaults['latest_comment_enable']		= true;
		$defaults['latest_read_more_text_enable']		= true;
		$defaults['latest_posted_on_enable']		= true;
		$defaults['latest_video_enable']		= true;
		$defaults['blog_layout_content_type']		= 'blog-one';
		$defaults['archive_content_align']		= 'content-center';
		$defaults['archive_post_header_title_enable']		= true;
		$defaults['archive_post_header_image_enable']		= true;
		$defaults['blog_post_header_image_enable']		= true;
		$defaults['blog_post_header_title_enable']		= true;
		$defaults['background_image_enable']		= false;
		
		// Decoration Option
		$defaults['decoration_side_enable']		= true;

		// Single Post Option
		$defaults['single_post_category_enable']		= true;
		$defaults['single_post_posted_on_enable']		= true;
		$defaults['single_post_video_enable']		= true;
		$defaults['single_post_comment_enable']		= true;
		$defaults['single_post_author_enable']		= true;
		$defaults['single_post_pagination_enable']		= true;
		$defaults['single_post_image_enable']		= true;
		$defaults['single_post_header_image_enable']		= true;
		$defaults['single_post_header_title_enable']		= true;
		$defaults['single_post_header_image_as_header_image_enable']		= true;


		// Single Post Option
		$defaults['single_page_video_enable']		= true;
		$defaults['single_page_image_enable']		= true;
		$defaults['single_page_header_image_enable']		= true;
		$defaults['single_page_header_title_enable']		= true;
		$defaults['single_page_header_image_as_header_image_enable']		= true;
		
		$defaults['theme_typography']			=  'default';
		$defaults['body_theme_typography']		=  'default';		
		$defaults['archive_typography']			=  'default';
		$defaults['body_archive_typography']		=  'default';		
		$defaults['page_typography']			=  'default';
		$defaults['body_page_typography']		=  'default';		
		$defaults['post_typography']			=  'default';
		$defaults['body_post_typography']		=  'default';		
		$defaults['site_title_typography']			=  'default';
		$defaults['site_tagline_typography']		=  'default';

		// Curve Option
		$defaults['corporate_curve_shape_enable']		= true;

		//General Section
		$defaults['latest_readmore_text']				= esc_html__('Read More','kids-education-bell');
		$defaults['excerpt_length']				= 50;
		$defaults['layout_options_blog']			= 'right-sidebar';
		$defaults['layout_options_archive']			= 'right-sidebar';
		$defaults['layout_options_page']			= 'right-sidebar';	
		$defaults['layout_options_single']			= 'right-sidebar';	

		//Footer section 
		$defaults['scroll_top_visible']		= true;		
		$defaults['copyright_text']				= esc_html__( 'Copyright &copy; All rights reserved.', 'kids-education-bell' );
		$defaults['powered_by_text']			= esc_html__( 'Kids Education Bell by Sensational Theme', 'kids-education-bell' );
		$defaults['footer_copyright_font_color'] 	= '#fff';
		$defaults['footer_copyright_background_color'] 	= '#fcb54d';

		// Pass through filter.
		$defaults = apply_filters( 'kids_education_bell_filter_default_theme_options', $defaults );
		return $defaults;
	}

endif;


/**
*  Get theme options
*/
if ( ! function_exists( 'kids_education_bell_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function kids_education_bell_get_option( $key ) {

			$default_options = kids_education_bell_get_default_theme_options();
		
		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;