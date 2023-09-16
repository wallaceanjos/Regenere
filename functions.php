<?php
function joshua_theme_support(){
    // add title tag dinamically
    add_theme_support('title-tag');
	add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'joshua_theme_support');

function joshua_menus(){

    register_nav_menus( array(
        'menu-front' => 'Menu da página inicial',
        'menu-outras' => 'Menu para outras páginas'
    ) );
}
add_action('init', 'joshua_menus');


function wpdev_filter_login_head() {

    if ( has_custom_logo() ) :

        $image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
        ?>
        <style type="text/css">
            .nav-logo-wrap a {
                background: url(<?php echo esc_url( $image[0] ); ?>) no-repeat center center / contain;
                width: <?php echo absint( $image[1] ) ?>px;
                height: <?php echo absint( $image[2] ) ?>px;
            }
        </style>
        <?php
    endif;
}
add_action( 'login_head', 'wpdev_filter_login_head', 100 );


function get_category_events_posts( $query ) {
    if ( is_admin() || ! $query->is_main_query() ) {
      return;
    }
   
    if ( is_page( 'events' ) ) { // Substitua 'nome-da-pagina' pelo slug da página que você criou
      $query->set( 'category_name', 'eventos' ); // Substitua 'eventos' pelo slug da categoria que você quer exibir
    }
  }
  add_action( 'pre_get_posts', 'get_category_events_posts' );


// Exibir até 3 imagens relacionadas em cada post na listagem
function display_related_images() {
    global $post;
    $post_id = $post->ID;
    $related_images = get_attached_media('image', $post_id);
    $count = 0;
    $has_thumbnail = false;
    if (has_post_thumbnail() || $related_images ){
        echo '<div class="blog-media">
                <ul class="clearlist content-slider">';
                    // Verificar se o post tem uma imagem em destaque (thumbnail) e exibi-la primeiro
                    if (has_post_thumbnail()) {
                        $has_thumbnail = true;
                        $thumbnail_id = get_post_thumbnail_id();
                        $thumbnail_image = wp_get_attachment_image_src($thumbnail_id, 'thumbnail');
                        echo '<li>';
                        echo '  <a href="' . get_permalink() . '" style="display:block;background:url('. $thumbnail_image[0] .')no-repeat center center / cover">
                                    <img width="100%" height="auto" src="https://portal.josuevalandro.com.br/wp-content/uploads/2023/04/placeholder-16x9-1.png" alt="' . get_the_title() . '">
                                </a>';
                        echo '</li>';
                        $count++;
                    }
                    
                    // Exibir até 2 imagens adicionais relacionadas
                    if ($related_images) {
                        foreach ($related_images as $image) {
                            if ($count < 3) {
                                // Ignorar a imagem em destaque se já foi exibida
                                if ($has_thumbnail && $image->ID == $thumbnail_id) {
                                    continue;
                                }
                                echo '<li>';
                                echo '  <a href="' . get_permalink() . '" style="display:block;background:url('. $image->guid .')no-repeat center center / cover">
                                            <img width="100%" height="auto" src="https://portal.josuevalandro.com.br/wp-content/uploads/2023/04/placeholder-16x9-1.png" alt="' . $image->post_title . '">
                                        </a>';
                                echo '</li>';
                                $count++;
                            } else {
                                break;
                            }
                        }
                    }
        echo '</ul></div>';
    }
}


// CRIA CAIXA DE DATA DO EVENTO QUANDO SELECIONADO CATEGORIA DE EVENTO EM UM POST
function evento_add_meta_box() {
    $screens = ['post']; // Especifica em quais post types o meta box será exibido.
    foreach ( $screens as $screen ) {
        add_meta_box(
            'evento_meta_box', // ID do meta box
            'Data do evento', // Título do meta box
            'evento_meta_box_callback', // Callback function
            'post', // Post type
            'side', // Contexto do meta box
            'high' // Prioridade do meta box
        );
    }
}
add_action( 'add_meta_boxes', 'evento_add_meta_box' );

function evento_meta_box_callback( $post ) {
    wp_nonce_field( 'evento_meta_box', 'evento_meta_box_nonce' );
    $data_do_evento = get_post_meta( $post->ID, '_data_do_evento', true );
    ?>
    <p>
        <label for="data_do_evento">Data do evento:</label>
        <br>
        <input type="date" id="data_do_evento" name="data_do_evento" value="<?php echo esc_attr( $data_do_evento ); ?>">
    </p>
    <?php
}

function evento_save_meta_box_data( $post_id ) {
    if ( ! isset( $_POST['evento_meta_box_nonce'] ) ) {
        return;
    }
    if ( ! wp_verify_nonce( $_POST['evento_meta_box_nonce'], 'evento_meta_box' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( isset( $_POST['post_type'] ) && 'post' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }
    if ( ! isset( $_POST['data_do_evento'] ) ) {
        return;
    }
    $data_do_evento = sanitize_text_field( $_POST['data_do_evento'] );
    update_post_meta( $post_id, '_data_do_evento', $data_do_evento );
}
add_action( 'save_post', 'evento_save_meta_box_data' );


// Cria um custom post do tipo slider
function create_post_type() {
    register_post_type( 'slider',
        array(
            'labels' => array(
                'name' => __( 'Slides' ),
                'singular_name' => __( 'Slide' )
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'taxonomies' => array('category', 'post_tag'),
            'rewrite' => array('slug' => 'slides'),
        )
    );
}
add_action( 'init', 'create_post_type' );

// Adiciona metaboxes para campos personalizados
function add_slider_metaboxes() {
    add_meta_box('slider_cta_url', 'Link de apontamento do botão CTA', 'slider_cta_url_callback', 'slider', 'normal', 'default');
    add_meta_box('slider_cta_text', 'Label do botão CTA', 'slider_cta_text_callback', 'slider', 'normal', 'default');
    add_meta_box('slider_embed_code', 'Id do video do YouTube', 'slider_embed_code_callback', 'slider', 'normal', 'default');
}
add_action( 'add_meta_boxes', 'add_slider_metaboxes' );

// Define a função de callback para o campo de CTA URL
function slider_cta_url_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'slider_cta_url_nonce');
    $value = get_post_meta( $post->ID, 'slider_cta_url', true );
    echo '<label for="slider_cta_url_field">Insira a URL do CTA:</label><br>';
    echo '<input type="text" id="slider_cta_url_field" name="slider_cta_url_field" value="' . esc_attr( $value ) . '" size="50"><br>';
}

// Define a função de callback para o campo de CTA TEXT
function slider_cta_text_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'slider_cta_text_nonce');
    $value = get_post_meta( $post->ID, 'slider_cta_text', true );
    echo '<label for="slider_cta_text_field">Insira a text do CTA:</label><br>';
    echo '<input type="text" id="slider_cta_text_field" name="slider_cta_text_field" value="' . esc_attr( $value ) . '" size="50"><br>';
}

// Define a função de callback para o campo de embed code
function slider_embed_code_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'slider_embed_code_nonce' );
    $value = get_post_meta( $post->ID, 'slider_embed_code', true );
    echo '<label for="slider_embed_code_field">Insira apenas a Id do vídeo</label><br>';
    echo '<input type="text" id="slider_embed_code_field" name="slider_embed_code_field" value="' . esc_attr( $value ) . '" size="50"><br>';
}

function save_slider_meta( $post_id ) {
    // Verifica se o nonce está correto
    if ( ! isset( $_POST['slider_cta_url_nonce'] ) || ! wp_verify_nonce( $_POST['slider_cta_url_nonce'], basename( __FILE__ ) ) ) {
        return;
    }
  
    // Verifica se o post está sendo salvo automaticamente
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
  
    // Verifica se o usuário tem permissão para editar o post
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
  
    // Salva o valor do campo de CTA URL, se existir
    if ( isset( $_POST['slider_cta_url_field'] ) ) {
        update_post_meta( $post_id, 'slider_cta_url', sanitize_text_field( $_POST['slider_cta_url_field'] ) );
    }
    
    // Salva o valor do campo de CTA TEXT, se existir
    if ( isset( $_POST['slider_cta_text_field'] ) ) {
        update_post_meta( $post_id, 'slider_cta_text', sanitize_text_field( $_POST['slider_cta_text_field'] ) );
    }
  
    // Salva o valor do campo de código de embed, se existir
    if ( isset( $_POST['slider_embed_code_field'] ) ) {
        update_post_meta( $post_id, 'slider_embed_code', sanitize_text_field( $_POST['slider_embed_code_field'] ) );
    }
}
add_action( 'save_post_slider', 'save_slider_meta' );

// Retorna breadcrumb
function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;/&nbsp;";
        the_category(' &bull; ');
            if (is_single()) {
                echo " &nbsp;/&nbsp;<span>Post</span> ";
            }
    } elseif (is_page()) {
        echo "&nbsp;/&nbsp;<span>Post</span>";
    } elseif (is_search()) {
        echo "&nbsp;/&nbsp;Busca por ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

function los_anjos_register_styles(){
    $version = wp_get_theme() -> get('Version');
    wp_enqueue_style('los-anjos-style-flickity', get_template_directory_uri() . "/assets/css/flickity.css", array(), $version, 'all');
    wp_enqueue_style('los-anjos-style-bootstrap', get_template_directory_uri() . "/assets/css/bootstrap.min.css", array(), $version, 'all');
    wp_enqueue_style('los-anjos-style', get_template_directory_uri() . "/assets/css/style.css", array(), $version, 'all');
    wp_enqueue_style('los-anjos-style-responsive', get_template_directory_uri() . "/assets/css/style-responsive.css", array(), $version, 'all');
    wp_enqueue_style('los-anjos-style-animate', get_template_directory_uri() . "/assets/css/animate.min.css", array(), $version, 'all');
    wp_enqueue_style('los-anjos-style-vertical', get_template_directory_uri() . "/assets/css/vertical-rhythm.min.css", array(), $version, 'all');
    wp_enqueue_style('los-anjos-style-owl', get_template_directory_uri() . "/assets/css/owl.carousel.css", array(), $version, 'all');
    wp_enqueue_style('los-anjos-style-magnific-popup', get_template_directory_uri() . "/assets/css/magnific-popup.css", array(), $version, 'all');
    wp_enqueue_style('los-anjos-style-YTPlayer', get_template_directory_uri() . "/assets/css/YTPlayer.css", array(), $version, 'all');
    wp_enqueue_style('los-anjos-style-font-awesome', get_template_directory_uri() . "/assets/css/font-awesome.min.css", array(), $version, 'all');
}
add_action('wp_enqueue_scripts', 'los_anjos_register_styles');

function los_anjos_register_scripts(){
    $version = wp_get_theme() -> get('Version');
    wp_enqueue_script('los-anjos-script-flickity', get_template_directory_uri() . "/assets/js/flickity.pkgd.js", array(),'1.11.2', 'all');
    wp_enqueue_script('los-anjos-script-jquery', get_template_directory_uri() . "/assets/js/jquery-1.11.2.min.js", array(),'1.11.2', 'all');
    wp_enqueue_script('los-anjos-script-jquery-easing', get_template_directory_uri() . "/assets/js/jquery.easing.1.3.js", array(), '1.3', 'all');
    wp_enqueue_script('los-anjos-script-bootstrap', get_template_directory_uri() . "/assets/js/bootstrap.min.js", array(), $version, 'all');
    wp_enqueue_script('los-anjos-script-SmoothScroll', get_template_directory_uri() . "/assets/js/SmoothScroll.js", array(), $version, 'all');
    wp_enqueue_script('los-anjos-script-jquery-scrollTo', get_template_directory_uri() . "/assets/js/jquery.scrollTo.min.js", array(), $version, 'all');
    wp_enqueue_script('los-anjos-script-jquery-localScroll', get_template_directory_uri() . "/assets/js/jquery.localScroll.min.js", array(), $version, 'all');
    wp_enqueue_script('los-anjos-script-jquery-viewport', get_template_directory_uri() . "/assets/js/jquery.viewport.mini.js", array(), $version, 'all');
    wp_enqueue_script('los-anjos-script-jquery-countTo', get_template_directory_uri() . "/assets/js/jquery.countTo.js", array(), $version, 'all');
    wp_enqueue_script('los-anjos-script-jquery-appear', get_template_directory_uri() . "/assets/js/jquery.appear.js", array(), $version, 'all');
    wp_enqueue_script('los-anjos-script-jquery-sticky', get_template_directory_uri() . "/assets/js/jquery.sticky.js", array(), $version, 'all');
    wp_enqueue_script('los-anjos-script-jquery-parallax', get_template_directory_uri() . "/assets/js/jquery.parallax-1.1.3.js", array(), '1.1.3', 'all');
    wp_enqueue_script('los-anjos-script-jquery-fitvids', get_template_directory_uri() . "/assets/js/jquery.fitvids.js", array(), $version, 'all');
    wp_enqueue_script('los-anjos-script-owl-carousel', get_template_directory_uri() . "/assets/js/owl.carousel.min.js", array(), $version, 'all');
    wp_enqueue_script('los-anjos-script-isotope', get_template_directory_uri() . "/assets/js/isotope.pkgd.min.js", array(), $version, 'all');
    wp_enqueue_script('los-anjos-script-imagesloaded', get_template_directory_uri() . "/assets/js/imagesloaded.pkgd.min.js", array(), $version, 'all');
    wp_enqueue_script('los-anjos-script-jquery-magnific-popup', get_template_directory_uri() . "/assets/js/jquery.magnific-popup.min.js", array(), $version, 'all');
    wp_enqueue_script('los-anjos-script-wow', get_template_directory_uri() . "/assets/js/wow.min.js", array(), $version, 'all');
    wp_enqueue_script('los-anjos-script-masonry', get_template_directory_uri() . "/assets/js/masonry.pkgd.min.js", array(), $version, 'all');
    wp_enqueue_script('los-anjos-script-jquery-simple-text-rotator', get_template_directory_uri() . "/assets/js/jquery.simple-text-rotator.min.js", array(), $version, 'all');
    wp_enqueue_script('los-anjos-script-all', get_template_directory_uri() . "/assets/js/all.js", array(), $version, 'all');
    wp_enqueue_script('los-anjos-script-contact', get_template_directory_uri() . "/assets/js/contact-form.js", array(), $version, 'all');
    wp_enqueue_script('los-anjos-script-jquery-ajaxchimp', get_template_directory_uri() . "/assets/js/jquery.ajaxchimp.min.js", array(), $version, 'all');
    wp_enqueue_script('los-anjos-script-jquery-YTPlayer', get_template_directory_uri() . "/assets/js/jquery.mb.YTPlayer.js", array(), $version, 'all');
}
add_action('wp_enqueue_scripts', 'los_anjos_register_scripts');

?>