<?php

/**
 * @Packge     : restan
 * @Version    : 1.0
 * @Author     : restan
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 *
 */


// Blocking direct access
if (!defined('ABSPATH')) {
    exit;
}

function restan_core_essential_scripts()
{
    wp_enqueue_script('restan-ajax', RESTAN_PLUGDIRURI . 'assets/js/restan.ajax.js', array('jquery'), '1.0', true);
    wp_localize_script(
        'restan-ajax',
        'restanajax',
        array(
            'action_url' => admin_url('admin-ajax.php'),
            'nonce'         => wp_create_nonce('restan-nonce'),
        )
    );
}

add_action('wp_enqueue_scripts', 'restan_core_essential_scripts');


// restan Section subscribe ajax callback function
add_action('wp_ajax_restan_subscribe_ajax', 'restan_subscribe_ajax');
add_action('wp_ajax_nopriv_restan_subscribe_ajax', 'restan_subscribe_ajax');

function restan_subscribe_ajax()
{
    $apiKey = restan_opt('restan_subscribe_apikey');
    $listid = restan_opt('restan_subscribe_listid');
    if (!wp_verify_nonce($_POST['security'], 'restan-nonce')) {
        echo '<div class="alert alert-danger mt-2" role="alert">' . esc_html__('You are not allowed.', 'restan') . '</div>';
    } else {
        if (!empty($apiKey) && !empty($listid)) {
            $MailChimp = new DrewM\MailChimp\MailChimp($apiKey);

            $result = $MailChimp->post("lists/{$listid}/members", [
                'email_address'    => esc_attr($_POST['sectsubscribe_email']),
                'status'           => 'subscribed',
            ]);
            if ($MailChimp->success()) {
                if ($result['status'] == 'subscribed') {
                    echo '<div class="alert alert-success mt-2" role="alert">' . esc_html__('Thank you, you have been added to our mailing list.', 'restan') . '</div>';
                }
            } elseif ($result['status'] == '400') {
                echo '<div class="alert alert-danger mt-2" role="alert">' . esc_html__('This Email address is already exists.', 'restan') . '</div>';
            } else {
                echo '<div class="alert alert-danger mt-2" role="alert">' . esc_html__('Sorry something went wrong.', 'restan') . '</div>';
            }
        } else {
            echo '<div class="alert alert-danger mt-2" role="alert">' . esc_html__('Apikey Or Listid Missing.', 'restan') . '</div>';
        }
    }

    wp_die();
}
