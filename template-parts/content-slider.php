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
  $i = (int) get_query_var('i');
?>
<div class="carousel-item slide <?php echo $i ==1 ? 'active': '';?>">
    
    <?php
      if ( has_post_thumbnail_or_image ()) { 
          the_post_thumbnail("slider-cover"); 
      }
    ?>
  
    <div class="slide-article">
      <div class="carousel-article-container">
          <h3><?php the_title();?></h3>
          <p><?php jesussauve_excerpt(100);?></p>
          <div class="carousel-btn-container">
            <a class="btn-carousel" href="<?php the_permalink();?>"><?php _e('Voir plus')?></a>
        </div>
      </div>
    </div>
</div>