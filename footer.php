            <!-- Contact Section -->
            <!-- <section class="page-section" id="contact">
                <div class="container relative">

                    <h2 class="section-title font-alt mb-70 mb-sm-40">
                        Contatos
                    </h2>

                    <div class="row mb-60 mb-xs-40">

                        <div class="col-md-8 col-md-offset-2">
                            <div class="row">
                                
                                <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                                    <div class="contact-item">
                                        <div class="ci-icon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <div class="ci-title font-alt">
                                            Telefone
                                        </div>
                                        <div class="ci-text">
                                            +55 21 97194-6274
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                                    <div class="contact-item">
                                        <div class="ci-icon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <div class="ci-title font-alt">
                                            Endereço
                                        </div>
                                        <div class="ci-text">
                                            Rua Sylvio da Rocha Pollis, 751
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                                    <div class="contact-item">
                                        <div class="ci-icon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="ci-title font-alt">
                                            E-mail
                                        </div>
                                        <div class="ci-text">
                                            <a href="mailto:contato@josuevalandrojr.com.br">contato@josuevalandrojr.com.br</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </section> -->
            <!-- End Contact Section -->


            <!-- Google Map -->
            <!-- <div class="google-map">

                <a href="#" class="map-section">

                    <div class="map-toggle">
                        <div class="mt-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="mt-text font-alt">
                            <div class="mt-open">Abrir o mapa <i class="fa fa-angle-down"></i></div>
                            <div class="mt-close">Fechar o mapa <i class="fa fa-angle-up"></i></div>
                        </div>
                    </div>

                </a>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3567.899775966!2d-43.43454450414234!3d-23.007347043991615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9bdcea0431dc37%3A0xe9f9682b65baee8d!2sIgreja%20Batista%20Atitude!5e0!3m2!1spt-BR!2sbr!4v1572920930161!5m2!1spt-BR!2sbr" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

            </div> -->
            <!-- End Google Map -->


            <!-- Foter -->
            <footer class="page-section primary-bg-500 footer pb-60">
                <div class="container">
                    
                    <?php
                        $logo_footer_url = get_template_directory_uri() . '/assets/images/logo-footer.png';
                    ?>

                    <!-- Footer Logo -->
                    <div class="local-scroll mb-30 wow fadeInUp" data-wow-duration="1.2s">
                        <a href="#top"><img src="<?php echo esc_url($logo_footer_url); ?>" height="36" alt="" /></a>
                    </div>
                    <!-- End Footer Logo -->
              
                    

                    <!-- Footer Text -->
                    <div class="footer-text">

                        <!-- Copyright -->
                        <div class="footer-copy font-alt">
                            <a href="#home" target="_blank">&copy; Regenere. 2023</a>.
                        </div>
                        <!-- End Copyright -->

                        <div class="footer-made">
                            Com amor.
                        </div>

                    </div>
                    <!-- End Footer Text -->

                 </div>


                 <!-- Top Link -->
                 <div class="local-scroll">
                     <a href="#top" class="link-to-top"><i class="fa fa-caret-up"></i></a>
                 </div>
                 <!-- End Top Link -->

            </footer>
            <!-- End Foter -->

        </div>
        <!-- End Page Wrap -->

        <!-- JS -->
        <?php
            wp_footer();
        ?>
        <!--[if lt IE 10]><script type="text/javascript" src="js/placeholder.js"></script><![endif]-->

    </body>
</html>
