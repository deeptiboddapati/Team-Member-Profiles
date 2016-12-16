<?php 

/**
 * @package DB_Staff
 * @version 1.0
 */
/*
Plugin Name: Staff Showcase
Description: 
Author: Deepti Boddapati
Version: 1.0
Author URI: http://www.deeptiboddapati.com
*/

add_action( 'admin_enqueue_scripts', 'DB_staff_admin_scripts_and_styles', 999 );
function DB_staff_admin_scripts_and_styles(){

   wp_enqueue_style(
    'mod-admin',
    plugin_dir_url( __FILE__ ) . 'style.css'
    );


   wp_enqueue_script(
    'jquery-validate', 
    'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js', 
    ['jquery'],
    '1.15.1',
    'true'
    );

   wp_enqueue_script(
    'mod-admin',
    plugin_dir_url( __FILE__ ) . 'admin.js',
    ['jquery-validate'],
    null,
    'true'
    );


}
add_action( 'init', 'staffcpt' );
function staffcpt(){
    $labels= array('name' => 'Team Member');
    $args = array(
       'labels' => $labels,
       'supports' => array( 'title', 'editor', 'thumbnail' ),
       'show_ui'  => true,
       'show_in_menu' => true,
       'query_var'          => true,
       'public' => true
       );

    register_post_type('staff', $args);

    $labels = array(
       'name'                       => 'Department'
       );

    $args = array(
       'hierarchical'          => false,
       'labels'                => $labels,
       'show_ui'               => true,
       'show_admin_column'     => true,
       'update_count_callback' => '_update_post_term_count',
       'query_var'             => true,
       'rewrite'               => array( 'slug' => 'department' ),
       );


    register_taxonomy('department','staff',$args);
}
add_action( 'cmb2_admin_init', 'cmb2_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_sample_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_DB_staff';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'staff_details',
        'title'         => __( 'Team Member Details', 'cmb2' ),
        'object_types'  => array( 'staff', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
        ) );

   // Regular text field
    $cmb->add_field( array(
        'name'       => __( 'Position', 'cmb2' ),    
        'id'         => $prefix . 'position',
        'type'       => 'text',
        'sanitization_cb' => 'sanitize_text_field', // custom sanitization callback parameter
        'escape_cb'       => 'sanitize_text_field',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
        ) );

    // URL text field
    //escape_cb- cmb automatically passes entries in a url field to esc_url this is sufficent for displaying urls
    //sanitization cb- cmb automatically passes entries to esc url if no other sanitization cb is added
    $cmb->add_field( array(
        'name' => __( 'Twitter Profile URL', 'cmb2' ),
        'id'   => $prefix . 'twitter_url',
        'type' => 'text_url',
        'protocols' => array('http', 'https'), // Array of allowed protocols
        'repeatable' => false,
        'sanitization_cb' => 'DB_sanitize_social_media_url'
        ) );
        // URL text field
    $cmb->add_field( array(
        'name' => __( 'FaceBook Profile URL', 'cmb2' ),
        'id'   => $prefix . 'facebook_url',
        'type' => 'text_url',
        'protocols' => array('http', 'https'), // Array of allowed protocols
        'repeatable' => false,
        'sanitization_cb' => 'DB_sanitize_social_media_url'

        ) );
    

}

function DB_sanitize_social_media_url($value, $field_args, $field){

    if($field_args['id'] == '_DB_stafftwitter_url'){
        if(!preg_match("/twitter.com/i", $value)){
            return '';
        }   
    }
    else{
        if(!preg_match("/facebook.com/i", $value)){
            return '';
        }
    }

    return esc_url($value, array('http', 'https'));  
}

// add_filter( 'clean_url', 'DB_checking_esc_url',10,  3 );

function DB_checking_esc_url($good_protocol_url, $original_url, $_context){
    error_log( print_r( $original_url , true ) );
    
    // error_log( print_r( __FUNCTION__ , true ) );
    return $good_protocol_url;

}


// add_filter( 'esc_html', 'DB_check_esc_html_ran',10,  2 );
function DB_check_esc_html_ran( $safe_text, $text){
    error_log(print_r(__FUNCTION__.$text,true));
    return $safe_text;
}

// add_filter( 'sanitize_text_field', 'DB_check_sanitize_text_field_ran',10,  2 );
function DB_check_sanitize_text_field_ran( $safe_text, $text){
    error_log(print_r(__FUNCTION__.$text,true));
    return $safe_text;
}

function staff_query(){
     $args = array(
        'post_type' => 'staff', 
        'orderby' => 'title', 
        'order' => 'DESC',
        'posts_per_page' =>12
        );
     $query = new $WP_query($args);
}

?>