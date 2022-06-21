<?php

class Options_panel {

	public function __construct() {
		$this->add_panel_menu();
	}

	public function init_panel() {
		add_action( 'admin_menu', array( $this, 'add_panel_menu' ) );
	}

	public function add_panel_menu() {
		add_theme_page(
			'theme setting',
			'theme setting',
			'manage_options',
			'ooptheme_options_panel',
			array($this,'panel_page')
		);
	}

	public function panel_page(  ) {
		
	}
}
