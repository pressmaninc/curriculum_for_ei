<?php
/**
 * Plugin Name: WP10 Begin
 * Description: カリキュラム用P10 Beginプラグインです
 * Version: 1.0.0
 * Requires at least: 5.5.1
 * Requires PHP: 7.2
 * Author: EI Thandar Aung
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) {
    exit;
}

class Wp10_Begin
{

    private static $instance;

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct()
    {

        add_action('admin_menu', array($this, 'add_menu_page'), 10);
        add_filter('acf/validate_value/name=no_spaces_text', array($this, 'validate_no_spaces'), 10, 3);
        add_filter('acf/validate_value/name=japanese_text_area', array($this, 'validate_japanese_text'), 10, 3);
        add_filter('acf/fields/post_object/query', array($this, 'filter_cafe_pages_for_acf'), 10, 3);
    }

    public function add_menu_page()
    {
        add_menu_page(
            __('Cafe Page', 'wp10_begin'),
            __("Cafe Page", 'wp10_begin'),
            'administrator',
            'wp10_begin',
            array($this, 'view_Cafe_page')
        );
    }
    public function view_Cafe_page()
    {
        ?>
        <h1>Cafe Page</h1>
        <p>WP10カリキュラムのCafeページです</p>
        <?php
    }

    //Test2
    public function validate_no_spaces($valid, $value, $field)
    {
        if ($field['name'] === 'no_spaces_text') {
            if (strpos($value, ' ') !== false) {
                $valid = __('This field should not contain spaces.', 'acf');
            }
        }
        return $valid;
    }

    public function validate_japanese_text($valid, $value, $field)
    {
        if ($field['name'] === 'japanese_text_area') {
            if (!preg_match('/^[ぁ-んァ-ヶー一-龠々ー]+$/u', $value)) {
                $valid = __('This field should only contain Japanese characters.', 'acf');
            }
        }
        return $valid;
    }

    function filter_cafe_pages_for_acf($args, $field, $post_id)
    {
        $args['s'] = 'カフェ'; // Search for pages containing "カフェ" in their titles
        return $args;
    }
    //End test2

    

}
Wp10_Begin::get_instance();
?>