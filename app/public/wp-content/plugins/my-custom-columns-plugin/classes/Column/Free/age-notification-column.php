<?php
class Age_Notification_Column
{
    public function __construct()
    {
        $this->label = __('Age Notification', 'my-custom-columns-plugin');
        $this->sortable = false;
    }

    public function render($post_id)
    {
        // Check if post edit is older than 2 years
        $last_modified = strtotime(get_post_field('post_modified', $post_id));
        $two_years_ago = strtotime('-2 years');
        if ($last_modified <= $two_years_ago) {
            echo 'Notify';
        }
    }
    // function custom_column_notification($column, $post_id)
    // {
    //     if ($column == 'notification') {
    //         $post_date = get_the_date('Y-m-d H:i:s', $post_id);
    //         $current_date = date('Y-m-d H:i:s');
    //         $post_time = strtotime($post_date);
    //         $current_time = strtotime($current_date);
    //         $time_diff = $current_time - $post_time;
    //         if ($time_diff > 63072000) { // 2年は63072000秒
    //             echo 'Notify';
    //         }
    //     }
    // }
}