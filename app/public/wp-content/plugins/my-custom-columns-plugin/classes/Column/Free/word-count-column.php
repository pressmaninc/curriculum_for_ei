<?php
class Word_Count_Column {
    public function __construct() {
        $this->label = __('Word Count', 'my-custom-columns-plugin');
        $this->sortable = true;
    }

    public function display($post_id) {
        $content = get_post_field('post_content', $post_id);
        $word_count = str_word_count(strip_tags($content));
        echo esc_html($word_count); // Display the word count as a string
    }
}
