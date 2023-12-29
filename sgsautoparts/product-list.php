<?php 
/*
    Template Name: Product List
*/
get_header(); ?>

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

                                            foreach ($categories as $category) {
                                                $isChecked = isset($_GET['category']) && in_array($category->slug, $_GET['category']) ? 'checked' : ''; // Check if the category is selected in $_GET
                                            
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
                <div>
                    <div id="productContainer" class="row">
                    <?php
                        $search = isset($_GET['search']) ? sanitize_text_field($_GET['search']) : '';

                        // Get and sanitize the category filter
                        $category = isset($_GET['category']) ? array_map('sanitize_text_field', $_GET['category']) : array();
                        
                        // Get the price range
                        $min_price = isset($_GET['minPrice']) ? floatval($_GET['minPrice']) : 0;
                        $max_price = isset($_GET['maxPrice']) ? floatval($_GET['maxPrice']) + 1 : 1000000; // Adjust the upper limit as needed

                        // WooCommerce product query
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

<?php get_footer(); ?>