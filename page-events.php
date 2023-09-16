<?php
    get_header();
?>

<!-- Head Section -->
<section class="small-section bg-dark">
    <div class="relative container align-left">
        
        <div class="row">
            
            <div class="col-md-8">
                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Eventos</h1>
                <div class="hs-line-4 font-alt">
                    Divulgação dos proximos eventos.
                </div>
            </div>
            
            <div class="col-md-4 mt-30">
                <div class="mod-breadcrumbs font-alt align-right">
                    <?php get_breadcrumb();?> &nbsp;/&nbsp;<span>Eventos</span>
                </div>
                
            </div>
        </div>
        
    </div>
</section>
<!-- End Head Section -->

<!-- Section -->
<section class="page-section">
    <div class="container relative">
        
        <div class="row">
            
            <!-- Content -->
            <div class="col-sm-10 col-sm-offset-1">
            
                <?php
                    $args = array(
                        'category_name' => 'eventos',
                        'posts_per_page' => -1
                    );
                    $eventos = new WP_Query( $args );
                    if ( $eventos->have_posts() ) : while ( $eventos->have_posts() ) : $eventos->the_post();
                ?>
            
                <!-- Post -->
                <div class="blog-item">
                    <?php
                        // Recupera a data do evento
                        $data_do_evento = get_post_meta( get_the_ID(), '_data_do_evento', true );
                        // Formata a data para obter somente o dia
                        $dia = date( 'd', strtotime( $data_do_evento ) );
                        $mes = date_i18n( 'M', strtotime( $data_do_evento ) );
                    ?>

                    <!-- Date -->
                    <div class="blog-item-date">
                        <span class="date-num"><?php echo $dia; ?></span><?php echo $mes;?>
                    </div>
                    
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
                <?php endwhile; endif; wp_reset_postdata(); ?>

                <!-- Pagination -->
                <?php
                    get_template_part('template-parts/content', 'pagination');
                ?>
                <!-- End Pagination -->
                
            </div>
        </div>
        
    </div>
</section>

<?php
    get_footer();
?>