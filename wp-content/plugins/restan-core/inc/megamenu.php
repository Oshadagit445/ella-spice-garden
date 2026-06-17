<?php

function restan_add_custom_menu_fields($item_id, $item, $depth, $args) {
    $selected_megamenu = get_post_meta($item_id, '_menu_item_restan_megamenu', true);
    $megamenu_posts = get_posts(array(
        'post_type' => 'restan_megamenu',
        'posts_per_page' => -1
    ));
    ?>
    <p class="description description-wide">
        <label for="edit-menu-item-restan-megamenu-<?php echo $item_id; ?>">
            <?php _e('Select Mega Menu', 'restan'); ?><br />
            <select id="edit-menu-item-restan-megamenu-<?php echo $item_id; ?>" class="widefat" name="menu-item-restan-megamenu[<?php echo $item_id; ?>]">
                <option value=""><?php _e('None', 'restan'); ?></option>
                <?php foreach ($megamenu_posts as $post) : ?>
                    <option value="<?php echo esc_attr($post->ID); ?>" <?php selected($selected_megamenu, $post->ID); ?>><?php echo esc_html($post->post_title); ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    </p>
    <?php
}
add_action('wp_nav_menu_item_custom_fields', 'restan_add_custom_menu_fields', 10, 4);


function restan_save_custom_menu_fields($menu_id, $menu_item_db_id, $args) {
    if (isset($_POST['menu-item-restan-megamenu'][$menu_item_db_id])) {
        update_post_meta($menu_item_db_id, '_menu_item_restan_megamenu', sanitize_text_field($_POST['menu-item-restan-megamenu'][$menu_item_db_id]));
    } else {
        delete_post_meta($menu_item_db_id, '_menu_item_restan_megamenu');
    }
}
add_action('wp_update_nav_menu_item', 'restan_save_custom_menu_fields', 10, 3);

function restan_add_megamenu_class($classes, $item, $args, $depth = 0) {
$megamenu_id = get_post_meta($item->ID, '_menu_item_restan_megamenu', true);
    if ($megamenu_id) {

    $classes[] = 'dropdown megamenu-fw';

    }

    return $classes;
}
add_filter('nav_menu_css_class', 'restan_add_megamenu_class', 10, 4);

function restan_display_mega_menu_elementor($item_output, $item, $depth, $args) {
    $megamenu_id = get_post_meta($item->ID, '_menu_item_restan_megamenu', true);

    if ($megamenu_id && \Elementor\Plugin::$instance) {
        $megamenu_content = \Elementor\Plugin::$instance->frontend->get_builder_content($megamenu_id);

        if ($megamenu_content) {
            $item_output .= '<ul class="dropdown-menu megamenu-content" role="menu"><li>' . $megamenu_content . '</li></ul>';
        }
    }
    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'restan_display_mega_menu_elementor', 10, 4);

