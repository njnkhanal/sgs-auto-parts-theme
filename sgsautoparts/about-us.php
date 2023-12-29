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
        <?php if(have_rows('ad')) : ?>
        <div class="row align-items-center gx-5">
            <?php while(have_rows('ad')) : the_row(); ?>
            <div class="col-sm-12 col-md-8 col-lg-8">
                <?php $story = get_sub_field('about_desc'); ?>
                <?php if(!empty($story)) : ?>
                   <div class="story">
                        <?php echo($story); ?>  
                   </div>
               <?php endif; ?>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4">
                <?php if(have_rows('stats')) : ?>
               <div class=" row stats">
                    <?php while(have_rows('stats')) : the_row(); ?>
                       <div class=" col-md-4 col-sm-12 num">
                        <?php $num = get_sub_field('number'); ?>
                        <?php if(!empty($num)) : ?>
                           <h3><?php echo($num); ?></h3>
                       <?php endif; ?>
                       </div>
                       <div class=" col-md-8 col-sm-12 num-text">
                        <?php $desc = get_sub_field('desc'); ?>
                        <?php if(!empty($desc)) : ?>
                           <p><?php echo($desc); ?></p>
                        <?php endif; ?>
                       </div>
                    <?php endwhile; ?>
               </div>
           <?php endif; ?>
            </div>
        <?php endwhile; ?>
        </div>
    <?php endif; ?>
    </div>    
</section>


<section class="py-5 bg-alter">
    <div class="container py-4">
        <?php if(have_rows('e_policy')) : ?>
        <div class="row align-items-center gx-5">
            <?php while(have_rows('e_policy')) : the_row(); ?>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <?php $img = get_sub_field('img'); ?>
                    <?php if(!empty($img)) : ?>
                        <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_url($img['alt']); ?>">
                    <?php endif; ?>
                </div>

                <div class="col-sm-12 col-md-8 col-lg-8">
                    <?php $policy = get_sub_field('e_policy'); ?>
                    <?php if(!empty($policy)) : ?>
                       <div class="policy">
                            <?php echo($policy); ?>  
                       </div>
                   <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
    </div>    
</section>


<section class="py-5">
    <div class="container py-4">
        <?php if(have_rows('warranty')) : ?>
            <div class="row align-items-center gx-5">
                <?php while(have_rows('warranty')) : the_row(); ?>
                    <div class="col-sm-12 col-md-8 col-lg-8">
                        <?php $warranty = get_sub_field('warranty'); ?>
                        <?php if(!empty($warranty)) : ?>
                           <div class="warranty">
                                <?php echo($warranty); ?>  
                           </div>
                       <?php endif; ?>
                    </div>

                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <?php $img = get_sub_field('w_img'); ?>
                        <?php if(!empty($img)) : ?>
                            <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_url($img['alt']); ?>">
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>    
</section>


<?php 
get_footer();
?>