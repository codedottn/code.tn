<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kids Education Bell
 */
/**
* Hook - kids_education_bell_action_doctype.
*
* @hooked kids_education_bell_doctype -  10
*/
do_action( 'kids_education_bell_action_doctype' );
?>
<head>
<?php
/**
* Hook - kids_education_bell_action_head.
*
* @hooked kids_education_bell_head -  10
*/
do_action( 'kids_education_bell_action_head' );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<?php

/**
* Hook - kids_education_bell_action_before.
*
* @hooked kids_education_bell_page_start - 10
*/
do_action( 'kids_education_bell_action_before' );

/**
*
* @hooked kids_education_bell_header_start - 10
*/
do_action( 'kids_education_bell_action_before_header' );

/**
*
*@hooked kids_education_bell_site_branding - 10
*@hooked kids_education_bell_header_end - 15 
*/
do_action('kids_education_bell_action_header');

/**
*
* @hooked kids_education_bell_content_start - 10
*/
do_action( 'kids_education_bell_action_before_content' );

/**
 * Banner start
 * 
 * @hooked kids_education_bell_banner_header - 10
*/
do_action( 'kids_education_bell_banner_header' );  
