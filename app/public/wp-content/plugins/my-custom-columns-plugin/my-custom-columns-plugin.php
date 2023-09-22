<?php
/**
 * Plugin Name: My Custom Columns Plugin
 * Description: カリキュラム用My Custom Columns Pluginです
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

class My_Custom_Columns
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

        add_filter('manage_posts_columns', array($this, 'register_custom_columns'), 10);
        add_action('plugins_loaded', array($this, 'load_plugin_textdomain'), 10);
        add_action('admin_enqueue_styles', array($this, 'enqueue_custom_columns_styles'), 10);
        add_action('admin_enqueue_scripts', array($this, 'enqueue_custom_columns_scripts'), 10);
    }

    // Register custom columns
    function register_custom_columns($columns)
    {
        require_once plugin_dir_path(__FILE__) . 'classes/Column/Free/word-count-column.php';
        require_once plugin_dir_path(__FILE__) . 'classes/Column/Free/age-notification-column.php';
        $columns['word_count'] = new Word_Count_Column();
        $columns['age_notification'] = new Age_Notification_Column();
        return $columns;
    }

    function load_plugin_textdomain() {
        load_plugin_textdomain('my-custom-columns-plugin', false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }
    
    function enqueue_custom_columns_styles() {
        wp_enqueue_style('custom-columns-styles', plugins_url('/css/custom-columns-styles.css', __FILE__));
    }
    
    function enqueue_custom_columns_scripts() {
        wp_enqueue_script('custom-columns-scripts', plugins_url('/js/custom-columns-scripts.js', __FILE__), array('jquery'), '1.0', true);
    }
 
}

My_Custom_Columns::get_instance();
?>