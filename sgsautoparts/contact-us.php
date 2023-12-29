<?php 
    /*
        Template Name: Contact Us
    */
    get_header(); ?>


<div>
    <?php echo get_field('iframe') ?>
    <div class="row py-3 mb-5">
        <?php 
            if(have_rows('contact_page_left_content')) : while (have_rows('contact_page_left_content')) : the_row();
                if(have_rows('contact_left')) : while (have_rows('contact_left')) : the_row();
        ?>
            <div class="col-md-5 col-12 pb-5">
                <h4 class="mb-5">SGS Auto Parts</h4>
                <p class="mb-1"><?php echo the_sub_field('abn') ?></p>

                <p class="mb-1">
                    <?php echo get_sub_field('address_1') ?>
                </p>

                <p class="mb-1">
                    <?php echo get_sub_field('address_2') ?>
                </p>

                <p class="mb-1">
                    T: <a href="tel:<?php echo get_sub_field('phone'); ?>"><?php echo get_sub_field('phone'); ?></a><br>
                    E: <a href="mailto:<?php echo get_sub_field('email') ?>"><?php echo get_sub_field('email') ?></a>
                </p>
            </div>
            <?php 
                endwhile;
             endif; 
            ?>
            <div class="col-md-7 col-12 sn-no-p-mb conta">
                <?php echo do_shortcode(get_sub_field('contact_right')) ?>
            </div>
        <?php endwhile; 
            endif; ?>
    </div>
</div>

<?php 
get_footer();
