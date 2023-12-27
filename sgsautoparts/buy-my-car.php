

<?php 
/*
    Template Name: Buy My Car
*/
get_header(); ?>
    <section class="py-3">
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <h1>Buy My Car</h1>
                    <span>Fill-Up The Buy My Car Form & Get The Best Price For Your Scrap Car In Australia, Guaranteed</span>
                </div>
                
            </div>
            <div class="col-md-6 col-12 m-auto sn-bmc">
                <div class="sn-divider"></div>
                <?php echo do_shortcode('[gravityform id="3" title="true"]'); ?>

            </div>
        </div>
    </section>
<?php  get_footer(); ?>