<?php
/*
 * Enable support for Post Thumbnails on posts and pages.
 *
 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
 */
add_theme_support( 'post-thumbnails' );
add_image_size( 'post-thumb', 660, 650, array( 'center', 'top' ) );
add_image_size( 'project-left-thumb', 590, 600, array( 'center', 'top' ) );
add_image_size( 'project-right-thumb', 588, 500, array( 'center', 'top' ) );
add_image_size( 'slider-cover', 1350, 450, array( 'center', 'top' ) );
add_image_size( 'single-thumb', 700, 520, array( 'center', 'top' ) );

/**
 * Custom logo
 */
add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 100,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( get_bloginfo('title'),  get_bloginfo('description') ),
) );

/*
 * Check if thumbnail or firstImage exist
 *
 */
function has_post_thumbnail_or_image(){
	global $post;
	$first_img = jesussauve_get_first_image($post->ID);
	if(!has_post_thumbnail())
		if (empty( $first_img ) ){
			return false;
		}
	return true;
}
/**
 * Get the first image of the post 
 */

function jesussauve_get_first_image($post_id) {
		$post = get_post($post_id);
		$post_content = $post->post_content;
		preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post_content, $matches);
		if( count($matches) > 1) {
			$image_url = $matches[1][0];
			return $image_url;
		}
		return false; 
}



function jesussauve_modify_post_thumbnail_html($html, $post_id, $post_thumbnail_id, $size, $attr) {
	if( '' == $html ) {
		global $post, $posts;
		ob_start();
		ob_end_clean();
		
		$first_img = jesussauve_get_first_image($post_id);
		if ( !empty( $first_img ) ){
			$html = '<img src="' . $first_img . '" alt="' . $alt . '" />';
		}
	}
	return $html;
}
add_filter('post_thumbnail_html', 'jesussauve_modify_post_thumbnail_html', 10, 5);


/**
 * Display the first characters of the article content
 */
function jesussauve_excerpt($max_char, $more_link_text = '...',$notagp = false, $stripteaser = 0, $more_file = '') {
	$content = get_the_content($more_link_text, $stripteaser, $more_file);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	$content = strip_tags($content);

   if (isset($_GET['p']) && strlen($_GET['p']) > 0) {
	  if($notagp) {
	  echo $content;
	  }
	  else {
	  // echo '<div class="slide_excerpt">';
	  echo $content;
	  // echo "</div>";
	  }
   }
   else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
		$content = substr($content, 0, $espacio);
		$content = $content;
		if($notagp) {
		echo $content;
		echo $more_link_text;
		}
		else {
		echo $content;
		echo $more_link_text;
		}
   }
   else {
	  if($notagp) {
	  echo $content;
	  }
	  else {
	  echo $content;
	  }
   }
}

/**
 * Configuring widgets
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

/*
 *Our Widgets defined
*/
function OurWidgetsInit() {

	register_sidebar(
		array(
			'name'          => 'Widgets sidebar',
			'id'            => 'widgets_sidebar',
			'before_widget' => '<div  id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)	
	);

	register_sidebar(
		array(
			'name'          => 'Footer texte',
			'id'            => 'footer_texte',
			'before_widget' => '<div  id="%1$s" class="widget footer-description_content %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => 'Footer social',
			'id'            => 'footer_social',
			'before_widget' => '<div  id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => 'footer search',
			'id'            => 'searchbar',
			'before_widget' => '<div  id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);
}
add_action( 'widgets_init', 'OurWidgetsInit' );
/**
 * Create a default Menu called "primary"
 * This menu will be recognized by WordPress and displayed in the header
 * @link https://codex.wordpress.org/Function_Reference/register_nav_menus
 * @link http://arts-numeriques.codedrops.net/Plus-Ajouter-la-fonction-de-menu
 * @link https://www.wpbeginner.com/wp-themes/how-to-add-custom-navigation-menus-in-wordpress-3-0-themes/
 */

	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'jesussauve' ),
	) );

/**
 * Create a custom class for the menu, based on Walker_Nav_Menu
 * @link https://developer.wordpress.org/reference/classes/walker_nav_menu/
 * @link https://wabeo.fr/construire-walker-wordpress/
 */
class Multilevel_Menu extends Walker_Nav_Menu
{
   function start_lvl(&$output, $depth = 0, $args = array())
   {
	   $indent = str_repeat("\t", $depth);
	   $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
   }
   function end_lvl(&$output, $depth = 0, $args = array())
   {
	   $indent = str_repeat("\t", $depth);
	   $output .= "$indent</ul>\n";
   }
	// adding arrow to top-menu
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		if ( !$element )
				return;
		$id_field = $this->db_fields['id'];
		//display this element
		if ( is_array( $args[0] ) )
				$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
		//Adds the 'parent' class to the current item if it has children               
		if( ! empty( $children_elements[$element->$id_field] ) ) {
				array_push($element->classes,'has-dropdown not-click');
				//$element->title .= ' <i class="fa fa-caret-down"></i>';
		}
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'start_el'), $cb_args);
		$id = $element->$id_field;
		// descend only when the depth is right and there are childrens for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {
				foreach( $children_elements[ $id ] as $child ){
						if ( !isset($newlevel) ) {
								$newlevel = true;
								//start the child delimiter
								$cb_args = array_merge( array(&$output, $depth), $args);
								call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
						}
						$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
				}
				unset( $children_elements[ $id ] );
		}
		if ( isset($newlevel) && $newlevel ){
				//end the child delimiter
				$cb_args = array_merge( array(&$output, $depth), $args);
				call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
		}
		//end this element
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'end_el'), $cb_args);
	}
}

/**
 * Enqueue scripts and styles.
 */
function jesussauve_scripts() {
    
	// Google fonts
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Cairo:400,600,700|Montserrat:400,600&display=swap', false ); 

	// CSS
	wp_enqueue_style( 'bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'main-css', get_template_directory_uri().'/css/style-js.css' );

	// JS
	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.3.1.slim.min.js' );
	wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' );
	wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' );
	wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/d8e469504a.js');
	
}

function jesussauve_admin_js($hook) {
  wp_enqueue_script( 'jesussauve_admin_js', get_template_directory_uri() . '/js/admin.js' );
}
add_action( 'wp_enqueue_scripts', 'jesussauve_scripts' );


// include Customizer class
require  get_template_directory() . "/admin/CustomizerPanel.php";
CustomizerPanel::register();


// include Customizer class
require  get_template_directory() . "/admin/SocialWidget.php";
SocialWidget::register();
