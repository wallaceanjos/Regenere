<form method="get" class="form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="search-wrap">
        <input type="text" class="form-control search-field" name="s" value="<?php echo get_search_query(); ?>" placeholder="Pesquise...">
        <button class="search-button animate" type="submit" title="Start Search">
            <i class="fa fa-search"></i>
        </button>
    </div>
</form>