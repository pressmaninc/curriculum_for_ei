<?php
/*
* Display Logo and nav
*/
?>

<div class="headerbox py-3">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-5 col-9 align-self-center">
        <?php $author_writer_logo_settings = get_theme_mod( 'author_writer_logo_settings','Different Line');
        if($author_writer_logo_settings == 'Different Line'){ ?>
          <div class="logo mb-md-0">
            <?php if( has_custom_logo() ) author_writer_the_custom_logo(); ?>
            <?php if( get_theme_mod('author_writer_site_title',true) == 1){ ?>
              <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php }?>
            <?php $author_writer_description = get_bloginfo( 'description', 'display' );
            if ( $author_writer_description || is_customize_preview() ) : ?>
              <?php if( get_theme_mod('author_writer_site_tagline',false) == 1){ ?>
                <p class="site-description mb-0"><?php echo esc_html($author_writer_description); ?></p>
              <?php }?>
            <?php endif; ?>
          </div>
        <?php }else if($author_writer_description == 'Same Line'){ ?>
          <div class="logo logo-same-line mb-md-0">
            <div class="row">
              <div class="col-lg-5 col-md-5 align-self-md-center">
                <?php if( has_custom_logo() ) author_writer_the_custom_logo(); ?>
              </div>
              <div class="col-lg-7 col-md-7 align-self-md-center">
                <?php if(get_theme_mod('author_writer_site_title',true) != ''){ ?>
                  <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php }?>
                <?php $author_writer_description = get_bloginfo( 'description', 'display' );
                if ( $author_writer_description || is_customize_preview() ) : ?>
                  <?php if(get_theme_mod('author_writer_site_tagline',true) != ''){ ?>
                    <p class="site-description mb-0"><?php echo esc_html($author_writer_description); ?></p>
                  <?php }?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php }?>
      </div>
      <div class="col-lg-6 col-md-2 col-3 align-self-center">
        <?php get_template_part( 'template-parts/navigation/site', 'nav' ); ?>
      </div>
      <div class="col-lg-3 col-md-5 align-self-center">
        <div class="media-links text-md-right">
          <?php                  
            $author_writer_header_fb_new_tab = esc_attr(get_theme_mod('author_writer_header_fb_new_tab','true'));
            $author_writer_header_twt_new_tab = esc_attr(get_theme_mod('author_writer_header_twt_new_tab','true'));
            $author_writer_header_ins_new_tab = esc_attr(get_theme_mod('author_writer_header_ins_new_tab','true'));
            $author_writer_header_ut_new_tab = esc_attr(get_theme_mod('author_writer_header_ut_new_tab','true'));
            $author_writer_header_pint_new_tab = esc_attr(get_theme_mod('author_writer_header_pint_new_tab','true'));
            ?>
          <?php if( get_theme_mod( 'author_writer_facebook_url' ) != '' || get_theme_mod( 'author_writer_twitter_url' ) != '' || get_theme_mod( 'author_writer_instagram_url' ) != '' || get_theme_mod( 'author_writer_youtube_url' ) != '' || get_theme_mod( 'author_writer_pint_url' ) != '') { ?>
            <span><?php esc_html_e('Connect With Us -  ','bookstore-library'); ?></span>
            <?php if( get_theme_mod( 'author_writer_facebook_url' ) != '') { ?>
              <a <?php if($author_writer_header_fb_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'author_writer_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f mr-2"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'author_writer_twitter_url' ) != '') { ?>
              <a <?php if($author_writer_header_twt_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'author_writer_twitter_url','' ) ); ?>"><i class="fab fa-twitter mr-2"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'author_writer_instagram_url' ) != '') { ?>
              <a <?php if($author_writer_header_ins_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'author_writer_instagram_url','' ) ); ?>"><i class="fab fa-instagram mr-2"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'author_writer_youtube_url' ) != '') { ?>
              <a <?php if($author_writer_header_ut_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'author_writer_youtube_url','' ) ); ?>"><i class="fab fa-youtube mr-2"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'author_writer_pint_url' ) != '') { ?>
              <a <?php if($author_writer_header_pint_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'author_writer_pint_url','' ) ); ?>"><i class="fab fa-pinterest"></i></a>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
