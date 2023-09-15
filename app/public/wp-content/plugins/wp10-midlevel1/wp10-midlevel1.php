<?php
/**
* Plugin Name: Wp10 Midlevel1
* Description: カリキュラム用プラグインです
* Version: 1.0.0
* Requires at least: 5.5.1
* Requires PHP: 7.2
* Author: Ei Thandar Aung
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/


if ( ! defined( 'ABSPATH' ) ) {
    exit;
 }
 
 class My_Test1 {
    
    private static $instance;
 
    public static function get_instance() {
       if ( ! isset( self::$instance ) ) {
          self::$instance = new self();
       }
       return self::$instance;
    }
 
    public function __construct() {
       
        add_action('admin_head', array($this, 'display_alert_by_admin'), 10);
    }
 
    
    
    public function display_alert_by_admin() {
        //please create alert box

        ?>
        <script>alert("Hello World");</script>
               <h1>Test1 Page</h1>
               <p>This is test page.</p>
        <?php
    }
 }
 My_Test1::get_instance();