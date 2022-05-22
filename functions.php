<?php
include 'constants.php';
include 'app/autoloader.php';


add_action('after_setup_theme', 'Initializer::setup');
add_action('init', 'PostTypes::make_product_post_type');

add_action('add_meta_boxes','MetaBoxes::register_product_price_meta_box');
add_action('save_post','MetaBoxes::save_product_price');

add_filter('manage_product_posts_columns', 'PostTypes::add_price_column');
add_action('manage_product_posts_custom_column', 'PostTypes::show_price_value_column',10,2);
