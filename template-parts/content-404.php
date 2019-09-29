<article id="post-<?php the_ID(); ?>" class="post-item">
    <!--post/-->
    <br>
    <div class="post-item-caption">
        <div class="post-list columns">
            <h4><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'jesussauve' ); ?></h4>

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
