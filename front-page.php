<?php
    get_header();
?>
            <?php
                if(have_posts()){
                    while(have_posts()){
                        the_post();
                        the_content();
                    }
                }
            ?>

            
                <?php
                    $sliders = get_posts(array(
                    'post_type' => 'slider',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    ));

                    if ($sliders) :
                ?>
                <!-- Fullwidth Slider -->
                <div class="fullwidth-slider owl-carousel bg-dark">
                    
                    <?php
                    $args = array(
                        'post_type' => 'slider',
                        'posts_per_page' => -1
                    );
                    $slider_posts = get_posts($args);
                    foreach ($slider_posts as $post) : setup_postdata($post);
                        $slider_cta_url = get_post_meta($post->ID, 'slider_cta_url', true);
                        $slider_cta_text = get_post_meta($post->ID, 'slider_cta_text', true);
                        $slider_embed_code = get_post_meta($post->ID, 'slider_embed_code', true);
                    ?>
                    
                    <?php
                        $post_id = get_the_ID();
                        $thumbnail_url = get_the_post_thumbnail_url($post_id);
                    ?>
                    
                    <!-- Slide Item -->
                    <section class="bg-dark" style="height: 100vh; display:flex; align-items: center;">
                        <div class="container relative">
                                
                            <div class="d-flex-column">
                                    
                                <div class="col-md-5 col-lg-4 mb-sm-40">
                                    
                                    <!-- About Project -->
                                        <h3 class="font-alt mb-30 mb-xxs-10"><?php the_title(); ?></h3>
                                        <p>
                                            <?php the_content(); ?>
                                        </p>
                                        
                                        <div class="mt-40">
                                            <a href="<?php echo $slider_cta_url; ?>" class="btn btn-mod btn-border-w btn-medium btn-round" target="_blank" rel="noopener"><?php echo $slider_cta_text; ?></a>
                                        </div>
                                    <!-- End About Project -->
                                    
                                </div>
                                
                                <div class="col-md-7 col-lg-offset-1">
                                
                                <?php if(isset($slider_embed_code) && !empty($slider_embed_code)) { ?>
                                    
                                    <!-- SE FOR URL DO YOUTUBE OU VIMEO COMEÇANDO COM http://player.vimeo.com OU https://www.youtube.com/  -->
                                    <div class="work-full-media mt-0">
                                        <?php if(isset($thumbnail_url) && !empty($thumbnail_url)) { ?>
                                        <img src="<?php echo $thumbnail_url; ?>" alt="" style="
                                            position: absolute;
                                            top: 0;
                                            right: 0;
                                            filter: blur(51px);
                                        ">
                                        <?php } ?>
                                    <div style="position:relative; background:url(https://img.youtube.com/vi/<?php echo get_post_meta( get_the_ID(), 'slider_embed_code', true ); ?>/hqdefault.jpg)no-repeat center center / cover">
                                            <iframe width="560"
                                                height="315"
                                                style="position: absolute; top: 0; left:0; width: 100%; height: 100%; border: 0; border-radius:12px"
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
                                                <a href='https://www.youtube.com/embed/<?php echo get_post_meta( get_the_ID(), 'slider_embed_code', true ); ?>?autoplay=1'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='64' height='64' viewBox='0 0 24 24' fill='none' stroke='#ffffff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-play-circle'><circle cx='12' cy='12' r='10'></circle><polygon points='10 8 16 12 10 16 10 8'></polygon></svg>
                                                </a>
                                                "
                                                src="https://www.youtube.com/embed/<?php echo get_post_meta( get_the_ID(), 'slider_embed_code', true ); ?>"
                                                title="<?php the_title() ?>"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                                allowfullscreen>
                                            </iframe>
                                        </div>
                                    </div>
                                    <!--  End  mídia youtube vimeo -->

                                <?php } elseif(isset($thumbnail_url) && !empty($thumbnail_url)) { ?>
                                
                                    <!-- Exibe apenas o código relacionado ao embed -->
                                    <div class="work-full-media mt-0">
                                        <img src="<?php echo $thumbnail_url; ?>" alt="" style="
                                        position: absolute;
                                        top: 0;
                                        right: 0;
                                        filter: blur(51px);
                                        ">
                                        <img src="<?php echo $thumbnail_url; ?>" alt="" style="
                                        position: relative;
                                        border-radius: 12px;
                                        ">
                                    </div>
                                    <!-- End midia image -->
                                    <?php } else {  ?>
                                        
                                    <?php } ?>
                                </div>
                                
                            </div>
                        </div>
                    </section>
                    <!-- End Slide Item -->
                    <?php endforeach;
                    wp_reset_postdata(); ?>
                    
                </div>
                <!-- End Fullwidth Slider -->
                <?php else : ?>
                <!-- Video Section -->
                <section class="home-section bg-dark-alfa-50" data-background="https://img.youtube.com/vi/bEid-Kob3BE/maxresdefault.jpg" id="home">
                    <div class="js-height-full container">

                        <div class="player" data-property="{videoURL:'http://youtu.be/bEid-Kob3BE',containment:'#home',autoPlay:true, showControls:false, showYTLogo: false, mute:true, startAt:0, opacity:1}">
                        </div>

                        <div class="home-content">
                            <div class="home-text">

                                <h2 class="grid-md-3">
                                    <div></div>
                                    <div class="text-left span-2c">
                                        <span class="text-rotate fs-64 fw-800 uppercase wow fadeInUp" data-wow-duration="2s">
                                            Se esta obra for de homens, acabará, mas se for de Deus, ninguém impedirá!| Não é sobre nós, mas sobre quem Ele é!
                                        </span>
                                    </div>
                                </h2>

                                

                            </div>
                        </div>

                        <div class="local-scroll">
                            <a href="#about" class="scroll-down"><i class="fa fa-angle-down scroll-down-icon"></i></a>
                        </div>

                    </div>
                </section>
                <!-- End Video Section -->
                <?php endif; ?>
            
            <!-- Section -->
            <section class="page-section bg-gray" id="store">
                <div class="container relative">
                    
                    <h2 class="section-title mb-70 mb-sm-40 d-flex-column d-flex-center-center">
                        <span class="uppercase fw-700 fs-40 base-fg">frentes ministeriais</span>
                        <svg class="understroke wow fadeIn mt--12" width="283" height="18" viewBox="0 0 283 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 14C14.321 14 23.8554 11.1914 34 11C44.0498 10.8104 53.7539 9.91089 63.7778 9.22222C75.9107 8.38866 88.4139 8 100.556 8C114.622 8 128.444 6 142.444 6C168.079 6 193.756 5 219.444 5C233.963 5 248.481 5 263 5C265.893 5 277.637 6.72636 279 4" stroke="#CEF955" stroke-width="8" stroke-linecap="round"/>
                        </svg>
                    </h2>
                    <?php
                        $imagem1_url = get_template_directory_uri() . '/assets/images/sponsor/sponsor-1.png';
                        $imagem2_url = get_template_directory_uri() . '/assets/images/sponsor/sponsor-2.png';
                        $imagem3_url = get_template_directory_uri() . '/assets/images/sponsor/sponsor-3.png';
                        $imagem4_url = get_template_directory_uri() . '/assets/images/sponsor/sponsor-4.png';
                        $imagem5_url = get_template_directory_uri() . '/assets/images/sponsor/sponsor-5.png';
                    ?>
                    
                    <div class="grid-md-5 gap-16">
                        <a href="#" class="h-152 aspect-ratio-1x1 wow fadeInUp" data-wow-duration="0s" style="background:url(<?php echo esc_url($imagem1_url); ?>)no-repeat center center/contain"></a href="#">
                        <a href="#" class="h-152 aspect-ratio-1x1 wow fadeInUp" data-wow-duration="0.5s" style="background:url(<?php echo esc_url($imagem2_url); ?>)no-repeat center center/contain"></a href="#">
                        <a href="#" class="h-152 aspect-ratio-1x1 wow fadeInUp" data-wow-duration="1s" style="background:url(<?php echo esc_url($imagem3_url); ?>)no-repeat center center/contain"></a href="#">
                        <a href="#" class="h-152 aspect-ratio-1x1 wow fadeInUp" data-wow-duration="1.5s" style="background:url(<?php echo esc_url($imagem4_url); ?>)no-repeat center center/contain"></a href="#">
                        <a href="#" class="h-152 aspect-ratio-1x1 wow fadeInUp" data-wow-duration="2s" style="background:url(<?php echo esc_url($imagem5_url); ?>)no-repeat center center/contain"></a href="#">
                    </div>
                    
                </div>
            </section>
            <!-- End Section -->
            
            <div class="d-flex-column d-flex-center-center">
                <a href="https://forms.monday.com/forms/5747da5c71c35af26d9de8ea0b455c62" class="cta-button uppercase fs-32 fw-800 mt--40 accent-bg py-16 px-48 base-fg" style="z-index:1;" target="_blank">quero fazer parte!</a>
            </div>

            <!-- About Section -->
            <section class="page-section" id="about">
                <div class="container relative">
                    
                    
                    <div class="section-text mb-50 mb-sm-20">
                        <div class="grid-md-2 gap-24">
                            
                            <div class="d-flex position-relative mb-64">
                                <svg class="understroke wow fadeIn max-w-48 w-48 min-48" width="38" height="462" viewBox="0 0 38 462" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M28.5297 2C22.8297 2.19 17.3097 4.16 11.6097 4.59C8.2097 4.85 2.6697 4.22 2.2197 9.06C1.5797 16.06 2.5497 23.52 2.7297 30.53C3.3597 54.36 3.9897 78.19 4.6197 102.02C6.5097 173.72 8.3997 245.41 10.2897 317.11C11.5297 363.98 13.9997 457.72 13.9997 457.72L14.0197 459.05L14.7097 459.58C21.6897 459.16 28.3597 457.72 35.2597 457.3" stroke="#8C69CC" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span class="fw-700 fs-32 base-fg lh-32 ml--16 mr-16 pt-12" style="transform: rotateZ(-2deg); max-width: 500px;">
                                    Somos os jovens da sede mundial da Igreja Deus é Amor. Usamos uma linguagem atual para alcançar os jovens do século 21 com o Evangelho genuíno de Cristo. Tendo a Bíblia como base de vida, entendemos que apenas através da regeneração (novo nascimento) pelo Espírito Santo podemos entrar no Reino de Deus e manifestá-lo na terra.
                                </span>
                            </div>

                            <div class="d-flex-column">
                                <div class="position-relative" style="min-height:560px;">
                                <?php
                                    $bg_gallery_url = get_template_directory_uri() . '/assets/images/photos/solidshadow.png';
                                    $photo1_url = get_template_directory_uri() . '/assets/images/photos/photo1.png';
                                    $photo2_url = get_template_directory_uri() . '/assets/images/photos/photo2.png';
                                    $photo3_url = get_template_directory_uri() . '/assets/images/photos/photo3.png';
                                    $photo4_url = get_template_directory_uri() . '/assets/images/photos/photo4.png';
                                ?>
                                    <img class="position-absolute wow zoomIn" src="<?php echo esc_url($bg_gallery_url); ?>" alt="">
                                    <img class="position-absolute wow zoomIn" data-wow-duration="1.8s" src="<?php echo esc_url($photo1_url); ?>" alt="">
                                    <img class="position-absolute wow zoomIn" data-wow-duration="1.2s" src="<?php echo esc_url($photo2_url); ?>" alt="" style="left: 275px; top: 39px;">
                                    <img class="position-absolute wow zoomIn" data-wow-duration="1s" src="<?php echo esc_url($photo3_url); ?>" alt="" style="left: 45px; top: 270px;">
                                    <img class="position-absolute wow zoomIn" data-wow-duration="2s" src="<?php echo esc_url($photo4_url); ?>" alt="" style="left: 275px; top: 270px;">
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- End About Section -->
            
             <!-- About Section -->
             <section class="page-section" id="about">
                <div class="container relative">
                    
                    <?php
                        $icon_1 = get_template_directory_uri() . '/assets/images/icons/icon-1.png';
                        $icon_2 = get_template_directory_uri() . '/assets/images/icons/icon-2.png';
                        $icon_3 = get_template_directory_uri() . '/assets/images/icons/icon-3.png';
                        $photo5_url = get_template_directory_uri() . '/assets/images/photos/photo5.webp';
                    ?>
                    <div class="section-text mb-48">
                        <div class="grid-md-2 gap-48">
                            <div class="d-flex-column base-fg">
                                <div class="d-flex-row gap-16">
                                    <div class="min-w-72 w-72 h-72" style="background: url(<?php echo esc_url($icon_1); ?>) no-repeat center center / cover"></div>
                                        <div class="d-flex-column gap-16">
                                            <span class="base-fg fs-64 lh-64 fw-800">Missão</span>
                                            <p class="fs-24 pr-48">Proporcionar aos jovens encontros genuínos com <b>Deus</b> para gerar mentes renovadas e um novo estilo de vida espiritual.</p>
                                        </div>
                                </div>
                            </div>
                            <div class="d-flex-column base-fg">
                                <div class="d-flex-row gap-16">
                                    <div class="min-w-72 w-72 h-72" style="background: url(<?php echo esc_url($icon_2); ?>) no-repeat center center / cover"></div>
                                    <div class="d-flex-column gap-16">
                                        <span class="base-fg fs-64 lh-64 fw-800">Visão</span>
                                        <p class="fs-24 pr-48">Ver gerações <b>REGENERADAS</b> pelo Espírito Santo e que disseminam o Reino de Deus, gerando transformação no mundo.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-text mb-24">
                        <div class="d-flex-center-center">
                            <div class="d-flex-column base-fg">
                                <div class="d-flex-row gap-16">
                                    <div class="min-w-72 w-72 h-72" style="background: url(<?php echo esc_url($icon_3); ?>) no-repeat center center / cover"></div>
                                    <div class="d-flex-column gap-16">
                                        <span class="base-fg fs-64 lh-64 fw-800">Valores</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <!-- Call Action Section -->
                <div id="talktome" class="page-section pt-0 pb-0 banner-section bg-dark" data-background="<?php echo esc_url($photo5_url); ?>">
                    <div class="container relative">

                        <div class="d-flex-column">

                            <div class="col-sm-6">

                                <div class="mt-140 mt-lg-80 mb-140 mb-lg-80">
                                    <div class="banner-content">
                                        <h3 class="banner-heading font-alt">Quer conversar comigo?</h3>
                                        <div class="banner-decription">
                                            Estou muito feliz de ter você aqui!<br>
                                            Gostaria de ficar por dentro de todas as novidades e conteúdos? 
                                        </div>
                                        <div class="local-scroll">
                                            <a href="https://api.whatsapp.com/send?phone=5521971946274" class="btn btn-mod btn-w btn-medium btn-round">Iniciar Whatsapp</a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-6 banner-image wow fadeInUp" data-wow-duration="1.2s">
                                <img src="https://portal.josuevalandro.com.br/wp-content/uploads/2023/04/josuevalandrojr.webp" alt="" style="border-radius:12px;" />
                            </div>

                        </div>

                    </div>
                </div>
                <!-- End Call Action Section -->
                
            </section>
            <!-- End About Section -->
            

<?php
    get_footer();
?>