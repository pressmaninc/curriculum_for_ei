<?php
/**
 * Template part for displaying latest event section
 *
 * @package Bookstore Library
 * @subpackage bookstore_library
 */
?>

<section id="workshop" class="py-5">
  <div class="container">
    <?php if( get_theme_mod('bookstore_library_workshop_section_short_tittle') != ''){ ?>
      <h6 class="title-p text-center"><?php echo esc_html(get_theme_mod('bookstore_library_workshop_section_short_tittle','')); ?></h6>
    <?php }?>
    <?php if( get_theme_mod('bookstore_library_workshop_section_tittle') != ''){ ?>
      <h2 class="mb-5 text-center"><?php echo esc_html(get_theme_mod('bookstore_library_workshop_section_tittle','')); ?></h2>
    <?php }?>
    <div class="owl-carousel">
      <?php
        $bookstore_library_post_category = get_theme_mod('bookstore_library_workshop_section_category');
        if($bookstore_library_post_category){
          $bookstore_library_page_query = new WP_Query(array( 'category_name' => esc_html( $bookstore_library_post_category ,'bookstore-library')));?>
          <?php while( $bookstore_library_page_query->have_posts() ) : $bookstore_library_page_query->the_post(); ?>
          <div class="cat-inner-box row">
            <div class="col-lg-6 col-md-6 col-sm-6 align-self-center">
              <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 align-self-center">
              <div class="event-inner-content">
                <?php if( get_post_meta($post->ID, 'bookstore_library_event_category', true) ) {?>
                  <h5><?php echo esc_html(get_post_meta($post->ID,'bookstore_library_event_category',true)); ?></h5>
                <?php }?>
                <?php if(get_theme_mod('author_writer_remove_date',true) != ''){ ?>
                    <div class="time-date-box py-3">
                  <i class="far fa-calendar-alt mr-2"></i><span class="entry-date"><?php echo get_the_date( 'j F, Y' ); ?></span>
                  <?php }?>
                
                  <i class="fas fa-clock mr-2"></i><span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
                </div>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><?php echo wp_trim_words( get_the_content(),25 );?></p>

                <?php if( get_post_meta($post->ID, 'bookstore_library_event_location', true) ) {?>
                  <h6 class=""><i class="fas fa-map-marker-alt mr-2"></i><?php echo esc_html(get_post_meta($post->ID,'bookstore_library_event_location',true)); ?></h6>
                <?php }?>
              </div>
            </div>
          </div>
          <?php endwhile;
          wp_reset_postdata();
        }
      ?>
    </div>
  </div>
</section>
