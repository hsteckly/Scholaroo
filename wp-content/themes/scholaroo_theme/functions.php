<?php


//  Custom Child Theme Functions
define('CHILDTHEME',basename(dirname(__FILE__)));

//Include responsive functions
include('responsive_functions.php');

//Remove unwanted Thematic items
function thematic_remove_actions()
{

remove_action('thematic_header','thematic_blogtitle',3);
remove_action('thematic_header','thematic_blogdescription',5);
remove_action('thematic_header','thematic_access',9);

}
add_action('init','thematic_remove_actions');

//Add main menu to header
function childtheme_override_blogtitle() { ?>


	<!-- Main Menu -->
	<div id="main-menu">

		<!-- Main Side inner -->
		  <!-- Logo -->
	      <a href="<?php echo get_home_url(); ?>">
	          <div class="logo">
	          </div>
	      </a>
	      
	      <!-- Main Menu -->
	      <ul class="top-menu">
	      	<?php wp_nav_menu( array('menu' => 'Main Menu','items_wrap' => '%3$s' )); ?>
	      </ul>
	      	      	             
	      <div class="clearfix"></div>
	     
	     <!-- End Main inner -->
	</div>
	<!-- End Main Menu -->	

	<!-- Mobile Menu -->
	<div class="mobile-menu">
		<a class="mobileLink nav-toggle" id="ml_1" href='javascript:void(0)'><span>MENU</span></a>
		<ul class="ml_1"><?php
			wp_nav_menu( array('menu' => 'Main Menu','items_wrap' => '%3$s' ));
		?></ul>
	    <div class="clearfix"></div>
	</div> 
	<!-- End Mobile Menu -->
<?php }

add_action('thematic_header','childtheme_override_blogtitle',3);


//Register Custom Post Types 		
add_action( 'init', 'create_post_type' );

function create_post_type() {
	
	//Initiate scholarships post type
	$labels = array(
	'name' => _x('Scholarships', 'post type general name'),
	'singular_name' => _x('Scholarship', 'post type singular name'),
	'add_new' => _x('Add Scholarship', 'Scholarship'),
	'add_new_item' => __('Add Scholarship'),
	'edit_item' => __('Edit Scholarship'),
	'new_item' => __('New Scholarship'),
	'all_items' => __('All Scholarships'),
	'view_item' => __('View Scholarships'),
	'search_items' => __('Search Scholarships'),
	'not_found' =>  __('No Scholarships found'),
	'not_found_in_trash' => __('No Scholarships found in Trash'), 
	'parent_item_colon' => '',
	'menu_name' => __('Scholarships')

	);
	$args = array(
	'labels' => $labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true, 
	'show_in_menu' => true, 
	'query_var' => true,
	'rewrite' => true,
	'capability_type' => 'post',
	'has_archive' => true, 
	'hierarchical' => false,
	'menu_position' => null,
	'supports' => array( 'title', 'thumbnail', 'revisions' )
	); 
	register_post_type('scholarships',$args);

	//Register Category taxonomy for Scholarships
	$labels = array(
		'name'              => _x( 'Scholarship Categories', 'Scholarship Categories' ),
		'singular_name'     => _x( 'Scholarship Category', 'Scholarship Category' ),
		'search_items'      => __( 'Search Scholarship Categories' ),
		'all_items'         => __( 'All Scholarship Categories' ),
		'parent_item'       => __( 'Parent Scholarship Category' ),
		'parent_item_colon' => __( 'Parent Scholarship Category:' ),
		'edit_item'         => __( 'Edit Scholarship Category' ),
		'update_item'       => __( 'Update Scholarship Category' ),
		'add_new_item'      => __( 'Add New Scholarship Category' ),
		'new_item_name'     => __( 'New Scholarship Category' ),
		'menu_name'         => __( 'Categories' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'category' ),
	);
	register_taxonomy( 'scholarship_category', 'scholarships', $args );

	//Initiate Virtual Course post type
	$labels = array(
	'name' => _x('Virtual Course', 'post type general name'),
	'singular_name' => _x('Virtual Course', 'post type singular name'),
	'add_new' => _x('Add Virtual Course', 'Virtual Course'),
	'add_new_item' => __('Add Virtual Course'),
	'edit_item' => __('Edit Virtual Course'),
	'new_item' => __('New Virtual Course'),
	'all_items' => __('All Virtual Courses'),
	'view_item' => __('View Virtual Courses'),
	'search_items' => __('Search Virtual Courses'),
	'not_found' =>  __('No Virtual Courses found'),
	'not_found_in_trash' => __('No Virtual Courses found in Trash'), 
	'parent_item_colon' => '',
	'menu_name' => __('Virtual Courses')

	);
	$args = array(
	'labels' => $labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true, 
	'show_in_menu' => true, 
	'query_var' => true,
	'rewrite' => true,
	'capability_type' => 'post',
	'has_archive' => true, 
	'hierarchical' => false,
	'menu_position' => null,
	'supports' => array( 'editor', 'title', 'thumbnail', 'revisions' )
	); 
	register_post_type('virtual_courses',$args);

	//Register Category taxonomy for Scholarships
	$labels = array(
		'name'              => _x( 'Virtual Course Categories', 'Virtual Course Categories' ),
		'singular_name'     => _x( 'Virtual Course Category', 'Virtual Course Category' ),
		'search_items'      => __( 'Search Course Categories' ),
		'all_items'         => __( 'All Course Categories' ),
		'parent_item'       => __( 'Parent Course Category' ),
		'parent_item_colon' => __( 'Parent Course Category:' ),
		'edit_item'         => __( 'Edit Course Category' ),
		'update_item'       => __( 'Update Course Category' ),
		'add_new_item'      => __( 'Add New Course Category' ),
		'new_item_name'     => __( 'New Course Category' ),
		'menu_name'         => __( 'Categories' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'courses-category' ),
	);
	register_taxonomy( 'course_category', 'virtual_courses', $args );
	
	
}

//Add FontAwesome to head
function childtheme_head_fontawesome() {
    $content = "<script defer src=\"https://use.fontawesome.com/releases/v5.0.7/js/all.js\"></script>";
    return $content;
}
add_filter('thematic_head_profile', 'childtheme_head_fontawesome', 13);


//Remove Author from archive page
function childtheme_override_postmeta_authorlink() {
	
}
add_action('thematic_abovepost','thematic_postmeta_authorlink');

//Remove pipes from archive page meta
function childtheme_override_postheader_postmeta(){

}
add_action('thematic_abovepost','thematic_postheader_postmeta');


//Enqueue typekit fonts into WordPress using wp_enqueue_scripts.
add_action( 'wp_enqueue_scripts', 'prefix_enqueue_scripts' );

function prefix_enqueue_scripts() {
	wp_enqueue_script( 'typekit', '//use.typekit.net/mfp3gxo.js', array(), '1.0.0' );
}

add_action( 'wp_head', 'prefix_typekit_inline' );

function prefix_typekit_inline() {
	if ( wp_script_is( 'typekit', 'enqueued' ) ) {
		echo '<script type="text/javascript">try{Typekit.load();}catch(e){}</script>';
	}
}


//Add responsive meta viewport
function thematic_meta_viewport() {
	$viewport_content = apply_filters( 'thematic_meta_viewport_content', 'width=device-width, initial-scale=1' ); 
	echo '<meta name="viewport" content="' . $viewport_content . '"/>';

}
add_action( 'thematic_header', 'thematic_meta_viewport', 9 );





//Load Javascript Theme plugins / controllers
add_action('wp_print_scripts','thematic_theme_scripts');

function thematic_theme_scripts()
{



	if(!is_admin())
	{
		
		// load the animated collapse script
		wp_register_script('animatedcollapse_jquery_plugin',get_bloginfo('stylesheet_directory').'/js/animatedcollapse.js');
		wp_enqueue_script('animatedcollapse_jquery_plugin');

		
		
		// load default theme controller file. 
		wp_register_script('relish_theme_controller',get_bloginfo('stylesheet_directory').'/js/theme.js');
		wp_enqueue_script('relish_theme_controller');

	
	}
}




?>