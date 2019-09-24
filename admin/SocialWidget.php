<?php

class SocialWidget extends WP_Widget {
    public $classname      = "SocialWidget";
    public $id             = "social_widget";
    public $title          = "A Social Widget";
    public $description    = "Social network widget";
    public $prefix         = "socialwidget_";

    public function __construct(){
        
        $options = array( 
            'classname'     => $this->id,
            'description'   => _('Widget for social networks'),
        );

        parent::__construct(
            $this->id,
            $this->title,
            $options
        );
    
    }
    
    /**
     * Display data in front-end
     */
    function widget($args, $instance) {
        $html = "";
        $title = apply_filters( 'widget_title', $instance[ 'title' ] );
        $facebook_url = sanitize_url($instance[ 'facebook_url' ]);
        $twitter_url = sanitize_url($instance[ 'twitter_url' ]);
        $linkedin_url = sanitize_url($instance[ 'linkedin_url' ]);
        $youtube_url = sanitize_url($instance[ 'youtube_url' ]);
        
        $html .= $args['before_widget'];
            $html .= !(empty($facebook_url))? '<p><a href="'. $facebook_url .'">Facebook</a></p>' : '';  
            $html .= !(empty($twitter_url))? '<p><a href="'. $twitter_url .'">Twitter</a></p>' : '';  
            $html .= !(empty($linkedin_url))? '<p><a href="'. $linkedin_url .'">Linkedin</a></p>' : '';  
            $html .= !(empty($youtube_url))? '<p><a href="'. $youtube_url .'">Youtube</a></p>' : '';  
        $html .= $args['after_widget'];
        
        echo $html;
  
    }

    /**
     * Build form in Widgets (Dashboard)
     */
    function form($instance){
        $facebook_url = !empty($instance['facebook_url']) ? $instance['facebook_url']: '';
        $twitter_url = !empty($instance['twitter_url']) ? $instance['twitter_url']: '';
        $linkedin_url = !empty($instance['linkedin_url']) ? $instance['linkedin_url']: '';
        $youtube_url = !empty($instance['youtube_url']) ? $instance['youtube_url']: '';
        
        // Facebook input form
        $html = ''; 
        $html .= '<p>';
            $html .='<label for="'. $this->get_field_id('facebook_url') . '">Facebook link: '; 
            $html .= '<input class="widefat" id="'. $this->get_field_id('facebook_url') .'" '; 
            $html .= 'name="' . $this->get_field_name('facebook_url') .'" type="url" ';
            $html .= 'value="'. sanitize_url($facebook_url) . '" /></label>';
        $html .= '</p>';
        
        // Twitter input form
        $html .= '<p>';
            $html .='<label for="'. $this->get_field_id('twitter_url') . '">twitter link: '; 
            $html .= '<input class="widefat" id="'. $this->get_field_id('twitter_url') .'" '; 
            $html .= 'name="' . $this->get_field_name('twitter_url') .'" type="url" ';
            $html .= 'value="'. sanitize_url($twitter_url) . '" /></label>';
        $html .= '</p>';

        // Linkedin input form
        $html .= '<p>';
            $html .='<label for="'. $this->get_field_id('linkedin_url') . '">linkedin link: '; 
            $html .= '<input class="widefat" id="'. $this->get_field_id('linkedin_url') .'" '; 
            $html .= 'name="' . $this->get_field_name('linkedin_url') .'" type="url" ';
            $html .= 'value="'. sanitize_url($linkedin_url) . '" /></label>';
        $html .= '</p>';

        // Youtube input form
        $html .= '<p>';
            $html .='<label for="'. $this->get_field_id('youtube_url') . '">youtube link: '; 
            $html .= '<input class="widefat" id="'. $this->get_field_id('youtube_url') .'" '; 
            $html .= 'name="' . $this->get_field_name('youtube_url') .'" type="url" ';
            $html .= 'value="'. sanitize_url($youtube_url) . '" /></label>';
        $html .= '</p>';

        //affichage du resultat
        echo $html;

    }

    /**
     * Save data submitted through
     * Widgets (Dashboard)
     */
    function update($new_instance, $old_instance){
        // Sanitize and verify new data
        $instance = $old_instance; 
        $instance['facebook_url'] = sanitize_url($new_instance['facebook_url']);
        $instance['linkedin_url'] = sanitize_url($new_instance['linkedin_url']);
        $instance['twitter_url'] = sanitize_url($new_instance['twitter_url']);
        $instance['youtube_url'] = sanitize_url($new_instance['youtube_url']);
        return $instance;
    }
    
    /**
     * Register this as a WordPress function
     */
    static function register_widget() {
        return register_widget('SocialWidget');
    }
    
    
    /**
     * Utility method to be called
     * from outside
     */
    public static function register(){
        add_action( 'widgets_init', array('SocialWidget', 'register_widget'));
    }
}
