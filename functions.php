<?php
include 'constants.php';
include 'app/autoloader.php';


add_action('after_setup_theme', 'Initializer::setup');
add_action('init', 'PostTypes::make_product_post_type');

add_action('add_meta_boxes','MetaBoxes::register_product_price_meta_box');

add_action('save_post','MetaBoxes::save_product_price');