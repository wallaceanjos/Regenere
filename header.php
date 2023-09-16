<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta charset="utf-8">
        <meta name="Wallace dos Anjos" content="https://losanjos.agency/">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <title><?php echo get_bloginfo('name') ?></title>
        <!-- Favicons -->
        <link rel="shortcut icon" href="https://portal.josuevalandro.com.br/wp-content/uploads/2023/03/cropped-favicon.png">

        <!-- CSS -->
        <?php
            wp_head();
        ?>
        <style>
            .nav-logo-wrap .logo {
                max-width: 188px;
            }
            .banner-image img {
                transform: translateY(20px);
            }
        </style>

    </head>
    <body class="appear-animate">
        <!-- Page Loader -->        
        <div class="page-loader">
            <div class="loader">Loading...</div>
        </div>
        <!-- End Page Loader -->

        <!-- Page Wrap -->
        <div class="page" id="top">
        <?php if (is_home() || is_page() && !is_page('home')) {} ?>
        <?php if (is_front_page()) { ?>
            <!-- Navigation panel -->
            <nav class="main-nav dark stick-fixed js-transparent transparent">
                <div class="full-wrapper relative clearfix">
                    <!-- Logo ( * your text or image into link tag *) -->
                    <div class="nav-logo-wrap local-scroll">
                        <a href="#top" class="logo">
                        <?php
                            wpdev_filter_login_head();
                        ?>
                        </a>
                    </div>
                    <div class="mobile-nav">
                        <i class="fa fa-bars"></i>
                    </div>
                    <!-- Main Menu -->
                    <div class="inner-nav desktop-nav">
                        <?php
                            // exibe o menu com link x
                            wp_nav_menu( array( 'menu' => '2', 'menu_class' => 'menu' ) );
                        ?>
                            <!-- Social Links -->
                        <ul  class="clearlist scroll-nav local-scroll social-bar">
                            <li class="d-flex">
                                <a href="https://instagram.com/josuevalandrojr/" target="blank"><span class="mn-soc-link tooltip-bot" title="Instagram"><i class="fa fa-instagram"></i></span></a>
                                <a href="https://youtube.com/PRJOSUEVALANDROJR" target="blank"><span class="mn-soc-link tooltip-bot" title="YouTube"><i class="fa fa-youtube"></i></span></a>
                                <a href="https://facebook.com/prjosuevalandrojr/" target="blank"><span class="mn-soc-link tooltip-bot" title="Facebook"><i class="fa fa-facebook"></i></span></a>
                                <a href="https://twitter.com/pastorjosue" target="blank"><span class="mn-soc-link tooltip-bot" title="Twitter"><i class="fa fa-twitter"></i></span></a>
                            </li>
                            <!-- End Social Links  -->
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navigation panel -->
            <?php } else { ?>

            <!-- Navigation panel -->
            <nav class="main-nav js-stick">
                <div class="full-wrapper relative clearfix">
                    <!-- Logo ( * your text or image into link tag *) -->
                    <div class="nav-logo-wrap local-scroll">
                        <a href="https://portal.josuevalandro.com.br/#home" class="logo">
                            <?php
                                $image = get_page_by_title( 'logo-dark', OBJECT, 'attachment' );
                                if ( $image ) {
                                    $image_url = wp_get_attachment_url( $image->ID );
                                    echo '<img src="' . $image_url . '" alt="Descrição da imagem">';
                                }
                            ?>
                        </a>
                    </div>
                    <div class="mobile-nav">
                        <i class="fa fa-bars"></i>
                    </div>
                    
                    <!-- Main Menu -->
                    <div class="inner-nav desktop-nav">
                        <?php // exibe o menu com link y
                            wp_nav_menu( array( 'menu' => '3', 'menu_class' => 'menu' ) );
                        ?>
                        <ul class="clearlist">
                            
                            <!-- Divider -->
                            <li><a>&nbsp;</a></li>
                            <!-- End Divider -->
                            
                            <!-- Search -->
                            <li>
                                <a href="#" class="mn-has-sub"><i class="fa fa-search"></i> Pesquisa</a>
                                
                                <ul class="mn-sub">
                                    
                                    <li>
                                        <div class="mn-wrap">
                                            <?php
                                                get_template_part('template-parts/content', 'search');
                                            ?>
                                        </div>
                                    </li>
                                    
                                </ul>
                                
                            </li>
                            <!-- End Search -->
                            
                            
                            
                        </ul>
                    </div>
                    <!-- End Main Menu -->
                    

                </div>
            </nav>
            <!-- End Navigation panel -->

            <?php 
            }
            ?>