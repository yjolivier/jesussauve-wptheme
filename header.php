<!DOCTYPE html>
<html>
	<head>
		<title><?php wp_title('title')?></title>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	</head>
<body>
	<div class="container-fluid">
		<header class="row sticky-top">
			<div class="header-logo col-lg-4 col-md-4 col-sm-6 col-6">
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
			<div class="header-menu col-lg-8 col-md-8 col-sm-6 col-6">
				<nav class="navbar navbar-expand-lg navbar-white bg-white">
					<button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
						<span class="navbar-toggler-icon btn-menu">
							<i class="fas fa-align-justify"></i>
						</span>
					</button>
					<div class="collapse  navbar-collapse" id="collapse_target">
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
				</nav>
			</div>
		</header>
<?php wp_head();?>