<?php get_header(); ?>

<?php get_header(); ?>

<div class="container mt-3">
    <div class="row">

        <div class="col-md-8 sn-lpage">

            <header class="page-header">
                <?php
                the_archive_title('<h4 class="sn-title">', '</h4>');
                echo '<div class="sn-divider" > </div>';
                the_archive_description('<div class="archive-description">', '</div>');
                ?>
            </header>

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