<?php
/**
 * Plugin Name: Alert on Login
 * Description: カリキュラム用プラグインです
 * Version: 1.0.0
 * Requires at least: 5.5.1
 * Requires PHP: 7.2
 * Author: Ei Thandar Aung
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */
// ①
if (!defined('ABSPATH')) {
   exit;
}

class Alert_On_Login
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
      add_action('admin_head', array($this, 'display_alert_in_admin'), 10);
      add_action('save_post', array($this, 'save_content_length_to_postmeta'), 10);
      add_action('admin_head', array($this, 'display_alert_for_admins'), 10);
      add_action('admin_head', array($this, 'display_editors_alert'), 10);
      add_filter('acf/validate_value/name=no_spaces_text', array($this, 'validate_no_spaces'), 10, 3);
      add_filter('acf/validate_value/name=japanese_only_textarea', array($this, 'validate_japanese_text'), 10, 3);
      add_action('acf/init', array($this, 'custom_acf_fields'), 10);
      add_action('manage_posts_custom_column', array($this, 'custom_column_content_length'), 10, 2);
      add_action('manage_posts_custom_column', array($this, 'custom_column_notification'), 10, 2);
      add_filter('manage_posts_columns', array($this, 'add_content_length_column'), 10);
      add_filter('manage_posts_columns', array($this, 'add_notification_column'), 10);
      add_action('init', array($this, 'enqueue_custom_js'), 10);
      //add_action('admin_enqueue_scripts', 'enqueue_custom_js');
   }

   /**
    * 管理画面を開く度にアラート表示する処理
    */
   public function display_alert_in_admin()
   {
      echo '<script>alert("Welcome to the WordPress Admin Panel!");</script>';
   }

   /**
    * 投稿を保存する際に記事の本文の文字数をmeta_keyをcontent_lengthとしてpostmetaに保存する処理
    */
   public function save_content_length_to_postmeta($post_id)
   {
      $content = get_post_field('post_content', $post_id);
      $content_length = mb_strlen($content);
      update_post_meta($post_id, 'content_length', $content_length);
   }

   /**
    * 管理者のみ管理画面を開く度にアラートを表示する処理
    */
   public function display_alert_for_admins()
   {
      if (current_user_can('administrator')) {
         echo '<script>alert("Welcome, Administrator!");</script>';
      }
   }

   public function display_editors_alert()
   {
      $current_user = wp_get_current_user();
      $allowed_roles = array('editor'); // アラートを表示させたいユーザーロールを指定
      if (array_intersect($allowed_roles, $current_user->roles)) {
         echo "<script>alert('投稿を編集できるユーザーが管理画面を開きました。');</script>";
      }
   }

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
      if ($field['name'] === 'japanese_only_textarea') {
         if (!preg_match('/^[ぁ-んァ-ヶー一-龠々ー]+$/u', $value)) {
            $valid = __('This field should only contain Japanese characters.', 'acf');
         }
      }
      return $valid;
   }


   function custom_acf_fields()
   {
      if (function_exists('acf_add_local_field_group')):
         acf_add_local_field_group(
            array(
               'key' => '',
               'title' => '',
               'fields' => array(
                  array(
                     'key' => 'field_6502612d70d18',
                     'label' => 'Short Text',
                     'name' => 'short_text',
                     'type' => 'Text',
                     'instructions' => '',
                     'required' => 1,

                  ),
               ),
               'location' => array(
                  array(
                     array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'post',
                     ),
                  ),
               ),
            )
         );
      endif;
   }
   /**
    * 記事の文字数を表示するカラムを追加
    */

   function custom_column_content_length($column, $post_id)
   {
      if ($column == 'content_length') {
         $content = get_post_field('post_content', $post_id);
         $content_length = mb_strlen(strip_tags($content));
         echo $content_length;
      }
   }

   function add_content_length_column($columns)
   {
      $columns['content_length'] = '文字数';
      return $columns;
   }

   /**
    * 投稿日時から2年以上が経過していることを通知するカラムを追加
    */

   function custom_column_notification($column, $post_id)
   {
      if ($column == 'notification') {
         $post_date = get_the_date('Y-m-d H:i:s', $post_id);
         $current_date = date('Y-m-d H:i:s');
         $post_time = strtotime($post_date);
         $current_time = strtotime($current_date);
         $time_diff = $current_time - $post_time;
         if ($time_diff > 63072000) { // 2年は63072000秒
            echo '<span style="color: red; font-weight: bold;">2年以上経過</span>';
         }
      }
   }

   function add_notification_column($columns)
   {
      $columns['notification'] = '通知';
      return $columns;
   }

   function enqueue_custom_js() {
      $current_user = wp_get_current_user();
         $allowed_roles = array('author'); // アラートを表示させたいユーザーロールを指定
         if (array_intersect($allowed_roles, $current_user->roles)) {
            echo "<script>alert('Welcome! This is a custom alert for users with wp10_capability.');</script>";
         }
   }
 


}




Alert_On_Login::get_instance();