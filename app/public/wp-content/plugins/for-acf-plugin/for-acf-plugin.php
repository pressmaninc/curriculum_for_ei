<?php
/**
 * Plugin Name: For ACF Plugin
 * Description: ACF のためプラグインです
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

class For_ACF_Plugin
{

    public static function get_instance()
    {
        return new self();
    }

    public function __construct()
    {

        add_action('init', array($this, 'register_custom_post_type_book'), 10);
        add_action('init', array($this, 'register_custom_post_type_review'), 10);
        add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
        
    }

    public function register_custom_post_type_book() {
        $args = array(
            'labels' => array(
                'name' => 'Books',
                'singular_name' => 'Book'
            ),
            'public' => true,
            
        );
        register_post_type('books', $args);
    }
    public function register_custom_post_type_review() {
        $args = array(
            'labels' => array(
                'name' => 'Reviews',
                'singular_name' => 'Review'
            ),
            'public' => true,
            
        );
        register_post_type('reviews', $args);
    }

    

    public function enqueue_styles() {
        wp_enqueue_style('my-plugin-style', plugins_url('/css/styles.css', __FILE__));
    }
    
}

$for_acf_plugin = For_ACF_Plugin::get_instance();
