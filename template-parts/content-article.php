

        <!-- Post -->
        <div class="blog-item mb-80 mb-xs-40">
            
            <!-- Text -->
            <div class="blog-item-body">
                
             <!-- Media Gallery -->
             <div class="blog-media mt-40 mb-40 mb-xs-30">
                    <!-- Media Gallery -->
                    <?php 
                        function personalizar_embed_youtube( $html ) {
                            $search = array(
                                'src="https://www.youtube.com',
                                'width="',
                                'height="'
                            );

                            $replace = array(
                                'class="embed-responsive-item" src="https://www.youtube.com',
                                'class="embed-responsive-item" width="',
                                'class="embed-responsive-item" height="'
                            );

                            $html = str_replace( $search, $replace, $html );

                            return '<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>';
                        }

                        add_filter( 'embed_oembed_html', 'personalizar_embed_youtube', 10, 4 );

                    ?>

                    
                    <!-- <iframe width="640" height="360" src="http://www.youtube.com/embed/gaLR-8bMB9U" frameborder="0" allowfullscreen></iframe> -->
            
                    <!-- <div style="position:relative;">
                        <iframe width="560"
                            height="315"
                            style="position: absolute; top: 0; left:0; width: 100%; height: 100%; border: 0;"
                            loading="lazy";
                            srcdoc="<style>
                            * {
                            padding: 0;
                            margin: 0;
                            overflow: hidden;
                            }
                            
                            body, html {
                                height: 100%;
                            }
                            
                            img, svg {
                                position: absolute;
                                width: 100%;
                                top: 0;
                                bottom: 0;
                                margin: auto;
                            }
                            
                            svg {
                                filter: drop-shadow(1px 1px 10px hsl(206.5, 70.7%, 8%));
                                transition: all 250ms ease-in-out;
                            }
                            
                            body:hover svg {
                                filter: drop-shadow(1px 1px 10px hsl(206.5, 0%, 10%));
                                transform: scale(1.2);
                            }
                            </style>
                            <a href='https://www.youtube.com/embed/gaLR-8bMB9U?autoplay=1'>
                            <img src='https://img.youtube.com/vi/gaLR-8bMB9U/hqdefault.jpg' alt='<?php the_title() ?>'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='64' height='64' viewBox='0 0 24 24' fill='none' stroke='#ffffff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-play-circle'><circle cx='12' cy='12' r='10'></circle><polygon points='10 8 16 12 10 16 10 8'></polygon></svg>
                            </a>
                            "
                            src="https://www.youtube.com/embed/gaLR-8bMB9U?autoplay=1" 
                            title="<?php the_title() ?>"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    </div> -->

                    <!-- <ul class="clearlist content-slider">
                        <li>
                            <img src="/wordpress/wp-content/themes/joshua/assets/images/portfolio/full-project-1.jpg" alt="" />
                        </li>
                        <li>
                            <img src="/wordpress/wp-content/themes/joshua/assets/images/portfolio/full-project-2.jpg" alt="" />
                        </li>
                        <li>
                            <img src="/wordpress/wp-content/themes/joshua/assets/images/portfolio/full-project-3.jpg" alt="" />
                        </li>
                    </ul> -->
                </div>
                <h1 class="mt-0 font-alt"><?php the_title() ?></h1>
            
                <div class="lead">
                    <p>
                        <?php the_excerpt() ?>
                        
                    </p>
                </div>
                <!-- End Text -->

                <?php
                    the_content();
                ?>

                <?php
                    comments_template();
                ?>
                
                
            </div>
            <!-- End Text -->
            
        </div>
        <!-- End Post -->
        
        <!-- Prev/Next Post -->
        <div class="clearfix mt-40">
        <?php $next_post = get_next_post(); ?>
        <?php if (!empty($next_post)): ?>
            <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="btn btn-mod btn-border btn-round btn-medium right"><?php echo 'Next post'; ?>&nbsp;<i class="fa fa-angle-right"></i></a>
        <?php endif; ?>

        <?php $prev_post = get_previous_post(); ?>
        <?php if (!empty($prev_post)): ?>
            <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" class="btn btn-mod btn-border btn-round btn-medium left"><i class="fa fa-angle-left"></i>&nbsp;<?php echo 'Prev post'; ?></a>
        <?php endif; ?>
        </div>
        <!-- End Prev/Next Post -->

