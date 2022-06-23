<?php

class SideBars {

	public static function register_main_sidebar() {
		register_sidebar( array(
			'id'            => 'ooptheme-main-sidebar',
			'name'          => 'Main Sidebar',
			'description'   => 'main sidebar desc',
			'before_widget' => '<div class="main_sidebar_widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		) );
	}

}