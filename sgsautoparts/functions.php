<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'astra-theme-css','woocommerce-layout','woocommerce-smallscreen','woocommerce-general' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION


function enqueue_custom_styles() {
    // Enqueue the styles
    wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/assets/css/custome.css', array(), '1.0', 'all');
}
// Hook into the 'wp_enqueue_scripts' action
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');


/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


// for menu
function custom_theme_register_nav_menu() {
    register_nav_menu('primary_menu', 'Primary Menu');
}
add_action('after_setup_theme', 'custom_theme_register_nav_menu');

// custome js 
function enqueue_custome_scripts() {
    
    // if(is_page('product-list')|| is_page('shop')){
        $min_price = 0;
        $max_price = 0;
        
        global $wpdb;

        // Get the maximum price
        $max_price = $wpdb->get_var("
            SELECT MAX(meta_value + 0) 
            FROM {$wpdb->prefix}postmeta 
            WHERE meta_key = '_price' 
                AND post_id IN (SELECT post_id FROM {$wpdb->prefix}postmeta WHERE meta_key = '_price')
        ");

        // Enqueue your custom script
        wp_enqueue_script('custome-script', get_stylesheet_directory_uri() . '/assets/js/custome.js', array('jquery'), null, true);
        
        // Pass PHP values to the script
        wp_localize_script('custome-script', 'custome_script_vars', array(
            'min_price' => esc_attr($min_price),
            'max_price' => esc_attr($max_price),
            // 'ajax_url'   => admin_url('admin-ajax.php'),
        ));
    // }else{
    //     wp_enqueue_script('custome-script', get_stylesheet_directory_uri() . '/assets/js/custome.js', array('jquery'), null, true);
    //     // Pass PHP values to the script
    //     wp_localize_script('custome-script', 'custome_script_vars', array(
    //         'min_price' => esc_attr(0),
    //         'max_price' => esc_attr(0),
    //         // 'ajax_url'   => admin_url('admin-ajax.php'),
    //     ));
    // }
}

// Hook into the 'wp_enqueue_scripts' action
add_action('wp_enqueue_scripts', 'enqueue_custome_scripts');



// AJAX handler to fetch products
// add_action('wp_ajax_fetch_products', 'fetch_products');
// add_action('wp_ajax_nopriv_fetch_products', 'fetch_products');
// function fetch_products() {
//     $category = isset($_POST['category']) ? $_POST['category'] : array();
//     $min_price = floatval($_POST['min_price']);
//     $max_price = floatval($_POST['max_price']) + 1;
//     $keySearch = isset($_POST['keySearch']) ? sanitize_text_field($_POST['keySearch']) : '';
    
//     $paged = isset($_POST['page']) ? absint($_POST['page']) : 1; // Get the current page
    
//     $args = array(
//         'post_type'      => 'product',
//         'posts_per_page' => 1,
//         'paged'          => $paged,
//         's' => $keySearch,
//         'meta_query'     => array(
//             array(
//                 'key'     => '_price',
//                 'value'   => array($min_price, $max_price),
//                 'type'    => 'NUMERIC',
//                 'compare' => 'BETWEEN',
//             ),
//         ),
//     );

//     if (!empty($category)) {
//         $args['tax_query'] = array(
//             array(
//                 'taxonomy' => 'product_cat',
//                 'field'    => 'slug',
//                 'terms'    => $category,
//                 'operator' => 'IN', // Use 'IN' for multiple terms
//             ),
//         );
//     }
    
//     $products = new WP_Query($args);

//     ob_start();
//     while ($products->have_posts()) {
//         $products->the_post();

//         wc_get_template_part('display', 'product-card'); // Adjust this to match your actual file name
//     }
//     wp_reset_postdata();
//     $output = ob_get_clean();
//     echo $output;

//     wp_die();
// }

// Hook into the 'wp_enqueue_scripts' action
add_action('wp_enqueue_scripts', 'enqueue_custome_scripts');

//Logo Supprt
    function sgs_logo_setup() {
        $defaults = array(
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'header-text'          => array( 'site-title', 'site-description' ),
            'unlink-homepage-logo' => true, 
        );
        add_theme_support( 'custom-logo', $defaults );
    }
    add_action( 'after_setup_theme', 'sgs_logo_setup' );
ob_end_flush();





// Add Mega Menu to the theme
function custom_mega_menu() {
    // Check if WooCommerce is active
    if (class_exists('WooCommerce')) {
        // Add Mega Menu HTML structure
        echo '<div class="sn-mega-menu">';
        echo '<ul class="row">';

        // Get product categories
        // $product_categories = get_terms('product_cat');
        $product_categories = get_terms(array(
            'taxonomy' => 'product_cat',
            'exclude' => array(get_option('default_product_cat')), // Exclude Uncategorized category
            'orderby' => 'name', // Order by name
            'order' => 'ASC', // Ascending order
        ));

        // Loop through categories and display in Mega Menu
        foreach ($product_categories as $category) {
            $category_link = get_term_link($category);

            if (!is_wp_error($category_link)) {
                echo '<li class="col-md-4 col-12">';
                echo '<a class="" href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a>';
                echo '</li>';
            }
        }

        echo '</ul>';
        echo '</div>';
    }
}

// Hook into your theme where you want to display the Mega Menu
// For example, you might use 'wp_nav_menu_items' to add it to a specific menu location
add_filter('wp_nav_menu_items_mega', 'custom_mega_menu', 10, 2);

// Remove the Downloads tab on the My Account page
function remove_my_account_downloads( $items ) {
    unset( $items['downloads'] );
    return $items;
}
add_filter( 'woocommerce_account_menu_items', 'remove_my_account_downloads' );

// Remove Downloads endpoint
function remove_my_account_downloads_endpoint() {
    remove_action( 'woocommerce_account_downloads_endpoint', 'wc_account_downloads' );
}
add_action( 'init', 'remove_my_account_downloads_endpoint' );
