<?php

class Widget_Form extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'   => 'widget_form',
			'description' => 'Widget Form is awesome',
		);
		parent::__construct( 'widget_form', 'Widget Form', $widget_ops );
	}

	/**
	 * Front-end display of widget.
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 *
	 * @see WP_Widget::widget()
	 *
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		echo isset( $instance['category_id'] ) ? $instance['category_id'] : 0;
		?>
        <div class="widget_form">
            <p>
                <input type="text" name="full_name" id="full_name" placeholder="Your Full Name">
            </p>
            <p>
                <input type="text" name="mobile" id="mobile" placeholder="Your Phone Number">
            </p>
            <p>
                <button type="submit" name="widget_form_submit">Submit</button>
            </p>
        </div>
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @param array $instance Previously saved values from database.
	 *
	 * @see WP_Widget::form()
	 *
	 */
	public function form( $instance ) {
		$title       = ! empty( $instance['title'] ) ? $instance['title'] : 'Subscribe Form';
		$category_id = isset( $instance['category_id'] ) && intval( $instance['category_id'] ) > 0 ? (int) $instance['category_id'] : 0;
		?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'category_id' ) ); ?>">Category Id</label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'category_id' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'category_id' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $category_id ); ?>">
        </p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 * @see WP_Widget::update()
	 *
	 */
	public function update( $new_instance, $old_instance ): array {
		$instance                = array();
		$instance['title']       = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['category_id'] = intval( $new_instance['category_id'] ) > 0 ? intval( $new_instance['category_id'] ) : 0;

		return $instance;
	}

}