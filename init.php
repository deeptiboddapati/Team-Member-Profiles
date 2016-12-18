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
		plugin_dir_url( __FILE__ ) . 'admin-style.css'
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

add_action( 'wp_enqueue_scripts', 'DB_staff_scripts_and_styles', 999 );

function DB_staff_scripts_and_styles(){
	wp_enqueue_style(
		'DB-staff-style',
		plugin_dir_url( __FILE__ ) . 'style.css'
		);

	wp_enqueue_script('jquery');


	wp_enqueue_script(
		'DB-admin',
		plugin_dir_url( __FILE__ ) . 'staff-plugin.js',
		['jquery'],
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
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'team_member', $args );
	}
	add_action( 'init', 'DB_init_team_member_cpt', 0 );

}

if ( ! function_exists( 'DB_init_department_taxonomy' ) ) {

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


function DB_custom_team_profile_archive( $query ){
	if ( is_post_type_archive( 'team_member' ) && !is_admin()) {
	   $query->query_vars['posts_per_page'] = 12;
	   $query->query_vars['orderby'] = 'title';
	   $query->query_vars['order'] = 'DESC';
	   $query->query_vars['nopaging'] = true;  
	   DB_add_content_filters();

   }
}

function DB_add_content_filters(){
	add_filter( 'the_content', 'member_profile', 10, 1 );
	add_filter( 'the_title', 'DB_return_none', 10, 1 );
	add_filter( 'post_thumbnail_html', 'DB_return_none', 10, 2 );
}
function DB_remove_content_filters(){
	remove_filter( 'the_content', 'member_profile', 10);
	remove_filter( 'the_title', 'DB_return_none', 10);
	remove_filter( 'post_thumbnail_html', 'DB_return_none', 10);
}

function member_profile($value){
	DB_remove_content_filters();
	global $post;
	$post_meta = get_post_meta($post->ID);
	the_post_thumbnail('thumbnail');
	?>
	<h2 class='name'> <?php echo get_the_title(); ?></h2>
	<span class='position'><?php  echo $post_meta['_DB_staffposition'][0]; ?> </span>
	<div class='socialmedia'>
		<a href='<?php echo $post_meta['_DB_stafffacebook_url'][0]; ?>' target='_blank'>
			<img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAAAS1BMVEUAAAAsbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd3q/KZNAAAAGHRSTlMAAwQLDg8TISQ4VmJkdZqo0dPX4Obz+ftchJvYAAAAU0lEQVQYlcXNuxJAMBRF0RuvuATx3v//pRpMYlIYjd2d1RyRM9P6bZ2MhGUjAFmEjgR6mOuyiEx2cPIMaF4gV0sKhxR2Aaoq0KtWn95/R2ttfo8DCNUIykx8A1UAAAAASUVORK5CYII='>
		</a>
		<a href='<?php echo $post_meta['_DB_stafftwitter_url'][0]; ?>'>
			<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAAAq1BMVEUAAAAsst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst10n3wPAAAAOHRSTlMAAQIDBAUKDBAVHB4hKy0uOkFCQ0VGSk1PVFVZXWNkZoKSlZeYmpujrbW3vsPO0dfc3uDo7fX7/fqSCz0AAACNSURBVBgZncHZAoFAAAXQO1GRLUv2LWsRyXr//8tMM0SPnIO/CG+zagoUDcDxoBl7SqG/BjBgH8qMymVYBXpkYENKqI0BlCht65a4UjlDMkbMiSB1jnd+8yFZD+Z0kXKZYyMl3BM/Amghv5ShmTtmJsg4MbUl3gqNiNpcQBGtmC+HGjJmexHfknBawe+eUnMmRdtDuZoAAAAASUVORK5CYII=" alt="twitter icon">
		</a>
	</div>
	<button class='readmore'> READ MORE </button>
	<div class='description'>
		<?php the_content(); ?>
		<button class='readless'> READ LESS </button>

	</div>
	<?php
	DB_add_content_filters();
}

function DB_return_none($value, $id = null)
{
	return '';
}

add_action( 'pre_get_posts', 'DB_custom_team_profile_archive' );

add_action( 'cmb2_admin_init', 'DB_staff_plugin_metaboxes' );

function DB_staff_plugin_metaboxes() {

	$prefix = '_DB_staff_';

	$cmb = new_cmb2_box( array(
		'id'            => 'staff_details',
		'title'         => __( 'Team Member Details', 'DB_Team' ),
		'object_types'  => array( 'team_member', ), 
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		) );

	$cmb->add_field( array(
		'name'       => __( 'Position', 'DB_Team' ),    
		'id'         => $prefix . 'position',
		'type'       => 'text',
		'sanitization_cb' => 'sanitize_text_field', // custom sanitization callback parameter
		'escape_cb'       => 'sanitize_text_field',  // custom escaping callback parameter

		) );

	//escape_cb- cmb automatically passes entries in a url field to esc_url this is sufficent for displaying urls
	//sanitization cb- cmb automatically passes entries to esc url if no other sanitization cb is added
	$cmb->add_field( array(
		'name' => __( 'Twitter Profile URL', 'DB_Team' ),
		'id'   => $prefix . 'twitter_url',
		'type' => 'text_url',
		'protocols' => array('http', 'https'), 
		'repeatable' => false,
		'sanitization_cb' => 'DB_sanitize_social_media_url'
		) );
		// URL text field
	$cmb->add_field( array(
		'name' => __( 'FaceBook Profile URL', 'DB_Team' ),
		'id'   => $prefix . 'facebook_url',
		'type' => 'text_url',
		'protocols' => array('http', 'https'), 
		'repeatable' => false,
		'sanitization_cb' => 'DB_sanitize_social_media_url'

		) );
	

}



function DB_staff_page_template( $page_template_path ) {

	if ( is_post_type_archive( 'team_member' ) && !is_admin()  ) {
	 $page_template_path = plugin_dir_path(__FILE__).'team-member-template.php';
 	}
 
 	return $page_template_path;
}





?>