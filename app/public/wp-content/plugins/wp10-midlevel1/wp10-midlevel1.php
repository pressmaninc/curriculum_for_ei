<?php
/**
* Plugin Name: Test1
* Description: カリキュラム用プラグインです
* Version: 1.0.0
* Requires at least: 5.5.1
* Requires PHP: 7.2
* Author: Ei Thandar Aung
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// ①
if ( ! defined( 'ABSPATH' ) ) {
    exit;
 }
 
 class My_Test1 {
    // ②
    private static $instance;
 
    public static function get_instance() {
       if ( ! isset( self::$instance ) ) {
          self::$instance = new self();
       }
       return self::$instance;
    }
 
    public function __construct() {
       
       add_action( 'my_page', array( $this, 'add_my_page' ), 10 );
    }
 
    // ④
    public function add_my_page() {
        add_my_page(
            __( 'Test1 Page', '' ),
            __( "Test1 Page", '' ),
            'administrator',
            'my_test1',
            array( $this, 'view_test1_page' ),
        );
    }
    public function view_test1_page() {
        //please create alert box

        ?>
        <script>alert("Hello World");</script>
               <h1>Test1 Page</h1>
               <p>This is test page.</p>
        <?php
    }
 }
 My_Test1::get_instance();