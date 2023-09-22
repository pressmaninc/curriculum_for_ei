jQuery(document).ready(function($) {
    // Example: Highlight rows with a word count over 10
    $('.column-word_count').each(function() {
        var wordCount = parseInt($(this).text());
        if (wordCount > 10) {
            $(this).closest('tr').css('background-color', '#e6f7ff');
        }
    });
});
