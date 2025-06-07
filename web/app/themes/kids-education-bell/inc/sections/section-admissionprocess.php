<?php
    $admissionprocess_title       = kids_education_bell_get_option( 'admissionprocess_title' );
    $admissionprocess_subtitle       =kids_education_bell_get_option( 'admissionprocess_subtitle' );
    $admissionprocess_content_type     = kids_education_bell_get_option( 'admissionprocess_content_type' );
    $enable_category     = kids_education_bell_get_option( 'admissionprocess_category_enable' );
    $enable_content     = kids_education_bell_get_option( 'admissionprocess_content_enable' );
    $enable_author     = kids_education_bell_get_option( 'admissionprocess_author_enable' );
    $enable_posted_on     = kids_education_bell_get_option( 'admissionprocess_posted_on_enable' );
    $number_of_admissionprocess_items  = kids_education_bell_get_option( 'number_of_admissionprocess_items' );
    $admissionprocess_category = kids_education_bell_get_option( 'admissionprocess_category' );
    $header_font_size = kids_education_bell_get_option( 'admissionprocess_font_size');
    $number_of_admissionprocess_column = kids_education_bell_get_option('number_of_admissionprocess_column');
    $content_align = kids_education_bell_get_option('admissionprocess_content_align');
    $excerpt_length =kids_education_bell_get_option( 'admissionprocess_excerpt_length');

    $see_more_txt     = kids_education_bell_get_option( 'admissionprocess_see_all_txt' );
    $see_more_url     = kids_education_bell_get_option( 'admissionprocess_see_all_url' );

    for( $i=1; $i<=$number_of_admissionprocess_items; $i++ ) :
        $admissionprocess_page_posts[] = absint(kids_education_bell_get_option( 'admissionprocess_page_'.$i ) );
        $admissionprocess_post_posts[] = absint(kids_education_bell_get_option( 'admissionprocess_post_'.$i ) );
    endfor;

?>
<?php if( !empty($admissionprocess_title) && !empty($see_more_txt)):?>
    <div class="section-header">
        <div class="section-header-cloud">
            <div class="header-cloud-shape"></div>
        </div>
        <?php if (!empty($admissionprocess_title)): ?>
            <h2 class="section-title"><?php echo esc_html($admissionprocess_title);?></h2>
        <?php endif; ?>
        <?php if (!empty($admissionprocess_subtitle)): ?>
            <p class="section-subtitle"><?php echo esc_html($admissionprocess_subtitle);?></p>
        <?php endif; ?>
    </div>       
<?php endif;?>   

<div class="admissionprocess-wrapper col-<?php echo esc_attr($number_of_admissionprocess_column); ?> ">
    <?php  
        $args = array (
            'post_type'     => 'page',
            'post_per_page' => count( $admissionprocess_page_posts ),
            'post__in'      => $admissionprocess_page_posts,
            'orderby'       =>'post__in', 
        ); 
        $loop = new WP_Query($args);                        
        if ( $loop->have_posts() ) :
            $i=0;  
            while ($loop->have_posts()) : $loop->the_post(); $i++;?>        
                <article class="<?php echo has_post_thumbnail() ? 'has-post-thumbnail' : 'no-post-thumbnail' ; ?>">
                    <div class="post-featured-image">
                        <div class="featured-image">
                            <div class="decoration-img">
                                <img class="kids-circle" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/kids-circle.png' ) ?>">
                            </div>
                            <img src="<?php the_post_thumbnail_url('post-thumbnail');?>">
                            <div class="overlay"></div>
                            <span class="post-conter"><?php echo esc_html( $i ); ?></span>
                        </div><!-- .featured-image -->
                    </div>
                    <div class="entry-container <?php echo esc_attr($content_align); ?>">
                        <header class="entry-header">
                            <h2 class="entry-title" style="font-size: <?php echo esc_attr($header_font_size); ?>px; " ><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                        </header>
                        <?php if (($enable_content==true)) : ?>
                            <div class="entry-content">
                                <?php 
                                    $excerpt = kids_education_bell_the_excerpt( $excerpt_length );
                                    echo wp_kses_post( wpautop( $excerpt ) );
                                ?>
                            </div><!-- .entry-content -->
                        <?php endif; ?>
                        
                    </div><!-- .entry-container -->
                </article>
            <?php endwhile;?>
        <?php endif; ?>
    <?php wp_reset_postdata(); ?>
</div>