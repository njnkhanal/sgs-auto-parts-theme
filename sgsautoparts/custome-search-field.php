<h4>Search Blog</h4>

<form role="search" method="get" class="search-form d-flex my-2" action="<?php echo esc_url(home_url('/blog/')); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x('Search for:', 'label', 'your-theme'); ?></span>
        <input type="search" class="form-control" placeholder="<?php echo esc_attr_x('Search...', 'placeholder', 'your-theme'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="search-submit button"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
