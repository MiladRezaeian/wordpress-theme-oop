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

    public static function product_price_content_handler($post)
    {
        $post_price = (int)get_post_meta($post->ID,'product_price',true);
        View::renderFile('admin/metabox/product/product_price', array('post_price' => $post_price));
    }

    public static function save_product_price( $post_id )
    {
        // check user and so on
        if(isset($_POST['product_price']) && intval($_POST['product_price']) > 0 ){
            update_post_meta($post_id,'product_price',intval($_POST['product_price']));
        }
    }

}