<?php
    get_header();
?>
<?php
    // Obtém o ID da página "rgnrmusic" pelo seu título
    $rgnrmusic_page = get_page_by_title('RGNRMusic');
    $logo_sponsor = get_template_directory_uri() . '/assets/images/sponsor/rgnrmusic.png';

    if ($rgnrmusic_page) {
        // Obtém o conteúdo da página
        $rgnrmusic_content = apply_filters('the_content', $rgnrmusic_page->post_content);
    } else {
        $rgnrmusic_content = 'Página não encontrada.';
    }
?>
<section class="page-section d-flex-column">
    <div class="container">
        <div class="grid-md-2 gap-16 mb-64">
            <div class="d-flex-column ratio-16x9" style="background:url(<?php echo esc_url($logo_sponsor); ?>)no-repeat center center/cover">
                <img src="<?php echo esc_url($logo_sponsor); ?>" alt="">
            </div>
            <div class="fw-700 fs-24 base-fg lh-32 sponsor d-flex-center-center">
                <p class="m-0">
                    <?php
                        echo $rgnrmusic_content;
                    ?>
                </p>
            </div>
        </div>
        <div class="d-flex-center overflow-hidden" style="border-radius:50px">
            <iframe
                class="ratio-16x9" width="100%"
                src="https://www.youtube.com/embed/buKsMSgYT9E&autoplay=1"
                srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/buKsMSgYT9E?autoplay=1><img src=https://img.youtube.com/vi/buKsMSgYT9E/maxresdefault.jpg alt='<?php the_title() ?>'><span>▶</span></a>"
                frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
                title="<?php the_title() ?>">
            </iframe>
        </div>
    </div>
</section>
<?php
    get_footer();
?>