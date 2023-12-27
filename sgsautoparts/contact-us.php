<?php 
    /*
        Template Name: Contact Us
    */
    get_header(); ?>


<div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d212014.09978851542!2d150.9743771019109!3d-33.871098277985425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12a7055c69849f%3A0x19caea528cfb4071!2sSGS%20Auto%20Parts!5e0!3m2!1sen!2sus!4v1703066764104!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <div class="row py-3">
        <div class="col-md-5 col-12">
            <h4>SGS Auto Parts</h4>
            <p>ABN 29 778 876 348</p>

            <p>
                48 Fairfield St <br>
                Fairfield East NSW 2165
            </p>

            <p>
                153 Mitchell Ave, <br>
                Kurri Kurri NSW 2327
            </p>

            <p>
                T: <a href="tel:0299800000">02 9980 0000</a><br>
                E: <a href="mailto:sales@sgspp.com.au">sales@sgspp.com.au</a>
            </p>
        </div>
        <div class="col-md-7 col-12 sn-no-p-mb">
            <?php echo do_shortcode('[gravityform id="2" title="true"]') ?>
        </div>
    </div>
</div>

<?php 
get_footer();
