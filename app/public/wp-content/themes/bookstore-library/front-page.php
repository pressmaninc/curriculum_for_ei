<?php
/**
 * The front page template file
 *
 * @package Bookstore Library
 * @subpackage bookstore_library
 */

get_header(); ?>

<main id="tp_content" role="main">
	<?php get_template_part( 'template-parts/home/slider' ); ?>

	<?php get_template_part( 'template-parts/home/workshops-event' ); ?>

	<?php get_template_part( 'template-parts/home/home-content' ); ?>
</main>

<?php get_footer();