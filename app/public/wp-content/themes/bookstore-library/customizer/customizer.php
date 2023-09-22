<?php

function bookstore_library_remove_customize_register() {
    global $wp_customize;
    $wp_customize->remove_section( 'author_writer_color_option' );
    $wp_customize->remove_section( 'author_writer_topbar' );
    $wp_customize->remove_setting( 'author_writer_sticky' );
    $wp_customize->remove_control( 'author_writer_sticky' );
    $wp_customize->remove_setting( 'author_writer_footer_widget_image' );
    $wp_customize->remove_control( 'author_writer_footer_widget_image' );
}
add_action( 'customize_register', 'bookstore_library_remove_customize_register', 11 );

function bookstore_library_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'bookstore_library_workshop_section' , array(
    	'title'      => __( 'Latest Event Settings', 'bookstore-library' ),
		  'panel' => 'author_writer_panel_id'
	) );

	$wp_customize->add_setting('bookstore_library_workshop_section_short_tittle',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bookstore_library_workshop_section_short_tittle',array(
		'label'	=> __('Section Short Title','bookstore-library'),
		'section'	=> 'bookstore_library_workshop_section',
		'type'		=> 'text'
	));

  $wp_customize->selective_refresh->add_partial( 'bookstore_library_workshop_section_short_tittle', array(
		'selector' => 'h6.title-p',
		'render_callback' => 'author_writer_customize_partial_bookstore_library_workshop_section_short_tittle',
	 ));

	$wp_customize->add_setting('bookstore_library_workshop_section_tittle',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bookstore_library_workshop_section_tittle',array(
		'label'	=> __('Section Title','bookstore-library'),
		'section'	=> 'bookstore_library_workshop_section',
		'type'		=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$offer_cat[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$offer_cat[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('bookstore_library_workshop_section_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'author_writer_sanitize_choices',
	));
	$wp_customize->add_control('bookstore_library_workshop_section_category',array(
		'type'    => 'select',
		'choices' => $offer_cat,
		'label' => __('Select Category','bookstore-library'),
		'section' => 'bookstore_library_workshop_section',
	));

}
add_action( 'customize_register', 'bookstore_library_customize_register' );
