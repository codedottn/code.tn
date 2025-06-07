<?php 
/**
 * Template part for displaying Featured Slider Section
 *
 *@package Kids Education Bell
 */
    $sr_content_type   = kids_education_bell_get_option( 'sr_content_type' );
    $number_of_sr_items = kids_education_bell_get_option( 'number_of_sr_items' );
    $slider_layout = kids_education_bell_get_option( 'slider_layout_option' );
    $slider_column = kids_education_bell_get_option( 'number_of_sr_column' );
    $slider_category = kids_education_bell_get_option( 'slider_category' );
    $enable_content     = kids_education_bell_get_option( 'slider_content_enable' );
    $enable_title     = kids_education_bell_get_option( 'slider_title_enable' );
    $enable_category     = kids_education_bell_get_option( 'slider_category_enable' );
    $enable_posted_on     = kids_education_bell_get_option( 'slider_posted_on_enable' );
    $slider_speed   = kids_education_bell_get_option( 'slider_speed' );
    $slider_dot   = kids_education_bell_get_option( 'slider_dot' );
    $slider_arrow   = kids_education_bell_get_option( 'slider_arrow_enable' );
    $slider_autoplay  = kids_education_bell_get_option( 'slider_autoplay_enable' );
    $slider_infinite  = kids_education_bell_get_option( 'slider_infinite_enable' );
    $slider_fade  = kids_education_bell_get_option( 'slider_fade_enable' );
    $image_overlay   = kids_education_bell_get_option( 'disable_white_overlay' );
    $header_font_size = kids_education_bell_get_option( 'slider_font_size');
    $slider_background_color = kids_education_bell_get_option( 'slider_background_color');
    $slider_content_position = kids_education_bell_get_option( 'slider_content_position_option');
    $slider_social_text = kids_education_bell_get_option( 'slider_social_title_text');
    $slider_alt_btn_text = kids_education_bell_get_option( 'slider_alt_custom_btn_text');
    $slider_alt_btn_url = kids_education_bell_get_option( 'slider_alt_custom_btn_url');
    $slider_social_link  = kids_education_bell_get_option( 'slider_social_link' );
    $homelayout = kids_education_bell_get_option( 'homepage_design_layout_options' );
    $slider_column_class='';
    if ($homelayout=='home-normal-blog') {
        $slider_column_class =3;
    } else{
        $slider_column_class = 1;
    }
    
    $class ='';
    if (true == $slider_dot) {
       $class = 'true';
    } else{
        $class = 'false';
    }
    for( $j=1; $j<=$number_of_sr_items; $j++ ) :
        $featured_slider_page_posts[] = kids_education_bell_get_option( 'slider_page_'.$j );
        $featured_slider_posts[] = kids_education_bell_get_option( 'slider_post_'.$j );
    endfor;
    ?>
    <style>
        <?php if ($header_font_size != 0): ?>
            #features .entry-title{
                font-size:<?php echo esc_attr($header_font_size); ?>px;
            }
        <?php endif ?>
    </style>
    <div class="featured-slider-wrapper <?php echo esc_attr($slider_content_position); ?>" 
    data-slick='{"slidesToShow": <?php echo esc_attr( $slider_column) ?>,
     "slidesToScroll": 1, 
     "infinite": <?php if( true== $slider_infinite ){ echo 'true'; } else{ echo 'false'; } ?>, 
     "speed": <?php echo esc_attr( $slider_speed) ?>, 
     "dots": <?php echo esc_html($class) ?>, 
     "arrows":<?php if( true== $slider_arrow ){ echo 'true'; } else{ echo 'false'; } ?>, 
     "autoplay": <?php if( true== $slider_autoplay ){ echo 'true'; } else{ echo 'false'; } ?>, 
     "fade": <?php if( true== $slider_fade && $slider_column==1){ echo 'true'; } else{ echo 'false'; } ?> }'>
        <?php 
            $args = array (

            'post_type'     => 'page',
            'post_per_page' => count( $featured_slider_page_posts ),
            'post__in'      => $featured_slider_page_posts,
            'orderby'       =>'post__in',
        ); 
        $loop = new WP_Query($args);                        
        if ( $loop->have_posts() ) :
        $j=0;  
            while ($loop->have_posts()) : $loop->the_post(); $j++;?>

                <article class="slick-item" <?php if ('half-image-slider' != $slider_layout){ ?> style="background-image: url('<?php the_post_thumbnail_url( 'full');?>');" <?php } ?> >
                    <?php 
                        $class='';
                        if ('half-image-slider' != $slider_layout) { 
                            if (false == $image_overlay) { 
                                $class='image-overlay';
                            } else{
                                $class='content-overlay';
                            }
                        } else{
                            $class='half-image-slider';
                        }
                    if (false == $image_overlay && 'half-image-slider' != $slider_layout)  {?>
                        <div class="overlay"></div>
                    <?php } ?>
                    <div class="wrapper slider-content">
                        <div class="<?php echo esc_attr($class); ?> featured-content-wrapper">
                            <header class="entry-header">
                                <?php if ( ($sr_content_type != 'sr_page')) { ?>
                                    <div class="entry-meta">
                                        <?php kids_education_bell_entry_meta(); ?>
                                    </div><!-- .entry-meta -->
                                <?php } ?>
                                <?php if ($enable_title==true):
                                    $featured_slider_before_title = kids_education_bell_get_option( 'slider_title_meta_'.$j );
                                    $featured_slider_after_title = kids_education_bell_get_option( 'slider_after_title_'.$j );
                                 ?>
                                    
                                    <h2 class="entry-title">
                                        <a href="<?php the_permalink();?>" >
                                        <?php the_title();?>
                                        </a>
                                    </h2>
                                <?php endif ?>
                            </header>
                            <?php if ( ($enable_content==true)): ?>
                                <div class="entry-content">
                                    <?php
                                        $excerpt = kids_education_bell_the_excerpt( 15 );
                                        echo wp_kses_post( wpautop( $excerpt ) );
                                    ?>
                                </div><!-- .entry-content -->
                            <?php endif; ?>
                            
                            <?php if ( ($enable_posted_on==true)) { ?>
                                <div class="entry-meta">                 
                                    <?php kids_education_bell_posted_on(); ?>
                                </div><!-- .entry-meta -->
                            <?php } ?>
                            <?php
                            $readmore_text   = kids_education_bell_get_option( 'slider_custom_btn_text_' . $j ); 
                            if ( ! empty( $readmore_text )|| ! empty( $slider_alt_btn_text ) ) { ?>
                                <div class="read-more">
                                    <?php if ( ! empty( $readmore_text ) ) : ?>
                                        <a href="<?php the_permalink();?>" class="btn btn-primary"><?php echo esc_html($readmore_text);?></a>
                                    <?php endif; ?>
                                    <?php if ( ! empty( $slider_alt_btn_text ) && ! empty( $slider_alt_btn_url ) ) : ?>
                                        <a href="<?php echo esc_url( $slider_alt_btn_url ); ?>" class=" btn-transparent"><?php echo esc_html( $slider_alt_btn_text); ?></a>
                                    <?php endif; ?>
                                </div><!-- .read-more -->
                            <?php } ?>
                        </div><!-- .featured-content-wrapper -->
                        <?php if ('half-image-slider' == $slider_layout){ ?>
                            <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full');?>');">
                                <a href="<?php the_permalink();?>" class="post-thumbnail-link">
                                <div class="slider-box slider-lefttop-box"></div>
                                <div class="slider-box slider-righttop-box"></div>
                                <div class="slider-box slider-leftbottom-box"></div>
                                <div class="slider-box slider-rightbottom-box"></div>
                            </a>    
                            </div><!-- .featured-image -->
                        <?php } ?>
                    </div><!-- .wrapper -->
                </article><!-- .slick-item -->
            <?php endwhile;?>
        <?php endif;?>
    <?php wp_reset_postdata(); ?>
    </div><!-- .featured-slider-wrapper -->