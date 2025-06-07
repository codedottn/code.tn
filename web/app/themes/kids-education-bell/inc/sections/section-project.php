<?php
    $project_title       =kids_education_bell_get_option( 'project_title' );
    $project_subtitle       =kids_education_bell_get_option( 'project_subtitle' );
    $project_viewall_text       =kids_education_bell_get_option( 'project_viewall_text' );
    $project_btn_url       =kids_education_bell_get_option( 'project_btn_url' );
    $project_content_type     = kids_education_bell_get_option( 'project_content_type' );
    $enable_category     = kids_education_bell_get_option( 'project_category_enable' );
    $enable_content     = kids_education_bell_get_option( 'project_content_enable' );
    $enable_posted_on     = kids_education_bell_get_option( 'project_posted_on_enable' );
    $project_dots  = kids_education_bell_get_option( 'project_dots_enable' );
    $project_arrow  = kids_education_bell_get_option( 'project_arrow_enable' );
    $number_of_project_items  = kids_education_bell_get_option( 'number_of_project_items' );
    $project_category = kids_education_bell_get_option( 'project_category' );
    $project_layout = kids_education_bell_get_option('project_layout_option');
    $project_header_font_size =kids_education_bell_get_option( 'project_title_font_size');
    $project_content_font_size =kids_education_bell_get_option( 'project_content_font_size');
    $project_subtitle_font_size =kids_education_bell_get_option( 'project_subtitle_font_size');
    $project_section_header_font_size =kids_education_bell_get_option( 'project_section_header_font_size');
    $content_align = kids_education_bell_get_option('project_content_align');
    $excerpt_length =kids_education_bell_get_option( 'project_excerpt_length');

    for( $i=1; $i<=$number_of_project_items; $i++ ) :
        $project_page_posts[] = absint(kids_education_bell_get_option( 'project_page_'.$i ) );
        $project_post_posts[] = absint(kids_education_bell_get_option( 'project_post_'.$i ) );
    endfor;
?>
    <style> 
        <?php if ($project_subtitle_font_size != 0): ?>
            #project .section-subtitle{
                font-size:<?php echo esc_html($project_subtitle_font_size); ?>px;
            }
        <?php endif ?>
        <?php if ($project_section_header_font_size != 0): ?>
            #project .section-title{
                font-size:<?php echo esc_html($project_section_header_font_size); ?>px;
            }
        <?php endif ?>

        <?php if ($project_header_font_size != 0): ?>
            #project .entry-title{
                font-size:<?php echo esc_html($project_header_font_size); ?>px;
            }
        <?php endif ?>
        <?php if ($project_content_font_size != 0): ?>
            #project .entry-content p{
                font-size:<?php echo esc_html($project_content_font_size); ?>px;
            }
        <?php endif ?>
    </style>
<div class="section-header">
    <div class="section-header-cloud">
        <div class="header-cloud-shape"></div>
    </div>
    <?php if( !empty($project_title)):?>
        <h2 class="section-title"><?php echo esc_html($project_title);?></h2>
    <?php endif;?>
    <?php if (!empty($project_subtitle)): ?>
        <p class="section-subtitle"><?php echo esc_html($project_subtitle);?></p>
    <?php endif; ?>
</div>
<div class="project-slider modern-slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": true, "speed": 1200, "dots": <?php if( true== $project_dots){ echo 'true'; } else{ echo 'false'; } ?>, "arrows":<?php if( true== $project_arrow ){ echo 'true'; } else{ echo 'false'; } ?>, "autoplay": true, "fade": false }'>
    <?php
        $args = array (

            'posts_per_page' =>absint( $number_of_project_items ),              
            'post_type' => 'post',
            'post_status' => 'publish',
            'paged' => 1,
            'ignore_sticky_posts' => true, 
            );
            if ( absint( $project_category ) > 0 ) {
                $args['cat'] = absint( $project_category );
            }
        $loop = new WP_Query($args);                        
        if ( $loop->have_posts() ) :
            $i=0;  
            while ($loop->have_posts()) : $loop->the_post(); $i++;?>  
                <?php $project_post_bg_color = kids_education_bell_get_option( 'project_post_background_color_'.$i ); ?>
                <article style="background-color: <?php echo esc_attr($project_post_bg_color) ?>">
                    <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full');?>');">
                        <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                    </div><!-- .featured-image -->
                    <div class="entry-container <?php echo esc_attr($content_align); ?>">
                        <?php $project_cost = kids_education_bell_get_option('project_cost_text_'.$i); ?>
                        <?php if (($enable_category==true) || !empty($project_cost)) : ?>
                            <div class="project-top-meta">
                                <?php if (($project_content_type !== 'project_page') && ($enable_category==true) ) : ?>
                                    <?php kids_education_bell_entry_meta(); ?>
                                <?php endif; ?>
                                <?php if (!empty($project_cost) ) : ?>
                                    <div class="project-cost"><span><?php echo esc_html($project_cost);  ?></span></div>
                                <?php endif; ?>
                            </div><!-- .entry-meta -->
                        <?php endif; ?>
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                        </header>
                        <div class="entry-content">
                            <?php if ($enable_content == true) {

                                $excerpt = kids_education_bell_the_excerpt( $excerpt_length );
                                echo wp_kses_post( wpautop( $excerpt ) );
                            }
                            ?>
                            <?php $project_details = ! empty( kids_education_bell_get_option('project_lists_' . $i ) ) ? explode( '|', kids_education_bell_get_option('project_lists_' . $i ) ) : array();
                                    if (! empty( $project_details ) ) { ?>
                                    <div class="project-lists-items">
                                        <ul class="project-lists">
                                            <?php 
                                            
                                            foreach ($project_details as $project_detail ) { 
                                                if ( isset( $project_detail ) ) { 
                                                ?>
                                                    <li><?php echo esc_html($project_detail); ?></li>
                                                <?php }  
                                            } ?>
                                        </ul>
                                    </div><!-- .share-message -->
                                <?php } ?>
                        </div><!-- .entry-content -->
                        
                    </div><!-- .entry-container -->
                </article>         


            <?php endwhile;?>
        <?php endif; ?>
    <?php wp_reset_postdata(); ?>
</div>