<!-- sidebar.php -->

<aside id="secondary">
    <?php wc_get_template_part('custome-search-field'); ?>
    <div class="sn-divider"></div>
    <div class="widget">
        <h3 class="widget-title">Recent Posts</h3>
        <ul class="">
        <?php
            $recent_posts = wp_get_recent_posts(array('numberposts' => 3));
            foreach ($recent_posts as $recent_post) {
                $pid = $recent_post['ID'];
                $post_title = esc_html($recent_post['post_title']);
                $post_permalink = get_permalink($pid);
                $post_date = get_the_date('', $pid);

                echo '<li>';
                echo '<div class="sn-card row mx-0">';
                
                // Your custom thumbnail code
                echo '<div class="sn-card-img h-auto px-0 col-md-4">';
                if (has_post_thumbnail($pid)) :
                    echo '<a href="' . esc_url($post_permalink) . '" class="d-block m-auto">';
                    echo get_the_post_thumbnail($pid, 'your-thumbnail-size', array('class' => 'card-img-top', 'alt' => ''));
                    echo '</a>';
                endif;
                echo '</div>';
                
                echo '<div class="card-body col-md-8 p-2">';
                echo '<strong class="card-title"><a href="' . esc_url($post_permalink) . '">' . $post_title . '</a></strong>';
                echo '<p class="card-text">' . esc_html($post_date) . '</p>';
                echo '</div>';
                
                echo '</div>';
                echo '</li>';
            }
        ?>

        </ul>
        <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="button w-100 mt-3 sn-br text-center">View All</a>
    </div>


    <div class="sn-divider"></div>

    <div class="widget">
        <h3 class="widget-title">Archives</h3>
        <ul class="list-unstyled">
            <?php wp_get_archives('type=monthly'); ?>
        </ul>
    </div>
    <div class="sn-divider"></div>
    <div class="widget">
        <h3 class="widget-title">Categories</h3>
        <ul class="list-unstyled">
            <?php
            $categories = get_categories();
            foreach ($categories as $category) {
                echo '<li><a class="button" href="' . get_category_link($category->term_id) . '">' . esc_html($category->name) . '</a></li>';
            }
            ?>
        </ul>
    </div>
</aside>
