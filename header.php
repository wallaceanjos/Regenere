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

        <!-- Assets -->
        <?php
            $social_1 = get_template_directory_uri() . '/assets/images/icons/social-1.png';
            $social_2 = get_template_directory_uri() . '/assets/images/icons/social-2.png';
            $social_3 = get_template_directory_uri() . '/assets/images/icons/social-3.png';
        ?>
        <!-- Assets -->
            
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
                            <li class="d-flex gap-16">
                                <a href="https://www.youtube.com/@MinisterioRegenere" target="blank"><img src="<?php echo esc_url($social_1); ?>" alt=""></a>
                                <a href="https://www.instagram.com/ministerioregenere/" target="blank"><img src="<?php echo esc_url($social_2); ?>" alt=""></a>
                                <a href="https://www.facebook.com/ministerioregenere/" target="blank"><img src="<?php echo esc_url($social_3); ?>" alt=""></a>
                            </li>
                            <!-- End Social Links  -->
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navigation panel -->
            <?php } else { ?>

            <!-- Navigation panel -->
            <nav class="main-nav dark stick-fixed">
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
                            <li class="d-flex gap-16">
                                <a href="https://www.youtube.com/@MinisterioRegenere" target="blank"><img src="<?php echo esc_url($social_1); ?>" alt=""></a>
                                <a href="https://www.instagram.com/ministerioregenere/" target="blank"><img src="<?php echo esc_url($social_2); ?>" alt=""></a>
                                <a href="https://www.facebook.com/ministerioregenere/" target="blank"><img src="<?php echo esc_url($social_3); ?>" alt=""></a>
                            </li>
                            <!-- End Social Links  -->
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navigation panel -->

            <?php 
            }
            ?>