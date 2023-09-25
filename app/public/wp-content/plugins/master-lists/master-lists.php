<?php
/**
 * Plugin Name: Master Lists
 * Description: Mater Lists のためプラグインです
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

class Master_Lists
{

    public static function get_instance()
    {
        return new self();
    }

    public function __construct()
    {
        add_shortcode('publisher_list', array($this, 'display_publisher_list'));
        add_shortcode('author_list', array($this, 'display_author_list'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
        add_action('admin_menu', array($this, 'add_menu_page'), 10);
        add_action('admin_post_book_submission', array($this, 'handle_book_submission'), 10);
        add_shortcode('book_submission_form', array($this, 'book_submission_form'));
    }

    public function display_publisher_list()
    {
        // WP_Query arguments to fetch publishers
        $args = array(
            'post_type' => 'publishers',
            // Replace 'publishers' with your custom post type name
            'posts_per_page' => -1,
            // Display all publishers
        );

        // The Query
        $query = new WP_Query($args);

        // Check if there are any publishers
        if ($query->have_posts()) {
            $output = '<ul>';

            // Start the Loop
            while ($query->have_posts()) {
                $query->the_post();
                $publisher_name = get_post_meta(get_the_ID(), 'publisher_name', true); // Replace with your custom field name

                // Display the publisher name as a list item
                $output .= '<li>' . esc_html($publisher_name) . '</li>';
            }

            $output .= '</ul>';

            // Restore original post data
            wp_reset_postdata();

            return $output;
        } else {
            return 'No publishers found.';
        }
    }
    public function display_author_list()
    {
        // WP_Query arguments to fetch publishers
        $args = array(
            'post_type' => 'authors',
            // Replace 'publishers' with your custom post type name
            'posts_per_page' => -1,
            // Display all publishers
        );

        // The Query
        $query = new WP_Query($args);

        // Check if there are any publishers
        if ($query->have_posts()) {
            $output = '<ul>';

            // Start the Loop
            while ($query->have_posts()) {
                $query->the_post();
                $author_name = get_post_meta(get_the_ID(), 'author_name', true); // Replace with your custom field name

                // Display the publisher name as a list item
                $output .= '<li>' . esc_html($author_name) . '</li>';
            }

            $output .= '</ul>';

            // Restore original post data
            wp_reset_postdata();

            return $output;
        } else {
            return 'No author found.';
        }
    }

    public function add_menu_page()
    {
        add_menu_page(
            __('Mylist Page', ''),
            __("Mylist Page", ''),
            'administrator',
            'mylist_sample',
            array($this, 'view_mylist_page')
        );
    }

    public function view_mylist_page()
    {
        ?>
        <h1>Mylist Page</h1>
        <p>WP10カリキュラムのサンプルページです</p>
        <?php
    }



    function handle_book_submission()
    {
        if (isset($_POST['submit_book'])) {
            $book_title = sanitize_text_field($_POST['book_title']);
            $author_name = sanitize_text_field($_POST['author_name']);
            $publisher_name = sanitize_text_field($_POST['publisher_name']);

            // Create a new book post
            $book_post = array(
                'post_title' => $book_title,
                'post_type' => 'book_lists',
                // Replace with your custom post type name
                'post_status' => 'publish',
            );

            $book_post_id = wp_insert_post($book_post);

            // Add custom fields for author name and publisher
            update_post_meta($book_post_id, 'author_name', $author_name);
            update_post_meta($book_post_id, 'publisher_name', $publisher_name);
        }
    }

    function book_submission_form()
    {
        ob_start(); ?>

        <form method="post" action="">
            <label for="book_title">Book Title:</label>
            <input type="text" name="book_title" required>

            <label for="author_name">Author Name:</label>
            <input type="text" name="author_name" required>

            <label for="publisher_name">Publisher Name:</label>
            <select name="publisher_name" required>
                <option value="">Select a Publisher</option>
                <option value="Publisher 1">Publisher 1</option>
                <option value="Publisher 2">Publisher 2</option>
                <!-- Add more options for publishers as needed -->
            </select>

            <input type="submit" name="submit_book" value="Submit Book">
        </form>

        <?php
        return ob_get_clean();
    }

    public function enqueue_styles()
    {
        wp_enqueue_style('my-plugin-style', plugins_url('/css/styles.css', __FILE__));
    }

}

$master_lists = Master_Lists::get_instance();