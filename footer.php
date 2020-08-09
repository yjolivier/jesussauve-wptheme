			<footer class="row footer-container">
				<div class="container">
					<div class="row">
						<div class="footer-header col-lg-12 col-sm-12 col-md-12">
							<div class="row footer-header-title">
								<div class="footer-logo col-lg-5 col-md-5 col-sm-12">
									<?php 
										$custom_logo_id = get_theme_mod( 'custom_logo' );
										$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
										if(isset($image[0]))
											$html = "";
											$html.= '<a href="'. get_site_url() .'">';
											$html .= '<img src="'. $image[0] .'" alt="'. get_bloginfo('title') .'">';
											$html .= '</a>';

											echo $html;
									?>
								</div>
								<div class="search-bar col-lg-7 col-md-7 col-sm-12">
									<?php if ( is_active_sidebar('searchbar') ): ?>
										<?php dynamic_sidebar( 'searchbar' ); ?>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<hr width="90%" size="1" color="#CECECE">
						<div class="footer-middle row">
							<div  class="descriptition col-lg-7 col-md-8 col-sm-12">
								<?php if ( is_active_sidebar('footer_texte') ): ?>
									<?php dynamic_sidebar( 'footer_texte' ); ?>
								<?php endif; ?>
							</div>
							<div class="footer-menu col-lg-2 col-md-4 col-sm-6">
								<?php
										/* Dynamic menu */
										if(function_exists('wp_nav_menu')) {
											wp_nav_menu(array(
												'theme_location' => 'primary',
												'depth'             => 2,
												'container'         => 'ul',
												'container_class'   => 'collapse navbar-collapse',
												'menu_id' => 'main-menu',
												'menu_class' => 'navbar-nav mr-auto',
												'fallback_cb' => '',
												'walker' => new Multilevel_Menu()
											)); 
										}
								?>
							</div>
							<div class="reseau-social col-lg-2 col-md-4 col-sm-6">
								<?php if ( is_active_sidebar('footer_social') ): ?>
									<?php dynamic_sidebar( 'footer_social' ); ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<div class="signature row">
				<center>Design by <a href="https://github.com/yjolivier/">Olivier</a> &amp; <a href="https://github.com/samuelguebo/">Samuel</a></center>
			</div>
		</div>
		<?php wp_footer()?>
	</body>
</html>
				