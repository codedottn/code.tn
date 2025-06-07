<?php
/**
 * Subtitle metabox file.
 *
 * @package BlogMelody
 * @since Kids Education Bell 1.0
 */

if ( ! function_exists( 'kids_education_bell_video_url_callback' ) ) :
    /** 
     * Outputs the content of the Video Url
     */
    function kids_education_bell_video_url_callback( $post ) {
        wp_nonce_field( basename( __FILE__ ), 'kids_education_bell_nonce' );
        $video_url = get_post_meta( $post->ID, 'kids-education-bell-video-url', true );
        ?>
        <p>
         <label for="kids-education-bell-video-url" class="kids-education-bell-row-title"><?php esc_html_e( 'Video Url', 'kids-education-bell' )?></label>
         <input class="widefat" type="url" name="kids-education-bell-video-url" id="kids-education-bell-video-url" value="<?php echo esc_url( $video_url ); ?>"/>     
        </p>

        <?php
    }
endif;

if ( ! function_exists( 'kids_education_bell_video_url_save' ) ) :
    /**
     * Saves the Video Url input
     */
    function kids_education_bell_video_url_save( $post_id ) {
        // Checks save status
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[ 'kids_education_bell_nonce' ] ) && wp_verify_nonce( sanitize_key( $_POST[ 'kids_education_bell_nonce' ] ), basename( __FILE__ ) ) ) ? 'true' : 'false';

        // Exits script depending on save status
        if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
            return;
        }

        // Checks for input and sanitizes/saves if needed
        if( isset( $_POST[ 'kids-education-bell-video-url' ] ) ) {
            update_post_meta( $post_id, 'kids-education-bell-video-url', sanitize_text_field( wp_unslash( $_POST[ 'kids-education-bell-video-url' ] ) ) );
        }

    }
endif;
add_action( 'save_post', 'kids_education_bell_video_url_save' );

