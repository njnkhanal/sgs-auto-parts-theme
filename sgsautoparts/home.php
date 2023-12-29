<?php get_header(); ?>

<?php get_header(); ?>

<div class="container my-3">
    <div class="row">

        <div class="col-md-8 sn-lpage">
        <?php
            $search_query = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';

            if (!empty($search_query)) :
                ?>
                <header class="page-header">
                    <h4 class="sn-title"><?php printf('Search Results for: <span>"%s"</span>', $search_query); ?></h4>
                    <div class="sn-divider"></div>
                    <div class="archive-description">
                        <?php
                        // You can add a custom description here if needed.
                        // the_archive_description();
                        ?>
                    </div>
                </header>
            <?php else: ?>
                <header class="page-header">
                    <?php
                    the_archive_title('<h4 class="sn-title">', '</h4>');
                    echo '<div class="sn-divider"></div>';
                    the_archive_description('<div class="archive-description">', '</div>');
                    ?>
                </header>
            <?php endif; ?>


            <?php
            // Start the loop.
            while (have_posts()) : the_post();
            ?>
            <?php 
                wc_get_template_part('display', 'blog-card');
            ?>
            <?php
            // End the loop.
            endwhile;
            ?>

            <div class="pagination">
                <?php echo paginate_links(); ?>
            </div>

        </div>

        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>

    </div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>


<?php get_footer(); ?>