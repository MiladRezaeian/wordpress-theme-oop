<?php

class ShortCodes {

	public static function member_content_handler( $atts, $content = '' ) {
		$options = Options_panel::load();
		if ( isset( $options['member_content_active'] ) && intval( $options['member_content_active'] ) == 0 ) {
			return $content;
		}
		$args = shortcode_atts( array(
			'id'   => 1,
			'role' => 'subscriber'
		), $atts );
		if ( ! empty( $content ) ) {
			if ( is_user_logged_in() ) {
				return $content;
			}

			return '<div class="member_ony_contents"><p>Just for logged in user.</p></div>';
		}
	}

}