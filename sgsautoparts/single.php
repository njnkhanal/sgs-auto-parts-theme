<?php get_header(); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">

            <?php
            // Start the loop.
            while (have_posts()) : the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" class="">

                <header class="mb-4">
                    <h4 class="sn-title pb-2"><?php the_title(); ?></h4>
                    <div class="entry-meta">
                        <div class="sn-blog-ud">
                            <strong class="sn-post-date"><i class="far fa-clock"></i> <?php echo get_the_date(); ?></strong>

                            <?php
                            $author_id = get_the_author_meta('ID');
                            $author_name = get_the_author_meta('display_name');
                            $author_url = get_author_posts_url($author_id);
                            ?>
                            <strong><i class="fa fa-user" aria-hidden="true"></i> <a href="<?php echo esc_url($author_url); ?>"><?php echo esc_html($author_name); ?></a></strong>
                        </div>

                    </div>
                </header>
                <div class="sn-card-img h-100 mb-3">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="javascript:void(0);" class="d-block m-auto">
                            <?php the_post_thumbnail('full', array('class' => 'card-img-top', 'alt' => '')); ?>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>


            </article>

                <footer class="mt-5">
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                </footer>
            <?php
            // End the loop.
            endwhile;
            ?>

        </div>

        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>

    </div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
