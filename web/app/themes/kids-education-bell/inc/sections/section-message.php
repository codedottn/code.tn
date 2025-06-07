<?php 
/**
 * Template part for displaying Author Section
 *
 *@package Kids Education Bell
 */
    $message_content_type     = kids_education_bell_get_option( 'message_content_type' );
    $message_content_enable       = kids_education_bell_get_option( 'message_content_enable' );
    $message_excerpt_enable       = kids_education_bell_get_option( 'message_excerpt_enable' );
    $message_header_font_size = kids_education_bell_get_option( 'message_font_size');
    $message_content_font_size = kids_education_bell_get_option( 'message_content_font_size');
    $excerpt_length =kids_education_bell_get_option( 'message_excerpt_length');
    $author_show_social =kids_education_bell_get_option( 'author_social_link');
    $number_of_about_counter_items = kids_education_bell_get_option('number_of_about_counter_items');
    $home_layout = kids_education_bell_get_option( 'homepage_design_layout_options');
    $message_background_img = kids_education_bell_get_option( 'message_background_img');
    $message_background_sec_img = kids_education_bell_get_option( 'message_second_background_img');
    $message_btn = kids_education_bell_get_option( 'message_btn_text' ) ;

?>
    <style>
        <?php if ($message_header_font_size != 0): ?>
            #message .entry-title{
                font-size:<?php echo esc_html($message_header_font_size); ?>px;
            }
        <?php endif ?>
        <?php if ($message_content_font_size != 0): ?>
            #message .section-content{
                font-size:<?php echo esc_html($message_content_font_size); ?>px;
            }
        <?php endif ?>
    </style>
        <?php 
        $message_id = kids_education_bell_get_option( 'message_page' );
            $args = array (
            'post_type'     => 'page',
            'posts_per_page' => 1,
            'p' => $message_id,
            
        ); 
        $the_query = new WP_Query( $args );

        // The Loop
        while ( $the_query->have_posts() ) : $the_query->the_post();
        ?>  
            <div class="section-content">
               <?php if(has_post_thumbnail()) : ?>
                    <div class="author-thumbnail" style="background-image: url('<?php echo esc_url( the_post_thumbnail_url( 'full' ))?>');">
                        <img src="<?php the_post_thumbnail_url( 'full' ); ?>">
                        <?php if ((!empty($message_background_img) && $home_layout=='home-classic-blog')) {  ?>
                            <div class="author-first-thumbnail" style="background-image: url('<?php echo esc_url($message_background_img); ?>');">
                            </div><!-- .author-thumbnail -->
                        <?php } ?> 
                        <?php if ((!empty($message_background_sec_img) && $home_layout=='home-classic-blog')) {  ?>
                            <div class="author-second-thumbnail" style="background-image: url('<?php echo esc_url($message_background_sec_img); ?>');">
                            </div><!-- .author-thumbnail -->
                        <?php } ?> 
                    </div><!-- .author-thumbnail -->
                <?php endif; ?>
                <div class="entry-container">
                    <div class="message-entry-content">
                        <div class="entry-header">
                            <div class="section-header-cloud">
                                <div class="header-cloud-shape"></div>
                            </div>
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a> </h2>
                        </div><!-- .section-header -->

                        <div class="entry-content">
                            <?php  
                                $excerpt = kids_education_bell_the_excerpt( $excerpt_length );
                                echo wp_kses_post( wpautop( $excerpt ) );
                            ?>
                        </div><!-- .entry-content -->
                         <?php if ( ! empty( $message_btn ) ) : ?>
                            <div class="read-more">
                                <a href="<?php the_permalink();?>" class="btn btn-primary" ><?php echo esc_html( $message_btn );  ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div><!-- .section-content --> 
            <?php if(has_post_thumbnail() && $home_layout=='home-education') : ?>
                <?php if (!empty($message_background_img)): ?>
                    <div class="author-first-thumbnail">
                        <img class="background-cloud" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/shape-green.png' ) ?>">
                        <img src="<?php echo esc_url($message_background_img); ?>">
                    </div><!-- .featured-image -->
                <?php endif; ?>
                <?php if (!empty($message_background_sec_img)): ?>
                    <div class="author-second-thumbnail">
                        <img class="background-second-cloud" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/shape-green.png' ) ?>">
                        <img src="<?php echo esc_url($message_background_sec_img); ?>">
                    </div><!-- .featured-image -->
                <?php endif; ?>
            <?php endif; ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
       