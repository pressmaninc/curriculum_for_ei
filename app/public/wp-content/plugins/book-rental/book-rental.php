<?php
/**
 * Plugin Name: Book Rental Manger
 * Description: カリキュラム用プラグインです
 * Version: 1.0.0
 * Requires at least: 5.5.1
 * Requires PHP: 7.2
 * Author: Ei Thandar Aung
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */


class Book_Rental
{
    // ②
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
        // ③
        add_action('admin_head', array($this, 'display_alert_in_admin'), 10);
        add_action('init', array($this, 'display_average_rating'), 10);
        
    }

    // public function display_alert_in_admin()
    // {
    //     echo '<script>alert("Welcome to the WordPress Admin Panel!");</script>';
    // }

    public function calculate_average_rating($book_id)
     {
         $comments = get_comments([
             'post_id' => $book_id,
             'status' => 'approve', // Only approved comments
             'type' => 'comment',   // Filter by comments
         ]);
 
         $total_ratings = 0;
         $total_reviews = count($comments);
 
         foreach ($comments as $comment) {
             $rating = get_comment_meta($comment->comment_ID, 'rating', true);
             if (!empty($rating)) {
                 $total_ratings += $rating;
             }
         }
 
         if ($total_reviews > 0) {
             $average_rating = round($total_ratings / $total_reviews, 1);
             return $average_rating;
         } else {
             return 0; // No reviews yet
         }
     }
 
     // Display the average rating on single book pages
     public function display_average_rating()
     {
         if (is_single() && get_post_type() === 'book') {
             $book_id = get_the_ID();
             $average_rating = $this->calculate_average_rating($book_id);
             echo "Average Rating: " . $average_rating . "/5";
             
         }
     }
}
Book_Rental::get_instance();