<?php
    get_header();
?>
            <!-- Head Section -->
            <section class="small-section bg-dark">
                <div class="relative container align-left">
                    
                    <div class="row">
                        
                        <div class="col-md-8">
                            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Pesquisa</h1>
                            <div class="hs-line-4 font-alt">
                            <?php
                                if( have_posts() ) {
                                    $total_results = $wp_query->found_posts;
                                    echo "Foram encontrados {$total_results} resultados.";
                                    while( have_posts() ) {
                                        the_post();
                                        // rest of the loop
                                    }
                                } else {
                                    echo "Nenhum resultado encontrado.";
                                }
                            ?>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mt-30">
                            <div class="mod-breadcrumbs font-alt align-right">
                                <?php get_breadcrumb();?>
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
                        <div class="col-sm-8">
                            
                            <div class="row multi-columns-row">
                        
                                <!-- Post Item -->
                                <?php
                                  if(have_posts()){
                                      while(have_posts()){
                                          
                                          the_post();
                                          get_template_part('template-parts/content', 'archive');
                                          
                                      }
                                  }
                                ?>
                                
                                <!-- End Post Item -->
                                
                            </div>
                            
                            <!-- Pagination -->
                            <?php
                                if(have_posts()){
                                    the_post();
                                    get_template_part('template-parts/content', 'pagination');
                                }
                            ?>
                            <!-- End Pagination -->
                            
                        </div>
                        <!-- End Content -->
                        
                        <!-- Sidebar -->
                        <div class="col-sm-4 col-md-3 col-md-offset-1 sidebar">
                            <?php
                                if(have_posts()){
                                    the_post();
                                    get_template_part('template-parts/content', 'sidebar');
                                }
                            ?>
                        </div>
                        <!-- End Sidebar -->
                        
                </div>
            </section>
            <!-- End Section -->

            

<?php
    get_footer();
?>