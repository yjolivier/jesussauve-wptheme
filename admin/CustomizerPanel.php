<?php 
/**
 * Class for handling Customizer settings
 * and encapsulating functions
 */


class CustomizerPanel 
{

	/* Constructor */
	public static function register(){

		// Actualite section
		add_action( 'customize_register', array('CustomizerPanel', 'actualite_section' ));

		// Evenement section
		add_action( 'customize_register', array('CustomizerPanel', 'evenement_section' ));

		// Slider
		add_action( 'customize_register', array('CustomizerPanel', 'slider' ));
		
		// Page background
		add_action( 'customize_register', array('CustomizerPanel', 'page_background' ));
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
	 * Evenement section
	 */
	static function evenement_section($wp_customize) {
		require_once "controls/CategoryDropdown.php";

	   $section_title = "Accueil - Evenement";
	 	/**
		 * Add our Section
		*/
		$wp_customize->add_section( 'evenement_section',
		   array(
		      'title' => __( $section_title )
		   )
		);
	 	$wp_customize->add_panel( 'evenement_section_panel',
		  array(
		    'title' => __( $section_title ),
		    'description' => esc_html__( 'Configuration de la section Evenement.' ), // Include html tags such as 
		    'section' => 'evenement_section'
		  )
		);
		/**
		 * Add headline
		*/
		$wp_customize->add_setting( 'evenement_section_headline',
		  array(
		    'default' => '', // Optional.
		  )
		);

		// title
		$wp_customize->add_control( 'evenement_section_headline_control',
		  array(
				'label' => __( 'Titre de section' ),
				'section' => 'evenement_section',
				'settings' => 'evenement_section_headline',
				'type' => 'text', // Can be either text, email, url, number, hidden, or date
				'input_attrs' => array( // Optional.
					'placeholder' => __( 'Entrer le titre...' ),
				),
		  )
		);
		
		// Subtitle
		$wp_customize->add_setting( 'evenement_section_subtitle');
		$wp_customize->add_control( 'evenement_section_subtitle_control',
		   array(
		      'label' => __( 'Soustitre de section' ),
		      /*'description' => esc_html__( 'Contrôles de texte Le type peut être soit du texte, un email, une URL, un numéro, masqué ou la date' ),*/
		      'section' => 'evenement_section',
		      'settings' => 'evenement_section_subtitle',
		      'type' => 'text', // Can be either text, email, url, number, hidden, or date
		      'input_attrs' => array( // Optional.
		        'placeholder' => __( 'Entrer le sous-titre...' ),
		      ),
		   )
		);
		
		/**
		 * Category
		*/
		$wp_customize->add_setting( 'evenement_section_category');
		$wp_customize->add_control(new CategoryDropdown( $wp_customize, 'evenement_section_category',
				array(
					'section'       => 'evenement_section',
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
