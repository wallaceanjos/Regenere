    <!-- Post -->
    <div class="blog-item">
        
        <!-- Post Title -->
        <h2 class="blog-item-title font-alt"><a href="<?php the_permalink()?>"><?php the_title() ?></a></h2>
        
        <!-- Author, Categories, Comments -->
        <div class="blog-item-data">
            <a href="#"><i class="fa fa-clock-o"></i><?php echo get_the_date('j M');?></a>
            <span class="separator">&nbsp;</span>
            <a href="#"><i class="fa fa-user"></i><?php the_author() ?></a>
            <span class="separator">&nbsp;</span>
            <i class="fa fa-folder-open"></i>
            <?php
                $tags = get_tags(); // Obter uma lista de todas as tags
                if ($tags) {
                    foreach ($tags as $tag) {
                        $tag_link = get_tag_link($tag->term_id); // Obter o link para a tag
                        echo '<a href="' . $tag_link . '">' . $tag->name . '</a>, '; // Exibir a tag e o link
                    }
                }
                ?>
            <span class="separator">&nbsp;</span>
            <a href="#"><i class="fa fa-comments"></i><?php comments_number();?></a>
        </div>
        
        <!-- Media Gallery -->
        <div class="blog-media">
            <ul class="clearlist content-slider">
                <li>
                    <?php display_related_images(); ?>
                </li>
            </ul>
        </div>
        
        <!-- Text Intro -->
        <div class="blog-item-body">
            <p><?php the_excerpt()?></p>
        </div>
        
        <!-- Read More Link -->
        <div class="blog-item-foot">
            <a href="<?php the_permalink()?>" class="btn btn-mod btn-round  btn-small">Ver Mais <i class="fa fa-angle-right"></i></a>
        </div>
        
    </div>
    <!-- End Post -->