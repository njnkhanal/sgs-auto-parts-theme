<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
	<main class="sn-product-list-page">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-12">
					<div>
						<div class="sn-filter-title">
							Filter Parts
						</div>
						<form action="" method="get">
							<div class="accordion" id="productFilter">
								<div class="accordion-item">
									<h2 class="accordion-header" id="headZero">
										<a class="accordion-button sn-accordion-btn collapsed   " href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#searchFilter" aria-expanded="true" aria-controls="searchFilter">
											Filter By Keyword
										</a>
									</h2>
									<div id="searchFilter" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#productFilter">
										<div class="accordion-body">
											<input type="text" class="form-control" id="keySearch" name="search" value="<?php 
													if(isset($_GET['search'])){
														$search = $_GET['search'];
														echo $search;
													}
												?>" placeholder="Search Parts">
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingOne">
										<a class="accordion-button sn-accordion-btn collapsed   " href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#categoryFilter" aria-expanded="true" aria-controls="categoryFilter">
											Filter By Category
										</a>
									</h2>
									<div id="categoryFilter" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#productFilter">
										<div class="accordion-body sn-cat-filter">
											<?php
												$categories = get_terms('product_cat');
												$current_category = get_queried_object();

												foreach ($categories as $category) {
													$isChecked = isset($_GET['category']) && in_array($category->slug, $_GET['category']) ? 'checked' : ''; // Check if the category is selected in $_GET

													// Automatically check the checkbox for the current category
													if ($current_category instanceof WP_Term && $current_category->slug === $category->slug) {
														$isChecked = 'checked';
													}

													echo '<label>';
													echo '<input type="checkbox" name="category[]" value="' . esc_attr($category->slug) . '" ' . $isChecked . '>';
													echo esc_html($category->name);
													echo '<span class="sn-badge">' . esc_html($category->count) . '</span>';
													echo '</label>';
												}
											?>
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingTwo">
										<a class="accordion-button sn-accordion-btn collapsed" href="javascript:void(0);    " data-bs-toggle="collapse" data-bs-target="#priceFilter" aria-expanded="false" aria-controls="priceFilter">
											Filter By Price
										</a>
									</h2>
									<div id="priceFilter" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#productFilter">
										<div class="accordion-body">
											<div id="priceSlider"></div>
											<div id="priceValues" class="sn-range-show">Selected Range: $0 - $500</div>
											<input type="hidden" id="minPrice" name="minPrice" value="<?php echo esc_attr($min_price); ?>">
											<input type="hidden" id="maxPrice" name="maxPrice" value="<?php echo esc_attr($max_price); ?>">
					
										</div>
									</div>
								</div>

								<button id="" type="submit" class="sn-btn-ot sn-bg-primary w-100">Filter</button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-8 col-12 mb-3">
					<h4>Products</h4>
					<div class="row">
						<div id="productContainer" class="row">
						<?php

							$search = isset($_GET['search']) ? sanitize_text_field($_GET['search']) : '';
							$category = isset($_GET['category']) ? array_map('sanitize_text_field', $_GET['category']) : array();
							
							if ($current_category instanceof WP_Term && !in_array($current_category->slug, $category)) {
								$category[] = $current_category->slug;
							}

							$min_price = isset($_GET['min_price']) ? floatval($_GET['min_price']) : 0;
							$max_price = isset($_GET['max_price']) ? floatval($_GET['max_price']) + 1 : 1000000; // Adjust the upper limit as needed
							
							
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$args = array(
								'post_type'      => 'product',
								'posts_per_page' => 15,
								'paged' => $paged,
								'meta_query'     => array(
									array(
										'key'     => '_price',
										'value'   => array($min_price, $max_price),
										'type'    => 'NUMERIC',
										'compare' => 'BETWEEN',
									),
								),
							);
							if(!empty($search)){
								$args['s'] = $search;
							}
							
							if (!empty($category)) {
								$args['tax_query'] = array(
									array(
										'taxonomy' => 'product_cat',
										'field'    => 'slug',
										'terms'    => $category,
										'operator' => 'IN',
									),
								);
							}
							$products = new WP_Query($args);
						
							while ($products->have_posts()){
								$products->the_post();
								wc_get_template_part('display', 'product-card');
							}
							// Pagination
							if ($products->max_num_pages > 1) {
								echo '<div class="sn-pagination">';
								echo paginate_links(array(
									'total'   => $products->max_num_pages,
									'current' => max(1, get_query_var('paged')),
								));
								echo '</div>';
							}
							wp_reset_postdata();
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
