<?php 

get_header(); ?>



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
                                <?php echo($title); ?> <span>Subaru And Volkswagen</span> </h1>
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

    <section class="py-4">
        <?php if(have_rows('about')) : ?>
            <div class="container pt-5">
                <?php while(have_rows('about')) : the_row(); ?>
                    <?php $img = get_sub_field('abt_img'); ?>

                    <?php if(!empty($img)) : ?>
                        <div class="abt-bg" style="background-image: url('<?php echo esc_url( $img['url'] ); ?>');
                            background-repeat: no-repeat;
                            background-position: top center; background-size: cover;">

                    <?php endif; ?>
                        <div class="row w-50 w-sm-100 p-5 left-half smfull">
                            <?php $title = get_sub_field('abt_title'); ?>

                            <?php if(!empty($title)) : ?>
                                <h2><?php echo($title); ?></h2>
                            <?php endif; ?>

                            <?php $desc = get_sub_field('abt_desc'); ?>

                            <?php if(!empty($desc)) : ?>
                                <?php echo($desc); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </section>

    <section>
        <?php if(have_rows('about')) : ?>
            <div class="container about-card py-5">
                <?php while(have_rows('about')) : the_row(); ?>
                    <div class="row">
                        <?php if(have_rows('cwi')) : ?>
                            <?php while(have_rows('cwi')) : the_row(); ?>
                                <div class="col-md-3 card-container">
                                    <?php $icon = get_sub_field('icon'); ?>
                                    <?php if(!empty($icon)) : ?>
                                        <?php echo($icon); ?>
                                    <?php endif; ?>

                                    <?php $cardTitle = get_sub_field('card_title'); ?>
                                    <?php if(!empty($cardTitle)) : ?>
                                        <h4 class="mb-2"><?php echo($cardTitle); ?></h4>
                                    <?php endif; ?>

                                    <?php $cardDesc = get_sub_field('card_desc'); ?>
                                    <?php if(!empty($cardDesc)) : ?>
                                        <?php echo($cardDesc); ?>
                                 <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </section>

    <section class="py-5 bg-shade">
        <div class="container py-5">
            <h4>Volkswagen Parts</h4>
            <?php if(have_rows('volk_cat')) : ?>
                <div class="row cat-img">
                    <?php while(have_rows('volk_cat')) : the_row(); ?>
                        <div class="col-lg-2 col-md-3 col-sm-6 mt-4">
                            <div class="card text-center align-items-center">
                                <?php $img = get_sub_field('parts_img'); ?>
                                <?php if(!empty($img)): ?>
                                    <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_url($img['alt']); ?>">
                                <?php endif; ?>

                                <?php $name = get_sub_field('parts_name'); ?>
                                <?php if(!empty($name)) : ?>
                                    <h5 class="mt-4"><?php echo($name); ?></h5>
                                <?php endif; ?>

                                <?php $brand = get_sub_field('parts_brand'); ?>
                                <?php if(!empty($brand)) : ?>
                                    <small><?php echo($brand); ?></small>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

        <h4 class="mt-5">Subaru Parts</h4>
            <?php if(have_rows('subaru_cat')) : ?>
                <div class="row cat-img">
                    <?php while(have_rows('subaru_cat')) : the_row(); ?>
                        <div class="col-lg-2 col-md-3 col-sm-6 mt-4">
                            <div class="card text-center align-items-center">
                                <?php $img = get_sub_field('parts_image'); ?>
                                <?php if(!empty($img)): ?>
                                    <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_url($img['alt']); ?>">
                                <?php endif; ?>

                                <?php $name = get_sub_field('parts_name'); ?>
                                <?php if(!empty($name)) : ?>
                                    <h5 class="mt-4"><?php echo($name); ?></h5>
                                <?php endif; ?>

                                <?php $brand = get_sub_field('parts_brand'); ?>
                                <?php if(!empty($brand)) : ?>
                                    <small><?php echo($brand); ?></small>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>


<!--  <section>
    <div class="container">
        <?php if(have_rows('bottom_desc')) : ?>
            <div class="row">
                <?php while(have_rows('bottom_desc')) : the_row(); ?>
                    <div class="col-md-6 half-left">
                        <?php $bottom = the_field('bottom_desc'); ?>
                        <?php if(!empty($bottom)) : ?>
                            <?php echo esc_html($bottom); ?>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
                <div class="col-md-6 half-left">
                    <img src="<?php echo esc_url(site_url()); ?>/wp-content/uploads/2023/12/caplogo.jpg" alt="">
                </div>
            </div>
        <?php endif; ?>
    </div>
</section> -->


<section class="make-models py-5">
    <div class="container py-4">
        <ul class="nav nav-pills justify-content-center mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Featured Makes</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Featured Models</button>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="container">
                    <?php if (have_rows('featured_make')) : ?>
                        <div class="row">
                            <?php while (have_rows('featured_make')) : the_row(); ?>
                                <div class="col-md-2 col-sm-6 my-4">
                                    <?php
                                    $make = get_sub_field('make_items');
                                    $link = get_sub_field('items_url');
                                    
                                    if (!empty($make) && !empty($link)) :
                                    ?>
                                        <span><a href="<?php echo esc_url($link); ?>"><?php echo $make; ?></a></span>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
               <div class="container">
                    <?php if (have_rows('featured_model')) : ?>
                        <div class="row">
                            <?php while (have_rows('featured_model')) : the_row(); ?>
                                <div class="col-md-2 col-sm-6 my-4">
                                    <?php
                                    $make = get_sub_field('model_type');
                                    $link = get_sub_field('model_link');
                                    
                                    if (!empty($make) && !empty($link)) :
                                    ?>
                                        <span><a href="<?php echo esc_url($link); ?>"><?php echo $make; ?></a></span>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>         
            </div>
        </div>
    </div>
</section>

<section class="bg-trans py-5">
    <div class="container py-4">
        <h2 class="text-center mb-5">Our Latest Blog</h2>

        <div class="row blog">
            <?php 
                $args=array('post_type'=>'post','posts_per_page'=> '3');
                $query=new WP_Query($args);
                if($query->have_posts()){
                while($query->have_posts()):$query->the_post();
            ?>
            <div class="col-md-4">
                <div class="card ">
                    <a href="<?php the_permalink(); ?>">
                         <?php the_post_thumbnail(); ?>
                         <div class="card-header pt-4">
                             <h3><?php the_title(); ?></h3>
                         </div>
                    </a>
                     <div class="card-body pt-4">
                        <?php echo wp_trim_words(get_the_content(),22);?>
                     </div>
                     <div class="card-footer pb-5">
                         <a href="<?php the_permalink(); ?>">Learn More</a>
                     </div>
                </div>
            </div>
             <?php  endwhile; wp_reset_query(); } ?>
        </div>
    </div>
</section>

<?php get_footer(); 