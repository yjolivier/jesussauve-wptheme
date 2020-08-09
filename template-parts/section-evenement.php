<?php 
  $evenement_section_title = esc_html(get_theme_mod('evenement_section_headline'));
  $evenement_section_subtitle = esc_html(get_theme_mod('evenement_section_subtitle'));
  $evenement_section_category = esc_html(get_theme_mod('evenement_section_category'));
?>
<section class="section-evenement row">
  <div class="container">
    <div class="row">
      <?php
        if ( have_posts() ) :
          // custom params for my loop
          $args = array(
              'cat' => $evenement_section_category, // category slug
              'posts_per_page' => 3, // how many articles to display
          );
          $evenements_posts = new WP_Query($args);
      ?>
      <div class="section-evenement-title col-md-12 col-lg-12 col-sm-12">
        <h2><?php echo $evenement_section_title;?></h2>
        <p><?php echo $evenement_section_subtitle;?></p>
      </div>
      <div class="row block-article col-md-12 col-lg-12 col-sm-12">
        <?php 
          while ( $evenements_posts->have_posts() ) : $evenements_posts->the_post(); 
            get_template_part('template-parts/content','article');
          endwhile; wp_reset_postdata();
        ?>
      </div>
      <?php endif;?> 
    </div>
  </div>
</section>