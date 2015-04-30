<?php
/*
  Plugin Name: WP Creative Portfolio
  Plugin URI: http://www.e2soft.com/blog/wp-creative-portfolio/
  Description: WordPress Portfolio Plugin is a wordpress portfolio plugin. Use this shortcode <strong>[CREATIVE-PORTFOLIO]</strong> in the post/page" where you want to display slider.
  Version: 1.1
  Author: S M Hasibul Islam
  Author URI: http://www.e2soft.com
  Copyright: 2015 S M Hasibul Islam http:/`/www.e2soft.com
  License URI: license.txt
 */


#######################	eWP Portfolio Plugin ###############################

if ( ! function_exists('creative_register_portfolio_post') ) {
// Register Custom Post Type
function creative_register_portfolio_post() {

	$labels = array(
		'name'                => _x( 'Portfolios', 'Post Type General Name', 'e_portfolio' ),
		'singular_name'       => _x( 'Portfolio', 'Post Type Singular Name', 'e_portfolio' ),
		'menu_name'           => __( 'Portfolio', 'e_portfolio' ),
		'parent_item_colon'   => __( 'Parent Portfolio:', 'e_portfolio' ),
		'all_items'           => __( 'All Portfolios', 'e_portfolio' ),
		'view_item'           => __( 'View Portfolio', 'e_portfolio' ),
		'add_new_item'        => __( 'Add New Portfolio', 'e_portfolio' ),
		'add_new'             => __( 'Add New', 'e_portfolio' ),
		'edit_item'           => __( 'Edit Portfolio', 'e_portfolio' ),
		'update_item'         => __( 'Update Portfolio', 'e_portfolio' ),
		'search_items'        => __( 'Search Portfolio', 'e_portfolio' ),
		'not_found'           => __( 'Not found', 'e_portfolio' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'e_portfolio' ),
	);
	$args = array(
		'label'               => __( 'portfolio', 'e_portfolio' ),
		'description'         => __( 'Portfolio Description', 'e_portfolio' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'portfolio', $args );
}
// Hook into the 'init' action
add_action( 'init', 'creative_register_portfolio_post', 0 );
}

// Register Custom Taxonomy
function creative_portfolio_category_rgister() {

	$labels = array(
		'name'                       => _x( 'Portfolios', 'Taxonomy General Name', 'e_portfolio' ),
		'singular_name'              => _x( 'Portfolio', 'Taxonomy Singular Name', 'e_portfolio' ),
		'menu_name'                  => __( 'Portfolio Category', 'e_portfolio' ),
		'all_items'                  => __( 'All Portfolios', 'e_portfolio' ),
		'parent_item'                => __( 'Parent Portfolio', 'e_portfolio' ),
		'parent_item_colon'          => __( 'Parent Portfolio:', 'e_portfolio' ),
		'new_item_name'              => __( 'New Portfolio Name', 'e_portfolio' ),
		'add_new_item'               => __( 'Add New Portfolio', 'e_portfolio' ),
		'edit_item'                  => __( 'Edit Portfolio', 'e_portfolio' ),
		'update_item'                => __( 'Update Portfolio', 'e_portfolio' ),
		'separate_items_with_commas' => __( 'Separate portfolios with commas', 'e_portfolio' ),
		'search_items'               => __( 'Search portfolios', 'e_portfolio' ),
		'add_or_remove_items'        => __( 'Add or remove portfolios', 'e_portfolio' ),
		'choose_from_most_used'      => __( 'Choose from the most used portfolios', 'e_portfolio' ),
		'not_found'                  => __( 'Not Found', 'e_portfolio' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );
}
// Hook into the 'init' action
add_action( 'init', 'creative_portfolio_category_rgister', 0 );

// Register Custom Taxonomy
function creative_portfolio_skills_rgister() {

	$labels = array(
		'name'                       => _x( 'Technologies', 'Taxonomy General Name', 'e_portfolio' ),
		'singular_name'              => _x( 'Technology', 'Taxonomy Singular Name', 'e_portfolio' ),
		'menu_name'                  => __( 'Technologies', 'e_portfolio' ),
		'all_items'                  => __( 'All Technologies', 'e_portfolio' ),
		'parent_item'                => __( 'Parent Technology', 'e_portfolio' ),
		'parent_item_colon'          => __( 'Parent Technology:', 'e_portfolio' ),
		'new_item_name'              => __( 'New Technology Name', 'e_portfolio' ),
		'add_new_item'               => __( 'Add New Technology', 'e_portfolio' ),
		'edit_item'                  => __( 'Edit Technology', 'e_portfolio' ),
		'update_item'                => __( 'Update Technology', 'e_portfolio' ),
		'separate_items_with_commas' => __( 'Separate technologies with commas', 'e_portfolio' ),
		'search_items'               => __( 'Search technologies', 'e_portfolio' ),
		'add_or_remove_items'        => __( 'Add or remove technologies', 'e_portfolio' ),
		'choose_from_most_used'      => __( 'Choose from the most used technologies', 'e_portfolio' ),
		'not_found'                  => __( 'Not Found', 'e_portfolio' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'technology', array( 'portfolio' ), $args );
}
// Hook into the 'init' action
add_action( 'init', 'creative_portfolio_skills_rgister', 0 );

// Register Script
function e_portfolio_scripts() {
    wp_enqueue_script('contentcarousel', plugins_url('/js/contentcarousel.js', __FILE__), array('jquery'), true);
	wp_enqueue_script('easing', plugins_url('/js/easing.js', __FILE__), array('jquery'), true);
	wp_enqueue_script('mousewheel', plugins_url('/js/mousewheel.js', __FILE__), array('jquery'), true);
    wp_enqueue_style('jscrollpane', plugins_url('/css/jscrollpane.css', __FILE__));
	wp_enqueue_style('wpts-style', plugins_url('/css/wpts-style.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'e_portfolio_scripts');

// Register Admin Script
function e_portfolio_scripts_admin() {
    wp_enqueue_style('wpts-admin', plugins_url('/css/wpts-admin.css', __FILE__));
	wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'iris', admin_url( 'js/iris.min.js' ), array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ), false, 1 );
	wp_enqueue_script( 'cp-active', plugins_url('/js/cp-active.js', __FILE__), array('jquery'), '', true );
}
add_action('admin_enqueue_scripts', 'e_portfolio_scripts_admin');

function e_portfolio_content(){ 
	echo '<div id="ca-container" class="ca-container"><div class="ca-wrapper">';
	// WP_Query arguments
	$args = array (
		'post_type'              => 'portfolio',
		'post_status'            => 'publish',
	);
	// The Query
	$e_query = new WP_Query( $args );
	// The Loop
	if ( $e_query->have_posts() ) {
		while ( $e_query->have_posts() ) {
			$e_query->the_post(); ?>
        <div class="ca-item">
        <div class="ca-item-main">
        <?php $ewp_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true ); ?>
        <img src="<?php echo $ewp_img[0]; ?>" alt="<?php the_title(); ?>">
        <h3><?php the_title(); ?></h3>
        <p><span><?php echo excerpt(10); ?></span></p>
        <div class="ca-more-wrap"><a class="ca-more" href="<?php the_permalink(); ?>">More...</a></div>
        </div>
        <div class="ca-content-wrapper">
        <div class="ca-content">
        <a href="#" class="ca-close">Close</a>
        <div class="ca-content-text">
        <?php echo content(100); ?>
        <br />
        <a class="more-link" href="<?php the_permalink(); ?>">More...</a>
        </div>
        <ul>
        <?php 
		$portfolio_categories = get_terms('portfolio_category');
		foreach($portfolio_categories as $portfolio_category){
			echo '<li><a href="' .$portfolio_category->slug. '">' .$portfolio_category->name. '</a></li>';
		}
		?>
        </ul>
        </div>
        </div>
        </div>
        
        	<?php
		}
	} else {
		echo 'No posts found';
	}
	// Restore original Post Data
	wp_reset_query();
	echo '</div></div>';
 }

//Portfolio Slide Script
function e_portfolio_slide_script() {
    ?>
    <script type="text/javascript">
		jQuery('#ca-container').contentcarousel({
			sliderSpeed     : 500,
			sliderEasing    : 'easeOutExpo',
			itemSpeed       : 500,
			itemEasing      : 'easeOutExpo',
			scroll          : 3
		});
	</script>
    <?php
}
add_action('wp_footer', 'e_portfolio_slide_script', 100);

//Add Shortcode
function e_portfolio_content_exist() {
    return e_portfolio_content();
}
add_shortcode('CREATIVE-PORTFOLIO', 'e_portfolio_content_exist');

//Include PHP files
foreach ( glob( plugin_dir_path( __FILE__ )."lib/*.php" ) as $e_file )
    include_once $e_file;
	
// Page Redirect
register_activation_hook(__FILE__, 'ewp_plugin_activate');
add_action('admin_init', 'ewp_plugin_redirect');

function ewp_plugin_activate() {
    add_option('ewp_plugin_do_activation_redirect', true);
}

function ewp_plugin_redirect() {
    if (get_option('ewp_plugin_do_activation_redirect', false)) {
        delete_option('ewp_plugin_do_activation_redirect');
        if(!isset($_GET['activate-multi']))
        {
            wp_redirect("edit.php?post_type=portfolio&page=portfolio");
        }
    }
}

// Custom Excerpt 
function excerpt($limit) {
	$post_type = get_post_type( get_the_ID() );
	if ( $post_type == 'portfolio' ) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
		} else {
		$excerpt = implode(" ",$excerpt);
		} 
		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		return $excerpt;
	}else { return the_excerpt();}
}

// Custom Content 
function content($limit) {
	$post_type = get_post_type( get_the_ID() );
	if ( $post_type == 'portfolio' ) {
		$content = explode(' ', get_the_content(), $limit);
		if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content);
		} else {
		$content = implode(" ",$content);
		} 
		$content = preg_replace('`\[[^\]]*\]`','',$content);
		return $content;
	} else { return the_content();}
}