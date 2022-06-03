<?php

class MetaBoxes
{

    public static function register_product_price_meta_box()
    {
        add_meta_box('product_price_meta_box',
            'قیمت محصول',
            'MetaBoxes::product_price_content_handler',
            'product');
    }

    public static function product_price_content_handler($product)
    {
        $product_price = (int)get_post_meta($product->ID, 'product_price', true);
        $product_sale_price = (int)get_post_meta($product->ID, 'product_sale_price', true);
        View::renderFile('admin/metabox/product/product_price', array(
            'product_price' => $product_price,
            'product_sale_price' => $product_sale_price
        ));
    }

    public static function save_product_price($product_id)
    {
        // check user and so on
        if (isset($_POST['product_price']) && intval($_POST['product_price']) > 0) {
            update_post_meta($product_id, 'product_price', intval($_POST['product_price']));
        }
        if (isset($_POST['product_sale_price']) && intval($_POST['product_sale_price']) > 0) {
            update_post_meta($product_id, 'product_sale_price', intval($_POST['product_sale_price']));
        }
    }

}