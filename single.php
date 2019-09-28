<?php get_header(); ?>
			<section class="row single-container">
				<?php get_template_part( 'page-templates/page-slide');?>
				<div class="container single-content">
			        <div class="row sidbar-article-container">
			        	<div class="card single-article col-lg-8 col-md-12">
			        		<?php if (have_posts()) : ?>
    							<?php while (have_posts()) : the_post(); ?>
			        		<div class="single-article-content">
				        		<h1 class="title"><?php the_title();?></h1>
					            <div class="single-card-body">
												<div class="single-card-text">
													<p class="date"><?php the_time('d/m/Y');?></p>
												</div>
												<?php the_content();?>
					            </div>
				            </div>
										<!-- fin de la boucle -->
													
												<?php endwhile; ?> 
										<?php endif;?>
			            </div>
			            <div class="col-lg-4 sidebar">
			            	<?php get_sidebar(); ?>
			            </div>
			        </div>
				</div>
			</section>
<?php get_footer(); ?>
				