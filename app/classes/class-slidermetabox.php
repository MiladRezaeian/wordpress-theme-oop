<?php

class SliderMetaBox
{

    public static function register_product_slider_meta_box()
    {
        add_meta_box(
            'product_slider_meta_box',
            'گالری تصاویر',
            'SliderMetaBox::product_slider_content_handler',
            'product'
        );
    }

    public static function product_slider_content_handler($post)
    {
        $slider_images = get_post_meta($post->ID, 'slider_images', true);
        View::renderFile('admin/metabox/product/slider', array('slider_images' => $slider_images));
    }

    public static function save_product_slider($post_id)
    {
        if (isset($_POST['sliders']) && count($_POST['sliders']) > 0) {
            update_post_meta($post_id, 'slider_images', $_POST['sliders']);
        }
    }
}