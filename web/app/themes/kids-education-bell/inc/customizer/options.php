<?php 
/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function kids_education_bell_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'kids-education-bell' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'kids_education_bell_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function kids_education_bell_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'kids-education-bell' ),
            'off'       => esc_html__( 'Disable', 'kids-education-bell' )
        );
        return apply_filters( 'kids_education_bell_switch_options', $arr );
    }
endif;

/**
 * List of category for category choices.
 * @return Array Array of post ids and name.
 */
function kids_education_bell_category_choices() {
    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => 'category',
    );
    $taxonomies = get_categories( $tax_args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'kids-education-bell' );
    foreach ( $taxonomies as $tax ) {
        $choices[ $tax->term_id ] = $tax->name;
    }
    return  $choices;
}
if ( ! function_exists( 'kids_education_bell_get_woo_product' ) ) {
    /**
     * Get product.
     */
    function kids_education_bell_get_woo_product() {
        $args = array(
            'posts_per_page' => -1,
        );
         
        $choices = array( '' => esc_html__( '--Select--', 'kids-education-bell' ) );
        $products = wc_get_products( $args );
        foreach ( $products as $product ) {
            $id = $product->get_id();
            $title = $product->get_name();
            $choices[ $id ] = $title;
        }
        return $choices;
    }
}




 /**
 * Get an array of google fonts.
 * 
 */
function kids_education_bell_font_choices() {
    $font_family_arr = array();
    $font_family_arr[''] = esc_html__( '--Default--', 'kids-education-bell' );

    // Make the request
    $request = wp_remote_get( get_theme_file_uri( 'assets/fonts/webfonts.json' ) );

    if( is_wp_error( $request ) ) {
        return false; // Bail early
    }
    // Retrieve the data
    $body = wp_remote_retrieve_body( $request );
    $data = json_decode( $body );
    if ( ! empty( $data ) ) {
        foreach ( $data->items as $items => $fonts ) {
            $family_str_arr = explode( ' ', $fonts->family );
            $family_value = implode( '-', array_map( 'strtolower', $family_str_arr ) );
            $font_family_arr[ $family_value ] = $fonts->family;
        }
    }

    return apply_filters( 'kids_education_bell_font_choices', $font_family_arr );
}

if ( ! function_exists( 'kids_education_bell_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function kids_education_bell_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'kids-education-bell' ),
            'header-font-1'   => esc_html__( 'Raleway', 'kids-education-bell' ),
            'header-font-2'   => esc_html__( 'Poppins', 'kids-education-bell' ),
            'header-font-3'   => esc_html__( 'Montserrat', 'kids-education-bell' ),
            'header-font-4'   => esc_html__( 'Open Sans', 'kids-education-bell' ),
            'header-font-5'   => esc_html__( 'Lato', 'kids-education-bell' ),
            'header-font-6'   => esc_html__( 'Ubuntu', 'kids-education-bell' ),
            'header-font-7'   => esc_html__( 'Playfair Display', 'kids-education-bell' ),
            'header-font-8'   => esc_html__( 'Lora', 'kids-education-bell' ),
            'header-font-9'   => esc_html__( 'Titillium Web', 'kids-education-bell' ),
            'header-font-10'   => esc_html__( 'Muli', 'kids-education-bell' ),
            'header-font-11'   => esc_html__( 'Oxygen', 'kids-education-bell' ),
            'header-font-12'   => esc_html__( 'Nunito Sans', 'kids-education-bell' ),
            'header-font-13'   => esc_html__( 'Maven Pro', 'kids-education-bell' ),
            'header-font-14'   => esc_html__( 'Cairo', 'kids-education-bell' ),
            'header-font-15'   => esc_html__( 'Philosopher', 'kids-education-bell' ),
            'header-font-16'   => esc_html__( 'Quicksand', 'kids-education-bell' ),
            'header-font-17'   => esc_html__( 'Henny Penny', 'kids-education-bell' ),
            'header-font-18'   => esc_html__( 'Orbitron' , 'kids-education-bell' ),
            'header-font-19'   => esc_html__( 'Marck Script', 'kids-education-bell' ),
            'header-font-20'   => esc_html__( 'Kaushan Script', 'kids-education-bell' ),
            'header-font-21'   => esc_html__( 'Courgette', 'kids-education-bell' ),
            'header-font-22'   => esc_html__( 'Rajdhani', 'kids-education-bell' ),
            'header-font-23'   => esc_html__( 'Bad Script', 'kids-education-bell' ),
            'header-font-24'   => esc_html__( 'Righteous', 'kids-education-bell' ),
            'header-font-25'   => esc_html__( 'Dosis', 'kids-education-bell' ),
            'header-font-26'   => esc_html__( 'Cinzel Decorative', 'kids-education-bell' ),
            'header-font-27'   => esc_html__( 'Faster one', 'kids-education-bell' ),
            'header-font-28'   => esc_html__( 'Tangerine', 'kids-education-bell' ),
            'header-font-29'   => esc_html__( 'Fredericka the Great', 'kids-education-bell' ),
            'header-font-30'   => esc_html__( 'Shadows Into Light', 'kids-education-bell' ),
        );

        $output = apply_filters( 'kids_education_bell_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

if ( ! function_exists( 'kids_education_bell_body_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function kids_education_bell_body_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'kids-education-bell' ),
            'body-font-1'     => esc_html__( 'Raleway', 'kids-education-bell' ),
            'body-font-2'     => esc_html__( 'Poppins', 'kids-education-bell' ),
            'body-font-3'     => esc_html__( 'Roboto', 'kids-education-bell' ),
            'body-font-4'     => esc_html__( 'Open Sans', 'kids-education-bell' ),
            'body-font-5'     => esc_html__( 'Lato', 'kids-education-bell' ),
            'body-font-6'   => esc_html__( 'Ubuntu', 'kids-education-bell' ),
            'body-font-7'   => esc_html__( 'Playfair Display', 'kids-education-bell' ),
            'body-font-8'   => esc_html__( 'Lora', 'kids-education-bell' ),
            'body-font-9'   => esc_html__( 'Titillium Web', 'kids-education-bell' ),
            'body-font-10'   => esc_html__( 'Muli', 'kids-education-bell' ),
            'body-font-11'   => esc_html__( 'Oxygen', 'kids-education-bell' ),
            'body-font-12'   => esc_html__( 'Nunito Sans', 'kids-education-bell' ),
            'body-font-13'   => esc_html__( 'Maven Pro', 'kids-education-bell' ),
            'body-font-14'   => esc_html__( 'Cairo', 'kids-education-bell' ),
            'body-font-15'   => esc_html__( 'Philosopher', 'kids-education-bell' ),
            'body-font-16'   => esc_html__( 'Quicksand', 'kids-education-bell' ),
            'body-font-17'   => esc_html__( 'Dancing Script ', 'kids-education-bell' ),
            'body-font-18'   => esc_html__( 'Rajdhani', 'kids-education-bell' ),
        );

        $output = apply_filters( 'kids_education_bell_body_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;


if ( ! function_exists( 'kids_education_bell_archive_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function kids_education_bell_archive_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'kids-education-bell' ),
            'header-font-1'   => esc_html__( 'Raleway', 'kids-education-bell' ),
            'header-font-2'   => esc_html__( 'Poppins', 'kids-education-bell' ),
            'header-font-3'   => esc_html__( 'Montserrat', 'kids-education-bell' ),
            'header-font-4'   => esc_html__( 'Open Sans', 'kids-education-bell' ),
            'header-font-5'   => esc_html__( 'Lato', 'kids-education-bell' ),
            'header-font-6'   => esc_html__( 'Ubuntu', 'kids-education-bell' ),
            'header-font-7'   => esc_html__( 'Playfair Display', 'kids-education-bell' ),
            'header-font-8'   => esc_html__( 'Lora', 'kids-education-bell' ),
            'header-font-9'   => esc_html__( 'Titillium Web', 'kids-education-bell' ),
            'header-font-10'   => esc_html__( 'Muli', 'kids-education-bell' ),
            'header-font-11'   => esc_html__( 'Oxygen', 'kids-education-bell' ),
            'header-font-12'   => esc_html__( 'Nunito Sans', 'kids-education-bell' ),
            'header-font-13'   => esc_html__( 'Maven Pro', 'kids-education-bell' ),
            'header-font-14'   => esc_html__( 'Cairo', 'kids-education-bell' ),
            'header-font-15'   => esc_html__( 'Philosopher', 'kids-education-bell' ),
            'header-font-16'   => esc_html__( 'Quicksand', 'kids-education-bell' ),
            'header-font-17'   => esc_html__( 'Henny Penny', 'kids-education-bell' ),
            'header-font-18'   => esc_html__( 'Orbitron' , 'kids-education-bell' ),
            'header-font-19'   => esc_html__( 'Marck Script', 'kids-education-bell' ),
            'header-font-20'   => esc_html__( 'Kaushan Script', 'kids-education-bell' ),
            'header-font-21'   => esc_html__( 'Courgette', 'kids-education-bell' ),
            'header-font-22'   => esc_html__( 'Rajdhani', 'kids-education-bell' ),
            'header-font-23'   => esc_html__( 'Bad Script', 'kids-education-bell' ),
            'header-font-24'   => esc_html__( 'Righteous', 'kids-education-bell' ),
            'header-font-25'   => esc_html__( 'Dosis', 'kids-education-bell' ),
            'header-font-26'   => esc_html__( 'Cinzel Decorative', 'kids-education-bell' ),
            'header-font-27'   => esc_html__( 'Faster one', 'kids-education-bell' ),
            'header-font-28'   => esc_html__( 'Tangerine', 'kids-education-bell' ),
            'header-font-29'   => esc_html__( 'Fredericka the Great', 'kids-education-bell' ),
            'header-font-30'   => esc_html__( 'Shadows Into Light', 'kids-education-bell' ),
        );

        $output = apply_filters( 'kids_education_bell_archive_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

if ( ! function_exists( 'kids_education_bell_archive_body_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function kids_education_bell_archive_body_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'kids-education-bell' ),
            'body-font-1'     => esc_html__( 'Raleway', 'kids-education-bell' ),
            'body-font-2'     => esc_html__( 'Poppins', 'kids-education-bell' ),
            'body-font-3'     => esc_html__( 'Roboto', 'kids-education-bell' ),
            'body-font-4'     => esc_html__( 'Open Sans', 'kids-education-bell' ),
            'body-font-5'     => esc_html__( 'Lato', 'kids-education-bell' ),
            'body-font-6'   => esc_html__( 'Ubuntu', 'kids-education-bell' ),
            'body-font-7'   => esc_html__( 'Playfair Display', 'kids-education-bell' ),
            'body-font-8'   => esc_html__( 'Lora', 'kids-education-bell' ),
            'body-font-9'   => esc_html__( 'Titillium Web', 'kids-education-bell' ),
            'body-font-10'   => esc_html__( 'Muli', 'kids-education-bell' ),
            'body-font-11'   => esc_html__( 'Oxygen', 'kids-education-bell' ),
            'body-font-12'   => esc_html__( 'Nunito Sans', 'kids-education-bell' ),
            'body-font-13'   => esc_html__( 'Maven Pro', 'kids-education-bell' ),
            'body-font-14'   => esc_html__( 'Cairo', 'kids-education-bell' ),
            'body-font-15'   => esc_html__( 'Philosopher', 'kids-education-bell' ),
            'body-font-16'   => esc_html__( 'Quicksand', 'kids-education-bell' ),
            'body-font-17'   => esc_html__( 'Dancing Script ', 'kids-education-bell' ),
            'body-font-18'   => esc_html__( 'Rajdhani', 'kids-education-bell' ),
        );

        $output = apply_filters( 'kids_education_bell_archive_body_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

if ( ! function_exists( 'kids_education_bell_page_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function kids_education_bell_page_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'kids-education-bell' ),
            'header-font-1'   => esc_html__( 'Raleway', 'kids-education-bell' ),
            'header-font-2'   => esc_html__( 'Poppins', 'kids-education-bell' ),
            'header-font-3'   => esc_html__( 'Montserrat', 'kids-education-bell' ),
            'header-font-4'   => esc_html__( 'Open Sans', 'kids-education-bell' ),
            'header-font-5'   => esc_html__( 'Lato', 'kids-education-bell' ),
            'header-font-6'   => esc_html__( 'Ubuntu', 'kids-education-bell' ),
            'header-font-7'   => esc_html__( 'Playfair Display', 'kids-education-bell' ),
            'header-font-8'   => esc_html__( 'Lora', 'kids-education-bell' ),
            'header-font-9'   => esc_html__( 'Titillium Web', 'kids-education-bell' ),
            'header-font-10'   => esc_html__( 'Muli', 'kids-education-bell' ),
            'header-font-11'   => esc_html__( 'Oxygen', 'kids-education-bell' ),
            'header-font-12'   => esc_html__( 'Nunito Sans', 'kids-education-bell' ),
            'header-font-13'   => esc_html__( 'Maven Pro', 'kids-education-bell' ),
            'header-font-14'   => esc_html__( 'Cairo', 'kids-education-bell' ),
            'header-font-15'   => esc_html__( 'Philosopher', 'kids-education-bell' ),
            'header-font-16'   => esc_html__( 'Quicksand', 'kids-education-bell' ),
            'header-font-17'   => esc_html__( 'Henny Penny', 'kids-education-bell' ),
            'header-font-18'   => esc_html__( 'Orbitron' , 'kids-education-bell' ),
            'header-font-19'   => esc_html__( 'Marck Script', 'kids-education-bell' ),
            'header-font-20'   => esc_html__( 'Kaushan Script', 'kids-education-bell' ),
            'header-font-21'   => esc_html__( 'Courgette', 'kids-education-bell' ),
            'header-font-22'   => esc_html__( 'Rajdhani', 'kids-education-bell' ),
            'header-font-23'   => esc_html__( 'Bad Script', 'kids-education-bell' ),
            'header-font-24'   => esc_html__( 'Righteous', 'kids-education-bell' ),
            'header-font-25'   => esc_html__( 'Dosis', 'kids-education-bell' ),
            'header-font-26'   => esc_html__( 'Cinzel Decorative', 'kids-education-bell' ),
            'header-font-27'   => esc_html__( 'Faster one', 'kids-education-bell' ),
            'header-font-28'   => esc_html__( 'Tangerine', 'kids-education-bell' ),
            'header-font-29'   => esc_html__( 'Fredericka the Great', 'kids-education-bell' ),
            'header-font-30'   => esc_html__( 'Shadows Into Light', 'kids-education-bell' ),
        );

        $output = apply_filters( 'kids_education_bell_page_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

if ( ! function_exists( 'kids_education_bell_page_body_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function kids_education_bell_page_body_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'kids-education-bell' ),
            'body-font-1'     => esc_html__( 'Raleway', 'kids-education-bell' ),
            'body-font-2'     => esc_html__( 'Poppins', 'kids-education-bell' ),
            'body-font-3'     => esc_html__( 'Roboto', 'kids-education-bell' ),
            'body-font-4'     => esc_html__( 'Open Sans', 'kids-education-bell' ),
            'body-font-5'     => esc_html__( 'Lato', 'kids-education-bell' ),
            'body-font-6'   => esc_html__( 'Ubuntu', 'kids-education-bell' ),
            'body-font-7'   => esc_html__( 'Playfair Display', 'kids-education-bell' ),
            'body-font-8'   => esc_html__( 'Lora', 'kids-education-bell' ),
            'body-font-9'   => esc_html__( 'Titillium Web', 'kids-education-bell' ),
            'body-font-10'   => esc_html__( 'Muli', 'kids-education-bell' ),
            'body-font-11'   => esc_html__( 'Oxygen', 'kids-education-bell' ),
            'body-font-12'   => esc_html__( 'Nunito Sans', 'kids-education-bell' ),
            'body-font-13'   => esc_html__( 'Maven Pro', 'kids-education-bell' ),
            'body-font-14'   => esc_html__( 'Cairo', 'kids-education-bell' ),
            'body-font-15'   => esc_html__( 'Philosopher', 'kids-education-bell' ),
            'body-font-16'   => esc_html__( 'Quicksand', 'kids-education-bell' ),
            'body-font-17'   => esc_html__( 'Dancing Script ', 'kids-education-bell' ),
            'body-font-18'   => esc_html__( 'Rajdhani', 'kids-education-bell' ),
        );

        $output = apply_filters( 'kids_education_bell_page_body_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

if ( ! function_exists( 'kids_education_bell_post_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function kids_education_bell_post_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'kids-education-bell' ),
            'header-font-1'   => esc_html__( 'Raleway', 'kids-education-bell' ),
            'header-font-2'   => esc_html__( 'Poppins', 'kids-education-bell' ),
            'header-font-3'   => esc_html__( 'Montserrat', 'kids-education-bell' ),
            'header-font-4'   => esc_html__( 'Open Sans', 'kids-education-bell' ),
            'header-font-5'   => esc_html__( 'Lato', 'kids-education-bell' ),
            'header-font-6'   => esc_html__( 'Ubuntu', 'kids-education-bell' ),
            'header-font-7'   => esc_html__( 'Playfair Display', 'kids-education-bell' ),
            'header-font-8'   => esc_html__( 'Lora', 'kids-education-bell' ),
            'header-font-9'   => esc_html__( 'Titillium Web', 'kids-education-bell' ),
            'header-font-10'   => esc_html__( 'Muli', 'kids-education-bell' ),
            'header-font-11'   => esc_html__( 'Oxygen', 'kids-education-bell' ),
            'header-font-12'   => esc_html__( 'Nunito Sans', 'kids-education-bell' ),
            'header-font-13'   => esc_html__( 'Maven Pro', 'kids-education-bell' ),
            'header-font-14'   => esc_html__( 'Cairo', 'kids-education-bell' ),
            'header-font-15'   => esc_html__( 'Philosopher', 'kids-education-bell' ),
            'header-font-16'   => esc_html__( 'Quicksand', 'kids-education-bell' ),
            'header-font-17'   => esc_html__( 'Henny Penny', 'kids-education-bell' ),
            'header-font-18'   => esc_html__( 'Orbitron' , 'kids-education-bell' ),
            'header-font-19'   => esc_html__( 'Marck Script', 'kids-education-bell' ),
            'header-font-20'   => esc_html__( 'Kaushan Script', 'kids-education-bell' ),
            'header-font-21'   => esc_html__( 'Courgette', 'kids-education-bell' ),
            'header-font-22'   => esc_html__( 'Rajdhani', 'kids-education-bell' ),
            'header-font-23'   => esc_html__( 'Bad Script', 'kids-education-bell' ),
            'header-font-24'   => esc_html__( 'Righteous', 'kids-education-bell' ),
            'header-font-25'   => esc_html__( 'Dosis', 'kids-education-bell' ),
            'header-font-26'   => esc_html__( 'Cinzel Decorative', 'kids-education-bell' ),
            'header-font-27'   => esc_html__( 'Faster one', 'kids-education-bell' ),
            'header-font-28'   => esc_html__( 'Tangerine', 'kids-education-bell' ),
            'header-font-29'   => esc_html__( 'Fredericka the Great', 'kids-education-bell' ),
            'header-font-30'   => esc_html__( 'Shadows Into Light', 'kids-education-bell' ),
        );

        $output = apply_filters( 'kids_education_bell_post_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

if ( ! function_exists( 'kids_education_bell_post_body_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function kids_education_bell_post_body_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'kids-education-bell' ),
            'body-font-1'     => esc_html__( 'Raleway', 'kids-education-bell' ),
            'body-font-2'     => esc_html__( 'Poppins', 'kids-education-bell' ),
            'body-font-3'     => esc_html__( 'Roboto', 'kids-education-bell' ),
            'body-font-4'     => esc_html__( 'Open Sans', 'kids-education-bell' ),
            'body-font-5'     => esc_html__( 'Lato', 'kids-education-bell' ),
            'body-font-6'   => esc_html__( 'Ubuntu', 'kids-education-bell' ),
            'body-font-7'   => esc_html__( 'Playfair Display', 'kids-education-bell' ),
            'body-font-8'   => esc_html__( 'Lora', 'kids-education-bell' ),
            'body-font-9'   => esc_html__( 'Titillium Web', 'kids-education-bell' ),
            'body-font-10'   => esc_html__( 'Muli', 'kids-education-bell' ),
            'body-font-11'   => esc_html__( 'Oxygen', 'kids-education-bell' ),
            'body-font-12'   => esc_html__( 'Nunito Sans', 'kids-education-bell' ),
            'body-font-13'   => esc_html__( 'Maven Pro', 'kids-education-bell' ),
            'body-font-14'   => esc_html__( 'Cairo', 'kids-education-bell' ),
            'body-font-15'   => esc_html__( 'Philosopher', 'kids-education-bell' ),
            'body-font-16'   => esc_html__( 'Quicksand', 'kids-education-bell' ),
            'body-font-17'   => esc_html__( 'Dancing Script ', 'kids-education-bell' ),
            'body-font-18'   => esc_html__( 'Rajdhani', 'kids-education-bell' ),
        );

        $output = apply_filters( 'kids_education_bell_post_body_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;


if ( ! function_exists( 'kids_education_bell_site_title_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function kids_education_bell_site_title_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'kids-education-bell' ),
            'site-font-1'   => esc_html__( 'Raleway', 'kids-education-bell' ),
            'site-font-2'   => esc_html__( 'Poppins', 'kids-education-bell' ),
            'site-font-3'   => esc_html__( 'Montserrat', 'kids-education-bell' ),
            'site-font-4'   => esc_html__( 'Open Sans', 'kids-education-bell' ),
            'site-font-5'   => esc_html__( 'Lato', 'kids-education-bell' ),
            'site-font-6'   => esc_html__( 'Ubuntu', 'kids-education-bell' ),
            'site-font-7'   => esc_html__( 'Playfair Display', 'kids-education-bell' ),
            'site-font-8'   => esc_html__( 'Lora', 'kids-education-bell' ),
            'site-font-9'   => esc_html__( 'Titillium Web', 'kids-education-bell' ),
            'site-font-10'   => esc_html__( 'Muli', 'kids-education-bell' ),
            'site-font-11'   => esc_html__( 'Oxygen', 'kids-education-bell' ),
            'site-font-12'   => esc_html__( 'Nunito Sans', 'kids-education-bell' ),
            'site-font-13'   => esc_html__( 'Maven Pro', 'kids-education-bell' ),
            'site-font-14'   => esc_html__( 'Cairo', 'kids-education-bell' ),
            'site-font-15'   => esc_html__( 'Philosopher', 'kids-education-bell' ),
            'site-font-16'   => esc_html__( 'Quicksand', 'kids-education-bell' ),
            'site-font-17'   => esc_html__( 'Henny Penny', 'kids-education-bell' ),
            'site-font-18'   => esc_html__( 'Orbitron' , 'kids-education-bell' ),
            'site-font-19'   => esc_html__( 'Marck Script', 'kids-education-bell' ),
            'site-font-20'   => esc_html__( 'Kaushan Script', 'kids-education-bell' ),
            'site-font-21'   => esc_html__( 'Courgette', 'kids-education-bell' ),
            'site-font-22'   => esc_html__( 'Rajdhani', 'kids-education-bell' ),
            'site-font-23'   => esc_html__( 'Bad Script', 'kids-education-bell' ),
            'site-font-24'   => esc_html__( 'Righteous', 'kids-education-bell' ),
            'site-font-25'   => esc_html__( 'Dosis', 'kids-education-bell' ),
            'site-font-26'   => esc_html__( 'Cinzel Decorative', 'kids-education-bell' ),
            'site-font-27'   => esc_html__( 'Faster one', 'kids-education-bell' ),
            'site-font-28'   => esc_html__( 'Tangerine', 'kids-education-bell' ),
            'site-font-29'   => esc_html__( 'Fredericka the Great', 'kids-education-bell' ),
            'site-font-30'   => esc_html__( 'Shadows Into Light', 'kids-education-bell' ),
        );

        $output = apply_filters( 'kids_education_bell_site_title_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

if ( ! function_exists( 'kids_education_bell_site_tagline_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function kids_education_bell_site_tagline_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'kids-education-bell' ),
            'tagline-font-1'     => esc_html__( 'Raleway', 'kids-education-bell' ),
            'tagline-font-2'     => esc_html__( 'Poppins', 'kids-education-bell' ),
            'tagline-font-3'     => esc_html__( 'Roboto', 'kids-education-bell' ),
            'tagline-font-4'     => esc_html__( 'Open Sans', 'kids-education-bell' ),
            'tagline-font-5'     => esc_html__( 'Lato', 'kids-education-bell' ),
            'tagline-font-6'   => esc_html__( 'Ubuntu', 'kids-education-bell' ),
            'tagline-font-7'   => esc_html__( 'Playfair Display', 'kids-education-bell' ),
            'tagline-font-8'   => esc_html__( 'Lora', 'kids-education-bell' ),
            'tagline-font-9'   => esc_html__( 'Titillium Web', 'kids-education-bell' ),
            'tagline-font-10'   => esc_html__( 'Muli', 'kids-education-bell' ),
            'tagline-font-11'   => esc_html__( 'Oxygen', 'kids-education-bell' ),
            'tagline-font-12'   => esc_html__( 'Nunito Sans', 'kids-education-bell' ),
            'tagline-font-13'   => esc_html__( 'Maven Pro', 'kids-education-bell' ),
            'tagline-font-14'   => esc_html__( 'Cairo', 'kids-education-bell' ),
            'tagline-font-15'   => esc_html__( 'Philosopher', 'kids-education-bell' ),
            'tagline-font-16'   => esc_html__( 'Quicksand', 'kids-education-bell' ),
            'tagline-font-17'   => esc_html__( 'Dancing Script ', 'kids-education-bell' ),
            'tagline-font-18'   => esc_html__( 'Rajdhani', 'kids-education-bell' ),
        );

        $output = apply_filters( 'kids_education_bell_site_tagline_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

 ?>