<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); // Exit if accessed directly.
}

?>
<?php astra_content_bottom(); ?>

<?php if (!is_home()) : ?>
</div>
<?php endif; ?>
</main>
<footer>
    <section class="bg-accent pt-5 pb-1">
        <div class="container">
            <?php if(have_rows('shipping_info')) : ?>
                <div class="row">
                    <?php while(have_rows('shipping_info')) : the_row(); ?>
                            <div class="col-md-3">
                                <div class="d-flex shipping">
                                    <?php $icon = get_sub_field('icon'); ?>
                                    <?php if(!empty($icon)) : ?>
                                    <div class="icon mr-3">
                                        <?php echo ($icon); ?>
                                    </div>
                                <?php endif; ?>

                                    <div class="shipping-desc text-white px-3">
                                        <?php $title = get_sub_field('title'); ?>
                                        <?php if(!empty($title)) : ?>
                                            <h5 class="text-white mb-3"><?php echo ($title); ?></h5>
                                        <?php endif; ?>

                                        <?php $desc = get_sub_field('short_desc'); ?>
                                        <?php if(!empty($desc)) : ?>
                                        <p><?php echo ($desc); ?></p>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                     <?php endwhile; ?>
                </div>
        <?php endif; ?>
        </div>
    </section>
    <div class="sn-footer text-white pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-12 pb-5 logo-cont">
                   <a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2023/12/logo-1-copy.png" class="sn-logo mb-3" alt="logo"></a>

                    <p>
                        SGS Auto Parts has been operating in Thornleigh since February 2011. In November 2015 a large storage and dismantling facility was added at Kurri Kurri in the Hunter Valley.
                    </p>
                </div>
                <div class="col-md-4 col-12 pb-5 sn-footer-link text-white">
                    <p><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:0299800000">02 9980 0000</a></p>
                    <p><i class="fa fa-inbox" aria-hidden="true"></i> <a href="mailto:sales@sgspp.com.au">sales@sgspp.com.au</a></p>
                    <p><i class="fa fa-home" aria-hidden="true"></i> 48 Fairfield St Fairfield East NSW 2165</p>
                    <p><i class="fa fa-home" aria-hidden="true"></i> 153 Mitchell Ave Kurri Kurri NSW 2327</p>
                </div>
                <div class="col-md-4 col-12 pb-5 sn-foot-last text-white">
                    <p>ABN: 29 778 876 348</p>
                    <p>A1 Investment Holdings (Aus) Pty Ltd</p>
                    <p>LIC MD 089548</p>
                    <p>MVRL 600653</p>
                    <img src="<? echo site_url(); ?>/wp-content/uploads/2023/12/caplogo.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="sn-footer-last">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="copy copy-center">
                        Copyright © 2023 – SGS Auto Parts
                    </div>
                </div>
                <div class="col-md-6 col-12 text-right">
                    <?php
                        $footer_menu_items = wp_get_nav_menu_items('Copyright Menu');

                        if ($footer_menu_items) {
                            echo '<ul class="d-flex gap-2 mb-0 justify-content-end copy-center sn-footer-menu">';
                            foreach ($footer_menu_items as $item) {
                                echo '<li><a href="' . $item->url . '">' . $item->title . '</a></li>';
                            }
                            echo '</ul>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>
</div><!-- #page -->
<?php
astra_body_bottom();
wp_footer();
?>
</body>

</html>
