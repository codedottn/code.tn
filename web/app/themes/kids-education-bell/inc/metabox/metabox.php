<?php
/**
 * Kids Education Bell metabox file.
 *
 * This is the template that includes all the other files for metaboxes of Kids Education Bell theme
 *
 * @package Kids Education Bell
 * @since Kids Education Bell 0.1
 */

// Include Post subtitle meta
require get_template_directory() . '/inc/metabox/about-meta.php'; 

// Include Post subtitle meta
require get_template_directory() . '/inc/metabox/video-url.php'; 




if ( ! function_exists( 'kids_education_bell_custom_meta' ) ) : 
    /**
     * Adds meta box to the post editing screen
     */
    function kids_education_bell_custom_meta() {
        $post_type = array( 'post', 'page' );

        // POST Subtitle 
        add_meta_box( 'kids_education_bell_video_url', esc_html__( 'Video Links', 'kids-education-bell' ), 'kids_education_bell_video_url_callback', $post_type );
               
    }
endif;
add_action( 'add_meta_boxes', 'kids_education_bell_custom_meta' );


if ( ! function_exists( 'kids_education_bell_about_meta' ) ) : 
    /**
     * Adds meta box to the post editing screen
     */
    function kids_education_bell_about_meta() {
        $post_type = array( 'post' );

        // POST Subtitle 
        add_meta_box( 'kids_education_bell_about_meta', esc_html__( 'About Meta', 'kids-education-bell' ), 'kids_education_bell_about_meta_callback', $post_type );
               
    }
endif;
add_action( 'add_meta_boxes', 'kids_education_bell_about_meta' );


