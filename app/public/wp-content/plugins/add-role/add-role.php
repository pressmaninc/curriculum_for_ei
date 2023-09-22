<?php
/**
 * Plugin Name: Add Role
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

class Your_Custom_Prefix_Add_Role
{

    public static function get_instance()
    {
        return new self();
    }

    public function __construct()
    {
        add_action('init', array($this, 'create_custom_roles'));
        // Other initialization code can be added here
    }

    public function create_custom_roles()
    {
        // Add first role - "Role1"
        add_role(
            'role1',
            'Role 1',
            array(
                'read' => true,
                'edit_posts' => true,
                'delete_posts' => true
            )
        );

        // Add second role - "Role2"
        add_role(
            'role2',
            'Role 2',
            array(
                'read' => true,
                'edit_pages' => true
            )
        );
    }
}

$add_role = Your_Custom_Prefix_Add_Role::get_instance();
