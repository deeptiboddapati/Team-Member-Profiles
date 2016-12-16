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
    'DB-admin',
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
    'DB-admin',
    plugin_dir_url( __FILE__ ) . 'admin.js',
    ['jquery-validate'],
    null,
    'true'
    );


}

if ( ! function_exists('DB_init_team_member_cpt') ) {


function DB_init_team_member_cpt() {

    $labels = array(
        'name'                  => _x( 'Team Members', 'Post Type General Name', 'DB_Team' ),
        'singular_name'         => _x( 'Team Member', 'Post Type Singular Name', 'DB_Team' ),
        'menu_name'             => __( 'Team Member Profiles', 'DB_Team' ),
        'name_admin_bar'        => __( 'Team Member Profile', 'DB_Team' ),
        'archives'              => __( 'Team Member Profile Archives', 'DB_Team' ),
        'attributes'            => __( 'Team Member Profile Attributes', 'DB_Team' ),
        'parent_item_colon'     => __( 'Parent Team Member Profile:', 'DB_Team' ),
        'all_items'             => __( 'All Team Member Profiles', 'DB_Team' ),
        'add_new_item'          => __( 'Add New Team Member Profile', 'DB_Team' ),
        'add_new'               => __( 'Add New Team Member Profile', 'DB_Team' ),
        'new_item'              => __( 'New Team Member Profile', 'DB_Team' ),
        'edit_item'             => __( 'Edit Team Member Profile', 'DB_Team' ),
        'update_item'           => __( 'Update Team Member Profile', 'DB_Team' ),
        'view_item'             => __( 'View Team Member Profile', 'DB_Team' ),
        'view_items'            => __( 'View Team Member Profiles', 'DB_Team' ),
        'search_items'          => __( 'Search Team Member Profiles', 'DB_Team' ),
        'not_found'             => __( 'Team Member Profile Not found', 'DB_Team' ),
        'not_found_in_trash'    => __( 'Team Member Profile Not found in Trash', 'DB_Team' ),
        'featured_image'        => __( 'Team Member Profile Image', 'DB_Team' ),
        'set_featured_image'    => __( 'Set Team Member Profile image', 'DB_Team' ),
        'remove_featured_image' => __( 'Remove Team Member Profile image', 'DB_Team' ),
        'use_featured_image'    => __( 'Use as Team Member Profile image', 'DB_Team' ),
        'insert_into_item'      => __( 'Insert into Team Member Profile', 'DB_Team' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Team Member Profile', 'DB_Team' ),
        'items_list'            => __( 'Team Member Profiles list', 'DB_Team' ),
        'items_list_navigation' => __( 'Team Member Profiles list navigation', 'DB_Team' ),
        'filter_items_list'     => __( 'Filter Team Member Profiles list', 'DB_Team' ),
    );
    $args = array(
        'label'                 => __( 'Team Member', 'DB_Team' ),
        'description'           => __( 'Team Member Profiles', 'DB_Team' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', ),
        'taxonomies'            => array( 'department' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-businessman',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'team',
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'team_member', $args );

}
add_action( 'init', 'DB_init_team_member_cpt', 0 );

}

if ( ! function_exists( 'DB_init_department_taxonomy' ) ) {

// Register Custom Taxonomy
function DB_init_department_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Departments', 'Taxonomy General Name', 'DB_Team' ),
        'singular_name'              => _x( 'Department', 'Taxonomy Singular Name', 'DB_Team' ),
        'menu_name'                  => __( 'Department', 'DB_Team' ),
        'all_items'                  => __( 'All Departments', 'DB_Team' ),
        'parent_item'                => __( 'Parent Department', 'DB_Team' ),
        'parent_item_colon'          => __( 'Parent Department:', 'DB_Team' ),
        'new_item_name'              => __( 'New Department Name', 'DB_Team' ),
        'add_new_item'               => __( 'Add Department Item', 'DB_Team' ),
        'edit_item'                  => __( 'Edit Department', 'DB_Team' ),
        'update_item'                => __( 'Update Department', 'DB_Team' ),
        'view_item'                  => __( 'View Department', 'DB_Team' ),
        'separate_items_with_commas' => __( 'Separate Departments with commas', 'DB_Team' ),
        'add_or_remove_items'        => __( 'Add or remove Departments', 'DB_Team' ),
        'choose_from_most_used'      => __( 'Choose from the most used departments', 'DB_Team' ),
        'popular_items'              => __( 'Popular Departments', 'DB_Team' ),
        'search_items'               => __( 'Search Departments', 'DB_Team' ),
        'not_found'                  => __( 'Department Not Found', 'DB_Team' ),
        'no_terms'                   => __( 'No Departments', 'DB_Team' ),
        'items_list'                 => __( 'Departments list', 'DB_Team' ),
        'items_list_navigation'      => __( 'Departments list navigation', 'DB_Team' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
    );
    register_taxonomy( 'department', array( 'team_member' ), $args );

}
add_action( 'init', 'DB_init_department_taxonomy', 0 );

}


function DB_change_title_text( $title ){
     $screen = get_current_screen();
 
     if  ( 'team_member' == $screen->post_type ) {
          $title = 'Enter Team Member Name';
     }
 
     return $title;
}

add_filter( 'enter_title_here', 'DB_change_title_text' );

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

function team_member_query(){
     $args = array(
        'post_type' => 'team_member', 
        'orderby' => 'title', 
        'order' => 'DESC',
        'posts_per_page' =>12
        );
     $query = new $WP_query($args);
}

?>