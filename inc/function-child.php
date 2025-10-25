<?php

/**
 * Fuction yang digunakan di theme ini.
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

add_action('after_setup_theme', 'velocitychild_theme_setup', 9);

function velocitychild_theme_setup()
{
    add_action('customize_register', 'velocitychild_customize_register', 20);

    register_nav_menus(
        array(
            'secondary' => __('Secondary Menu', 'justg'),
        )
    );

    //remove action from Parent Theme
    remove_action('justg_header', 'justg_header_menu');
    remove_action('justg_do_footer', 'justg_the_footer_open');
    remove_action('justg_do_footer', 'justg_the_footer_content');
    remove_action('justg_do_footer', 'justg_the_footer_close');
}

function velocitychild_customize_register($wp_customize)
{
    $wp_customize->remove_section('velocity_section_colors');

    $wp_customize->add_panel(
        'panel_berita',
        array(
            'priority'    => 10,
            'title'       => __('Berita', 'justg'),
            'description' => '',
        )
    );

    $wp_customize->add_section(
        'section_colorberita',
        array(
            'panel'    => 'panel_berita',
            'title'    => __('Warna', 'justg'),
            'priority' => 10,
        )
    );

    $wp_customize->add_setting(
        'color_theme',
        array(
            'default'           => '#740106',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'color_theme',
            array(
                'label'   => __('Color Theme', 'justg'),
                'section' => 'section_colorberita',
            )
        )
    );

    $wp_customize->add_section(
        'section_iklanberita',
        array(
            'panel'    => 'panel_berita',
            'title'    => __('Iklan', 'justg'),
            'priority' => 20,
        )
    );

    $ads_fields = array(
        'iklan_header'   => array(
            'label'       => __('Iklan Header', 'justg'),
            'description' => __('Iklan Halaman Depan 728x90', 'justg'),
        ),
        'iklan_footer'   => array(
            'label'       => __('Iklan Footer', 'justg'),
            'description' => __('Iklan Footer 600x80', 'justg'),
        ),
        'iklan_content'  => array(
            'label'       => __('Iklan Single', 'justg'),
            'description' => __('Iklan Single post 468x60', 'justg'),
        ),
        'iklan_content_2' => array(
            'label'       => __('Iklan Single 2', 'justg'),
            'description' => __('Iklan Single post 160x600', 'justg'),
        ),
    );

    foreach ($ads_fields as $id => $data) {
        $image_setting = 'image_' . $id;
        $link_setting  = 'link_' . $id;

        $wp_customize->add_setting(
            $image_setting,
            array(
                'default'           => '',
                'sanitize_callback' => 'esc_url_raw',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                $image_setting,
                array(
                    'label'       => sprintf(__('Gambar %s', 'justg'), $data['label']),
                    'description' => $data['description'],
                    'section'     => 'section_iklanberita',
                )
            )
        );

        $wp_customize->add_setting(
            $link_setting,
            array(
                'default'           => '',
                'sanitize_callback' => 'velocitychild_sanitize_url',
            )
        );

        $wp_customize->add_control(
            $link_setting,
            array(
                'label'   => sprintf(__('Link %s', 'justg'), $data['label']),
                'section' => 'section_iklanberita',
                'type'    => 'url',
            )
        );
    }

    $wp_customize->add_section(
        'section_sosmedberita',
        array(
            'panel'    => 'panel_berita',
            'title'    => __('Sosial Media', 'justg'),
            'priority' => 30,
        )
    );

    $social_fields = array(
        'facebook'  => __('Facebook', 'justg'),
        'twitter'   => __('Twitter', 'justg'),
        'instagram' => __('Instagram', 'justg'),
        'youtube'   => __('Youtube', 'justg'),
    );

    foreach ($social_fields as $id => $label) {
        $setting = 'link_sosmed_' . $id;

        $wp_customize->add_setting(
            $setting,
            array(
                'default'           => 'https://' . $id . '.com/',
                'sanitize_callback' => 'velocitychild_sanitize_url',
            )
        );

        $wp_customize->add_control(
            $setting,
            array(
                'label'   => sprintf(__('Link %s', 'justg'), $label),
                'section' => 'section_sosmedberita',
                'type'    => 'url',
            )
        );
    }

    $wp_customize->add_section(
        'section_homeberita',
        array(
            'panel'    => 'panel_berita',
            'title'    => __('Home', 'justg'),
            'priority' => 40,
        )
    );

    $posts_fields = array(
        'posts_highlight' => array(
            'label'   => __('Posts Highlight', 'justg'),
            'section' => 'section_homeberita',
            'title'   => __('Recent Posts', 'justg'),
        ),
        'posts_home_1'    => array(
            'label'   => __('Posts Home 1', 'justg'),
            'section' => 'section_homeberita',
            'title'   => __('Recent Posts', 'justg'),
        ),
        'posts_home_2'    => array(
            'label'   => __('Posts Home 2', 'justg'),
            'section' => 'section_homeberita',
            'title'   => __('Recent Posts', 'justg'),
        ),
        'posts_home_3'    => array(
            'label'   => __('Posts Home 3', 'justg'),
            'section' => 'section_homeberita',
            'title'   => __('Recent Posts', 'justg'),
        ),
        'posts_home_4'    => array(
            'label'   => __('Posts Home 4', 'justg'),
            'section' => 'section_homeberita',
            'title'   => __('Recent Posts', 'justg'),
        ),
        'posts_home_5'    => array(
            'label'   => __('Posts Home 5', 'justg'),
            'section' => 'section_homeberita',
            'title'   => __('Recent Posts', 'justg'),
        ),
    );

    $category_choices = velocitychild_get_category_choices();
    $select_choices   = array('' => __('Pilih kategori', 'justg')) + $category_choices;

    foreach ($posts_fields as $id => $config) {
        if (!empty($config['title'])) {
            $title_setting = 'title_' . $id;

            $wp_customize->add_setting(
                $title_setting,
                array(
                    'default'           => $config['title'],
                    'sanitize_callback' => 'sanitize_text_field',
                )
            );

            $wp_customize->add_control(
                $title_setting,
                array(
                    'label'   => sprintf(__('Judul %s', 'justg'), $config['label']),
                    'section' => $config['section'],
                    'type'    => 'text',
                )
            );
        }

        $category_setting = 'cat_' . $id;

        $wp_customize->add_setting(
            $category_setting,
            array(
                'default'           => '',
                'sanitize_callback' => 'velocitychild_sanitize_category_select',
            )
        );

        $wp_customize->add_control(
            $category_setting,
            array(
                'label'   => sprintf(__('Kategori %s', 'justg'), $config['label']),
                'section' => $config['section'],
                'type'    => 'select',
                'choices' => $select_choices,
            )
        );

        if (!empty($config['sortby'])) {
            $sort_setting = 'sortby_' . $id;

            $wp_customize->add_setting(
                $sort_setting,
                array(
                    'default'           => 'date',
                    'sanitize_callback' => 'velocitychild_sanitize_sort_option',
                )
            );

            $wp_customize->add_control(
                $sort_setting,
                array(
                    'label'   => sprintf(__('Urutkan %s berdasarkan', 'justg'), $config['label']),
                    'section' => $config['section'],
                    'type'    => 'select',
                    'choices' => array(
                        'date' => __('Tanggal', 'justg'),
                        'view' => __('Tayangan', 'justg'),
                    ),
                )
            );
        }
    }
}

function velocitychild_get_category_choices()
{
    $choices = array();

    $terms = get_terms(
        array(
            'taxonomy'   => 'category',
            'hide_empty' => false,
        )
    );

    if (!is_wp_error($terms)) {
        foreach ($terms as $term) {
            if ((int) $term->term_id === 1) {
                continue;
            }

            $choices[$term->term_id] = $term->name;
        }
    }

    $choices['disable'] = __('Nonaktifkan', 'justg');

    return $choices;
}

function velocitychild_sanitize_category_select($value)
{
    if (is_array($value)) {
        $value = reset($value);
    }

    if ('disable' === $value) {
        return 'disable';
    }

    $value = absint($value);

    return $value > 0 ? $value : '';
}

function velocitychild_sanitize_sort_option($value)
{
    $allowed = array('date', 'view');

    return in_array($value, $allowed, true) ? $value : 'date';
}

function velocitychild_sanitize_url($url)
{
    $url = trim($url);

    return $url ? esc_url_raw($url) : '';
}

add_filter('justg_theme_default_settings', 'velocitychild_override_default_settings', 20);
function velocitychild_override_default_settings($defaults)
{
    if (!isset($defaults['background_website_color']) || '#ffffff' === $defaults['background_website_color']) {
        $defaults['background_website_color'] = '#d6d6d6';
    }

    return $defaults;
}

function velocitychild_apply_customizer_styles()
{
    $color = velocitytheme_option('color_theme', '#740106');

    if (function_exists('velocitytheme_sanitize_color')) {
        $sanitized = velocitytheme_sanitize_color($color);
    } else {
        $sanitized = sanitize_hex_color($color);
    }

    if (!$sanitized) {
        $sanitized = '#740106';
    }

    $css = sprintf(':root{--color-theme:%1$s;}.border-color-theme{--bs-border-color:%1$s;}', $sanitized);

    wp_add_inline_style('custom-style', $css);
}
add_action('wp_enqueue_scripts', 'velocitychild_apply_customizer_styles', 20);

///add action builder part
add_action('justg_header', 'justg_header_berita');
function justg_header_berita()
{
    require_once(get_stylesheet_directory() . '/inc/part-header.php');
}
add_action('justg_do_footer', 'justg_footer_berita');
function justg_footer_berita()
{
    require_once(get_stylesheet_directory() . '/inc/part-footer.php');
}

function get_berita_iklan($idiklan = null)
{
    $iklan_content  = velocitytheme_option('image_' . $idiklan, '');
    echo '<div class="part_' . $idiklan . '">';
    if ($iklan_content) {
        $linkiklan = velocitytheme_option('link_' . $idiklan, '');
        echo '<div class="text-center">';
        echo $linkiklan ? '<a href="' . $linkiklan . '" target="_blank">' : '';
        echo '<img class="img-fluid" src="' . $iklan_content . '" loading="lazy">';
        echo $linkiklan ? '</a>' : '';
        echo '</div>';
    }
    echo '</div>';
}

function vdberita_limit_text($text, $limit)
{
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos   = array_keys($words);
        $text  = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}

// Fungsi left sidebar archive
function left_sidebar()
{
    if (is_active_sidebar('secondary-sidebar')) :
        echo '<div class="d-none d-md-block col-2 p-0">';
        echo '<div class="sticky-top">';
        dynamic_sidebar('secondary-sidebar');
        echo '</div>';
        echo '</div>';
    endif;
}

function justg_get_hit()
{
    echo get_post_meta(get_the_ID(), 'hit', true);
}
