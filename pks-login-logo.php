<?php

/**
 * Plugin Name: PKS Login Logo
 * Description: Custom plugin to modify WP login URL.
 * Version:     1.0.0
 * Author:     Palash Kumer
 * Author URI:  
 * Text Domain: pks-login-logo
 */

// Define absolute path for security.
if (!defined('ABSPATH')) {
    exit; // Prevent direct access.
}


/**
 * Enqueue Scripts and Styles
 *
 * @return void
 */
function pks_login_logo_admin_enqueue_styles()
{
    wp_enqueue_media();

    wp_enqueue_style('pks_login_logo_styles', plugins_url('assets/css/admin-style.css', __FILE__));

    wp_enqueue_script('pks_login_logo_scripts', plugins_url('assets/script/admin-script.js', __FILE__), array('jquery'), null, true);

    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css');

    // Enqueue jQuery
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js', array(), null, true);

    // Enqueue Bootstrap JavaScript
    wp_enqueue_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js', array('jquery'), null, true);
}

add_action('admin_enqueue_scripts', 'pks_login_logo_admin_enqueue_styles');

add_action('admin_menu', 'pks_login_logo_menu_page');

/**
 * Add menu page to the admin menu.
 */
function pks_login_logo_menu_page()
{
    add_menu_page(
        'PKS Login logo',
        'PKS Login logo',
        'manage_options',
        'pks-hide-login',
        'pks_hide_login_settings',
        '',
        5
    );
}

function pks_hide_login_settings()
{
    include plugin_dir_path(__FILE__) . 'templates/settings-form.php';
}
