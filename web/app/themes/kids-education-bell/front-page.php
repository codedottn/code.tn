<?php
/**
 * The template for displaying home page.
 * @package Kids Education Bell
 */

if ( 'posts' == get_option( 'show_on_front' )  || 'posts' != get_option( 'show_on_front' )){ 
    get_header(); ?>
    <?php 
    $enabled_sections = kids_education_bell_get_sections();
    $homepage_design_layout     = kids_education_bell_get_option( 'homepage_design_layout_options' );
    $decoration_image     = kids_education_bell_get_option( 'decoration_side_enable' );
    if( is_array( $enabled_sections ) &&  $homepage_design_layout== 'home-education') { 
        foreach( $enabled_sections as $section ) { ?>
            <?php if( ( $section['id'] == 'featured-slider' ) ){ ?>
                <?php $disable_featured_slider = kids_education_bell_get_option( 'disable_featured-slider_section' );
                if( true == $disable_featured_slider): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">
                        <div class="cloud cloud-down slider-cloud">
                            <?php echo kids_education_bell_get_icon_svg( 'header_cloud' );?>
                        </div>
                        <?php $slider_layout = kids_education_bell_get_option( 'slider_layout_option'); ?>
                        <?php if ($slider_layout=='default-slider'){ ?>
                            <div class="wrapper">
                                <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                            </div>
                        <?php } else {
                            get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); 
                        } ?>
                        <div class="cloud cloud-up slider-cloud">
                            <?php echo kids_education_bell_get_icon_svg( 'bg_cloud' );?>
                        </div>                        
                    </section>
                <?php endif; ?>
            <?php } elseif( $section['id'] == 'services' ) { ?>
                <?php $disable_services_section = kids_education_bell_get_option( 'disable_services_section' );
                 $services_background_image = kids_education_bell_get_option( 'services_background_image' );
                 $disable_services_background=kids_education_bell_get_option( 'disable_services_background' );
                if( true ==$disable_services_section): ?>
                
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" <?php if (!empty($services_background_image) && true==$disable_services_background){ ?> class=" enable-services-background" <?php } if ( false==$disable_services_background ){ ?> style="background-image: url('<?php echo esc_url( $services_background_image );?>');" <?php }?> >
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>

                        <div class="cloud-bottom">
                            <?php echo kids_education_bell_get_icon_svg( 'bg_cloud' );?>
                        </div>
                    </section> 
            <?php endif; ?>
            <?php } elseif( $section['id'] == 'message' ) { ?>
                <?php $disable_message_section = kids_education_bell_get_option( 'disable_message_section' );
                $background_information_section     = kids_education_bell_get_option( 'background_information_section' );
                if( true ==$disable_message_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section " >
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                        <div class="cloud-bottom">
                            <?php echo kids_education_bell_get_icon_svg( 'bg_cloud' );?>
                        </div>
                    </section>                    
                <?php endif; ?>
                <?php } elseif( $section['id'] == 'project' ) { ?>
                <?php $disable_project_section = kids_education_bell_get_option( 'disable_project_section' );
                if( true ==$disable_project_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section">
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                        <div class="cloud-bottom">
                            <?php echo kids_education_bell_get_icon_svg( 'bg_cloud' );?>
                        </div>
                    </section>
            <?php endif; ?> 
            <?php } elseif( $section['id'] == 'admissionprocess' ) { ?>
                <?php $disable_admissionprocess_section = kids_education_bell_get_option( 'disable_admissionprocess_section' );
                if( true ==$disable_admissionprocess_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section">
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                        <div class="cloud-bottom">
                            <?php echo kids_education_bell_get_icon_svg( 'bg_cloud' );?>
                        </div>
                    </section>
            <?php endif; ?>            
            <?php } elseif( $section['id'] == 'testimonial' ) { ?>
                <?php $disable_testimonial_section = kids_education_bell_get_option( 'disable_testimonial_section' );
                if( true ==$disable_testimonial_section): ?>
                   <?php $background_testimonial_section     = kids_education_bell_get_option( 'testimonial_side_image' ); ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section" style="background-image: url('<?php echo esc_url( $background_testimonial_section );?>');">
                        <div class="overlay"></div>
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section> 
            <?php endif; ?> 
            <?php } elseif( $section['id'] == 'mustread' ) { ?>
                <?php $disable_mustread_section = kids_education_bell_get_option( 'disable_mustread_section' );
                if( true ==$disable_mustread_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] );  ?>" class="relative page-section">
                        <div class="cloud-top">
                            <?php echo kids_education_bell_get_icon_svg( 'bg_cloud' );?>
                        </div>
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
            <?php endif; ?> 
            <?php } ?>
        <?php } ?>
    <?php } ?>
    <?php $disable_homepage_content_section = kids_education_bell_get_option( 'disable_homepage_content_section' );
    if('posts' == get_option( 'show_on_front' )){ ?>
       <?php include( get_home_template() ); ?>
    <?php } elseif(($disable_homepage_content_section == true ) && ('posts' != get_option( 'show_on_front' ))) { ?>
        <div class="wrapper">
           <?php include( get_page_template() ); ?>
        </div>
     <?php  }
    get_footer();
} ?>