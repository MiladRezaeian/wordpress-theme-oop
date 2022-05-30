<?php

class Product
{
    const PRICE_META_KEY = 'product_price';

    public static function price($product_id)
    {
        if (!$product_id) {
            return 0;
        }
        $price = get_post_meta($product_id, self::PRICE_META_KEY, true);
        if (intval($price) > 0) {
            return Utility::persian_numbers(number_format(apply_filters('product_price',$price)));
        }
        return 0;
    }

    public static function get_slider_images($product_id)
    {
        if (!$product_id) {
            return 0;
        }
        $slider_images = get_post_meta($product_id, 'slider_images')
    }

}