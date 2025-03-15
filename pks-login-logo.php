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

/**
 * Display settings page content.
 */
function pks_hide_login_settings()
{
    // ======================Login Logo=================
    $pks_logo_submitted_url = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pks_login_logo'])) {
        $pks_logo_submitted_url = sanitize_text_field($_POST['pks_login_logo']);
        update_option('pks_login_logo_url', $pks_logo_submitted_url);
    }

    if (isset($_POST['logo_width'])) {
        $width = absint($_POST['logo_width']);
        update_option('login_logo_width', $width);
    }

    if (isset($_POST['logo_height'])) {
        $height = absint($_POST['logo_height']);
        update_option('login_logo_height', $height);
    }

    if (isset($_POST['enable_logo'])) {
        update_option('enable_login_logo', 'yes');
    } else {
        update_option('enable_login_logo', 'no');
    }
    $pks_logo_current_url = get_option('pks_login_logo_url');

    // =============================Login page Styling=============================
    $pks_bg_img_submitted_url = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pks_login_page_bg_img'])) {
        $pks_bg_img_submitted_url = sanitize_text_field($_POST['pks_login_page_bg_img']);
        update_option('pks_login_page_bg_img', $pks_bg_img_submitted_url);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pks_login_page_bg_color'])) {
        $pks_login_page_bg_color = sanitize_hex_color($_POST['pks_login_page_bg_color']);
        update_option('pks_login_page_bg_color', $pks_login_page_bg_color);
    }
    $pks_bg_img_current_url = get_option('pks_login_page_bg_img');

    // -------------------Login form -------
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pks_login_form_position'])) {
        $pks_login_form_position = sanitize_text_field($_POST['pks_login_form_position']);
        update_option('pks_login_form_position', $pks_login_form_position);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pks_login_form_width'])) {
        $pks_login_form_width = sanitize_text_field($_POST['pks_login_form_width']);
        update_option('pks_login_form_width', $pks_login_form_width);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pks_login_form_label_size'])) {
        $pks_login_form_label_size = sanitize_text_field($_POST['pks_login_form_label_size']);
        update_option('pks_login_form_label_size', $pks_login_form_label_size);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pks_login_form_border_radius'])) {
        $pks_login_form_border_radius = sanitize_text_field($_POST['pks_login_form_border_radius']);
        update_option('pks_login_form_border_radius', $pks_login_form_border_radius);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pks_login_input_field_border_radius'])) {
        $pks_login_input_field_border_radius = sanitize_text_field($_POST['pks_login_input_field_border_radius']);
        update_option('pks_login_input_field_border_radius', $pks_login_input_field_border_radius);
    }
    // --------------------color-----------
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pks_login_form_color'])) {
        $pks_login_form_color = sanitize_hex_color($_POST['pks_login_form_color']);
        update_option('pks_login_form_color', $pks_login_form_color);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pks_login_form_border_color'])) {
        $pks_login_form_border_color = sanitize_hex_color($_POST['pks_login_form_border_color']);
        update_option('pks_login_form_border_color', $pks_login_form_border_color);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pks_login_label_color'])) {
        $pks_login_label_color = sanitize_hex_color($_POST['pks_login_label_color']);
        update_option('pks_login_label_color', $pks_login_label_color);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pks_login_input_field_color'])) {
        $pks_login_input_field_color = sanitize_hex_color($_POST['pks_login_input_field_color']);
        update_option('pks_login_input_field_color', $pks_login_input_field_color);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pks_login_input_field_border_color'])) {
        $pks_login_input_field_border_color = sanitize_hex_color($_POST['pks_login_input_field_border_color']);
        update_option('pks_login_input_field_border_color', $pks_login_input_field_border_color);
    }
    // -----login button-------
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pks_login_btn_color'])) {
        $pks_login_btn_color = sanitize_hex_color($_POST['pks_login_btn_color']);
        update_option('pks_login_btn_color', $pks_login_btn_color);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pks_login_btn_hover_color'])) {
        $pks_login_btn_hover_color = sanitize_hex_color($_POST['pks_login_btn_hover_color']);
        update_option('pks_login_btn_hover_color', $pks_login_btn_hover_color);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pks_login_btn_text_color'])) {
        $pks_login_btn_text_color = sanitize_hex_color($_POST['pks_login_btn_text_color']);
        update_option('pks_login_btn_text_color', $pks_login_btn_text_color);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pks_login_btn_border_color'])) {
        $pks_login_btn_border_color = sanitize_hex_color($_POST['pks_login_btn_border_color']);
        update_option('pks_login_btn_border_color', $pks_login_btn_border_color);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pks_nav_links_color'])) {
        $pks_nav_links_color = sanitize_hex_color($_POST['pks_nav_links_color']);
        update_option('pks_nav_links_color', $pks_nav_links_color);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pks_nav_links_hover_color'])) {
        $pks_nav_links_hover_color = sanitize_hex_color($_POST['pks_nav_links_hover_color']);
        update_option('pks_nav_links_hover_color', $pks_nav_links_hover_color);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pks_login_btn_border_radius'])) {
        $pks_login_btn_border_radius = sanitize_text_field($_POST['pks_login_btn_border_radius']);
        update_option('pks_login_btn_border_radius', $pks_login_btn_border_radius);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pks_login_btn_width'])) {
        $pks_login_btn_width = sanitize_text_field($_POST['pks_login_btn_width']);
        update_option('pks_login_btn_width', $pks_login_btn_width);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pks_nav_links_size'])) {
        $pks_nav_links_size = sanitize_text_field($_POST['pks_nav_links_size']);
        update_option('pks_nav_links_size', $pks_nav_links_size);
    }
    // ============================login limits========================
    if (isset($_POST['login_limits_submit'])) {

        $login_attempts = sanitize_text_field($_POST['login_attempts']);
        $delay_duration = sanitize_text_field($_POST['delay_duration']);

        $enable_login_limits = isset($_POST['enable_login_limits']) ? 'yes' : 'no';

        // Validate that delay_duration is a positive number
        $delay_duration = max(0, intval($delay_duration));

        update_option('login_limits_attempts', $login_attempts);
        update_option('login_limits_delay_duration', $delay_duration);
        update_option('login_limits_remaining_attempts', $login_attempts);

        update_option('enable_login_limits', $enable_login_limits);

        echo '<div id = "success-message"class="updated"><p>Settings saved</p></div>';
?>
        <script>
            jQuery(document).ready(function($) {
                setTimeout(function() {
                    $("#success-message").fadeOut("slow");
                }, 500);
            });
        </script>
    <?php
    }

    $login_attempts      = get_option('login_limits_attempts', 10);
    $delay_duration      = get_option('login_limits_delay_duration', 5);
    $enable_login_limits = get_option('enable_login_limits', 'no');

    // Display settings form.
    include plugin_dir_path(__FILE__) . 'templates/settings-form.php';
}


/**
 * Save login logo URL on form submission.
 */
function save_pks_login_logo_url()
{
    if (isset($_POST['pks_login_logo'])) {
        update_option('pks_login_logo_url', sanitize_text_field($_POST['pks_login_logo']));
    }
}

add_action('admin_init', 'save_pks_login_logo_url');



/**
 * Add custom login logo styles.
 */
function pks_login_logo()
{
    // ============Logo=====================
    $enable_logo        = get_option('enable_login_logo', 'no');
    $pks_login_logo_url = get_option('pks_login_logo_url');
    $logo_width         = get_option('login_logo_width');
    $logo_height        = get_option('login_logo_height');
    // ===============Logo Ends==============

    if ($enable_logo === 'yes' && $pks_login_logo_url) {
    ?>
        <style type="text/css">
            body.login div#login h1 a {
                background-image: url('<?php echo esc_url($pks_login_logo_url); ?>');
                background-size: <?php echo esc_attr($logo_width); ?>px <?php echo esc_attr($logo_height); ?>px;
            }
        </style>
    <?php
    }
}

add_action('login_enqueue_scripts', 'pks_login_logo');



// =================Login Page Stylling==Login Form Position===========
add_action('login_head', 'pks_login_page_styles');

function pks_login_page_styles()
{

    $pks_login_page_bg_color             = get_option('pks_login_page_bg_color', '#ffffff');
    $pks_bg_img_current_url              = get_option('pks_login_page_bg_img');
    $pks_login_form_position             = get_option('pks_login_form_position', 'center');
    $pks_login_form_width                = get_option('pks_login_form_width', 320);
    $pks_login_form_label_size           = get_option('pks_login_form_label_size', 16);
    $pks_login_form_border_radius        = get_option('pks_login_form_border_radius', 5);
    $pks_login_input_field_border_radius = get_option('pks_login_input_field_border_radius', 5);
    $pks_login_form_color                = get_option('pks_login_form_color', '#ffffff');

    $pks_login_form_border_color        = get_option('pks_login_form_border_color', '#212121');
    $pks_login_label_color              = get_option('pks_login_label_color', '#212121');
    $pks_login_input_field_color        = get_option('pks_login_input_field_color', '#ffffff');
    $pks_login_input_field_border_color = get_option('pks_login_input_field_border_color', '#212121');
    $pks_login_btn_color                = get_option('pks_login_btn_color', '#2271b1');
    $pks_login_btn_hover_color          = get_option('pks_login_btn_hover_color', '#2271b1');
    $pks_login_btn_text_color           = get_option('pks_login_btn_text_color', '#ffffff');
    $pks_login_btn_border_color         = get_option('pks_login_btn_border_color', '#212121');
    $pks_nav_links_color                = get_option('pks_nav_links_color', '#212121');
    $pks_nav_links_hover_color          = get_option('pks_nav_links_hover_color', '#025ae8');
    $pks_login_btn_border_radius        = get_option('pks_login_btn_border_radius', 5);
    $pks_login_btn_width                = get_option('pks_login_btn_width', 65);
    $pks_nav_links_size                 = get_option('pks_nav_links_size', 12);

    // Add custom CSS styles based on the login form position
    ?>
    <style>
        /* Adjust the position of the login form */
        body.login {
            background-color: <?php echo $pks_login_page_bg_color; ?> !important;
            <?php if ($pks_bg_img_current_url) : ?>background-image: url('<?php echo esc_url($pks_bg_img_current_url); ?>');
            background-position: center top !important;
            background-repeat: no-repeat !important;
            display: block;
            background-attachment: fixed !important;
            background-size: 100% 100% !important;
            <?php endif; ?>
        }

        #login {
            width: <?php echo $pks_login_form_width; ?>px;
            position: absolute;
            top: 50%;
            <?php if ($pks_login_form_position === 'center') : ?>position: relative;

            <?php elseif ($pks_login_form_position === 'top-left') : ?>left: 1%;
            top: 30%;
            <?php elseif ($pks_login_form_position === 'top-right') : ?>top: 30%;
            right: 1%;
            <?php elseif ($pks_login_form_position === 'bottom-left') : ?>bottom: 0;
            left: 1%;
            <?php elseif ($pks_login_form_position === 'bottom-right') : ?>bottom: 0;
            right: 1%;
            <?php endif; ?>transform: translateY(-50%);
        }

        .login label {
            font-size: <?php echo $pks_login_form_label_size; ?>px;
            ;
            color: <?php echo $pks_login_label_color; ?> !important;
        }

        .login form {
            border-radius: <?php echo $pks_login_form_border_radius; ?>px;
            border-color: <?php echo $pks_login_form_border_color; ?> !important;
            background-color: <?php echo $pks_login_form_color; ?> !important;
        }

        .login form .input {
            background-color: <?php echo $pks_login_input_field_color; ?> !important;
            border-color: <?php echo $pks_login_input_field_border_color; ?> !important;
            border-radius: <?php echo $pks_login_input_field_border_radius; ?>px;
        }

        .login .button-primary {
            background-color: <?php echo $pks_login_btn_color; ?> !important;
            color: <?php echo $pks_login_btn_text_color; ?> !important;
            border-color: <?php echo $pks_login_btn_border_color; ?> !important;
            border-radius: <?php echo $pks_login_btn_border_radius; ?>px;
            width: <?php echo $pks_login_btn_width; ?>px;
        }

        .login .button-primary:hover {
            background-color: <?php echo $pks_login_btn_hover_color; ?> !important;

        }

        .login #nav a,
        .login#backtoblog a {
            color: <?php echo $pks_nav_links_color; ?> !important;
        }

        .login #nav a:hover,
        .login #backtoblog a:hover {
            color: <?php echo $pks_nav_links_hover_color; ?> !important;
        }

        .login #nav,
        .login #backtoblog {
            font-size: <?php echo $pks_nav_links_size; ?>px;
            ;
        }
    </style>
<?php
}


function pks_login_logo_url()
{
    return home_url();
}
add_filter('login_headerurl', 'pks_login_logo_url');

function pks_login_logo_url_title()
{
    return 'Pks';
}
add_filter('login_headertext', 'pks_login_logo_url_title');


// =========================login Limits Starts=============================

// Display remaining attempts message on login form
add_action('login_form', 'pks_login_limits_message');

function pks_login_limits_message()
{
    $enable_login_limits = get_option('enable_login_limits', 'no');

    if ($enable_login_limits === 'yes') {
        $login_attempts     = get_option('login_limits_attempts', 5);
        $remaining_attempts = get_option('login_limits_remaining_attempts', $login_attempts);

        if ($remaining_attempts > 0) {
            echo '<p class="message">You have ' . $remaining_attempts . ' attempts remaining.</p>';
        } else {
            $delay_duration = get_option('login_limits_delay_duration', 5);
            echo '<p id="countdown-message" class="message">Login attempts exceeded. Please try again after <span id="countdown">' . $delay_duration . '</span> minutes.</p>';
            echo '<script>
                var countdown = ' . $delay_duration * 60 . '; // Convert minutes to seconds
                var countdownElement = document.getElementById("countdown");

                function updateCountdown() {
                    if (countdown > 0) {
                        countdown--;
                        var minutes = Math.floor(countdown / 60);
                        var seconds = countdown % 60;
                        countdownElement.textContent = minutes + "m " + seconds + "s";
                        setTimeout(updateCountdown, 1000);
                    } else {
                        document.getElementById("countdown-message").innerHTML = "You can now attempt to login.";
                    }
                }

                updateCountdown();
              </script>';
        }
    }
}

// Limit login attempts
add_filter('authenticate', 'pks_login_limits_attempt', 30, 3);

function pks_login_limits_attempt($user, $username, $password)
{

    $enable_login_limits = get_option('enable_login_limits', 'no');

    if ($enable_login_limits === 'no') {
        return $user;
    }

    $login_attempts     = get_option('login_limits_attempts', 10);
    $remaining_attempts = get_option('login_limits_remaining_attempts', $login_attempts);

    if ($remaining_attempts <= 0) {
        $delay_duration          = get_option('login_limits_delay_duration', 5);
        $current_time            = time();
        $last_login_attempt_time = get_option('login_limits_last_login_attempt_time', 0);

        // Check if the delay time has passed since the last login attempt
        if ($current_time - $last_login_attempt_time >= $delay_duration * MINUTE_IN_SECONDS) {
            update_option('login_limits_remaining_attempts', $login_attempts);
            return $user; // Allow login attempt after delay time
        } else {
            // User still within delay time, do not allow login attempt
            return null;
        }
    }

    --$remaining_attempts;
    update_option('login_limits_remaining_attempts', $remaining_attempts);

    update_option('login_limits_last_login_attempt_time', time());

    return $user;
}

// Reset remaining attempts on successful login
add_action('wp_login', 'pks_login_limits_reset_attempts', 10, 2);

function pks_login_limits_reset_attempts($user_login, $user)
{
    $login_attempts = get_option('login_limits_attempts', 10);
    update_option('login_limits_remaining_attempts', $login_attempts);
}

// ========================End Of Login Limit==================


// =====================================Google Recaptcha==============================
function pks_login_recaptcha_script()
{
    wp_register_script('recaptcha_login', 'https://www.google.com/recaptcha/api.js', array(), null, true);
    wp_enqueue_script('recaptcha_login');
}
add_action('login_enqueue_scripts', 'pks_login_recaptcha_script');
// Save the reCAPTCHA keys when the form is submitted
function pks_save_recaptcha_keys()
{
    if (isset($_POST['pks_captcha_submit'])) {
        if (isset($_POST['pks_site_key']) && isset($_POST['pks_secret_key'])) {
            update_option('pks_site_key', sanitize_text_field($_POST['pks_site_key']));
            update_option('pks_secret_key', sanitize_text_field($_POST['pks_secret_key']));
        }
    }
}
add_action('admin_init', 'pks_save_recaptcha_keys');

// Display reCAPTCHA on login page
function pks_display_login_captcha()
{
    $site_key = get_option('pks_site_key');
    if ($site_key) {
        echo '<div style="margin-bottom: 10px; transform: scale(.94); transform-origin: 0 0" class="g-recaptcha" data-theme="dark" data-sitekey="' . esc_attr($site_key) . '"></div>';
        wp_nonce_field('pks_login_captcha_nonce', 'pks_login_captcha_nonce');
    }
}
add_action('login_form', 'pks_display_login_captcha');

// Verify reCAPTCHA on login

function pks_verify_login_captcha($user, $password)
{
    if (isset($_POST['g-recaptcha-response']) && isset($_POST['pks_login_captcha_nonce']) && check_admin_referer('pks_login_captcha_nonce', 'pks_login_captcha_nonce')) {
        $recaptcha_secret   = get_option('pks_secret_key');
        $recaptcha_response = isset($_POST['g-recaptcha-response']) ? sanitize_text_field(wp_unslash($_POST['g-recaptcha-response'])) : '';

        if (empty($recaptcha_secret)) {
            return new WP_Error('captcha_invalid', __('reCAPTCHA secret key is not configured.'));
        }

        if (empty($recaptcha_response)) {
            return new WP_Error('captcha_invalid', __('Please complete the reCAPTCHA.'));
        }

        $response = wp_safe_remote_get('https://www.google.com/recaptcha/api/siteverify?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);

        if (is_wp_error($response)) {
            return new WP_Error('captcha_invalid', __('Error while verifying reCAPTCHA.'));
        }

        $response_data = json_decode(wp_remote_retrieve_body($response), true);

        if (isset($response_data['success']) && $response_data['success']) {
            return $user;
        } else {
            return new WP_Error('captcha_invalid', __('reCAPTCHA verification failed. You might be a bot.'));
        }
    } else {
        return new WP_Error('captcha_invalid', __('Please complete the reCAPTCHA.'));
    }
}
add_filter('authenticate', 'pks_verify_login_captcha', 40, 2);
