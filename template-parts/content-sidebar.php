

    <!-- Search Widget -->
    <div class="widget">
        <?php
            if(have_posts()){
                the_post();
                get_template_part('template-parts/content', 'search');
            }
        ?>
    </div>
    <!-- End Search Widget -->
    
    <!-- Widget Categories-->
    <div class="widget">
        
        <h5 class="widget-title font-alt">Categorias</h5>
        
        <div class="widget-body">
            <?php
                $categories = get_categories(); // Obter uma lista de todas as categorias
                if ($categories) {
                    echo '<ul class="clearlist widget-menu">';
                    foreach ($categories as $category) {
                        $category_link = get_category_link($category->term_id); // Obter o link para a categoria
                        $category_count = $category->count; // Obter o número de posts na categoria
                        echo '<li><a href="' . $category_link . '">' . $category->name . '</a> - <small>' . $category_count . '</small></li>'; // Exibir a categoria e o número de posts
                    }
                    echo '</ul>';
                }
            ?>
        </div>
        
    </div>
    <!-- End Widget -->
    
    <!-- Widget Tags-->
    <div class="widget">
        
        <h5 class="widget-title font-alt">Assunto</h5>
        
        <div class="widget-body">
            <div class="tags">
            <?php
                $tags = get_tags(); // Obter uma lista de todas as tags
                if ($tags) {
                    foreach ($tags as $tag) {
                        $tag_link = get_tag_link($tag->term_id); // Obter o link para a tag
                        echo '<a href="' . $tag_link . '">' . $tag->name . '</a>'; // Exibir a tag e o link
                    }
                }
                ?>
            </div>
        </div>
        
    </div>
    <!-- End Widget -->
    
    <!-- Widget Últimas publicações-->
    <div class="widget">
        
        <h5 class="widget-title font-alt">Últimas publicações</h5>
        
        <div class="widget-body">
            <ul class="clearlist widget-posts">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 5
                );
                $query = new WP_Query($args);

                if($query->have_posts()) {
                    while($query->have_posts()) {
                        $query->the_post();
                        ?>
                        <li class="clearfix">
                        <div class="widget-posts-descr">
                            <a href="<?php the_permalink()?>" title=""><?php the_title()?></a>
                            Publicado por <?php the_author() ?> <?php echo get_the_date('j M');?>
                        </div>
                        </li>
                        <?php
                    }
                }
                wp_reset_postdata();
                ?>
                
            </ul>
        </div>
        
    </div>
    <!-- End Widget -->