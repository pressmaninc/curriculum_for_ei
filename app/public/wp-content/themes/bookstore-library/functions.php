<?php

require get_stylesheet_directory() . '/customizer/customizer.php';

add_action( 'after_setup_theme', 'bookstore_library_after_setup_theme' );
function bookstore_library_after_setup_theme() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( "responsive-embeds" );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'bookstore-library-featured-image', 2000, 1200, true );
    add_image_size( 'bookstore-library-thumbnail-avatar', 100, 100, true );

    // Set the default content width.
    $GLOBALS['content_width'] = 525;

    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
    ) );

    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff'
    ) );

    add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

    add_editor_style( array( 'assets/css/editor-style.css') );
}

/**
 * Register widget area.
 */
function bookstore_library_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'bookstore-library' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'bookstore-library' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Page Sidebar', 'bookstore-library' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'bookstore-library' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Sidebar 3', 'bookstore-library' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'bookstore-library' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 1', 'bookstore-library' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'bookstore-library' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'bookstore-library' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets here to appear in your footer.', 'bookstore-library' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3', 'bookstore-library' ),
        'id'            => 'footer-3',
        'description'   => __( 'Add widgets here to appear in your footer.', 'bookstore-library' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 4', 'bookstore-library' ),
        'id'            => 'footer-4',
        'description'   => __( 'Add widgets here to appear in your footer.', 'bookstore-library' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'bookstore_library_widgets_init' );

// enqueue styles for child theme
function bookstore_library_enqueue_styles() {

    wp_enqueue_style( 'bookstore-library-fonts', author_writer_fonts_url(), array(), null );

    // Bootstrap
    wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

    // owl-carousel
    wp_enqueue_style( 'owl-carousel-css', get_theme_file_uri( '/assets/css/owl.carousel.css' ) );

    // Theme block stylesheet.
    wp_enqueue_style( 'bookstore-library-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'bookstore-library-child-style' ), '1.0' );

    // enqueue parent styles
    wp_enqueue_style('author-writer-style', get_template_directory_uri() .'/style.css');

    // enqueue child styles
    wp_enqueue_style('bookstore-library-child-style', get_stylesheet_directory_uri() .'/style.css', array('author-writer-style'));

    wp_enqueue_script('owl.carousel-js', esc_url( get_theme_file_uri() ) . '/assets/js/owl.carousel.js',array('jquery'),'2.3.4',     TRUE);

    wp_enqueue_script('bookstore-library-custom-js', esc_url( get_theme_file_uri() ) . '/assets/js/bookstore-library-custom.js',array('jquery'),'2.3.4',TRUE
    );

    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
}
add_action('wp_enqueue_scripts', 'bookstore_library_enqueue_styles');

function bookstore_library_admin_scripts() {
    // Backend CSS
    wp_enqueue_style( 'bookstore-library-backend-css', get_theme_file_uri( '/assets/css/customizer.css' ) );
}
add_action( 'admin_enqueue_scripts', 'bookstore_library_admin_scripts' );

function bookstore_library_header_style() {
    if ( get_header_image() ) :
    $bookstore_library_custom_header = "
        .headerbox{
            background-image:url('".esc_url(get_header_image())."');
            background-position: center top;
        }";
        wp_add_inline_style( 'bookstore-library-child-style', $bookstore_library_custom_header );
    endif;
}
add_action( 'wp_enqueue_scripts', 'bookstore_library_header_style' );

// Latest Event Meta
function bookstore_library_bn_custom_meta_featured() {
    add_meta_box( 'bn_meta', __( 'Latest Events Meta Feilds', 'bookstore-library' ), 'bookstore_library_meta_callback_workshop_event', 'post', 'normal', 'high' );
}
/* Hook things in for admin*/
if (is_admin()){
  add_action('admin_menu', 'bookstore_library_bn_custom_meta_featured');
}

function bookstore_library_meta_callback_workshop_event( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'bookstore_library_workshop_event_meta_nonce' );
    $bn_stored_meta = get_post_meta( $post->ID );
    $event_category = get_post_meta( $post->ID, 'bookstore_library_event_category', true );
    $event_location = get_post_meta( $post->ID, 'bookstore_library_event_location', true );
    ?>
    <div id="custom_stuff">
        <table id="list">
            <tbody id="the-list" data-wp-lists="list:meta">
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Event Categroy', 'bookstore-library' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="bookstore_library_event_category" id="bookstore_library_event_category" value="<?php echo esc_attr($event_category); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Event Location', 'bookstore-library' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="bookstore_library_event_location" id="bookstore_library_event_location" value="<?php echo esc_attr($event_location); ?>" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
}

/* Saves the custom meta input */
function bookstore_library_bn_metadesig_save( $post_id ) {
    if (!isset($_POST['bookstore_library_workshop_event_meta_nonce']) || !wp_verify_nonce( strip_tags( wp_unslash( $_POST['bookstore_library_workshop_event_meta_nonce']) ), basename(__FILE__))) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Save Event Category
    if( isset( $_POST[ 'bookstore_library_event_category' ] ) ) {
        update_post_meta( $post_id, 'bookstore_library_event_category', strip_tags( wp_unslash( $_POST[ 'bookstore_library_event_category' ]) ) );
    }
    // Save Event Location
    if( isset( $_POST[ 'bookstore_library_event_location' ] ) ) {
        update_post_meta( $post_id, 'bookstore_library_event_location', strip_tags( wp_unslash( $_POST[ 'bookstore_library_event_location' ]) ) );
    }
}
add_action( 'save_post', 'bookstore_library_bn_metadesig_save' );

if ( ! defined( 'AUTHOR_WRITER_PRO_THEME_NAME' ) ) {
    define( 'AUTHOR_WRITER_PRO_THEME_NAME', esc_html__( 'Bookstore Library Pro', 'bookstore-library' ));
}
if ( ! defined( 'AUTHOR_WRITER_PRO_THEME_URL' ) ) {
    define( 'AUTHOR_WRITER_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/books-library-wordpress-theme/'));
}
if ( ! defined( 'AUTHOR_WRITER_FREE_THEME_URL' ) ) {
    define( 'AUTHOR_WRITER_FREE_THEME_URL', 'https://www.themespride.com/themes/free-bookstore-wordpress-theme/' );
}
if ( ! defined( 'AUTHOR_WRITER_DEMO_THEME_URL' ) ) {
    define( 'AUTHOR_WRITER_DEMO_THEME_URL', 'https://www.themespride.com/bookstore-library-pro/' );
}
if ( ! defined( 'AUTHOR_WRITER_DOCS_THEME_URL' ) ) {
    define( 'AUTHOR_WRITER_DOCS_THEME_URL', 'https://www.themespride.com/demo/docs/bookstore-library-lite/' );
}
if ( ! defined( 'AUTHOR_WRITER_DOCS_URL' ) ) {
define( 'AUTHOR_WRITER_DOCS_URL', 'https://www.themespride.com/demo/docs/bookstore-library-lite/' );
}
if ( ! defined( 'AUTHOR_WRITER_RATE_THEME_URL' ) ) {
    define( 'AUTHOR_WRITER_RATE_THEME_URL', 'https://wordpress.org/support/theme/bookstore-library/reviews/#new-post' );
}
if ( ! defined( 'AUTHOR_WRITER_CHANGELOG_THEME_URL' ) ) {
    define( 'AUTHOR_WRITER_CHANGELOG_THEME_URL', get_stylesheet_directory() . '/readme.txt' );
}
if ( ! defined( 'AUTHOR_WRITER_SUPPORT_THEME_URL' ) ) {
    define( 'AUTHOR_WRITER_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/bookstore-library' );
}

define('BOOKSTORE_LIBRARY_CREDIT',__('https://www.themespride.com/themes/free-bookstore-wordpress-theme/','bookstore-library') );

if ( ! function_exists( 'bookstore_library_credit' ) ) {
    function bookstore_library_credit(){
        echo "<a href=".esc_url(BOOKSTORE_LIBRARY_CREDIT)." target='_blank'>".esc_html__(get_theme_mod('author_writer_footer_text',__('Bookstore Library WordPress Theme','bookstore-library')))."</a>";
    }
}
