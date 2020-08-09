<?php 
  $actualite_section_title = esc_html(get_theme_mod('actualite_section_headline'));
  $actualite_section_category = esc_html(get_theme_mod('actualite_section_category'));
?>

<section class="section-actualite row">
  <div class="container">
    <div class="row">
      <?php
        if ( have_posts() ) :
          // custom params for my loop
          $args = array(
              'cat' => $actualite_section_category, // category slug
              'posts_per_page' => 3, // how many articles to display
          );
          $actualites_posts = new WP_Query($args);
          $cardNum = 1;
      ?>
        <div class="section-actualite-title col-lg-12 col-12">
          <h2><?php echo $actualite_section_title; ?></h2>
        </div>
        <div class="row block-article-actualite">
      <?php 
        while ( $actualites_posts->have_posts() ) : $actualites_posts->the_post(); ?>
            <div class="card actualite-article col-lg-4 col-md-6">
                <div class="bulle-numero">
                  <?= $cardNum; ?>
                </div>
                <div class="card-body body-actualite">
                    <div class="card-text">
                      <h5><?php the_title();?></h5>
                      <p><?php jesussauve_excerpt(120);?></p>
                    </div>
                    <center>
                      <div class="btn-article">
                        <a href="<?php the_permalink();?>"><?php _e('Voir plus');?></a>
                      </div>
                    </center>
                </div>
            </div>
        <?php $cardNum++; endwhile; wp_reset_postdata();
      ?>
      <?php endif;?> 
    </div>
  </div>
</section>