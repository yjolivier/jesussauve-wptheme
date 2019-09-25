<?php
/*
================================================================================================
Template part for displaying 404 error message
================================================================================================
@package        Maria
@link           https://codex.wordpress.org/The_Loop
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (http://samuelguebo.ci/)
================================================================================================
*/
?>
<article id="post-<?php the_ID(); ?>" class="post-item">
    <!--post/-->
    <br>
    <div class="post-item-caption">
        <div class="post-list columns">
            <h4><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'elogebeonao' ); ?></h4>

        </div>

        <div class="post-list not-found columns">
            <ul>
            <?php $lostposts = get_posts("numberposts=50&suppress_filters=0");
                if ( $lostposts ): ?>
                    <?php foreach($lostposts as $lostpost):
                        echo '<li><a href="'.get_permalink($lostpost->ID).'">'.$lostpost->post_title.'</a></li>';
                    endforeach;
                endif;
            ?>
            </ul>
        </div>
    </div>
</article>
