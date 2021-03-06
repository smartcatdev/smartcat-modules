<?php

class Smartcat_CTA_Widget extends WP_Widget {

    public function __construct() {

        parent::__construct(
            'smartcat-module-cta',
            __( 'Smartcat Call to Action', 'smartcat-modules' ),
            array(
                'classname'   => 'scmod-cta',
                'description' => __( 'Output a Call to Action (CTA) Module', 'smartcat-modules' ),
            )
        );

    }

    public function widget( $args, $instance ) { 

        if ( file_exists( get_template_directory() . '/smartcat-modules/views/CTA_Widget_View.php') ) : 
            include get_template_directory() . '/smartcat-modules/views/CTA_Widget_View.php' ;
        else :
            include SMARTCAT_MODULES_PATH . 'inc/modules/views/CTA_Widget_View.php';
        endif;
            
    }

    public function form( $instance ) {

        $widths = array(
            '3'     => '1/4',
            '4'     => '1/3',
            '6'     => '1/2',
            '12'    => __( 'Full', 'smartcat-modules' ),
        );
       
        // Set default values
        $instance = wp_parse_args( (array) $instance, array( 
            'scmod_cta_title'           => __( 'Call to Action', 'smartcat-modules'),
            'scmod_cta_widget_width'    => '12',
            'scmod_cta_detail'          => __( 'Detail Text', 'smartcat-modules'),
            'scmod_cta_btn_1_text'      => '',
            'scmod_cta_btn_1_url'       => '',
            'scmod_cta_btn_2_text'      => '',
            'scmod_cta_btn_2_url'       => '',
        ) );

        // Retrieve an existing value from the database
        $scmod_cta_title        = !empty( $instance['scmod_cta_title'] ) ? $instance['scmod_cta_title'] : '';
        $scmod_cta_widget_width = !empty( $instance['scmod_cta_widget_width'] ) ? $instance['scmod_cta_widget_width'] : '12';
        $scmod_cta_detail       = !empty( $instance['scmod_cta_detail'] ) ? $instance['scmod_cta_detail'] : '';
        $scmod_cta_btn_1_text   = !empty( $instance['scmod_cta_btn_1_text'] ) ? $instance['scmod_cta_btn_1_text'] : '';
        $scmod_cta_btn_1_url    = !empty( $instance['scmod_cta_btn_1_url'] ) ? $instance['scmod_cta_btn_1_url'] : '';
        $scmod_cta_btn_2_text   = !empty( $instance['scmod_cta_btn_2_text'] ) ? $instance['scmod_cta_btn_2_text'] : '';
        $scmod_cta_btn_2_url    = !empty( $instance['scmod_cta_btn_2_url'] ) ? $instance['scmod_cta_btn_2_url'] : '';
        
        // Title - Text
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'scmod_cta_title' ) . '" class="scmod_cta_title_label">' . __( 'Title', 'smartcat-modules' ) . '</label>';
        echo '	<input type="text" id="' . $this->get_field_id( 'scmod_cta_title' ) . '" name="' . $this->get_field_name( 'scmod_cta_title' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'smartcat-modules' ) . '" value="' . esc_attr( $scmod_cta_title ) . '">';
        echo '</p>';

        // Widget Width - Select/Option
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'scmod_cta_widget_width' ) . '" class="scmod_cta_widget_width_label">' . __( 'Widget Width', 'smartcat-modules' ) . '</label>';
        echo '	<select id="' . $this->get_field_id( 'scmod_cta_widget_width' ) . '" name="' . $this->get_field_name( 'scmod_cta_widget_width' ) . '" class="widefat">';
            foreach( $widths as $key => $value ) :
                echo '<option value="' . $key . '" ' . selected( $scmod_cta_widget_width, $key, false ) . '> ' . $value . '</option>';
            endforeach;
        echo '	</select>';
        echo '</p>';

        // Detail Text - TextArea
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'scmod_cta_detail' ) . '" class="scmod_cta_detail_label">' . __( 'Detail Text', 'smartcat-modules' ) . '</label>';
        echo '	<textarea id="' . $this->get_field_id( 'scmod_cta_detail' ) . '" name="' . $this->get_field_name( 'scmod_cta_detail' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'smartcat-modules' ) . '">' . $scmod_cta_detail . '</textarea>';
        echo '</p>';
        
        // Button 1 - Text
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'scmod_cta_btn_1_text' ) . '" class="scmod_cta_btn_1_text_label">' . __( 'Button 1 - Text', 'smartcat-modules' ) . '</label>';
        echo '	<input type="text" id="' . $this->get_field_id( 'scmod_cta_btn_1_text' ) . '" name="' . $this->get_field_name( 'scmod_cta_btn_1_text' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'smartcat-modules' ) . '" value="' . esc_attr( $scmod_cta_btn_1_text ) . '">';
        echo '</p>';
        
        // Button 1 - URL
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'scmod_cta_btn_1_url' ) . '" class="scmod_cta_btn_1_url_label">' . __( 'Button 1 - URL', 'smartcat-modules' ) . '</label>';
        echo '	<input type="url" id="' . $this->get_field_id( 'scmod_cta_btn_1_url' ) . '" name="' . $this->get_field_name( 'scmod_cta_btn_1_url' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'smartcat-modules' ) . '" value="' . esc_attr( $scmod_cta_btn_1_url ) . '">';
        echo '</p>';
        
        // Button 2 - Text
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'scmod_cta_btn_2_text' ) . '" class="scmod_cta_btn_2_text_label">' . __( 'Button 2 - Text', 'smartcat-modules' ) . '</label>';
        echo '	<input type="text" id="' . $this->get_field_id( 'scmod_cta_btn_2_text' ) . '" name="' . $this->get_field_name( 'scmod_cta_btn_2_text' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'smartcat-modules' ) . '" value="' . esc_attr( $scmod_cta_btn_2_text ) . '">';
        echo '</p>';
        
        // Button 2 - URL
        echo '<p>';
        echo '	<label for="' . $this->get_field_id( 'scmod_cta_btn_2_url' ) . '" class="scmod_cta_btn_2_url_label">' . __( 'Button 2 - URL', 'smartcat-modules' ) . '</label>';
        echo '	<input type="url" id="' . $this->get_field_id( 'scmod_cta_btn_2_url' ) . '" name="' . $this->get_field_name( 'scmod_cta_btn_2_url' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'smartcat-modules' ) . '" value="' . esc_attr( $scmod_cta_btn_2_url ) . '">';
        echo '</p>';
        
    }

    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['scmod_cta_title']        = !empty( $new_instance['scmod_cta_title'] ) ? strip_tags( $new_instance['scmod_cta_title'] ) : '';
        $instance['scmod_cta_widget_width'] = !empty( $new_instance['scmod_cta_widget_width'] ) ? strip_tags( $new_instance['scmod_cta_widget_width'] ) : '12';
        $instance['scmod_cta_detail']       = !empty( $new_instance['scmod_cta_detail'] ) ? $new_instance['scmod_cta_detail'] : '';
        $instance['scmod_cta_btn_1_text']   = !empty( $new_instance['scmod_cta_btn_1_text'] ) ? strip_tags( $new_instance['scmod_cta_btn_1_text'] ) : '';
        $instance['scmod_cta_btn_1_url']    = !empty( $new_instance['scmod_cta_btn_1_url'] ) ? strip_tags( $new_instance['scmod_cta_btn_1_url'] ) : '';
        $instance['scmod_cta_btn_2_text']   = !empty( $new_instance['scmod_cta_btn_2_text'] ) ? strip_tags( $new_instance['scmod_cta_btn_2_text'] ) : '';
        $instance['scmod_cta_btn_2_url']    = !empty( $new_instance['scmod_cta_btn_2_url'] ) ? strip_tags( $new_instance['scmod_cta_btn_2_url'] ) : '';

        return $instance;

    }

}