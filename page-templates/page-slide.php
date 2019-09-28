<div class="page-slide col-lg-12">
  <a href="#"><img src="<?php echo wp_get_attachment_url(get_theme_mod('page_background_img')); ?>"></a>
  <div class="page-title">
    <h2><?php 
      if( is_single() || is_page() ):
        the_title();
      else:
        the_archive_title();
      endif;
    ?></h2>
  </div>
</div>