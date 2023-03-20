<?php
class VC_Elementor_Add_On
{
    protected static $instance = null;

    public static function get_instance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }

        return static::$instance;
    }

    protected function __construct()
    {
        add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);
    }
    private function include_widgets_files()
    {
            require_once 'carousel_image_link.php';
    }

    public function register_widgets()
    {
        $this->include_widgets_files();
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\carousel_image_link());
    }
}


add_action('init', 'vc_elementor_init');
function vc_elementor_init()
{
    VC_Elementor_Add_On::get_instance();
}
