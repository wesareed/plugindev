<?php
/*
Plugin Name: Plugin Dev 101
Plugin URI: https://wesreed.co
Description: An intro to plugin development
Version: 1.0
Author: Wes Reed
Author URI: https://wesreed.co
*/


// Test to see if plugin is running

//function pd101_test() {
//	echo 'This plugin is running';
//	exit;
//}
//add_action('admin_init', 'pd101_test');




//Replace Content Filter Hook
function pd101_replace_content ( $content ) {
	$content = str_replace('Vestibulum id ligula porta felis euismod semper.', 'Black Power is Mental!', $content);

	return $content;
}
add_filter('the_content', 'pd101_replace_content');




//Action Hook
//function pd101_display_post_id( $post_id ) {
//	echo 'We saved Post ID: ' . $post_id;
//	exit;
//}
//add_action( 'save_post', 'pd101_display_post_id' );




//Register Custom Post Type
function pd101_register_book_post_type() {
	$labels = array(
		'name'               => _x( 'Books', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Book', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Books', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'book', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Book', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Book', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Book', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Book', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Books', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Books', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Books:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No books found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No books found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'book' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-book-alt',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'book', $args );

}
add_action( 'init', 'pd101_register_book_post_type' );


//Add custom shortcode
function pd101_message_shortcode( $atts ) {

	//Sets default shortcode attributes
	$atts = shortcode_atts(
		array(
			'color' => 'blue',
			'text'  => 'Text message'
		),
		$atts
	);

	//Allow custom shortcode attributes
	return '<div class="message ' . esc_attr( $atts['color'] ) . '">' . esc_html( $atts['text'] ) . '</div>';
}
add_shortcode( 'message', 'pd101_message_shortcode' );



function pd101_load_styles() {
	wp_enqueue_style( 'pd101-styles', plugins_url( 'pd101-styles.css', __FILE__) );
	wp_enqueue_script( 'pd101-scripts', plugins_url( 'pd101-scripts.js', __FILE__), array('jquery'), '1.0');
}
add_action( 'wp_enqueue_scripts', 'pd101_load_styles' );