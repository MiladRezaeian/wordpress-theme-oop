<?php

class Options_panel
{

    public function __construct()
    {
        $this->add_panel_menu();
        add_action('ooptheme_save_options_panel', array($this, 'save_options_handler'));
    }

    public function init_panel()
    {
        add_action('admin_menu', array($this, 'add_panel_menu'));
    }

    public function add_panel_menu()
    {
        add_theme_page(
            'theme setting',
            'theme setting',
            'manage_options',
            'ooptheme_options_panel',
            array($this, 'panel_page')
        );
    }

    public function panel_page()
    {
        if (isset($_POST['save_options'])) {
            do_action('ooptheme_save_options_panel');
        }
        View::renderFile(admin . options_panel . index, array('options' => [1, 2]));
    }

    public function save_options_handler()
    {

    }

    public static function load()
    {
        return get_option(THEME_OPTIONS);
    }
}
