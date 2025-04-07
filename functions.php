<?php

require_once get_template_directory() . '/util/func.php';

function enqueue_styles()
{
    wp_enqueue_style('dm-mono', 'https://fonts.googleapis.com/css2?family=DM+Mono:wght@300;400;500&display=swap');
    wp_enqueue_style('dm-sans', 'https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&display=swap');
    wp_enqueue_style('main-css', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_style('single-css', get_template_directory_uri() . '/css/single.css');
    wp_enqueue_style('post-list-css', get_template_directory_uri() . '/css/post-list.css');
    wp_enqueue_style('header-css', get_template_directory_uri() . '/css/header.css');
    wp_enqueue_style('footer-css', get_template_directory_uri() . '/css/footer.css');


    wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
    wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), null, true);

}

add_action('wp_enqueue_scripts', 'enqueue_styles');

function mytheme_add_specific_pages_to_menu()
{
    $menu_name = 'Primary Menu';
    $menu = wp_get_nav_menu_object($menu_name);

    if (!$menu) {
        $menu_id = wp_create_nav_menu($menu_name);
    } else {
        $menu_id = $menu->term_id;
    }

    $desired_pages = ['projects', 'interviews', 'about', 'contact'];

    foreach ($desired_pages as $slug) {
        $page = get_page_by_path($slug);
        if ($page) {
            $already_in_menu = false;
            $menu_items = wp_get_nav_menu_items($menu_id);

            if ($menu_items) {
                foreach ($menu_items as $item) {
                    if ((int) $item->object_id === (int) $page->ID) {
                        $already_in_menu = true;
                        break;
                    }
                }
            }

            if (!$already_in_menu) {
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => $page->post_title,
                    'menu-item-object' => 'page',
                    'menu-item-object-id' => $page->ID,
                    'menu-item-type' => 'post_type',
                    'menu-item-status' => 'publish'
                ));
            }
        }
    }


    $locations = get_theme_mod('nav_menu_locations');
    $locations['primary'] = $menu_id;
    set_theme_mod('nav_menu_locations', $locations);
}
add_action('after_setup_theme', 'mytheme_add_specific_pages_to_menu');

function mytheme_setup()
{
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'mytheme_setup');



?>