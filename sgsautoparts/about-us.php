<?php 
    /*
        Template Name: About Us
    */
    get_header();
?>
<?php if(have_rows("banner")) : 
        while(have_rows('banner')) : the_row(); ?>
        <?php $img = get_sub_field('bg_img');
        if(!empty($img)): ?>
            <img src="<?php echo esc_url($img['url']) ?>"alt="<?php echo esc_url($img['alt']); ?>"class="w-100">
        <?php endif;?>

        <?php 
            $title = get_sub_field('bg_title');
            if(!empty($title)): ?>
            <h1><?php echo $title; ?></h1>
        <?php endif;?>
        
        <?php 
        $bg_desc = get_sub_field('bg_desc');
        if(!empty($bg_desc)): ?>
            <div>
                <?php echo $bg_desc; ?>
            </div>
        <?php endif;?>

<?php endwhile;
      endif; ?>
<?php 
get_footer();
?>