<?php

/**
 *Plugin Name: Rtd Client Testimonial
 *Plugin URI: http://rootdesignwp.com/testimonial
 *Description: Rtd Client Testimonial is one of the best custom plugin to publish your unlimited clients testimonial with your clients image. Anybody can able to use this plugin easily. You can add clients testimonial by using this plugin anywhere in your websites like Pages,Posts, Widgets etc. with its lots of amazing features. 
 *Version:  1.0.0
 *Author: rootdesign
 *Author URI: http://rootdesignwp.com/testimonial
 *License:  GPL2
 *License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *Text Domain: rtd
 */



if(!defined('ABSPATH')) exit;      // Prevent Direct Browsing




/**
 * Enqueue scripts and styles.
 */
function rtd_testimonial_scripts() {

	wp_enqueue_style("font-awesome",plugins_url('/assets/css/font-awesome.min.css', __FILE__) );
	wp_enqueue_style("bx-style",plugins_url('/assets/css/bxslider.css', __FILE__) );
	wp_enqueue_style("style",plugins_url('/assets/css/style.css', __FILE__) );

	wp_enqueue_script("jquery");
	wp_enqueue_script( 'bx-script', plugins_url('/assets/js/bxslider-min.js', __FILE__), array("jquery") );
	wp_enqueue_script( 'custom-script', plugins_url('/assets/js/main.js', __FILE__), array("jquery") );

}
add_action( 'wp_enqueue_scripts', 'rtd_testimonial_scripts' );


require_once(dirname(__FILE__)."/assets/libs/cmb2/init.php");
require_once(dirname(__FILE__)."/assets/inc/metabox.php");

 /**
 * Register custom post type.
 */

function rtd_testimonial_post_type(){
	register_post_type('testimonial', array(
			'labels' => array(
				'name'               => _x( 'Testimonials', 'post type general name', 'rtd' ),
				'singular_name'      => _x( 'Testimonial', 'post type singular name', 'rtd' ),
				'menu_name'          => _x( 'Testimonials', 'admin menu', 'rtd' ),
				'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar', 'rtd' ),
				'add_new'            => _x( 'Add New', 'Testimonial', 'rtd' ),
				'add_new_item'       => __( 'Add New Testimonial', 'rtd' ),
				'new_item'           => __( 'New Testimonial', 'rtd' ),
				'edit_item'          => __( 'Edit Testimonial', 'rtd' ),
				'view_item'          => __( 'View Testimonial', 'rtd' ),
				'all_items'          => __( 'All Testimonial', 'rtd' ),
				'search_items'       => __( 'Search Testimonial', 'rtd' ),
				'parent_item_colon'  => __( 'Parent Testimonial:', 'rtd' ),
				'not_found'          => __( 'No Testimonial found.', 'rtd' ),
				'not_found_in_trash' => __( 'No Testimonial found in Trash.', 'rtd' ),
				),

			'public' => true,
			'description'         => __( 'RTD Testimonials Post Type', 'rtd' ),
	        'supports'            => array( 'title', 'editor', 'thumbnail' ),
	        'hierarchical'        => true,
	        'show_ui'             => true,
	        'show_in_menu'        => true,
	        'show_in_nav_menus'   => true,
	        'show_in_admin_bar'   => true,
	        'menu_position'       => 20,
	        'menu_icon'           => 'dashicons-format-quote',
	        'can_export'          => true,
			'capability_type'     => 'post',

		));

}
add_action('init', 'rtd_testimonial_post_type');



function rtd_testimonial_shortcode(){
	 ob_start(); ?>

<div class="experiance">
    <?php
    	$head = get_post_meta($post->ID, 'monial_head_title', true);
    ?>

	<h2><?php echo $$head ; ?></h2>


<?php
	 $testim = new WP_Query(array(
	    'post_type' => 'testimonial',
	    'posts_per_page' => -1,

	 	));
?>

	<div class="clientsslide">

		<?php while( $testim->have_posts() ) : $testim->the_post(); ?>
            <div class="clients_comments">      		
					
					<span class="quote"><i class="fa fa-quote-left"></i></span>
					<?php the_content() ;?>

				<div class="client-photo">
					<?php the_post_thumbnail('thumbnail'); ?> 
				</div>
				<br>
    			<span style="color:<?php echo get_post_meta( get_the_ID(), 'name_colorpicker', true);?>;" class="client-name"><?php echo  get_post_meta( get_the_ID(), 'client_name', true) ;?> </span>  /   
	      		<span style="color:<?php echo get_post_meta( get_the_ID(), 'designation_colorpicker', true);?>;" class="client-designation"><?php echo  get_post_meta( get_the_ID(), 'client_Designation', true );?></span>
		      	
                
            </div>

		<?php endwhile;

		wp_reset_postdata(); ?>
        
    </div>
</div>


<?php $testimonial = ob_get_clean();

    return $testimonial;

}
add_shortcode('rtd_testimonial', 'rtd_testimonial_shortcode')

















 ?>