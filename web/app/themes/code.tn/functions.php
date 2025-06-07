<?php
/*
   This file is part of a child theme called code.tn.
   Functions in this file will be loaded before the parent theme's functions.
   For more information, please read
   https://developer.wordpress.org/themes/advanced-topics/child-themes/

*/

// this code loads the parent's stylesheet (leave it in place unless you know what you're doing)

function your_theme_enqueue_styles()
{
    $parent_style = 'parent-style';

    wp_enqueue_style(
        $parent_style,
        get_template_directory_uri() . '/style.css'
    );

    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style),
        wp_get_theme()->get('Version')
    );

    wp_register_script('customjs', get_stylesheet_directory_uri() . '/customjs.js', '', '1.0', true);
    if (is_singular('lp_course')) {
        wp_enqueue_style(
            'single-course-style',
            get_stylesheet_directory_uri() . '/learnpress/single-course/style.css',
            '',
            ''
        );

        wp_enqueue_script('customjs');
    }
}

add_action('wp_enqueue_scripts', 'your_theme_enqueue_styles');

/*
	Add your own functions below this line.
	======================================== */

if ( ! function_exists('kids_education_bell_footer_section')) :

    /**
     * Footer copyright
     *
     * @since 1.0.0
     */
    function kids_education_bell_footer_section()
    {
        ?>
        <div class="site-info">
            <div class="cloud-top">
                <?php
                echo kids_education_bell_get_icon_svg('bg_cloud'); ?>
            </div>
            <?php
            $copyright_footer  = kids_education_bell_get_option('copyright_text');
            $powered_by_footer = kids_education_bell_get_option('powered_by_text');
            if ( ! empty($copyright_footer)) {
                $copyright_footer = wp_kses_data($copyright_footer);
            }
            // Powered by content.
            $powered_by_text = sprintf(
                __(' %s ' . date('Y'), 'kids-education-bell'),
                '<a target="_blank" rel="designer" href="' . esc_url('https://code.tn/') . '">' . esc_html__(
                    'code.tn',
                    'code.tn'
                ) . '</a>'
            );
            ?>
            <div class="wrapper">
                <span class="copy-right"><?php
                    echo esc_html($copyright_footer); ?><?php
                    echo($powered_by_text); ?></span>
            </div>
        </div> <!-- site generator ends here -->

        <?php
    }

endif;
add_action('kids_education_bell_action_footer', 'kids_education_bell_footer_section', 20);

if (function_exists('pll_register_string')) {
    /**
     * Register some strings from the customizer to be translated with Polylang.
     */
    function kids_education_bell_pll_register_string()
    {
        $services_title = kids_education_bell_get_option('services_title');

        // Check if the option exists and is not empty
        if ( ! empty($services_title)) {
            pll_register_string('services_title', $services_title, 'kids-education-bell', true);
        } else {
            // Log or handle the case where the option is missing or empty
            error_log('Polylang registration error: services_title option is empty or not set.');
        }
    }

    // Use the 'init' hook with a priority of 20 to ensure Polylang and options are ready
    add_action('init', 'kids_education_bell_pll_register_string', 20);
}
add_filter(
    'learn-press/override-templates',
    function () {
        return true;
    }
);
function filter_category_on_blog_page($query)
{
    if ($query->is_home() && $query->is_main_query()) {
        $query->set('category_name', 'blog');
        // if many categories : $query->set( 'category_name', 'news,reviews,tutorials' );
    }
}

add_action('pre_get_posts', 'filter_category_on_blog_page');

function my_custom_code1()
{
    ?>


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TKSF782E37"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-TKSF782E37');
    </script>


    <!-- End Google Tag Manager -->

    <?php
}

add_action('wp_head', 'my_custom_code1', 10);

function code_tn_add_template_path_comments($template)
{
    // Only add comments if user is logged in or if WP_DEBUG is true
    if (is_user_logged_in() || (defined('WP_DEBUG') && WP_DEBUG)) {
        global $template_parts_comments;
        $template_parts_comments = array();

        // Add filter for template parts
        add_filter(
            'load_template',
            function ($located) {
                global $template_parts_comments;
                $theme_directory        = get_stylesheet_directory();
                $parent_theme_directory = get_template_directory();

                $relative_path = $located;
                if (strpos($located, $theme_directory) === 0) {
                    $relative_path = 'Child Theme: ' . substr($located, strlen($theme_directory));
                } elseif (strpos($located, $parent_theme_directory) === 0) {
                    $relative_path = 'Parent Theme: ' . substr($located, strlen($parent_theme_directory));
                }

                $template_parts_comments[] = array(
                    'relative' => $relative_path,
                    'full'     => $located,
                );

                echo "\n<!-- Template Being Loaded: $relative_path -->\n";
                echo "<!-- Full Path: $located -->\n";

                return $located;
            },
            999
        );

        // LearnPress specific hooks
        add_filter(
            'learn-press/template-file',
            function ($located, $template_name) {
                echo "\n<!-- LearnPress Template: $template_name -->\n";
                echo "<!-- LearnPress Path: $located -->\n";

                return $located;
            },
            999,
            2
        );

        // Additional LearnPress specific hooks
        add_filter(
            'learn_press_get_template_part',
            function ($template, $slug, $name) {
                echo "\n<!-- LP Template Part: $slug" . ($name ? "-$name" : '') . " -->\n";
                echo "<!-- LP Template File: $template -->\n";

                return $template;
            },
            999,
            3
        );

        add_filter(
            'learn_press_get_template',
            function ($located, $template_name, $args) {
                echo "\n<!-- LP Get Template: $template_name -->\n";
                echo "<!-- LP Located: $located -->\n";

                return $located;
            },
            999,
            3
        );

        // Hook into LearnPress content
        add_action(
            'learn-press/before-main-content',
            function () {
                echo "\n<!-- LP Main Content Start -->\n";
            },
            999
        );

        add_action(
            'learn-press/after-main-content',
            function () {
                echo "\n<!-- LP Main Content End -->\n";
            },
            999
        );

        // Course specific hooks
        add_action(
            'learn-press/before-single-course',
            function () {
                echo "\n<!-- LP Single Course Start -->\n";
            },
            999
        );

        add_action(
            'learn-press/after-single-course',
            function () {
                echo "\n<!-- LP Single Course End -->\n";
            },
            999
        );

        // Add all template parts to footer
        add_action(
            'wp_footer',
            function () use ($template) {
                global $template_parts_comments;
                echo "\n<!-- === Template Debug Information === -->\n";
                echo "<!-- Main Template: $template -->\n";
                if ( ! empty($template_parts_comments)) {
                    echo "<!-- === Loaded Template Parts === -->\n";
                    foreach ($template_parts_comments as $part) {
                        echo "<!-- Template Part: {$part['relative']} -->\n";
                        echo "<!-- Full Path: {$part['full']} -->\n";
                    }
                }
                echo "<!-- === End Template Debug Information === -->\n";
            },
            999
        );
    }

    return $template;
}

add_filter('template_include', 'code_tn_add_template_path_comments', 999);

// Additional hook for get_template_part
add_filter(
    'get_template_part',
    function ($slug, $name, $templates) {
        if (is_user_logged_in() || (defined('WP_DEBUG') && WP_DEBUG)) {
            echo "\n<!-- Loading Template Part: $slug" . ($name ? "-$name" : '') . " -->\n";
            echo '<!-- Available Templates: ' . implode(', ', $templates) . " -->\n";
        }

        return $slug;
    },
    999,
    3
);

/**
 * Additional LearnPress specific template tracking.
 *
 * @param string $template The template path.
 *
 * @return string The template path.
 */
function Code_Tn_Track_Lp_Template_Include($template)
{
    if (is_user_logged_in() || (defined('WP_DEBUG') && WP_DEBUG)) {
        if (function_exists('learn_press_is_course') &&
            (learn_press_is_course() || learn_press_is_courses())) {
            echo "\n<!-- LearnPress Template Include: $template -->\n";
        }
    }

    return $template;
}

add_filter('template_include', 'Code_Tn_Track_Lp_Template_Include', 998);

add_action('init', function () {
    register_post_type('test', [
        'label'        => 'Tests',
        'public'       => true,
        'menu_icon'    => 'dashicons-testimonial',
        'supports'     => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true, // Optional for Gutenberg
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'test'],
    ]);
});

function mytheme_child_register_blocks()
{
    register_block_type(get_stylesheet_directory() . '/blocks/testimonial/block.json');
}

add_action('init', 'mytheme_child_register_blocks');
