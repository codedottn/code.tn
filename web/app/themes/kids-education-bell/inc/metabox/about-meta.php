<?php
/**
 * About metabox file.
 *
 * @package Kids Education Bell
 * @since Kids Education Bell 1.0
 */

if ( ! function_exists( 'kids_education_bell_about_meta_callback' ) ) :
    /** 
     * Outputs the content of the About Meta
     */
    function kids_education_bell_about_meta_callback( $post ) {
        wp_nonce_field( basename( __FILE__ ), 'kids_education_bell_nonce' );
        $about_meta = get_post_meta( $post->ID, 'kids-education-bell-about-meta', true );
        ?>
        <p>
         <label for="kids-education-bell-about-meta" class="kids-education-bell-row-title"><?php esc_html_e( 'About Meta', 'kids-education-bell' )?></label>
         <input class="widefat" type="text" name="kids-education-bell-about-meta" id="kids-education-bell-about-meta" value="<?php echo esc_html( $about_meta ); ?>"/>     
        </p>

        <?php
    }
endif;

if ( ! function_exists( 'kids_education_bell_about_meta_save' ) ) :
    /**
     * Saves the About Meta input
     */
    function kids_education_bell_about_meta_save( $post_id ) {
        // Checks save status
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[ 'kids_education_bell_nonce' ] ) && wp_verify_nonce( sanitize_key( $_POST[ 'kids_education_bell_nonce' ] ), basename( __FILE__ ) ) ) ? 'true' : 'false';

        // Exits script depending on save status
        if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
            return;
        }

        // Checks for input and sanitizes/saves if needed
        if( isset( $_POST[ 'kids-education-bell-about-meta' ] ) ) {
            update_post_meta( $post_id, 'kids-education-bell-about-meta', sanitize_text_field( wp_unslash( $_POST[ 'kids-education-bell-about-meta' ] ) ) );
        }

    }
endif;
add_action( 'save_post', 'kids_education_bell_about_meta_save' );

