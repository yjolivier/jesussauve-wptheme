<?php 
/**
 * Class for handling Customizer settings
 * and encapsulating functions
 */


class CustomizerPanel 
{

	/* Constructor */
	public static function register(){

		// Parallax
		add_action( 'customize_register', array('CustomizerPanel', 'parallax_section' ));

		// Actualite section
		add_action( 'customize_register', array('CustomizerPanel', 'actualite_section' ));

		// Project section
		add_action( 'customize_register', array('CustomizerPanel', 'project_section' ));

		// Slider
		add_action( 'customize_register', array('CustomizerPanel', 'slider' ));
		
		// Page background
		add_action( 'customize_register', array('CustomizerPanel', 'page_background' ));
	}

	/**
	 * Parallax section 
	 */
	static function parallax_section($wp_customize) {
	   $section_title = "Accueil - Bio";
	 	/**
		 * Add our Section
		*/
		$wp_customize->add_section( 'sample_custom_controls_section',
		   array(
		      'title' => __( $section_title )
		   )
		);
	 	$wp_customize->add_panel( 'parallax_panel',
		   array(
		      'title' => __( $section_title ),
		      'description' => esc_html__( 'Ajuste ma section de parallaxe.' ), // Include html tags such as 
		      'section' => 'sample_custom_controls_section'
		   )
		);
		/**
		 * Add headline
		*/
		$wp_customize->add_setting( 'parallax_callout_headline',
		   array(
		      'default' => '', // Optional.
		   )
		);
		$wp_customize->add_control( 'parallax_headline',
		   array(
		      'label' => __( 'Headline' ),
		      /*'description' => esc_html__( 'Contrôles de texte Le type peut être soit du texte, un email, une URL, un numéro, masqué ou la date' ),*/
		      'section' => 'sample_custom_controls_section',
		      'settings' => 'parallax_callout_headline',
		      'type' => 'text', // Can be either text, email, url, number, hidden, or date
		      'input_attrs' => array( // Optional.
		        'placeholder' => __( 'Entrer le titre...' ),
		      ),
		   )
		);
		/**
		 * Add text description
		*/
		$wp_customize->add_setting( 'parallax_callout_text',
		   array(
		      'default' => '', // Optional.
		   )
		);
		$wp_customize->add_control( 'sample_default_text_description',
		   array(
		      'label' => __( 'Texte de description' ),
		      /*'description' => esc_html__( 'Contrôles de texte Le type peut être soit du texte, un email, une URL, un numéro, masqué ou la date' ),*/
		      'section' => 'sample_custom_controls_section',
		      'settings' => 'parallax_callout_text',
		      'type' => 'textarea', // Can be either text, email, url, number, hidden, or date
		      'input_attrs' => array( // Optional.
		         'placeholder' => __( 'Veuillez saisir le texte...' ),
		      ),
		   )
		);
		/**
		 * Add link
		*/
		$wp_customize->add_setting( 'parallax_callout_link');
		$wp_customize->add_control( 'sample_default_link',
		   array(
		      'label' => __( 'Lien' ),
		      /*'description' => esc_html__( 'Contrôles de texte Le type peut être soit du texte, un email, une URL, un numéro, masqué ou la date' ),*/
		      'section' => 'sample_custom_controls_section',
		      'settings' => 'parallax_callout_link',
		      'type' => 'dropdown-pages', // Can be either text, email, url, number, hidden, or date
		   )
		);
		/**
		 * Add image
		*/
		$wp_customize->add_setting( 'parallax_callout_image' );
		$wp_customize->add_control( new WP_customize_Cropped_Image_control( $wp_customize, 'parallax_callout_image_control',
		   array(
		      'label' => __( 'Image de fond' ),
		      'section' => 'sample_custom_controls_section',
			  'settings' => 'parallax_callout_image',
			  'width' => '1500',
			  'height' => '1000'
		   )
		));
	}

	/**
	 * Project 
	 */
	static function project_section($wp_customize) {
		require_once "controls/CategoryDropdown.php";

	   $section_title = "Accueil - Projets";
	 	/**
		 * Add our Section
		*/
		$wp_customize->add_section( 'project_section',
		   array(
		      'title' => __( $section_title )
		   )
		);
	 	$wp_customize->add_panel( 'project_section_panel',
		   array(
		      'title' => __( $section_title ),
		      'description' => esc_html__( 'Ajuste ma section de parallaxe.' ), // Include html tags such as 
		      'section' => 'project_section'
		   )
		);
		/**
		 * Add headline
		*/
		$wp_customize->add_setting( 'project_section_headline',
		   array(
		      'default' => '', // Optional.
		   )
		);
		$wp_customize->add_control( 'project_section_headline_control',
		   array(
		      'label' => __( 'Titre de section' ),
		      /*'description' => esc_html__( 'Contrôles de texte Le type peut être soit du texte, un email, une URL, un numéro, masqué ou la date' ),*/
		      'section' => 'project_section',
		      'settings' => 'project_section_headline',
		      'type' => 'text', // Can be either text, email, url, number, hidden, or date
		      'input_attrs' => array( // Optional.
		        'placeholder' => __( 'Entrer le titre...' ),
		      ),
		   )
		);
		
		/**
		 * Category
		*/
		$wp_customize->add_setting( 'project_section_category');
		$wp_customize->add_control(new CategoryDropdown( $wp_customize, 'project_section_category',
				array(
					'section'       => 'project_section',
					'label' => __( 'Category' )
				)
		));
	}
	
	/**
	 * Actualites 
	 */
	static function actualite_section($wp_customize) {
		require_once "controls/CategoryDropdown.php";

	   $section_title = "Accueil - Actu";
	 	/**
		 * Add our Section
		*/
		$wp_customize->add_section( 'actualite_section',
		   array(
		      'title' => __( $section_title )
		   )
		);
	 	$wp_customize->add_panel( 'actualite_section_panel',
		   array(
		      'title' => __( $section_title ),
		      'description' => esc_html__( 'Configuration de la section Actu.' ), // Include html tags such as 
		      'section' => 'actualite_section'
		   )
		);
		/**
		 * Add headline
		*/
		$wp_customize->add_setting( 'actualite_section_headline',
		   array(
		      'default' => '', // Optional.
		   )
		);

		// title
		$wp_customize->add_control( 'actualite_section_headline_control',
		   array(
		      'label' => __( 'Titre de section' ),
		      /*'description' => esc_html__( 'Contrôles de texte Le type peut être soit du texte, un email, une URL, un numéro, masqué ou la date' ),*/
		      'section' => 'actualite_section',
		      'settings' => 'actualite_section_headline',
		      'type' => 'text', // Can be either text, email, url, number, hidden, or date
		      'input_attrs' => array( // Optional.
		        'placeholder' => __( 'Entrer le titre...' ),
		      ),
		   )
		);
		
		// Subtitle
		$wp_customize->add_setting( 'actualite_section_subtitle');
		$wp_customize->add_control( 'actualite_section_subtitle_control',
		   array(
		      'label' => __( 'Soustitre de section' ),
		      /*'description' => esc_html__( 'Contrôles de texte Le type peut être soit du texte, un email, une URL, un numéro, masqué ou la date' ),*/
		      'section' => 'actualite_section',
		      'settings' => 'actualite_section_subtitle',
		      'type' => 'text', // Can be either text, email, url, number, hidden, or date
		      'input_attrs' => array( // Optional.
		        'placeholder' => __( 'Entrer le sous-titre...' ),
		      ),
		   )
		);
		
		/**
		 * Category
		*/
		$wp_customize->add_setting( 'actualite_section_category');
		$wp_customize->add_control(new CategoryDropdown( $wp_customize, 'actualite_section_category',
				array(
					'section'       => 'actualite_section',
					'label' => __( 'Category' )
				)
		));
	}

	/**
	 * Slider settings
	 */
	static function slider($wp_customize) {
		require_once "controls/CategoryDropdown.php";

	   $section_title = "Accueil - Slider";
	 	/**
		 * Add our Section
		*/
		$wp_customize->add_section( 'slider_section',
		   array(
		      'title' => __( $section_title )
		   )
		);
	 	$wp_customize->add_panel( 'slider_section_panel',
		   array(
		      'title' => __( $section_title ),
		      'section' => 'slider_section'
		   )
		);

		/*
		// Section title
		$wp_customize->add_control( 'slider_section_title_control',
		   array(
		      'label' => __( 'Titre de section' ),
		      'section' => 'slider_section',
		      'settings' => 'slider_section_title_control',
		      'type' => 'text', // Can be either text, email, url, number, hidden, or date
		      'input_attrs' => array( // Optional.
		        'placeholder' => __( 'Entrer le titre...' ),
		      ),
		   )
		);
		*/


		/**
		 * Category
		*/
		$wp_customize->add_setting( 'slider_section_category');
		$wp_customize->add_control(new CategoryDropdown( $wp_customize, 'slider_section_category',
				array(
					'section'       => 'slider_section',
					'label' => __( 'Category' )
				)
		));
	}
	
	/**
	 * Page background settings
	 */
	static function page_background($wp_customize) {

	   $section_title = "Page - Background";
	 	/**
		 * Add our Section
		*/
		$wp_customize->add_section( 'page_background',
		   array(
		      'title' => __( $section_title )
		   )
		);
	 	$wp_customize->add_panel( 'page_background_panel',
		   array(
		      'title' => __( $section_title ),
		      'section' => 'page_background'
		   )
		);
		
	/**
		* Add image
		*/
		$wp_customize->add_setting( 'page_background_img' );
		$wp_customize->add_control( new WP_customize_Cropped_Image_control( $wp_customize, 'page_background_img_control',
		   array(
		      'label' => __( 'Image de fond des pages' ),
		      'section' => 'page_background',
			  'settings' => 'page_background_img',
			  'width' => '1350',
			  'height' => '500'
		   )
		));
	}
}
