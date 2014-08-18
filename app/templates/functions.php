<?php
/**
 * @package WordPress
 */

if ( ! function_exists( 'wpgtx_theme_setup' ) ) :
    function wpgtx_theme_setup() {
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );
        add_theme_support( 'menus' );
        add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'video' ) );
        add_theme_support( 'post-thumbnails' );

        add_image_size( 'wpgtx_post_float', 300, 9999 );
        add_image_size( 'wpgtx_post_wide', 848, 9999 );
        add_image_size( 'wpgtx_gal_wide', 848, 9999 );

        register_nav_menus( array(
            'topo'   => 'Menu do topo',
            'footer' => 'Menu do rodapé',
        ) );
    }
endif;
add_action( 'after_setup_theme', 'wpgtx_theme_setup' );

function wpgtx_scripts_method() {
    // CSS
    wp_enqueue_style(
        'style',
        get_stylesheet_uri(),
        array(),
        '0.1.0'
    );

    // JS
    wp_enqueue_script(
        'modernizr',
        get_template_directory_uri() . '/js/vendor/modernizr.min.js',
        array(),
        '2.6.2'
    );
    wp_enqueue_script(
        'fitvids',
        get_template_directory_uri() . '/js/vendor/fitvids.min.js',
        array( 'jquery' ),
        '1.1.0',
        true
    );
    wp_enqueue_script(
        'flexslider',
        get_template_directory_uri() . '/js/vendor/flexslider.min.js',
        array( 'jquery' ),
        '2.1.0',
        true
    );
    wp_enqueue_script(
        'scripts',
        get_template_directory_uri() . '/js/min/scripts.min.js',
        array( 'jquery' ),
        '0.1.0',
        true
    );
    wp_enqueue_script(
        'livereload',
        '//localhost:35729/livereload.js',
        array(),
        null,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'wpgtx_scripts_method' );

if ( function_exists( 'register_sidebar' ) ) {
    register_sidebar( array(
        'name'          => 'Barra Lateral Blog',
        'id'            => 'blog',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="titulo-widget">',
        'after_title'   => '</h5>',
    ) );
}

function custom_image_sizes_choose( $sizes ) {
    $custom_sizes = array(
        'wpgtx_post_wide'  => 'Imagem de ponta a ponta no post',
        'wpgtx_post_float' => 'Imagem alinhada à esquerda ou à direita'
    );
    return array_merge( $sizes, $custom_sizes );
}
add_filter( 'image_size_names_choose', 'custom_image_sizes_choose' );

function new_embed_size() {
    return array(
        'width'  => 848,
        'height' => 349
    );
}
add_filter( 'embed_defaults', 'new_embed_size' );

function wpgtx_custom_excerpt_more( $more ) {
    global $post;
    return '&hellip;<footer class="veja-mais-wrap"><a href="' . get_permalink($post->ID) . '">Veja mais &gt;</a></footer>';
}
add_filter( 'excerpt_more', 'wpgtx_custom_excerpt_more' );

function wpgtx_custom_excerpt_length( $length ) {
    return 50;
}
add_filter( 'excerpt_length', 'wpgtx_custom_excerpt_length', 999 );

function wpgtx_favicon_output() {
    echo '<link rel="apple-touch-icon" href="' . get_template_directory_uri() . '/apple-touch-icon-57x57.png" sizes="57x57">';
    echo '<link rel="apple-touch-icon" href="' . get_template_directory_uri() . '/apple-touch-icon-114x114.png" sizes="114x114">';
    echo '<link rel="apple-touch-icon" href="' . get_template_directory_uri() . '/apple-touch-icon-72x72.png" sizes="72x72">';
    echo '<link rel="apple-touch-icon" href="' . get_template_directory_uri() . '/apple-touch-icon-144x144.png" sizes="144x144">';
    echo '<link rel="apple-touch-icon" href="' . get_template_directory_uri() . '/apple-touch-icon-60x60.png" sizes="60x60">';
    echo '<link rel="apple-touch-icon" href="' . get_template_directory_uri() . '/apple-touch-icon-120x120.png" sizes="120x120">';
    echo '<link rel="apple-touch-icon" href="' . get_template_directory_uri() . '/apple-touch-icon-76x76.png" sizes="76x76">';
    echo '<link rel="apple-touch-icon" href="' . get_template_directory_uri() . '/apple-touch-icon-152x152.png" sizes="152x152">';
    echo '<link rel="icon" href="' . get_template_directory_uri() . '/favicon-196x196.png" sizes="196x196" type="image/png">';
    echo '<link rel="icon" href="' . get_template_directory_uri() . '/favicon-160x160.png" sizes="160x160" type="image/png">';
    echo '<link rel="icon" href="' . get_template_directory_uri() . '/favicon-96x96.png" sizes="96x96" type="image/png">';
    echo '<link rel="icon" href="' . get_template_directory_uri() . '/favicon-16x16.png" sizes="16x16" type="image/png">';
    echo '<link rel="icon" href="' . get_template_directory_uri() . '/favicon-32x32.png" sizes="32x32" type="image/png">';
    echo '<meta name="msapplication-TileColor" content="#b4d455">';
    echo '<meta name="msapplication-TileImage" content="' . get_template_directory_uri() . '/mstile-144x144.png">';
}
add_action( 'wp_head', 'wpgtx_favicon_output' );

function wpgtx_custom_imagelink_setup() {
    $image_set = get_option( 'image_default_link_type' );

    if ( $image_set !== 'none' ) {
        update_option( 'image_default_link_type', 'none' );
    }
}
add_action( 'admin_init', 'wpgtx_custom_imagelink_setup', 10 );

function wpgtx_set_post_views( $postID ) {
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

function is_subcategory() {
    $cat = get_query_var( 'cat' );
    $category = get_category( $cat );
    $category->parent;
    return ( $category->parent == '0' ) ? false : true;
}

function is_post_type( $type ) {
    global $wp_query;
    if ( $type == get_post_type( $wp_query->post->ID ) ) return true;
    return false;
}

function wpgtx_custom_pagination() {
    global $wp_query;
    $total = $wp_query->max_num_pages;

    if ( $total > 1 )  {
        if ( ! $current_page = get_query_var( 'paged' ) ) {
            $current_page = 1;
        }

        $big = 999999999;

        $permalink_structure = get_option( 'permalink_structure' );
        $format = empty( $permalink_structure ) ? '&page=%#%' : 'page/%#%/';
        echo paginate_links( array(
            'base'      => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
            'format'    => $format,
            'current'   => $current_page,
            'total'     => $total,
            'mid_size'  => 4,
            'prev_text' => 'Anteriores',
            'next_text' => 'Próximos',
            'type'      => 'plain'
        ) );
    }
}

function wpgtx_custom_gallery() {
    $output = $images_ids = '';

    if ( function_exists( 'get_post_galleries' ) ) {
        $galleries = get_post_galleries( get_the_ID(), false );

        if ( empty( $galleries ) ) {
            return false;
        }

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
                'post_type'      => 'attachment'
            ) );
        }
    } else {
        $pattern = get_shortcode_regex();
        preg_match( "/$pattern/s", get_the_content(), $match );
        $atts = shortcode_parse_atts( $match[3] );

        if ( isset( $atts['ids'] ) ) {
            $attachments_ids = explode( ',', $atts['ids'] );
        } else {
            return false;
        }
    }

    echo '<div class="gallery-slider flexslider">';
    echo '  <ul class="gallery-slides">';
    if ( !is_single() ) {
        foreach ( $attachments_ids as $attachment_id ) {
            printf(
                '<li class="gallery-slide"><a href="%s">%s</a></li>',
                esc_url( get_permalink() ),
                wp_get_attachment_image( $attachment_id, 'wpgtx_gal_wide' )
            );
        }
    } else {
        foreach ( $attachments_ids as $attachment_id ) {
            printf(
                '<li class="gallery-slide">' . wp_get_attachment_image( $attachment_id, 'wpgtx_gal_wide' ) . '</li>'
            );
        }
    }
    echo '  </ul>';
    echo '</div>';

    return $output;
}

function wpgtx_custom_wp_link_pages( $args = '' ) {
    $defaults = array(
        'before'           => '<nav class="paginacao-post">',
        'after'            => '</nav>',
        'text_before'      => '',
        'text_after'       => '',
        'next_or_number'   => 'next',
        'nextpagelink'     => 'Próxima página',
        'previouspagelink' => 'Página anterior',
        'pagelink'         => '%',
        'echo'             => 1
    );

    $r = wp_parse_args( $args, $defaults );
    $r = apply_filters( 'wp_link_pages_args', $r );
    extract( $r, EXTR_SKIP );

    global $page, $numpages, $multipage, $more, $pagenow;

    $output = '';
    if ( $multipage ) {
        if ( 'number' == $next_or_number ) {
            $output .= $before;
            for ( $i = 1; $i < ( $numpages + 1 ); $i = $i + 1 ) {
                $j = str_replace( '%', $i, $pagelink );
                $output .= ' ';
                if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) ) {
                    $output .= _wp_link_page( $i );
                } else {
                    $output .= '<span class="current-post-page">';
                }

                $output .= $text_before . $j . $text_after;
                if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) ) {
                    $output .= '</a>';
                } else {
                    $output .= '</span>';
                }
            }
            $output .= $after;
        } else {
            if ( $more ) {
                $output .= $before;
                $i = $page - 1;
                if ( $i && $more ) {
                    $output .= _wp_link_page( $i );
                    $output .= $text_before . $previouspagelink . $text_after . '</a>';
                }
                $i = $page + 1;
                if ( $i <= $numpages && $more ) {
                    $output .= _wp_link_page( $i );
                    $output .= $text_before . $nextpagelink . $text_after . '</a>';
                }
                $output .= $after;
            }
        }
    }

    if ( $echo ) {
        echo $output;
    }

    return $output;
}