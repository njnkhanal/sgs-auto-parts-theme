<?php 

get_header(); ?>



    <section>

        <?php if (have_rows('banner')) : ?>
            <?php while(have_rows('banner')) : the_row(); ?>

        <div class="sn-hero">
            <?php $img = get_sub_field('bg_img'); ?>
            <?php if(!empty($img)) : ?>
                <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_url($img['alt']); ?>">
            <?php endif; ?>
            <div class="sn-filter-override h-100">

                <div class="container d-flex h-100">

                    <div class="w-50 mx-auto sn-form-container">

                        <div class="text-white banner p-3">
                            <?php $title = get_sub_field('bg_title'); ?>
                            <?php $desc = get_sub_field('bg_desc'); ?>

                            <?php if(!empty($title)) : ?>

                                <h4 class="text-light sn-tophero-text">
                                <?php echo($title); ?> <span>Subaru And Volkswagen</span> </h4>
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

<!-- 

    <section class="sn-about-section">

        <div class="container">

            <div class="row">

                <div class="col-md-8 col-12 d-flex">

                    <div class="m-auto">

                        <div class="text-center">

                            

                            <h3 class="sn-title">

                                Welcome to SGS Auto Parts

                            </h3>

                            <h4 class="sn-sub-title">

                                Wrecking All Makes & Models – Specialist VW & Subaru

                            </h4>

                        </div>

                        <div class="row pt-3">

                            <div class="col-md-6 col-12">

                                <ul>

                                    <li>Massive Range of Stock on the Shelf</li>

                                    <li>Thousands of vehicles Dismantled</li>

                                    <li>Instant access to millions of parts Australian wide</li>

                                </ul>

                            </div>

                            <div class="col-md-6 col-12">

                                <ul>

                                    <li>Quick Delivery – NSW & Australia Wide</li>

                                    <li>95% of every Vehicle recycled</li>

                                    <li>Preferred Capricorn Supplier</li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-4 col-12">

                    <div class="sn-about-img">

                        <img class="" src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2023/12/SGS-1920x450-C-.jpg" alt="">

                    </div>

                </div>

            </div>

        </div>

    </section> -->


    <section class="py-4">
        <div class="container pt-5">
            <div class="abt-bg" style="background-image: url('<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2023/12/about-image-1.jpg');
        background-repeat: no-repeat;
        background-position: top center; background-size: cover;">
                <div class="row">
                    <div class="col-md-6 col-12 w-50 p-5 left-half">
                        <h2>Welcome to SGS Auto Parts</h2>
                        <p>SGS Auto Parts has been operating in Thornleigh since February 2011. In November 2015 a large storage and dismantling facility was added at Kurri Kurri in the Hunter Valley.SGS Auto Parts has been operating in Thornleigh since February 2011. In November 2015 a large storage and dismantling facility was added at Kurri Kurri in the Hunter Valley.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container about-card py-5">
            <div class="row">
                <div class="col-md-3">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <h6>Massive Range of Stock on the Shelf</h6>
                     <p>SGS Auto Parts has been operating in Thornleigh since February 2011. In November 2015 a large storage </p>
                </div>

                <div class="col-md-3">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <h6>Thousands of vehicles Dismantled</h6>
                     <p>SGS Auto Parts has been operating in Thornleigh since February 2011. In November 2015 a large storage </p>
                </div>

                <div class="col-md-3">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <h6>95% of every Vehicle recycled</h6>
                     <p>SGS Auto Parts has been operating in Thornleigh since February 2011. In November 2015 a large storage </p>
                </div>

                <div class="col-md-3">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <h6>Preferred Capricorn Supplier</h6>
                     <p>SGS Auto Parts has been operating in Thornleigh since February 2011. In November 2015 a large storage </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-shade">
        <div class="container py-5">
            <h4>Volkswagen Parts</h4>
            <?php if(have_rows('volk_cat')) : ?>
                <div class="row cat-img">
                    <?php while(have_rows('volk_cat')) : the_row(); ?>
                        <div class="col-md-2 mt-4">
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
                        <div class="col-md-2 mt-4">
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
                    <div class="row">
                        <div class="col-md-2 my-4">
                            <span><a href="#">Accura</a></span>
                        </div>
                         <div class="col-md-2 my-4">
                            <span><a href="#">Chevy</a></span>
                        </div>
                         <div class="col-md-2 my-4">
                            <span><a href="#">Ford</a></span>
                        </div>
                        <div class="col-md-2 my-4">
                            <span><a href="#">Dodge</a></span>
                        </div>
                         <div class="col-md-2 my-4">
                            <span><a href="#">Toyata</a></span>
                        </div>
                         <div class="col-md-2 my-4">
                            <span><a href="#">Holda</a></span>
                        </div>

                        <div class="col-md-2 my-4">
                            <span><a href="#">Kia</a></span>
                        </div>
                         <div class="col-md-2 my-4">
                            <span><a href="#">Nissan</a></span>
                        </div>
                         <div class="col-md-2 my-4">
                            <span><a href="#">Huyndai</a></span>
                        </div>
                        <div class="col-md-2 my-4">
                            <span><a href="#">BMW</a></span>
                        </div>
                         <div class="col-md-2 my-4">
                            <span><a href="#">Audi</a></span>
                        </div>
                         <div class="col-md-2 my-4">
                            <span><a href="#">Valvo</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 my-4">
                            <span><a href="#">Convertible</a></span>
                        </div>
                         <div class="col-md-2 my-4">
                            <span><a href="#">A4 Prestige</a></span>
                        </div>
                         <div class="col-md-2 my-4">
                            <span><a href="#">Q7 Premium</a></span>
                        </div>
                        <div class="col-md-2 my-4">
                            <span><a href="#">City Express</a></span>
                        </div>
                         <div class="col-md-2 my-4">
                            <span><a href="#">Colorado</a></span>
                        </div>
                         <div class="col-md-2 my-4">
                            <span><a href="#">Civic</a></span>
                        </div>

                        <div class="col-md-2 my-4">
                            <span><a href="#">A6 Quattro Premium</a></span>
                        </div>
                         <div class="col-md-2 my-4">
                            <span><a href="#">Cherokee</a></span>
                        </div>
                         <div class="col-md-2 my-4">
                            <span><a href="#">Q7 Premium</a></span>
                        </div>
                        <div class="col-md-2 my-4">
                            <span><a href="#">Convertible</a></span>
                        </div>
                         <div class="col-md-2 my-4">
                            <span><a href="#">Q7 Premium</a></span>
                        </div>
                         <div class="col-md-2 my-4">
                            <span><a href="#">Colorado</a></span>
                        </div>
                    </div>
                </div>          
            </div>
        </div>
    </div>
</section>

<section class="bg-trans py-5">
    <div class="container py-4">
        <h2 class="text-center mb-5">Our Latest Blog</h2>

        <div class="row blog">
            <div class="col-md-4">
                <div class="card">
                     <img src="<? echo site_url(); ?>/wp-content/uploads/2023/12/caplogo.jpg" alt="">
                     <div class="card-header">
                         <h3>title</h3>
                     </div>
                     <div class="card-body">
                         SGS Auto Parts has been operating in Thornleigh since February 2011. In November 2015 a large storage and dismantling facility was added at Kurri Kurri in the Hunter Valley.
                     </div>
                     <div class="card-footer">
                         Learn More
                     </div>
                </div>
            </div>

             <div class="col-md-4">
                <div class="card">
                     <img src="<? echo site_url(); ?>/wp-content/uploads/2023/12/caplogo.jpg" alt="">
                     <div class="card-header">
                         <h3>title</h3>
                     </div>
                     <div class="card-body">
                         SGS Auto Parts has been operating in Thornleigh since February 2011. In November 2015 a large storage and dismantling facility was added at Kurri Kurri in the Hunter Valley.
                     </div>
                     <div class="card-footer">
                         Learn More
                     </div>
                </div>
            </div>

             <div class="col-md-4">
                <div class="card">
                     <img src="<? echo site_url(); ?>/wp-content/uploads/2023/12/caplogo.jpg" alt="">
                     <div class="card-header">
                         <h3>title</h3>
                     </div>
                     <div class="card-body">
                         SGS Auto Parts has been operating in Thornleigh since February 2011. In November 2015 a large storage and dismantling facility was added at Kurri Kurri in the Hunter Valley.
                     </div>
                     <div class="card-footer">
                         Learn More
                     </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); 