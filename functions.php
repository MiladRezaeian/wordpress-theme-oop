<?php
include 'constants.php';
include 'app/autoloader.php';


add_action( 'after_setup_theme', 'Initializer::setup' );

add_action( 'init', 'PostTypes::make_product_post_type' );
add_action( 'init', 'Initializer::start_session' );
add_action( 'init', function () {
	if ( isset( $_GET['remove_cart_item'] ) && intval( $_GET['remove_cart_item'] ) > 0 ) {
		Basket::remove( intval( $_GET['remove_cart_item'] ) );
	}
} );

add_action( 'add_to_cart', 'Basket::add' );

add_action( 'add_meta_boxes', 'MetaBoxes::register_product_price_meta_box' );
add_action( 'save_post', 'MetaBoxes::save_product_price' );
add_action( 'add_meta_boxes', 'SliderMetaBox::register_product_slider_meta_box' );
add_action( 'save_post', 'SliderMetaBox::save_product_slider' );

add_filter( 'manage_product_posts_columns', 'PostTypes::add_regular_price_column' );
add_action( 'manage_product_posts_custom_column', 'PostTypes::show_regular_price_value_column', 10, 2 );

add_shortcode( 'member_content', 'ShortCodes::member_content_handler' );

add_action( 'widgets_init', 'SideBars::register_main_sidebar' );
add_action( 'widgets_init', function () {
	register_widget( 'Widget_Form' );
} );