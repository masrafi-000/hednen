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




// functions.php ফাইলে এই অংশটুকু দিন

/**
 * 1. Register Custom Post Type
 */
function usa_property_post_type() {
    register_post_type('property',
        array(
            'labels'      => array(
                'name'          => __('Properties', 'textdomain'),
                'singular_name' => __('Property', 'textdomain'),
            ),
            'public'      => true,
            'has_archive' => true,
            'supports'    => array('title', 'editor', 'thumbnail', 'custom-fields'),
            'menu_icon'   => 'dashicons-building',
        )
    );
}
add_action('init', 'usa_property_post_type');

/**
 * 2. Handle AJAX Submission
 */
function usa_handle_property_submission() {
    // Security Check
    if (!isset($_POST['property_nonce']) || !wp_verify_nonce($_POST['property_nonce'], 'submit_property_action')) {
        wp_send_json_error(array('message' => 'Security check failed.'));
    }

    $title = sanitize_text_field($_POST['property_title']);
    $desc  = sanitize_textarea_field($_POST['property_description']);
    
    // Create Post
    $post_data = array(
        'post_title'   => $title,
        'post_content' => $desc,
        'post_status'  => 'pending', 
        'post_type'    => 'property',
        'meta_input'   => array(
            'property_price'  => sanitize_text_field($_POST['property_price']),
            'property_type'   => sanitize_text_field($_POST['property_type']),
            'property_beds'   => intval($_POST['property_beds']),
            'property_baths'  => floatval($_POST['property_baths']),
            'property_area'   => intval($_POST['property_area']),
            'property_address'=> array(
                'street' => sanitize_text_field($_POST['address_street']),
                'city'   => sanitize_text_field($_POST['address_city']),
                'state'  => sanitize_text_field($_POST['address_state']),
                'zip'    => sanitize_text_field($_POST['address_zip']),
            ),
            'agent_name'      => sanitize_text_field($_POST['agent_name']),
            'agent_email'     => sanitize_email($_POST['agent_email']),
            'amenities'       => isset($_POST['amenities']) ? array_map('sanitize_text_field', $_POST['amenities']) : [],
        ),
    );

    $post_id = wp_insert_post($post_data);

    if (is_wp_error($post_id)) {
        wp_send_json_error(array('message' => 'Error creating post.'));
    }

    // Image Upload Handling
    if (!empty($_FILES['property_images'])) {
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/media.php');

        $files = $_FILES['property_images'];
        $gallery_ids = array();

        foreach ($files['name'] as $key => $value) {
            if ($files['name'][$key]) {
                $file = array(
                    'name'     => $files['name'][$key],
                    'type'     => $files['type'][$key],
                    'tmp_name' => $files['tmp_name'][$key],
                    'error'    => $files['error'][$key],
                    'size'     => $files['size'][$key]
                );
                $_FILES = array('upload_file' => $file);
                $attachment_id = media_handle_upload('upload_file', $post_id);
                if (!is_wp_error($attachment_id)) {
                    $gallery_ids[] = $attachment_id;
                    if ($key === 0) set_post_thumbnail($post_id, $attachment_id);
                }
            }
        }
        update_post_meta($post_id, 'property_gallery_ids', $gallery_ids);
    }

    wp_send_json_success(array('message' => 'Property submitted successfully!'));
}
add_action('wp_ajax_submit_property_listing', 'usa_handle_property_submission');
add_action('wp_ajax_nopriv_submit_property_listing', 'usa_handle_property_submission');
?>