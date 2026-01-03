<?php

/**
 * Recommended way to include parent theme styles.
 * (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
 *
 */

add_action('wp_enqueue_scripts', 'astra_child_style');
function astra_child_style()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));

    // Enqueue Tailwind CSS

    $tailwind_path = get_stylesheet_directory() . '/src/output.css';

    wp_enqueue_style(
        'astra-child-tailwind',
        get_stylesheet_directory_uri() . '/src/output.css',
        [],
        file_exists($tailwind_path) ? filemtime($tailwind_path) : null
    );

    // jQuery (WP default)
    wp_enqueue_script('jquery');


    wp_enqueue_script(
        'dashboard-js',
        get_template_directory_uri() . '/assets/js/dashboard.js',
        [],
        null,
        true
    );

    wp_localize_script('dashboard-js', 'dashboardData', [
        'ajax_url' => admin_url('admin-ajax.php')
    ]);
}

/**
 * Your code goes below.
 */

// Add this at the end of your functions.php

// Include API endpoint



function load_dashboard()
{
    $page = sanitize_text_field($_GET['page']);
    $allowed = ['dashboard', 'analytics', 'messages', 'settings'];

    if (in_array($page, $allowed)) {
        get_template_part("template-parts/dashboard/$page");
    } else {
        echo '<h2>404</h2>';
    }

    wp_die();
}
