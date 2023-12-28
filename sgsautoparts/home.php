<?php get_header(); ?>

<section class="sn-blog-page">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-12">
                <div>
                    <div class="sn-filter-title">
                        Filter Blogs
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
                                        <input type="text" class="form-control" id="keySearch" name="bsearch" value="<?php 
                                                if(isset($_GET['bsearch'])){
                                                    $search = $_GET['bsearch'];
                                                    echo $search;
                                                }
                                            ?>" placeholder="Search Blog">
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
                                        $categories = get_categories(array(
                                            'exclude' => get_cat_ID('Uncategorized'), // Exclude the Uncategorized category
                                        ));

                                        foreach ($categories as $category) {
                                            $isChecked = isset($_GET['category']) && in_array($category->slug, $_GET['category']) ? 'checked' : ''; // Check if the category is selected in $_GET

                                            echo '<label>';
                                            echo '<input type="checkbox" name="category[]" value="' . esc_attr($category->slug) . '" ' . $isChecked . '>'; // Checkbox input with the category value
                                            echo esc_html($category->name); 
                                            echo '<span class="sn-badge">' . esc_html($category->count) . '</span>'; // Display the category count
                                            echo '</label>';
                                        }
                                    ?>

                                    </div>
                                </div>
                            </div>
                            <button id="" type="submit" class="sn-btn-ot sn-bg-primary w-100">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8 col-12 mb-3">
                <h4>Blogs</h4>
                    <div id="productContainer" class="row">
                    <?php
                        $search = isset($_GET['bsearch']) ? sanitize_text_field($_GET['bsearch']) : '';

                        // Get and sanitize the category filter
                        $category = isset($_GET['category']) ? array_map('sanitize_text_field', $_GET['category']) : array();

                        // WordPress blog post query
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array(
                            'post_type'      => 'post', // Change to 'post' for blog posts
                            'posts_per_page' => 15,
                            'paged'          => $paged,
                        );

                        if (!empty($search)) {
                            $args['s'] = $search;
                        }

                        if (!empty($category)) {
                            $args['tax_query'] = array(
                                array(
                                    'taxonomy' => 'category',
                                    'field'    => 'slug',
                                    'terms'    => $category,
                                    'operator' => 'IN',
                                ),
                            );
                        }

                        $blog_posts = new WP_Query($args);

                        while ($blog_posts->have_posts()) {
                            $blog_posts->the_post();
                            
                            wc_get_template_part('display', 'blog-card');
                        }

                        // Pagination
                        if ($blog_posts->max_num_pages > 1) {
                            echo '<div class="sn-pagination">';
                            echo paginate_links(array(
                                'total'   => $blog_posts->max_num_pages,
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
</section>

<?php get_footer(); ?>