<?php
// Query for home page
function my_post_queries( $query ) {
	// do not alter the query on wp-admin pages and only alter it if it's the main query
	if (!is_admin() && $query->is_main_query()){

	    // alter the query for the home page
	    if( is_home() ){
			$query->set( 'posts_per_page', 12 );
			$query->set( 'post_type', array( 'shop_the_look', 'inspired_by', 'obsessing_over' ));
			$query->set( 'orderby', 'menu_order date' );
			$query->set( 'order', 'ASC' );
			$query->set( 'meta_query', array( 'relation' => 'OR', array( 'key' => 'make_sticky', 'value' => '1', 'compare' => 'NOT LIKE' ), array( 'key' => 'make_sticky', 'value' => '1', 'compare' => 'NOT EXISTS' ) ));
	    }
	}
}
add_action( 'pre_get_posts', 'my_post_queries' );

//remove theme support ==============================/
function twentyfourteen_child_setup() {

	remove_theme_support( 'custom-header' );
	remove_theme_support( 'custom-background' );

	register_nav_menus( array(
		'footer_menu'   => __( 'Footer menu for text pages', 'twentyfourteen-child' )
	));
}
add_action( 'after_setup_theme', 'twentyfourteen_child_setup', 11 );

// Thumbnails ==============================/
if ( function_exists( 'add_image_size' ) ) { 
	// Related Thumbnails
	add_image_size( 'related-thumb', 160, 160, true );

	// Similar Thumbs
	add_image_size( 'similar-thumb', 320, 160, false );

	// Topp Links Thumbnails
	add_image_size( 'topp-link-thumb', 240, 240, true );

	// Topp Post Page
	add_image_size( 'topp-link-post', 540, 488, true );

	// Shop the look
	add_image_size( 'shopp-the-look-thumb', 480, 480, true );
}

// Social ==============================/
if( !function_exists('jsps_custom_permalink_for_pinterest')) {
	function jsps_custom_permalink($url) {
		return 'http://www.pinterest.com/pin/create/button/?url=<?php echo $current_url; ?>&amp;media=<?php echo $imgUrl; ?>&amp;description=<?php the_title(); ?>%20%007C%20View%20From%20the%20Topp';
	}
}
add_filter('juiz_sps_the_shared_permalink_for_pinterest', 'jsps_custom_permalink_for_pinterest');

function load_jquery_file () {
    wp_enqueue_script( 'jquery' );
}

 add_action( 'wp_footer', 'load_jquery_file' );

// Enqueue Scripts ==============================/
function child_scripts() {

	// Remove Parents
	wp_dequeue_style('genericons');
	wp_dequeue_style('twentyfourteen-lato');
	wp_dequeue_style('twentyfourteen-style');
	wp_dequeue_style('twentyfourteen-ie');

	// Includes waypoints, waypoints sticky, waypoints infinite scroll
	wp_register_script(
    	'waypoints',
        get_stylesheet_directory_uri() . '/js/waypoints.min.js',
	    array( 'jquery' ),
    	'0.0.1',
    	true
	);

	wp_register_script(
    	'waypoints',
        get_stylesheet_directory_uri() . '/js/waypoints-infinite.min.js',
	    array( 'jquery' ),
    	'0.0.1',
    	true
	);

	wp_register_script(
    	'waypoints',
        get_stylesheet_directory_uri() . '/js/waypoints-sticky.min.js',
	    array( 'jquery' ),
    	'0.0.1',
    	true
	);

	wp_register_script(
    	'magnific-popup',
        get_stylesheet_directory_uri() . '/js/magnific-popup.min.js',
	    array( 'jquery' ),
    	'0.0.1',
    	true
	);

	wp_register_script(
    	'main',
        get_stylesheet_directory_uri() . '/js/main.js',
	    array( 'waypoints' ),
    	'0.0.1',
    	true
	);

	wp_enqueue_script( 'waypoints' );
	wp_enqueue_script( 'waypoints-infinite' );
	wp_enqueue_script( 'waypoints-sticky' );
	wp_enqueue_script( 'magnific-popup' );
	wp_enqueue_script( 'main' );

	if ( is_page( 139 ) || is_page_template( 'page-obsessing-over' ) || is_singular( 'obsessing_over' ) || is_post_type_archive( 'obsessing_over') || is_tax( 'obsessing_over' ) ) {
		
		wp_register_script(
	    	'obsessing-page',
	        get_stylesheet_directory_uri() . '/js/obsessing-page.js',
		    array( ),
	    	'0.0.1',
	    	true
		);

		wp_register_script(
	    	'isotope',
	        get_stylesheet_directory_uri() . '/js/isotope.js',
		    array(),
	    	'0.0.1',
	    	false
		);

		wp_enqueue_script( 'isotope' );
		wp_enqueue_script( 'obsessing-page' );

		wp_localize_script( 'obsessing-page', 'afp_vars', array(
        		'afp_nonce' => wp_create_nonce( 'afp_nonce' ),
        		'afp_ajax_url' => admin_url( 'admin-ajax.php' ),
    		)
  		);
	}

  	wp_localize_script( 'main', 'afp_vars', array(
        	'afp_nonce' => wp_create_nonce( 'afp_nonce' ),
        	'afp_ajax_url' => admin_url( 'admin-ajax.php' ),
    	)
  	);
}

add_action( 'wp_enqueue_scripts', 'child_scripts' );

$result = array();

// Obsessing Over Filtering ==============================/
function obsessing_filter() {
    $tax = 'obsessing_over_categories';
    $terms = get_terms( $tax, array (
			'orderby' => 'count',
			'order' => 'DESC',
			'hide_empty' => true,
			'number' => 12
	));
    $count = count( $terms );
 
    if ( $count > 0 ): ?>
        <section class="post-tags">
        	<?php
	        foreach ( $terms as $term ) {
	            $term_link = get_term_link( $term, $tax );
	            echo '<div><a href="' . $term_link . '" class="tax-filter" rel="obsessing_over_categories" title="' . $term->slug . '">' . $term->name . '</a></div>';
	    	} ?>
        </section>
    <?php endif;
}

function brands_filter() {
    $tax = 'brands';
    $terms = get_terms( $tax, array (
			'orderby' => 'count',
			'order' => 'DESC',
			'hide_empty' => true,
			'number' => 12
	));
    $count = count( $terms );
 
    if ( $count > 0 ): ?>
        <section class="post-tags">
        	<?php
	        foreach ( $terms as $term ) {
	            $term_link = get_term_link( $term, $tax );
	            echo '<div><a href="' . $term_link . '" class="tax-filter" rel="brands" title="' . $term->slug . '">' . $term->name . '</a></div>';
	    	} ?>
        </section>
    <?php endif;
}

// Script for getting Obsessing Over posts
function ajax_obsessing_posts() {
 
	// Verify nonce
	if( !isset( $_POST['afp_nonce'] ) || !wp_verify_nonce( $_POST['afp_nonce'], 'afp_nonce' ) )
    die('Permission denied');

	$term = $_POST['term'];
	$taxcat = $_POST['taxcat'];

	$args = array(
		'post_type' => 'obsessing_over',
		'tax_query' => array(
			array(
				'taxonomy' => $taxcat,
				'field' => 'slug',
				'terms' => $term
			)
		)
	);

	$obsessingQuery = new WP_Query( $args );

	if ( $obsessingQuery->have_posts() ) : while ( $obsessingQuery->have_posts() ) : $obsessingQuery->the_post();

		$imgUrl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		$current_url = home_url(add_query_arg(array(),$wp->request));

		$terms = get_the_terms( $post->ID, 'brands' );
		
		foreach ( $terms as $term ) {
	        $term_name = $term->name;
    	}; 

	    $result['response'][] = '<article class="item item-filter">' . get_the_post_thumbnail( $post->ID, "featured-image" ) . '<div class="post-tags"><span class="border-bottom">' . $term_name . '</span><h3>' . get_the_title() . '</h3><a href="'. get_field( "source" ) . '" class="look-link">SHOP <img src="/wp-content/themes/twentyfourteen-child/img/arrow.svg" style="width:8px;" /></a></div><a href="http://www.pinterest.com/pin/create/button/?url=' . $current_url . '&amp;media=' . $imgUrl . '&amp;description=' . get_the_title() . '%20%007C%20View%20From%20the%20Topp" class="pinterest-pin" target="_blank"></a><a href="' . $imgUrl . '" class="zoom"></a></article><script>jQuery(".zoom").magnificPopup({ type: "image", closeOnContentClick: true, image: { verticalFit: false }});</script>';
	    $result['status']     = 'success';

	endwhile; else:
    	$result['response'] = '<h2>No posts found</h2>';
    	$result['status']   = '404';
	endif;
 
	$result = json_encode($result);
	echo $result;

	die();
}
add_action('wp_ajax_obsessing_posts', 'ajax_obsessing_posts');
add_action('wp_ajax_nopriv_obsessing_posts', 'ajax_obsessing_posts');

// Press Post Query ==============================/
function ajax_press_posts() {
 
	// Verify nonce
	if( !isset( $_POST['afp_nonce'] ) || !wp_verify_nonce( $_POST['afp_nonce'], 'afp_nonce' ) )
    die('Permission denied');

	$offset = $_POST['offset'];

	// WP Query
	$args = array(
		'post_type' => 'press',
		'posts_per_page' => 6,
		'offset' => $offset
	);

	$pressQuery = new WP_Query( $args );

	if ( $pressQuery->have_posts() ) : while ( $pressQuery->have_posts() ) : $pressQuery->the_post();

	    $result['response'][] = '<div class="span6 press-post"><div class="press-thumb">' . get_the_post_thumbnail( $post->ID, "similar-thumb" ) . '</div><p>' . get_the_title() . '</p><a href="'. get_field( "source" ) . '" class="look-link">VIEW POST <img src="/wp-content/themes/twentyfourteen-child/img/arrow.svg" style="width:8px;" /></a></div>';
	    $result['status']     = 'success';

	endwhile; else:
    	$result['response'] = '<h2>No posts found</h2>';
    	$result['status']   = '404';
	endif;
 
	$result = json_encode($result);
	echo $result;

	die();
}
add_action('wp_ajax_press_posts', 'ajax_press_posts');
add_action('wp_ajax_nopriv_press_posts', 'ajax_press_posts');

// Friends Post Query ==============================/
function ajax_friends_posts() {
 
	// Verify nonce
	if( !isset( $_POST['afp_nonce'] ) || !wp_verify_nonce( $_POST['afp_nonce'], 'afp_nonce' ) )
    die('Permission denied');

	$offset = $_POST['offset'];

	// WP Query
	$friendsArgs = array(
		'post_type' => 'friends',
		'posts_per_page' => 6,
		'offset' => $offset
	);

	$friendsQuery = new WP_Query( $friendsArgs );

	if ( $friendsQuery->have_posts() ) : while ( $friendsQuery->have_posts() ) : $friendsQuery->the_post();

	    $result['response'][] = '<div class="span6 friends-post"><div class="friends-img-wrap">' . get_the_post_thumbnail( $post->ID, "topp-link-thumb" ) . '</div><h3>' . get_the_title() . '</h3><a href="'. get_field( "source" ) . '" class="look-link" target="_blank">VISIT WEBSITE <img src="/wp-content/themes/twentyfourteen-child/img/arrow.svg" style="width:12px;" /></a></div>';
	    $result['status']     = 'success';

	endwhile; else:
    	$result['response'] = '<h2>No posts found</h2>';
    	$result['status']   = '404';
	endif;
 
	$result = json_encode($result);
	echo $result;

	die();
}
add_action('wp_ajax_friends_posts', 'ajax_friends_posts');
add_action('wp_ajax_nopriv_friends_posts', 'ajax_friends_posts');

// Custom Post Types ==============================/
add_action( 'init', 'custom_posttype' );

function custom_posttype() {
	
	register_post_type( 'shop_the_look', array(
		'labels' => array(
			'name' => __( 'Shopp The Look' ),
			'singular_name' => __( 'Look' )
		),
		'public' => true,
		'has_archive' => true,
		'menu_position' => 5,
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'custom-fields',
			'revisions',
			'comments'
		),
		'taxonomies' => array(
			'topp_tags'
		)
	));

	register_post_type( 'inspired_by', array(
		'labels' => array(
			'name' => __( 'Inspirations' ),
			'singular_name' => __( 'Inspiration' )
		),
		'public' => true,
		'has_archive' => true,
		'menu_position' => 5,
		'supports' => array(
			'title',
			'thumbnail',
			'page-attributes'
		),
		'taxonomies' => array(
			'inspired_by_category'
		)
	));

	register_post_type( 'obsessing_over', array(
		'labels' => array(
			'name' => __( 'Obsessions' ),
			'singular_name' => __( 'Obsession' )
		),
		'public' => true,
		'has_archive' => true,
		'menu_position' => 5,
		'supports' => array(
			'title',
			'thumbnail',
		),
		'taxonomies' => array(
			'obsessing_over_categories',
			'brands'
		)
	));

	register_post_type( 'topp_links', array(
		'labels' => array(
			'name' => __( 'Topp Links' ),
			'singular_name' => __( 'Topp Links' )
		),
		'public' => true,
		'has_archive' => true,
		'menu_position' => 5,
		'supports' => array(
			'title',
			'thumbnail',
		),
		'taxonomies' => array(
			'topp_links_source'
		)
	));

	register_post_type( 'similar_items', array(
		'labels' => array(
			'name' => __( 'Similar Items' ),
			'singular_name' => __( 'Similar Item' )
		),
		'public' => true,
		'has_archive' => true,
		'menu_position' => 5,
		'supports' => array(
			'title',
			'thumbnail',
		)
	));

	register_post_type( 'press', array(
		'labels' => array(
			'name' => __( 'Press' ),
			'singular_name' => __( 'Press_Post' )
		),
		'public' => true,
		'has_archive' => true,
		'menu_position' => 5,
		'supports' => array(
			'title',
			'thumbnail',
		)
	));;

	register_post_type( 'friends', array(
		'labels' => array(
			'name' => __( 'Friends' ),
			'singular_name' => __( 'Friend' )
		),
		'public' => true,
		'has_archive' => true,
		'menu_position' => 5,
		'supports' => array(
			'title',
			'thumbnail',
		)
	));
};

// Custom Taxonomy For Shop The Look Post Type ==============================/
// The Hook
add_action( 'init', 'create_shop_the_look_taxonomy' );

function create_shop_the_look_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Topp Tags', 'taxonomy general name' ),
		'singular_name'              => _x( 'Topp Tag', 'taxonomy singular name' ),
		'search_items'               => __( 'Search Topp Tags' ),
		'popular_items'              => __( 'Top Topp Tags' ),
		'all_items'                  => __( 'All Topp Tags' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Topp Tag' ),
		'update_item'                => __( 'Update Topp Tag' ),
		'add_new_item'               => __( 'Add New Topp Tag' ),
		'new_item_name'              => __( 'New Topp Tag Name' ),
		'separate_items_with_commas' => __( 'Separate tags with commas' ),
		'add_or_remove_items'        => __( 'Add or remove topp tags' ),
		'choose_from_most_used'      => __( 'Choose from the most used topp tags' ),
		'not_found'                  => __( 'No tags found.' ),
		'menu_name'                  => __( 'Topp Tags' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'topp_tags' ),
	);

	register_taxonomy( 'topp_tags', 'shop_the_look', $args );
}

// Custom Taxonomy For Obsessing Over Brands ==============================/
add_action( 'init', 'brands_taxonomy' );

function brands_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Brands', 'taxonomy general name' ),
		'singular_name'              => _x( 'Brand', 'taxonomy singular name' ),
		'all_items'                  => __( 'All Brands' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Brand' ),
		'update_item'                => __( 'Update Brand' ),
		'add_new_item'               => __( 'Add New Brand' ),
		'new_item_name'              => __( 'New Brand' ),
		'menu_name'                  => __( 'Brands' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'obsessing_over_brands' ),
	);

	register_taxonomy( 'brands', 'obsessing_over', $args );
}

// Custom Taxonomy For Obsessing  ==============================/
add_action( 'init', 'brands_cat_taxonomy' );

function brands_cat_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Obessing Over Categories', 'taxonomy general name' ),
		'singular_name'              => _x( 'Obessing Over Category', 'taxonomy singular name' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Category' ),
		'update_item'                => __( 'Update Category' ),
		'add_new_item'               => __( 'Add New Category' ),
		'new_item_name'              => __( 'New Category' ),
		'menu_name'                  => __( 'Categories' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'obsessing_over_categories' ),
	);

	register_taxonomy( 'obsessing_over_categories', 'obsessing_over', $args );
}

// Custom Taxonomy For Inspired By  ==============================/
add_action( 'init', 'inspired_by_category' );

function inspired_by_category() {

	$labels = array(
		'name'                       => _x( 'Inspired By Categories', 'taxonomy general name' ),
		'singular_name'              => _x( 'Inspired By Category', 'taxonomy singular name' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Category' ),
		'update_item'                => __( 'Update Category' ),
		'add_new_item'               => __( 'Add New Category' ),
		'new_item_name'              => __( 'New Category' ),
		'menu_name'                  => __( 'Categories' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'inspired_by_category' ),
	);

	register_taxonomy( 'inspired_by_category', 'inspired_by', $args );
}

// Custom Taxonomy For Topp Links  ==============================/
add_action( 'init', 'topp_links_source' );

function topp_links_source() {

	$labels = array(
		'name'                       => _x( 'Topp Loves Sources', 'taxonomy general name' ),
		'singular_name'              => _x( 'Topp Love Source', 'taxonomy singular name' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Source' ),
		'update_item'                => __( 'Update Source' ),
		'add_new_item'               => __( 'Add New Source' ),
		'new_item_name'              => __( 'New Source' ),
		'menu_name'                  => __( 'Sources' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
	);

	register_taxonomy( 'topp_links_source', 'topp_links', $args );
}

function add_new_menu_order_column($menu_order_columns) {
	$menu_order_columns['menu_order'] = "Order";
  	return $menu_order_columns;
}
add_action('manage_edit-shop_the_look_columns', 'add_new_menu_order_column');
add_action('manage_edit-inspired_by_columns', 'add_new_menu_order_column');
add_action('manage_edit-obsessing_over_columns', 'add_new_menu_order_column');

function show_order_column($name){

  	global $post;

  	switch ($name) {
    	case 'menu_order':
      	$order = $post->menu_order;
      	echo $order;
      	break;
   	default:
    	break;
   	}

}
add_action('manage_shop_the_look_posts_custom_column','show_order_column');
add_action('manage_inspired_by_posts_custom_column','show_order_column');
add_action('manage_obsessing_over_posts_custom_column','show_order_column');

function order_column_register_sortable ( $columns ){
  $columns['menu_order'] = 'menu_order';
  return $columns;
}
add_filter('manage_edit-shop_the_look_sortable_columns','order_column_register_sortable');
add_filter('manage_edit-inspired_by_sortable_columns','order_column_register_sortable');
add_filter('manage_edit-obsessing_over_sortable_columns','order_column_register_sortable');