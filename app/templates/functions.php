<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'html5', array(
    'caption',
    'comment-form',
    'comment-list',
    'gallery',
    'search-form'
) );

#### REGISTRA OS SCRIPTS ####
function my_scripts_method() {
    // jquery
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() . '/js/vendor/jquery.min.js' );
    wp_enqueue_script( 'jquery' );

    // outros scripts
    wp_enqueue_script(
        'modernizr',
        get_template_directory_uri() . '/js/vendor/modernizr.min.js',
        null,
        '2.6.2',
        false
    );
    wp_enqueue_script(
        'fitvids',
        get_template_directory_uri() . '/js/vendor/fitvids.min.js',
        'jquery',
        null,
        true
    );
    wp_enqueue_script(
        'flexslider',
        get_template_directory_uri() . '/js/vendor/flexslider.min.js',
        'jquery',
        '2.1',
        true
    );
    wp_enqueue_script(
        'scripts',
        get_template_directory_uri() . '/js/min/scripts.min.js',
        'jquery',
        null,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
#### REGISTRA OS SCRIPTS ####

#### SIDEBAR(S) ####
if ( function_exists( 'register_sidebar' ) ) {
    register_sidebar( array(
        'name'          => 'Barra Lateral Blog',
        'id'            => 'blog',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="titulo-widget">',
        'after_title'   => '</h5>'
    ));
}
#### SIDEBAR(S) ####

#### IMAGEM DETAQUE DE POSTS ####
add_theme_support( 'post-thumbnails' );

add_image_size( 'post_float', 300, 9999 );
add_image_size( 'post_wide', 620, 9999 );
add_image_size( 'gal_wide', 720, 540, true );

function custom_image_sizes_choose( $sizes ) {
    $custom_sizes = array(
        'post_wide'  => 'Imagem de ponta a ponta no post',
        'post_float' => 'Imagem alinhada à esquerda ou à direita'
    );
    return array_merge( $sizes, $custom_sizes );
}
add_filter( 'image_size_names_choose', 'custom_image_sizes_choose' );
#### IMAGEM DETAQUE DE POSTS ####

#### AJUSTA DIMENSÕES DOS VÍDEOS DO oEMBED ####
add_filter( 'embed_defaults', 'new_embed_size' );

function new_embed_size() {
    return array(
        'width'  => 620,
        'height' => 349
    );
}
#### AJUSTA DIMENSÕES DOS VÍDEOS DO oEMBED ####

#### MENU ####
add_theme_support( 'menus' );
register_nav_menu( 'topo', __( 'Topo', 'Menu Topo' ) );
register_nav_menu( 'footer', __( 'Rodapé', 'Menu Rodapé' ) );
#### MENU ####

#### RESUMO DOS POSTS ####
function new_excerpt_more( $more ) {
    global $post;
    return '&hellip;<footer class="veja-mais-wrap"><a href="' . get_permalink($post->ID) . '">Veja mais &gt;</a></footer>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

function custom_excerpt_length( $length ) {
    return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
#### RESUMO DOS POSTS ####

#### FORMATO(S) DE POSTS ####
add_theme_support( 'post-formats', array( 'gallery' ) );
#### FORMATO(S) DE POSTS ####

#### PEGA O TIPO DE POST ####
function is_post_type( $type ) {
    global $wp_query;
    if ( $type == get_post_type( $wp_query->post->ID ) ) return true;
    return false;
}
#### PEGA O TIPO DE POST ####

#### POSTS MAIS POPULARES ####
function set_post_views( $postID ) {
    $count_key = 'post_views_count';
    $count = get_post_meta( $postID, $count_key, true );
    if ( $count == '' ) {
        $count = 0;
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
    } else {
        $count++;
        update_post_meta( $postID, $count_key, $count );
    }
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
#### POSTS MAIS POPULARES ####

#### VERIFICA SE É SUB CATEGORIA ####
function is_subcategory() {
    $cat = get_query_var( 'cat' );
    $category = get_category( $cat );
    $category->parent;
    return ( $category->parent == '0' ) ? false : true;
}
#### VERIFICA SE É SUB CATEGORIA ####

#### PAGINAÇÃO ####
function paginacao() {
    global $wp_query;
    $total = $wp_query->max_num_pages;

    if ( $total > 1 )  {
        if ( ! $current_page = get_query_var( 'paged' ) )
            $current_page = 1;

        $big = 999999999;

        $permalink_structure = get_option( 'permalink_structure' );
        $format = empty( $permalink_structure ) ? '&page=%#%' : 'page/%#%/';
        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
            'format' => $format,
            'current' => $current_page,
            'total' => $total,
            'mid_size' => 4,
            'prev_text' => 'Anteriores',
            'next_text' => 'Próximos',
            'type' => 'plain'
        ));
    }
}
#### PAGINAÇÃO ####

#### GALERIA ####
function gtx_gallery_images() {
    $output = $images_ids = '';

    if ( function_exists( 'get_post_galleries' ) ) {
        $galleries = get_post_galleries( get_the_ID(), false );

        if ( empty( $galleries ) ) return false;

        if ( isset( $galleries[0]['ids'] ) ) {
            foreach ( $galleries as $gallery ) {
                $images_ids .= ( '' !== $images_ids ? ',' : '' ) . $gallery['ids'];
            }

            $attachments_ids = explode( ',', $images_ids );
            $attachments_ids = array_unique( $attachments_ids );
        } else {
            $attachments_ids = get_posts( array(
                'fields'         => 'ids',
                'numberposts'    => 999,
                'order'          => 'ASC',
                'orderby'        => 'menu_order',
                'post_mime_type' => 'image',
                'post_parent'    => get_the_ID(),
                'post_type'      => 'attachment',
            ) );
        }
    } else {
        $pattern = get_shortcode_regex();
        preg_match( "/$pattern/s", get_the_content(), $match );
        $atts = shortcode_parse_atts( $match[3] );

        if ( isset( $atts['ids'] ) )
            $attachments_ids = explode( ',', $atts['ids'] );
        else
            return false;
    }

    echo '<div class="gallery-slider flexslider">';
    echo '  <ul class="gallery-slides">';
    if ( !is_single() ) {
        foreach ( $attachments_ids as $attachment_id ) {
            printf(
                '<li class="gallery-slide"><a href="%s">%s</a></li>',
                esc_url( get_permalink() ),
                wp_get_attachment_image( $attachment_id, 'gal_wide' )
            );
        }
    } else {
        foreach ( $attachments_ids as $attachment_id ) {
            printf(
                '<li class="gallery-slide">' . wp_get_attachment_image( $attachment_id, 'gal_wide' ) . '</li>'
            );
        }
    }
    echo '  </ul>';
    echo '</div>';

    return $output;
}
#### GALERIA ####