<?php
/*
=========================================================================================
@package        Jesus sauve
@link           https://codex.wordpress.org/Pages
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (https://github.com/samuelguebo/), Yao Olivier (https://github.com/yjolivier/)
=========================================================================================
*/
?>

<?php
  // variables
  $slider_category_id =  esc_html(get_theme_mod('slider_section_category'));
  $slider_section_title =  esc_html(get_theme_mod('slider_section_category'));

?>
<section class="row">
  <div class="carousel-container $slide_status">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel" data-pause="true" data-ride="false">
      <div class="carousel-inner">
        <?php
          if ( have_posts() ) :
              // custom params for my loop
              $args = array(
                      'cat' => $slider_category_id, // category slug
                      'posts_per_page' => 3, // how many articles to display
              );
              
              $slider_posts = new WP_Query($args);
              $i = 1;
              
              while ( $slider_posts->have_posts() ) : $slider_posts->the_post();
                  set_query_var('i', $i);
                  
                  get_template_part( 'template-parts/content', 'slider' );

                  $i++;
              endwhile;
          
          endif; wp_reset_postdata();
        ?>
        </div>
      <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</section>