<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('.add_slider_item').on('click', function (event) {
            var wrapper = $('.sliders_item_wrapper');
            var item = '<p>' +
                       '<input type="text" name="sliders[]">' +
                       '<a class="remove_slider_item" href="#"><span class="dashicons dashicons-dismiss"></span></a>' +
                       '</p>';
            event.preventDefault();

            wrapper.append(item);
        });
        $(document).on('click', '.remove_slider_item', function (event) {
            event.preventDefault();
            var $this = $(this);
            $this.parent().slideUp();
        });
    });
</script>

<p>
    <a href="#" class="add_slider_item">add item</a>
</p>
<div class="sliders_item_wrapper">
    <?php if (isset($slider_images) && is_array($slider_images) && is_countable($slider_images) && count($slider_images) > 0): ?>
        <?php foreach ($slider_images as $slider_image): ?>
            <p>
                <input type="text" name="sliders[]" value="<?php echo $slider_image; ?>">
                <a class="remove_slider_item" href="#"><span class="dashicons dashicons-dismiss"></span></a>
            </p>
        <?php endforeach; ?>
    <?php else: ?>
        <p>
            <input type="text" name="sliders[]">
            <a class="remove_slider_item" href="#"><span class="dashicons dashicons-dismiss"></span></a>
        </p>
    <?php endif; ?>

</div>
