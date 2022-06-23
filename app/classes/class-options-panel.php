<?php

class Options_panel {

	public function __construct() {
		$this->init_panel();
		add_action( 'ooptheme_save_options_panel', array( $this, 'save_options_handler' ) );
	}

	public function init_panel() {
		add_action( 'admin_menu', array( $this, 'add_panel_menu' ) );
	}

	public function add_panel_menu() {
		add_theme_page(
			'OOPTheme Setting',
			'OOPTheme Setting',
			'manage_options',
			'ooptheme_options_panel',
			array( $this, 'panel_page' )
		);
	}

	public function panel_page() {
		if ( isset( $_POST['save_options'] ) ) {
			do_action( 'ooptheme_save_options_panel' );
		}
		$options = self::load();
		View::renderFile( 'admin.options_panel.index', compact('options') );
	}

	public function save_options_handler() {
		$options                          = self::load();
		$options['member_content_active'] = isset( $_POST['member_content_active'] ) ? 1 : 0;
		self::update( $options );

	}

	public static function load() {
		return get_option( THEME_OPTIONS );
	}

	public static function update( array $options ) {
		return update_option( THEME_OPTIONS, $options );
	}
}
