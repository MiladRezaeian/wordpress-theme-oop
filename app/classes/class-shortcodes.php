<?php

class ShortCodes {

	public static function member_content_handler( $atts, $content = '' ) {
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