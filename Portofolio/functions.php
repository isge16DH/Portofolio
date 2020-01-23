<?php
	function load_stylesheet(){
		wp_register_style('bootstrap', get_template_directory_uri(). '/css/bootstrap.min.css',
			array(), false, 'all');
		wp_enqueue_style('bootstrap');

		wp_register_style('style', get_template_directory_uri(). '/style.css',
			array(), false, 'all');
		wp_enqueue_style('style');
	}
add_action('wp_enqueue_scripts', 'load_stylesheet');


function include_jquery(){
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', get_template_directoty_uri(). '/js/jquery-3.1.3.min.js', '', 1, true);

	add_action('wp_enqueue_script', 'jquery');
}
add_action('wp_enqueue_script', 'include_jquery');



function loadjs(){
	wp_register_script('customjs', get_template_directory_uri(). '/js/script.js', '', 1, true);
	wp_enqueue_script('customjs');
}
add_action('wp_enqueue_script', 'loadjs');



function add_project_type_taxonomy(){

	//set the name of the taxonomy
	$taxonomy = 'project_type';
	//set the post types for the taxonomy
	$object_type = 'project';


	//define arguments to be used
	$args = array(
		'label'             => "Project types",
		'hierarchical'      => true
	);

	//call the register_taxonomy function
	register_taxonomy($taxonomy, $object_type, $args);
}
add_action('init','add_project_type_taxonomy');


function add_project_skill_taxonomy(){

	//set the name of the taxonomy
	$taxonomy = 'project_skill';
	//set the post types for the taxonomy
	$object_type = 'project';


	//define arguments to be used
	$args = array(
		'label'             => "Project skills",
		'hierarchical'      => false
	);

	//call the register_taxonomy function
	register_taxonomy($taxonomy, $object_type, $args);
}
add_action('init','add_project_skill_taxonomy');


/*
 * Here it creates the custom post type "project".
 */
add_action( 'init', 'project_post_init' );

function project_post_init() {

	$labels = array(
		'name'               => ( 'Projects'),
		'singular_name'      => ( 'Project'),

	);

	$args = array(

		'labels'             => $labels,
		'public'             => true,
		'hierarchical'       => false,
		'menu_icon'          => 'dashicons-portfolio',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail')
	);

	register_post_type( 'project', $args );
}



/**
 * Add new menu
 */

register_nav_menus(
	array(
		'top-menu' =>__('Top Menu', 'theme'),
		'footer-menu' =>__('Footer Menu', 'theme')
	)
);

/**
 * Add new sidebars
 */

add_action( 'widgets_init', 'page_sidebar_widget' );
function page_sidebar_widget() {
	register_sidebar( array(
		'name' => 'Page sidebar',
		'id' => 'page-sidebar',
	) );
}

add_action( 'widgets_init', 'project_sidebar_widget' );
function project_sidebar_widget() {
	register_sidebar( array(
		'name' => 'Project sidebar',
		'id' => 'project-sidebar',
	) );
}


/*
 * Adds the following theme supports
 */
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support( 'post-formats' );

/**
 * Add custom image support
 */
add_image_size('smallest', 300, 300, true);
add_image_size('largest', 800, 800, true);
?>
