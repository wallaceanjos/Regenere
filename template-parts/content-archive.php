<div class="col-md-6 col-lg-6 mb-60 mb-xs-40">
    
    <div class="post-prev-img">
        <a href="<?php the_permalink()?>">
            <?php
                if(has_post_thumbnail()) {
                $thumbnail_url = get_the_post_thumbnail_url();
                echo '<img src="' . $thumbnail_url . '" alt="" />';
                }
            ?>
        </a>
    </div>

    <div class="post-prev-title font-alt">
        <a href="<?php the_permalink()?>"><?php the_title()?></a>
    </div>

    <div class="post-prev-info font-alt">
        <span><?php echo get_the_author_posts_link();?> | <?php echo get_the_date();?></span>
    </div>

    
    <div class="post-prev-text">
    <span><?php the_excerpt()?></span>
    </div>

    <div class="post-prev-more">
        <a href="<?php the_permalink()?>" class="btn btn-mod btn-gray btn-round">Ver mais<i class="fa fa-angle-right"></i></a>
    </div>
    
</div>

