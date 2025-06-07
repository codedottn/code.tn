<?php
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package Kids Education Bell
 */

if ( ! function_exists( 'kids_education_bell_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
function kids_education_bell_doctype() {
	?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
}
endif;

add_action( 'kids_education_bell_action_doctype', 'kids_education_bell_doctype', 10 );


if ( ! function_exists( 'kids_education_bell_head' ) ) :
	/**
	 * Header Codes.
	 *
	 * @since 1.0.0
	 */
function kids_education_bell_head() {
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php endif; ?>
	<?php
}
endif;
add_action( 'kids_education_bell_action_head', 'kids_education_bell_head', 10 );

if ( ! function_exists( 'kids_education_bell_page_start' ) ) :
	/**
	 * Add Skip to content.
	 *
	 * @since 1.0.0
	 */
	function kids_education_bell_page_start() { 
		$loader_enable = kids_education_bell_get_option( 'preloader_loader_enable' );
	?><div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content">
			<?php esc_html_e( 'Skip to content', 'kids-education-bell' ); ?>
		</a>
		<?php if ($loader_enable==true): ?>
			<div id="loader">
				<div class="loader-container">
					<div id="preloader">
						<?php kids_education_bell_preloader(); ?>
					</div>
				</div>
			</div>
		<?php endif ?>
	<?php
	}
endif;

add_action( 'kids_education_bell_action_before', 'kids_education_bell_page_start', 10 );

if ( ! function_exists( 'kids_education_bell_header_start' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function kids_education_bell_header_start() { ?>
		<header id="masthead" class="site-header nav-shrink" role="banner">
			<?php
	}
endif;
add_action( 'kids_education_bell_action_before_header', 'kids_education_bell_header_start' );

if ( ! function_exists( 'kids_education_bell_header_end' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function kids_education_bell_header_end() {

		?></header> <!-- header ends here --><?php
	}
endif;
add_action( 'kids_education_bell_action_header', 'kids_education_bell_header_end', 15 );

if ( ! function_exists( 'kids_education_bell_content_start' ) ) :
	/**
	 * Header End.
	 *
	 * @since 1.0.0
	 */
	function kids_education_bell_content_start() { 
	?>
	<div id="content" class="site-content">
	<?php 

	}
endif;

add_action( 'kids_education_bell_action_before_content', 'kids_education_bell_content_start', 10 );

if ( ! function_exists( 'kids_education_bell_footer_start' ) ) :
	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function kids_education_bell_footer_start() {
		if( !(is_home() || is_front_page()) ){
			echo '</div>';
		} ?>
		</div>
		<footer id="colophon" class="site-footer" role="contentinfo"><?php
		if ( true === kids_education_bell_get_option('scroll_top_visible') ) : ?>
			<div class="backtotop"><img class="kids-rocket" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/rocket.png' ) ?>"></div>
		<?php endif;
	} 
endif;
add_action( 'kids_education_bell_action_before_footer', 'kids_education_bell_footer_start' );


if ( ! function_exists( 'kids_education_bell_footer_end' ) ) :
	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function kids_education_bell_footer_end() {?>
		</footer><?php
	}
endif;
add_action( 'kids_education_bell_action_after_footer', 'kids_education_bell_footer_end', 100 );

