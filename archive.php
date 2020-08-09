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

get_header(); ?>
			<section class="row page-content">
				<div class="single-slide col-lg-12">
					<?php get_template_part( 'page-templates/page-slide');?>
				</div>
				<div class="container single-content">
			        <div class="row sidbar-article-container">
			        	<div class="card single-article col-lg-8 col-md-12">
				            <div class="row article">
				            	<!-- Debut de la boucle -->
								<?php if (have_posts()) : 
									$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
									?>
						            <?php while (have_posts()) : the_post(); ?>
							        	<div class="archive-block col-lg-6 col-md-6">
								        	<div class="archive-article-box">  
									            <div class="card-img">
									            	<?php
								                        if ( has_post_thumbnail_or_image ()) { 
								                            the_post_thumbnail( "post-thumb" ); 
								                        }
								                    ?>
									            </div>
									            <div class="card-body">
									                <p class="card-text">
									                    <h5><?php the_title();?></h5>
									          			<p><?php jesussauve_excerpt(100);?></p>
									                </p>
									                <center>
										                <div class="btn-article">
										                	<a href="<?php the_permalink();?>"><?php _e('Savoir plus','elogebeonao')?></a>
										                </div>
									                </center>
									            </div>
									        </div>
							            </div>
											<?php endwhile;?>
											
											<?php 
												else : get_template_part( 'template-parts/contents', '404' );
												endif;
											?>
					        </div>
					        <div class="pagination-wrapper" >
					            <?php the_posts_pagination( array(
					                'mid_size' => 2,
					                'prev_text' => __( '&laquo;', 'elogebeonao' ),
					                'next_text' => __( '&raquo;', 'elogebeonao' ),
					                'screen_reader_text' => ' '
					            ) ); ?>
					        </div> 
			            </div>
			            <div class="col-lg-4 sidebar">
			            	<?php get_sidebar(); ?>
			            </div>
			        </div>
				</div>
			</section>
<?php get_footer(); ?>
				