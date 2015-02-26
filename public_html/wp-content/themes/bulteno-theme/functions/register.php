<?php

$homepage = get_option( 'show_on_front');
$meta = get_post_custom_values("_wp_page_template",get_option( 'page_on_front'));
if($homepage == "page" && $meta[0] == "template-homepage.php") {$has_homepage=true;} else {$has_homepage=false;}

	
	
	
function register_my_menus() {
	if ( function_exists( 'register_nav_menus' ) ) {
		register_nav_menus(
			array( 
				'top-menu' => __( 'Top Menu', THEME_NAME ),
				'ot-menu-1' => __( 'Footer Menu (left)', THEME_NAME ),
				'ot-menu-2' => __( 'Footer Menu (middle)', THEME_NAME )
			)
		);
	}	
}
function create_gallery() {
		
	$labels = array(
    'name' => _x('Gallery', THEME_NAME.' menu'),
    'singular_name' => _x('Gallery Menu', THEME_NAME.' menu'),
    'add_new' => _x('Add New', THEME_NAME.' menu'),
    'add_new_item' => __('Add New Item', THEME_NAME),
    'edit_item' => __('Edit Item', THEME_NAME),
    'new_item' => __('New Gallery Item', THEME_NAME),
    'view_item' => __('View Item', THEME_NAME),
    'search_items' => __('Search Gallery Items', THEME_NAME),
    'not_found' =>  __('No gallery items found', THEME_NAME),
    'not_found_in_trash' => __('No gallery items found in Trash', THEME_NAME), 
    'parent_item_colon' => ''
	);
  
	register_taxonomy("gallery-cat", 
					    	array("Gallery Categories"), 
					    	array(	"hierarchical" => true, 
					    			"label" => "Gallery Categories", 
					    			"singular_label" => "Gallery Categories", 
					    			"rewrite" => true,
					    			"query_var" => true
					    		));  
		
		register_post_type( 'gallery',
		array( 'labels' => $labels,
	         'public' => true,  
	         'show_ui' => true,  
	         'capability_type' => 'post',  
	         'hierarchical' => false,  
			 'taxonomies' => array('gallery-cat'),
	         'supports' => array('title', 'editor', 'thumbnail', 'comments', 'page-attributes') ) );

}


function orange_register_sidebar($name, $id){
	register_sidebar(array('name'=>$name,
		'id' => $id,
		'before_widget' => '<div class="panel">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
	));
}


/* -------------------------------------------------------------------------*
 * 							DEFAULT SIDEBARS								*
 * -------------------------------------------------------------------------*/

$orange_sidebars=array(array('name'=>'Default Sidebar', 'id'=>'default'));	
	
$sidebar_strings = get_option(THEME_NAME.'_sidebar_names');
$generated_sidebars = explode("|*|", $sidebar_strings);
array_pop($generated_sidebars);
$orange_generated_sidebars=array();
	
foreach($generated_sidebars as $sidebar) {
	$orange_sidebars[]=array('name'=>$sidebar, 'id'=>convert_to_class($sidebar));
	$orange_generated_sidebars[]=array('name'=>$sidebar, 'id'=>convert_to_class($sidebar));
}
 
 /* -------------------------------------------------------------------------*
 * 							REGISTER ALL SIDEBARS
 * -------------------------------------------------------------------------*/

if (function_exists('register_sidebar')) {
	
	//register the sidebars
	foreach($orange_sidebars as $sidebar){
		orange_register_sidebar($sidebar['name'], $sidebar['id']);
	}
	
}
add_action('init', 'create_gallery');
add_action('init', 'register_my_menus' );
add_theme_support( 'post-thumbnails' );
?>