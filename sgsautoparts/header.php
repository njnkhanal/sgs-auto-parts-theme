<?php
/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php astra_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.css" integrity="sha512-MKxcSu/LDtbIYHBNAWUQwfB3iVoG9xeMCm32QV5hZ/9lFaQZJVaXfz9aFa0IZExWzCpm7OWvp9zq9gVip/nLMg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.min.js" integrity="sha512-UOJe4paV6hYWBnS0c9GnIRH8PLm2nFK22uhfAvsTIqd3uwnWsVri1OPn5fJYdLtGY3wB11LGHJ4yPU1WFJeBYQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php 
if ( apply_filters( 'astra_header_profile_gmpg_link', true ) ) {
	?>
	 <link rel="profile" href="https://gmpg.org/xfn/11"> 
	 <?php
} 
?>
<?php wp_head(); ?>

<?php astra_head_bottom(); ?>
</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>
<?php astra_body_top(); ?>
<?php wp_body_open(); ?>

<a
	class="skip-link screen-reader-text"
	href="#content"
	role="link"
	title="<?php echo esc_attr( astra_default_strings( 'string-header-skip-link', false ) ); ?>">
		<?php echo esc_html( astra_default_strings( 'string-header-skip-link', false ) ); ?>
</a>

<div
<?php
	echo astra_attr(
		'site',
		array(
			'id'    => 'page',
			'class' => 'hfeed site',
		)
	);
	?>
>
	<header>
		<div class="sn-top-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-12 d-flex">
						<a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2023/12/logo-1.jpg" class="sn-logo" alt=""></a>
                        
                        <div class="sn-enquiry sn-sm-block">
                            <h4 > <i class="fas fa-phone    "></i> Enquiry</h4>
                            <a href="tel:0299800000" class="sn-enquiry-number">02 9980 0000</a>
                        </div>
                        
					</div>
                    <div class="col-lg-5">
                        <form class="d-flex h-100" action="<?php echo esc_url(site_url()); ?>/product-list" method="GET">
                            <div class="sn-cost-search">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Search Parts" aria-describedby="helpId" value="<?php 
                                                if(isset($_GET['search'])){
                                                    $search = $_GET['search'];
                                                    echo $search;
                                                }
                                            ?>">
                                <button type="submit" class="btn  d-inline-block"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4 d-flex sn-cont-cat-eq">
                        <button class="btn sn-sm-block" id="tBtnNavbar" type="button">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>
                        <div class="sn-cart my-auto d-flex">
                            <a href="<?php  echo esc_url(wc_get_cart_url()); ?>" class="sn-cart-icon">
                                <i class="fas fa-cart-arrow-down"></i>
                                <span class="sn-cart-badge">
                                    <?php
                                    // Get the number of items in the cart
                                    $cart_count = WC()->cart->get_cart_contents_count();
                                    echo esc_html($cart_count);
                                    ?>
                                </span>
                            </a>
                            <div class="sn-cart-text">
                                <span>Cart</span> <br>
                                <span>
                                    <?php
                                    // Get the total cost of items in the cart
                                    $cart_total = WC()->cart->get_cart_total();
                                    echo $cart_total;
                                    ?>
                                </span>
                            </div>
                        </div>

                        <div class="sn-enquiry sn-sm-none">
                            <h4 > <i class="fas fa-phone    "></i> Enquiry</h4>
                            <a href="tel:0299800000" class="sn-enquiry-number">02 9980 0000</a>
                        </div>
                    </div>
				</div>
			</div>
		</div>
        <div class="sn-navbar">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-dark ">
                    <div class="container-fluid">
                        
                        <div class="collapse navbar-collapse" id="navbar">
                            <div class="navbar-nav w-100">
                                    <li class="nav-item dropdown sn-dp-rt">
                                        <a class="nav-link active dropdown-toggle" href="#" id="megaMenuDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            All Parts
                                        </a>
                                        <ul class="dropdown-menu mega-menu" aria-labelledby="megaMenuDropdown">
                                            <?php
                                            // Display Mega Menu content
                                            custom_mega_menu(); // This function is from the previous example
                                            ?>
                                        </ul>
                                    </li>
                                <?php
                                    // Display the custom navigation menu
                                    wp_nav_menu(array(
                                        'theme_location' => 'primary_menu',
                                        'menu_class'     => 'navbar-nav w-100',
                                        'container'      => 'div',
                                        'container_class'=> '',
                                        'container_id'   => '',
                                        'walker'         => new WP_Bootstrap_Navwalker(),
                                    ));

                                ?>
                                
                                <?php if(is_user_logged_in()) { ?>
                                    <li class="nav-item sn-nav-drop dropdown">
                                        <a class="nav-link active" href="<?php echo esc_url(wc_get_account_endpoint_url('dashboard')) ?>"><i class="fa fa-user" aria-hidden="true"></i> <?php echo wp_get_current_user()->display_name ?> </a>
                                    </li>
                                <?php }else{ ?>
                                    <li class="nav-item sn-nav-drop dropdown">
                                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-user-circle" aria-hidden="true"></i> User Account
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="<?php echo wc_get_page_permalink('myaccount'); ?>">Login</a></li>
                                            <li><a class="dropdown-item" href="<?php echo wc_get_page_permalink('myaccount') . '?action=register'; ?>">Register</a></li>                                                
                                        </ul>
                                    </li>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
	</header>
	<?php
	// astra_header_before();

	// astra_header();

	// astra_header_after();

	// astra_content_before();
	?>
    <main>
    <?php if (!is_front_page()) : ?>
        <div class="container">
    <?php endif; ?>
		<?php astra_content_top(); ?>
