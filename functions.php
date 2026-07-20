<?php

function boldpixels_theme_setup()
{

    load_theme_textdomain('boldpixels', get_template_directory() . '/languages');

    // Remove ACF meta box from post editor
    add_filter('acf/settings/remove_wp_meta_box', '__return_false');

    // Add support for title tag
    add_theme_support('title-tag');

    // Add support for custom logo
    add_theme_support('custom-logo');

    // Add support for post thumbnails
    add_theme_support('post-thumbnails');

    // Add support for custom fields
    add_theme_support('custom-fields');

    // Add slider theme support 
    add_theme_support('post-thumbnails', array('sliders'));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'boldpixels'),
        'footer' => __('Footer Menu', 'boldpixels'),
    ));
}
add_action('after_setup_theme', 'boldpixels_theme_setup');


function boldpixels_asset()
{

    // Enqueue Styles
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', [], '1.1', 'all');
    //wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', [], '2.x' );
    wp_enqueue_style('owl-carousel-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', [], '1.1');
    wp_enqueue_style('owl-theme', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css');
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', [], '1.1', 'all');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', [], '1.1', 'all');
    wp_enqueue_style('poppins-font', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700', [], null);
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', [], '1.1', 'all');

    // enqueue main stylesheet
    wp_enqueue_style('style', get_stylesheet_uri());


    // Enqueue Scripts

    // wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), null, true);
    wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), null, true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), null, true);
    // wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), null, true);
    wp_enqueue_script('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('jquery'), null, true);
    wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), null, true);
    wp_enqueue_script('isotope', get_template_directory_uri() . '/assets/js/isotope.min.js', array('jquery'), null, true);
    wp_enqueue_script('imageloaded', get_template_directory_uri() . '/assets/js/imageloaded.min.js', array('jquery'), null, true);
    wp_enqueue_script('counter', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array('jquery'), null, true);
    wp_enqueue_script('waypoint', get_template_directory_uri() . '/assets/js/waypoint.min.js', array('jquery'), null, true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'boldpixels_asset');


// Custom Excerpt Length
function custom_excerpt_length($length)
{
    return 10;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

register_taxonomy(
    'portfolio_category',
    'portfolios',
    array(
        'labels' => array(
            'name' => __('Portfolio Categories', 'boldpixels'),
            'singular_name' => __('Portfolio Category', 'boldpixels'),
        ),
        'public' => true,
        'hierarchical' => true,
        'show_ui' => true,
        'show_in_rest' => true,
    )
);



// Custom Post Type

function boldpixels_custom_post_type()
{

    // custom post type for sliders
    register_post_type(
        'sliders',
        array(
            'labels' => array(
                'name' => __('Sliders', 'boldpixels'),
                'singular_name' => __('Slider', 'boldpixels'),
            ),
            'public' => true,
            'has_archive' => true,
            'show_ui' => true,
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
            'menu_icon' => 'dashicons-images-alt2',
        )
    );


    // custom post type for Services
    register_post_type(
        'services',
        array(
            'labels' => array(
                'name' => __('Services', 'boldpixels'),
                'singular_name' => __('Service', 'boldpixels'),
            ),
            'public' => true,
            'has_archive' => true,
            'show_ui' => true,
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-hammer',
        )
    );


    // custom post type for Counters
    register_post_type(
        'counters',
        array(
            'labels' => array(
                'name' => __('Counters', 'boldpixels'),
                'singular_name' => __('Counter', 'boldpixels'),
            ),
            'public' => true,
            'has_archive' => true,
            'show_ui' => true,
            'show_in_rest' => true,
            'supports' => array('title'),
            'menu_icon' => 'dashicons-chart-bar',
        )
    );


    // custom post type for Teams
    register_post_type(
        'teams',
        array(
            'labels' => array(
                'name' => __('Teams', 'boldpixels'),
                'singular_name' => __('Team', 'boldpixels'),
            ),
            'public' => true,
            'has_archive' => true,
            'show_ui' => true,
            'show_in_rest' => true,
            'supports' => array('title', 'thumbnail'),
            'menu_icon' => 'dashicons-groups',
        )
    );


    // custom post type for Portfolio
    register_post_type(
        'portfolios',
        array(
            'labels' => array(
                'name' => __('Portfolios', 'boldpixels'),
                'singular_name' => __('Portfolio', 'boldpixels'),
            ),
            'public' => true,
            'has_archive' => true,
            'show_ui' => true,
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-format-gallery',
        )
    );



    // custom post type for Galleries
    register_post_type(
        'Galleries',
        array(
            'labels' => array(
                'name' => __('Galleries', 'boldpixels'),
                'singular_name' => __('Gallery', 'boldpixels'),
            ),
            'public' => true,
            'has_archive' => true,
            'show_ui' => true,
            'show_in_rest' => true,
            'supports' => array('title', 'thumbnail'),
            'menu_icon' => 'dashicons-format-gallery',
        )
    );

}

add_action('init', 'boldpixels_custom_post_type');



function acf_css()
{

    $about = get_field('about_section_content', 'option');

    if (! empty($about['button_background_color'])) :
    ?>
        <style>
            .header-top {
                background-color: <?php echo the_field('header_background', 'option'); ?>;
            }

            a.box-btn {
                background-color: <?php echo esc_attr($about['button_background_color']); ?> !important;
            }
        </style>
<?php
    endif;
}
add_action('wp_head', 'acf_css');


add_action('acf/init', function () {
    if (function_exists('acf_add_options_page')) {

        acf_add_options_page(array(
            'page_title'    => 'BoldPixels General Settings',
            'menu_title'    => 'BoldPixels Settings',
            'menu_slug'     => 'boldpixels-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false,
            'position'   => 4,
            'icon_url'   => 'dashicons-admin-generic',
        ));

        acf_add_options_sub_page(array(
            'page_title'    => 'BoldPixels Header Settings',
            'menu_title'    => 'Header',
            'parent_slug'   => 'boldpixels-general-settings',
        ));

        acf_add_options_sub_page(array(
            'page_title'    => 'BoldPixels Footer Settings',
            'menu_title'    => 'Footer',
            'parent_slug'   => 'boldpixels-general-settings',
        ));

        acf_add_options_sub_page(array(
            'page_title'    => 'About Settings',
            'menu_title'    => 'About',
            'parent_slug'   => 'boldpixels-general-settings',
        ));

         acf_add_options_sub_page(array(
            'page_title'    => 'FAQ & Skills Settings',
            'menu_title'    => 'FAQ & Skills',
            'parent_slug'   => 'boldpixels-general-settings',
        ));

        acf_add_options_sub_page(array(
            'page_title'    => 'CTA Settings',
            'menu_title'    => 'CTA',
            'parent_slug'   => 'boldpixels-general-settings',
        ));
    }
});
