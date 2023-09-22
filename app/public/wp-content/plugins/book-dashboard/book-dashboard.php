<?php
/**
 * Plugin Name: Book Dashboard
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

class Book_Dashboard
{

    private static $instance;

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
            self::$instance->__construct();
        }
        return self::$instance;
    }

    public function __construct()
    {
        add_action('wp_dashboard_setup', array($this, 'add_custom_dashboard_widget'), 10);
        add_action('plugins_loaded', array($this, 'create_custom_roles'), 10);
    }

    public function custom_dashboard_widget()
    {
        if (current_user_can('administrator')) {
            global $wp_query;
            $args = array(
                'post_type' => 'Books',
                'posts_per_page' => 5,
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    ?>
                    <h2>
                        <?php the_title(); ?>
                    </h2>
                    <p>
                        <?php the_content(); ?>
                    </p>
                    <?php
                }
                wp_reset_postdata();
            } else {
                echo 'No posts found.';
            }
        } else {
            // Code for displaying the widget content for regular users
            ?>
            <h2>Welcome, User!</h2>
            <p>Widget content for regular users goes here.</p>
            <?php
        }

    }

    public function add_custom_dashboard_widget()
    {
        wp_add_dashboard_widget('custom_dashboard_widget', 'Custom Widget Title', array($this, 'custom_dashboard_widget'));
    }

    function create_custom_roles() {
        add_role( 'custom_admin', 'Custom Admin', array(
            'read'                   => true,
            'edit_posts'             => true,
            'delete_posts'           => true,
            'manage_options'         => true,
        ) );
    
        add_role( 'custom_user', 'Custom User', array(
            'read'                   => true,
            'edit_posts'             => true,
        ) );
    }


    
}

Book_Dashboard::get_instance();