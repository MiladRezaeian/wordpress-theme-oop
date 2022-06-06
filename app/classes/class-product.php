<?php

class Product
{
    const REGULAR_PRICE_META_KEY = 'product_regular_price';
    const SALE_PRICE_META_KEY = 'product_sale_price';

    public static function regular_price($product_id,$in_persian = false)
    {
        if (!$product_id) {
            return 0;
        }
        $regular_price = get_post_meta($product_id, self::REGULAR_PRICE_META_KEY, true);
        if (intval($regular_price) > 0) {
            if($in_persian){
                return Utility::persian_numbers(number_format(apply_filters('product_regular_price', $regular_price)));
            }
            return apply_filters('product_regular_price', $regular_price);
        }
        return 0;
    }

    public static function sale_price($product_id, $in_persian = false)
    {
        if (!$product_id) {
            return 0;
        }
        $sale_price = get_post_meta($product_id, self::SALE_PRICE_META_KEY, true);
        if (intval($sale_price) > 0) {
            if($in_persian){
                return Utility::persian_numbers(number_format(apply_filters('product_sale_price', $sale_price)));
            }
            return apply_filters('product_sale_price', $sale_price);
        }
        return 0;
    }

    public static function get_slider_images($product_id)
    {
        if (!$product_id) {
            return 0;
        }
        $slider_images = get_post_meta($product_id, 'slider_images',true);
        if (!empty($slider_images) && is_array($slider_images) && is_countable($slider_images) && count($slider_images) > 0) {
            return $slider_images;
        }
        return false;
    }

	public static function find( $product_id ) {
		$product = get_post($product_id);
		return $product;
	}

}