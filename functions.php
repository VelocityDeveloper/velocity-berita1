<?php

/**
 * Child theme functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Text Domain: justg
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

/**
 * Load other required files
 *
 */

$inc = get_stylesheet_directory() . '/inc';
$includes = [
    'enqueue.php',
    'function-child.php',
    'function-vdposts.php',
    'widget-posts-berita.php',
    'widget-tabs-berita.php',
    'shortcodes.php'
];

foreach ($includes as $include) {
    require_once($inc . '/' . $include);
}

// action add sidebar
if (!function_exists('justg_right_sidebar_check')) {
    function justg_right_sidebar_check()
    {
        if (is_singular('fl-builder-template')) {
            return;
        }
        if (!is_active_sidebar('main-sidebar')) {
            return;
        }
        echo '<div class="right-sidebar velocity-widget widget-area px-2 col-sm-12 col-md-4 order-3" id="right-sidebar" role="complementary">';
        echo '<div class="sticky-top">';
        do_action('justg_before_main_sidebar');
        dynamic_sidebar('main-sidebar');
        do_action('justg_after_main_sidebar');
        echo '</div>';
        echo '</div>';
    }
}

add_action('widgets_init', 'justg_widgets_init');
if (!function_exists('justg_widgets_init')) {
    /**
     * Initializes themes widgets.
     */
    function justg_widgets_init()
    {
        $widget_title_class = 'widget-title bg-color-theme pt-2 pb-1 px-3 text-uppercase text-white d-inline-block mb-0';
        $widget_title_separator = '<div class="separator bg-color-theme mb-2"></div>';

        // Register main sidebar widget area
        register_sidebar(
            array(
                'name'          => __('Main Sidebar', 'justg'),
                'id'            => 'main-sidebar',
                'description'   => __('Main sidebar widget area', 'justg'),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h4 class="' . $widget_title_class . '">',
                'after_title'   => '</h4>' . $widget_title_separator,
            )
        );

        // Register secondary sidebar widget area
        register_sidebar(
            array(
                'name'          => __('Secondary Sidebar', 'justg'),
                'id'            => 'secondary-sidebar',
                'description'   => __('Secondary sidebar widget area', 'justg'),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h4 class="' . $widget_title_class . '">',
                'after_title'   => '</h4>' . $widget_title_separator,
            )
        );

        register_sidebar(
            array(
                'name'          => __('Footer Widget 1', 'justg'),
                'id'            => 'footer-widget1',
                'description'   => __('Footer Widget', 'justg'),
                'before_widget' => '<aside id="%1$s" class="mb-4 widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h4 class="' . $widget_title_class . '">',
                'after_title'   => '</h4>' . $widget_title_separator,
            )
        );
        register_sidebar(
            array(
                'name'          => __('Footer Widget 2', 'justg'),
                'id'            => 'footer-widget2',
                'description'   => __('Footer Widget', 'justg'),
                'before_widget' => '<aside id="%1$s" class="mb-4 widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h4 class="' . $widget_title_class . '">',
                'after_title'   => '</h4>' . $widget_title_separator,
            )
        );
        register_sidebar(
            array(
                'name'          => __('Footer Widget 3', 'justg'),
                'id'            => 'footer-widget3',
                'description'   => __('Footer Widget', 'justg'),
                'before_widget' => '<aside id="%1$s" class="mb-4 widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h4 class="' . $widget_title_class . '">',
                'after_title'   => '</h4>' . $widget_title_separator,
            )
        );
        register_sidebar(
            array(
                'name'          => __('Footer Widget 4', 'justg'),
                'id'            => 'footer-widget4',
                'description'   => __('Footer Widget', 'justg'),
                'before_widget' => '<aside id="%1$s" class="mb-4 widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h4 class="' . $widget_title_class . '">',
                'after_title'   => '</h4>' . $widget_title_separator,
            )
        );
    }
} // End of function_exists( 'justg_widgets_init' ).