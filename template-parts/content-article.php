<?php
/*
=========================================================================================
@package        ElogeBeonao
@link           https://codex.wordpress.org/Pages
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (https://github.com/samuelguebo/), Yao Olivier (https://github.com/yjolivier/)
=========================================================================================
*/
?>
<div class="card article col-lg-4 col-md-6">
  <div class="card-container">  
    <div class="card-img">
    <?php
      if ( has_post_thumbnail_or_image ()) { 
          the_post_thumbnail("post-thumb"); 
      }
    ?>
      </div>
      <div class="card-body">
        <div class="card-text">
            <h5><?php the_title();?></h5>
            <p><?php elogeb_excerpt(120);?></p>
        </div>
        <center>
          <div class="btn-article">
            <a href="<?php the_permalink();?>"><?php _e('Voir plus');?></a>
          </div>
        </center>
      </div>
  </div>
</div>