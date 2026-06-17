<?php

/**
 * @Packge     : restan
 * @Version    : 1.0
 * @Author     : restan
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 *
 */

// Block direct access
if (!defined('ABSPATH')) {
  exit();
}

/**
 * Admin Custom Login Logo
 */
function restan_custom_login_logo()
{
  $logo = !empty(restan_opt('restan_admin_login_logo', 'url')) ? restan_opt('restan_admin_login_logo', 'url') : '';
  if (isset($logo) && !empty($logo))
    echo '<style type="text/css">body.login div#login h1 a { background-image:url(' . esc_url($logo) . '); }</style>';
}
add_action('login_enqueue_scripts', 'restan_custom_login_logo');

/**
 * Admin Custom css
 */

add_action('admin_enqueue_scripts', 'restan_admin_styles');

function restan_admin_styles()
{
  // $restan_admin_custom_css = ! empty( restan_opt( 'restan_theme_admin_custom_css' ) ) ? restan_opt( 'restan_theme_admin_custom_css' ) : '';
  if (!empty($restan_admin_custom_css)) {
    $restan_admin_custom_css = str_replace(array("\r\n", "\r", "\n", "\t", '    '), '', $restan_admin_custom_css);
    echo '<style rel="stylesheet" id="restan-admin-custom-css" >';
    echo esc_html($restan_admin_custom_css);
    echo '</style>';
  }
}

// share button code
function restan_social_sharing_buttons()
{

  // Get page URL
  $URL = get_permalink();
  $Sitetitle = get_bloginfo('name');

  // Get page title
  $Title = str_replace(' ', '%20', get_the_title());


  // Construct sharing URL without using any script

  $twitterURL = 'https://twitter.com/share?text=' . esc_html($Title) . '&url=' . esc_url($URL);
  $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' . esc_url($URL);
  $pinteresturl = 'http://pinterest.com/pin/create/link/?url=' . esc_url($URL) . '&media=' . esc_url(get_the_post_thumbnail_url()) . '&description=' . wp_kses_post(get_the_title());
  $linkedin = 'https://www.linkedin.com/shareArticle?mini=true&url=' . esc_url($URL) . '&title=' . esc_html($Title);


  // Add sharing button at the end of page/page content
  $content = '';

  $content .= '<li><a class="facebook" href="' . esc_url($facebookURL) . '" target="_blank"><i class="fab fa-facebook-f"></i></a></li>';
  $content .= '<li><a class="twitter" href="' . esc_url($twitterURL) . '" target="_blank"><i class="fab fa-twitter"></i></a></li>';
  $content .= '<li><a class="pinterest" href="' . esc_url($pinteresturl) . '" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>';
  $content .= '<li><a class="linkedin" href="' . esc_url($linkedin) . '" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>';
  return $content;
};

//add SVG to allowed file uploads
function restan_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  $mimes['svgz'] = 'image/svgz+xml';
  $mimes['exe'] = 'program/exe';
  $mimes['dwg'] = 'image/vnd.dwg';
  return $mimes;
}
add_filter('upload_mimes', 'restan_mime_types');

function restan_wp_check_filetype_and_ext($data, $file, $filename, $mimes)
{
  $wp_filetype = wp_check_filetype($filename, $mimes);
  $ext         = $wp_filetype['ext'];
  $type        = $wp_filetype['type'];
  $proper_filename = $data['proper_filename'];

  return compact('ext', 'type', 'proper_filename');
}
add_filter('wp_check_filetype_and_ext', 'restan_wp_check_filetype_and_ext', 10, 4);

if (!function_exists('restan_get_user_role_name')) {
  function restan_get_user_role_name($user_ID)
  {
    global $wp_roles;

    $user_data      = get_userdata($user_ID);
    $user_role_slug = $user_data->roles[0];
    return translate_user_role($wp_roles->roles[$user_role_slug]['name']);
  }
}
//******--- Remove Font Awesome ---*****
//===============================
add_action('elementor/frontend/after_register_styles', function () {
  foreach (['solid', 'regular', 'brands'] as $style) {
    wp_deregister_style('elementor-icons-fa-' . $style);
  }
}, 20);

add_image_size('restan_80X80', 80, 80, true);
add_image_size('restan_372X279', 372, 279, true);
add_image_size('restan_598X355', 598, 355, true);
add_image_size('restan_284X355', 355, 284, true);


remove_filter('render_block', 'wp_render_layout_support_flag', 10, 2);
remove_filter('render_block', 'gutenberg_render_layout_support_flag', 10, 2);
// Remove <p> and <br/> from Contact Form 7
add_filter('wpcf7_autop_or_not', '__return_false');

add_action('init', 'restan_tab', 0);

function restan_tab()
{

  $labels = array(

    'name'               => esc_html__('Tabs', 'post Category general name', 'restan'),
    'singular_name'      => esc_html__('Tab', 'post Category singular name', 'restan'),
    'menu_name'          => esc_html__('Tabs', 'admin menu', 'restan'),
    'name_admin_bar'     => esc_html__('Tab', 'add new on admin bar', 'restan'),
    'add_new'            => esc_html__('Add New', 'Tab', 'restan'),
    'add_new_item'       => esc_html__('Add New Tab', 'restan'),
    'new_item'           => esc_html__('New Tab', 'restan'),
    'edit_item'          => esc_html__('Edit Tab', 'restan'),
    'view_item'          => esc_html__('View Tab', 'restan'),
    'all_items'          => esc_html__('All Tabs', 'restan'),
    'search_items'       => esc_html__('Search Tabs', 'restan'),
    'parent_item_colon'  => esc_html__('Parent Tabs:', 'restan'),
    'not_found'          => esc_html__('No Tabs found.', 'restan'),
    'not_found_in_trash' => esc_html__('No Tabs found in Trash.', 'restan'),
  );



  $args = array(

    'labels'             => $labels,
    'description'        => esc_html__('Description.', 'restan'),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'show_in_rest'       => true,
    'menu_icon'          => 'dashicons-index-card',
    'supports'           => array('title', 'thumbnail', 'editor', 'excerpt', 'elementor'),
    'rewrite'            => array('slug' => 'all-tabs'),
  );

  register_post_type('restan_tab', $args);
}


if (!function_exists('restan_page_header_extra_class_callback')) :
    function restan_page_header_extra_class_callback($class)
    {
        return '';
    }
endif;
add_filter('restan_page_header_extra_class', 'restan_page_header_extra_class_callback', 10, 1);