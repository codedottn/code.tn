<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kids Education Bell
 */
    $homepage_design_layout     = kids_education_bell_get_option( 'homepage_design_layout_options' );
/**
 * Hooked - kids_education_bell_instagram_section -10
 */
if ((is_home() || is_front_page()) && ($homepage_design_layout=='home-normal-blog' || $homepage_design_layout=='home-minimal-blog' || $homepage_design_layout=='home-classic-blog')) {
	do_action( 'kids_education_bell_action_instagram' );
}

/**
 *
 * @hooked kids_education_bell_footer_start
 */
do_action( 'kids_education_bell_action_before_footer' );

/**
 * Hooked - kids_education_bell_footer_top_section -10
 * Hooked - kids_education_bell_footer_section -20
 */
do_action( 'kids_education_bell_action_footer' );

/**
 * Hooked - kids_education_bell_footer_end. 
 */
do_action( 'kids_education_bell_action_after_footer' );

wp_footer(); ?>

</body>  
</html>