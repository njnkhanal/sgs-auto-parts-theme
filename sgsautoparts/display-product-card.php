<?php
/**
 * Template part for displaying a product card
 */

global $product;
?>

<div class="col-lg-4 col-md-6 col-12">
    <div class="sn-card">
        <div class="sn-card-img">
            <?php echo get_the_post_thumbnail($product->get_id(), 'full', array('class' => 'card-img-top', 'alt' => '')); ?>
        </div>
        <div class="sn-card-body">
            <a href="<?php the_permalink(); ?>" class="card-title"><?php the_title(); ?></a>
            <span class="sn-prod-price"><?php echo $product->get_price_html(); ?>
                <?php 
                    if($product->get_stock_status() == 'instock') {
                ?>
                <span class="sn-in-stock"><i class="fas fa-check-circle"></i> In Stock</span>
                <?php 
                    }else{

                ?>
                    <span class="sn-in-stock"> <i class="fa fa-times-circle" aria-hidden="true"></i> Not In Stock</span>

                <?php
                    }
                ?>
            </span>
        </div>
        <div class="sn-card-top">
            <div class="sn-top-off">
                <?php echo $product->get_stock_status() ?>
            </div>
        </div>
        <a href="<?php echo $product->add_to_cart_url(); ?>" class="sn-add-to-cart button w-100"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add To Cart</a>
    </div>
</div>
