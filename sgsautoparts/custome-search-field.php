<h4>Search Blog</h4>

<form class="d-flex h-100 my-2 mt-3" action="<?php echo esc_url(home_url('/blog/')); ?>" method="GET">
    <div class="sn-cost-search">
        <input type="text" name="s" id="search" class="form-control" placeholder="<?php echo esc_attr_x('Search...', 'placeholder', 'your-theme'); ?>" aria-describedby="helpId" value="<?php echo get_search_query(); ?>">
        <button type="submit" class="btn  d-inline-block"><i class="fas fa-search"></i></button>
    </div>
</form>