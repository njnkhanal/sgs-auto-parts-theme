<?php 
    /*
        Template Name: About Us
    */
    get_header();
?>

<section>

        <?php if (have_rows('banner')) : ?>
            <?php while(have_rows('banner')) : the_row(); ?>

        <div class="sn-hero height">
            <?php $img = get_sub_field('bg_img'); ?>
            <?php if(!empty($img)) : ?>
                <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_url($img['alt']); ?>">
            <?php endif; ?>
            <div class="sn-filter-override h-100">

                <div class="container d-flex h-100 p-0">

                    <div class="w-50 mx-auto sn-form-container smfull">

                        <div class="text-white banner p-3">
                            <?php $title = get_sub_field('bg_title'); ?>
                            <?php $desc = get_sub_field('bg_desc'); ?>

                            <?php if(!empty($title)) : ?>

                                <h1 class="text-light">
                                <?php echo($title); ?> </h1>
                            <?php endif; ?>

                            <?php if(!empty($desc)) : ?>
                                <?php echo($desc); ?>
                            <?php endif; ?>
                        </div>

                    </div>

                </div>

            </div>

        </div>
        <?php endwhile; endif; ?>
</section>

<section class="py-5">
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <?php $story = get_field('about_desc'); ?>
                <?php if(!empty($story)) : ?>
                   <div class="story">
                        <?php echo($story); ?>  
                   </div>
               <?php endif; ?>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4">
               <div class=" row stats">
                   <div class=" col-md-4 col-sm-12 num">
                       <h3>1.7M+</h3>
                   </div>
                   <div class=" col-md-8 col-sm-12 num-text">
                       <p>Stock Keeping Unitson Worldwide</p>
                   </div>

                   <div class=" col-md-4 col-sm-12 num">
                       <h3>300K+</h3>
                   </div>
                   <div class=" col-md-8 col-sm-12 num-text">
                       <p>Orders Served Success</p>
                   </div>

                   <div class=" col-md-4 col-sm-12 num">
                       <h3>9K+</h3>
                   </div>
                   <div class=" col-md-8 col-sm-12 num-text">
                       <p>Satisfied Customers on 40 Countries</p>
                   </div>

               </div>
            </div>
        </div>
    </div>    
</section>


<section class="py-5">
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-sm-12 col-md-4 col-lg-4">
               <img src="<? echo site_url(); ?>/wp-content/uploads/2023/12/caplogo.jpg" alt="">
            </div>

            <div class="col-sm-12 col-md-8 col-lg-8">
                <?php $policy = get_field('e_policy'); ?>
                <?php if(!empty($policy)) : ?>
                   <div class="policy">
                        <?php echo($policy); ?>  
                   </div>
               <?php endif; ?>
            </div>
        </div>
    </div>    
</section>


<section class="py-5">
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <?php $warranty = get_field('warranty'); ?>
                <?php if(!empty($warranty)) : ?>
                   <div class="warranty">
                        <?php echo($warranty); ?>  
                   </div>
               <?php endif; ?>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4">
                <img src="<? echo site_url(); ?>/wp-content/uploads/2023/12/caplogo.jpg" alt="">
            </div>
        </div>
    </div>    
</section>


<?php 
get_footer();
?>