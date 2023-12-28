<?php
/**
 * Template part for displaying a blog post card
 */
?>

<div class="col-12">
    <div class="sn-card">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="sn-card-img h-100">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" class="d-block m-auto">
                            <?php the_post_thumbnail('full', array('class' => 'card-img-top', 'alt' => '')); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-lg-8 col-md-6 col-12">
                <div class="sn-card-body">
                    <a class="sn-blog-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <div class="sn-blog-ud">
                        <strong class="sn-post-date"><i class="far fa-clock"></i> <?php echo get_the_date(); ?></strong>

                        <?php
                        $author_id = get_the_author_meta('ID');
                        $author_name = get_the_author_meta('display_name');
                        ?>
                        <strong><i class="fa fa-user" aria-hidden="true"></i> <?php echo esc_html($author_name); ?></strong>
                    </div>

                    <div class="sn-post-excerpt">
                        <?php // the_excerpt(); ?>
                        <?php
                            $excerpt = get_the_excerpt();
                            $trimmed_excerpt = mb_strimwidth($excerpt, 0, 200, ''); // Trim to 100 characters without adding a "Read More" link
                            
                            echo $trimmed_excerpt;
                        
                            if (mb_strlen($excerpt) > 100) {
                                echo '... <a class="read-more" href="' . esc_url(get_permalink()) . '">Read More</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="sn-card-top sn-tl0">
            <div class="sn-top-category">
                <?php
                $categories = get_the_category();
                if (!empty($categories)) {
                    echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
                }
                ?>
            </div>
        </div>
    </div>

</div>
