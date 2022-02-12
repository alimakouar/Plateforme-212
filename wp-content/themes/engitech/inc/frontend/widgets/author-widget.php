<?php 
class Engitech_Author_Widget extends WP_Widget {
 	
 	/**
     * Register widget with WordPress.
     */
    public function __construct() {
    	// Add Widget scripts
   		add_action('admin_enqueue_scripts', array($this, 'author_scripts'));

        parent::__construct(
            'author_widget', // Base ID
            'OT Author', // Name
            array( 'description' => esc_html__( 'A Author Widget', 'engitech' ), 'classname' => 'engitech_author-widget' ) // Args
        );
    }
 	
 	public function author_scripts() {
	   wp_enqueue_script( 'media-upload' );
	   wp_enqueue_media();
	   wp_enqueue_script('engitech_upload_media_admin', get_template_directory_uri() . '/inc/backend/js/upload_media_widget.js', array('jquery'));
	}

 	/**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
 		// Our variables from the widget settings
        $title = apply_filters( 'widget_title', $instance['title'] );
        $text = ! empty( $instance['text'] ) ? $instance['text'] : '';
    	$image = ! empty( $instance['image'] ) ? $instance['image'] : '';
        $facebook = ! empty( $instance['facebook'] ) ? $instance['facebook'] : '';
        $twitter = ! empty( $instance['twitter'] ) ? $instance['twitter'] : '';
        $google = ! empty( $instance['google'] ) ? $instance['google'] : '';
        $linkedin = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : '';
        $pinterest = ! empty( $instance['pinterest'] ) ? $instance['pinterest'] : '';
        $instagram = ! empty( $instance['instagram'] ) ? $instance['instagram'] : '';
        $youtube = ! empty( $instance['youtube'] ) ? $instance['youtube'] : '';
        $dribbble = ! empty( $instance['dribbble'] ) ? $instance['dribbble'] : '';
    	
 		ob_start();
        echo $args['before_widget'];
        ?>
        <div class="author-widget_wrapper text-center">
            <div class="author-widget_image-wrapper">
                <img class="author-widget_image" src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>">
            </div>
            <div class="author-widget_info">
                <?php 
                if ( ! empty( $title ) ) {echo '<h5 class="author-widget_title">' . $title . '</h5>';} 
                if ( ! empty( $text ) ) {echo '<p class="author-widget_text">' . $text . '</p>';} 
                ?>
                <div class="author-widget_social">
                    <?php if ($twitter) { echo '<a class="social-twitter" href="'.esc_url($twitter).'"><i class="fab fa-twitter"></i></a>'; } ?>
                    <?php if ($facebook) { echo '<a class="social-facebook" href="'.esc_url($facebook).'"><i class="fab fa-facebook-f"></i></a>'; } ?>            
                    <?php if ($google) { echo '<a class="social-google" href="'.esc_url($google).'"><i class="fab fa-google-plus-g"></i></a>'; } ?>           
                    <?php if ($linkedin) { echo '<a class="social-linkedin" href="'.esc_url($linkedin).'"><i class="fab fa-linkedin-in"></i></a>'; } ?>
                    <?php if ($pinterest) { echo '<a class="social-pinterest" href="'.esc_url($pinterest).'"><i class="fab fa-pinterest-p"></i></a>'; } ?>
                    <?php if ($instagram) { echo '<a class="social-instagram" href="'.esc_url($instagram).'"><i class="fab fa-instagram"></i></a>'; } ?>
                    <?php if ($youtube) { echo '<a class="social-youtube" href="'.esc_url($youtube).'"><i class="fab fa-youtube"></i></a>'; } ?>
                    <?php if ($dribbble) { echo '<a class="social-dribbble" href="'.esc_url($dribbble).'"><i class="fab fa-dribbble"></i></a>'; } ?>
                </div>
            </div>
        </div>


        <?php 
        echo $args['after_widget'];
 		ob_end_flush();
    }
 	
 	/**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
        $text = ! empty( $instance['text'] ) ? $instance['text'] : '';
        $image = ! empty( $instance['image'] ) ? $instance['image'] : '';

        $facebook = ! empty( $instance['facebook'] ) ? $instance['facebook'] : '';
        $twitter = ! empty( $instance['twitter'] ) ? $instance['twitter'] : '';
        $google = ! empty( $instance['google'] ) ? $instance['google'] : '';
        $linkedin = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : '';
        $pinterest = ! empty( $instance['pinterest'] ) ? $instance['pinterest'] : '';
        $instagram = ! empty( $instance['instagram'] ) ? $instance['instagram'] : '';
        $youtube = ! empty( $instance['youtube'] ) ? $instance['youtube'] : '';
        $dribbble = ! empty( $instance['dribbble'] ) ? $instance['dribbble'] : '';
    	?>
        <p>
            <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php echo esc_html__( 'Avatar:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_url( $image ); ?>" />
            <button class="upload_image_button button button-primary"><?php echo esc_html__( 'Upload Image' ); ?></button>
       </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Name:', 'engitech' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php echo esc_html__( 'Description:', 'engitech' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $text ); ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'facebook' ); ?>"><?php _e( 'Facebook URL:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'twitter' ); ?>"><?php _e( 'Twitter URL:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'google' ); ?>"><?php _e( 'Google Plus URL:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'google' ); ?>" name="<?php echo $this->get_field_name( 'google' ); ?>" type="text" value="<?php echo esc_attr( $google ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'dribbble' ); ?>"><?php _e( 'Dribbble URL:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" type="text" value="<?php echo esc_attr( $dribbble ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'linkedin' ); ?>"><?php _e( 'Linkedin URL:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>" />
        </p>        
        <p>
            <label for="<?php echo $this->get_field_name( 'pinterest' ); ?>"><?php _e( 'Pinterest URL:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" type="text" value="<?php echo esc_attr( $pinterest ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'instagram' ); ?>"><?php _e( 'Instagram URL:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" type="text" value="<?php echo esc_attr( $instagram ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'youtube' ); ?>"><?php _e( 'Youtube URL:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'fb_url' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" type="text" value="<?php echo esc_attr( $youtube ); ?>" />
        </p>        
        <?php
    }
 	
 	/**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['text'] = ( !empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';
        $instance['image'] = ( ! empty( $new_instance['image'] ) ) ? $new_instance['image'] : '';
        $instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? $new_instance['facebook'] : '';
        $instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? $new_instance['twitter'] : '';
        $instance['google'] = ( ! empty( $new_instance['google'] ) ) ? $new_instance['google'] : '';
        $instance['linkedin'] = ( ! empty( $new_instance['linkedin'] ) ) ? $new_instance['linkedin'] : '';
        $instance['pinterest'] = ( ! empty( $new_instance['pinterest'] ) ) ? $new_instance['pinterest'] : '';
        $instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? $new_instance['instagram'] : '';
        $instance['youtube'] = ( ! empty( $new_instance['youtube'] ) ) ? $new_instance['youtube'] : '';
        $instance['dribbble'] = ( ! empty( $new_instance['dribbble'] ) ) ? $new_instance['dribbble'] : '';
 
        return $instance;
    }  
 
}
add_action( 'widgets_init', 'engitech_author_register_widgets' );
function engitech_author_register_widgets() {
    register_widget( 'Engitech_Author_Widget' );
}