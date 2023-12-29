

<?php 
/*
    Template Name: Buy My Car
*/
get_header(); ?>
    <section class="py-3">
        <div class="row py-5">
            <div class="col-md-8 col-12 m-auto sn-bmc">
            <?php
                $shortcode = get_field('buy_my_car');
                echo do_shortcode($shortcode);
            ?>
            </div>
        </div>
    </section>
<?php  get_footer(); ?>