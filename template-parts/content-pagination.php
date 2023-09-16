<!-- Pagination -->
<div class="pagination">
    <?php
        if ( $wp_query->max_num_pages > 1 ) :
            if ( is_search() ) {
                $args = array(
                    'base' => home_url( '/page/%#%/?s=' . get_query_var('s') ),
                    'format' => '&paged=%#%',
                    'total' => $wp_query->max_num_pages,
                    'current' => max( 1, get_query_var( 'paged' ) ),
                    'show_all' => false,
                    'end_size' => 2,
                    'mid_size' => 3,
                    'prev_next' => true,
                    'prev_text' => '<i class="fa fa-angle-left"></i>',
                    'next_text' => '<i class="fa fa-angle-right"></i>',
                    'type' => 'plain',
                    'add_args' => false,
                    'add_fragment' => ''
                );
            } elseif ( is_category() || is_tag() ) {
                $args = array(
                    'base' => get_pagenum_link() . '%_%',
                    'format' => 'page/%#%/',
                    'total' => $wp_query->max_num_pages,
                    'current' => max( 1, get_query_var( 'paged' ) ),
                    'show_all' => false,
                    'end_size' => 2,
                    'mid_size' => 3,
                    'prev_next' => true,
                    'prev_text' => '<i class="fa fa-angle-left"></i>',
                    'next_text' => '<i class="fa fa-angle-right"></i>',
                    'type' => 'plain',
                    'add_args' => false,
                    'add_fragment' => ''
                );
            }
            echo '<div class="pagination">' . paginate_links( $args ) . '</div>';
        endif;
    ?>
</div>
<!-- End Pagination -->