<?php get_header(); ?>

<div class="container mt-5">
    <div class="row">

        <div class="col-md-8">

            <header class="page-header">
                <h1 class="page-title"><?php printf(__('Search Results for: %s', 'your-theme'), '<span>' . get_search_query() . '</span>'); ?></h1>
            </header>

            <?php if (have_posts()) : ?>

                <?php
                // Start the loop.
                while (have_posts()) : the_post();
                ?>

                    <div class="sn-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="row">

                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="sn-card-img h-100">
                                            <a href="<?php the_permalink(); ?>" class="d-block m-auto">
                                                <?php the_post_thumbnail('full', array('class' => 'card-img-top', 'alt' => '')); ?>
                                            </a>
                                    </div>
                                </div>
                            
                            <div class="col-lg-8 col-md-6 col-12">
                            <?php endif; ?>
                                <div class="sn-card-body">
                                    <a class="sn-blog-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    <div class="sn-blog-ud">
                                        <strong class="sn-post-date"><i class="far fa-clock"></i> <?php echo get_the_date(); ?></strong>

                                        <?php
                                        $author_id = get_the_author_meta('ID');
                                        $author_name = get_the_author_meta('display_name');
                                        $author_url = get_author_posts_url($author_id);
                                        ?>
                                        <strong><i class="fa fa-user" aria-hidden="true"></i> <a href="<?php echo esc_url($author_url); ?>"><?php echo esc_html($author_name); ?></a></strong>
                                    </div>

                                    <div class="sn-post-excerpt">
                                        <?php
                                            the_excerpt();
                                        ?>
                                    </div>
                                </div>
                            <?php if (has_post_thumbnail()) : ?>
                            </div>
                        </div>

                        <?php endif; ?>
                    </div>

                <?php
                // End the loop.
                endwhile;
                ?>


                <div class="sn-pagination">
                    <?php echo paginate_links(); ?>
                </div>

            <?php else : ?>
                <p><?php _e('No results found.', 'your-theme'); ?></p>
            <?php endif; ?>

        </div>

        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>

    </div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
