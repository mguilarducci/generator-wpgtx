<!DOCTYPE html>
<html lang="pt-br" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title><?php wp_title(); ?></title>
    <!-- cross device favicon -->
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-57x57.png" sizes="57x57">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-114x114.png" sizes="114x114">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-72x72.png" sizes="72x72">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-144x144.png" sizes="144x144">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-60x60.png" sizes="60x60">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-120x120.png" sizes="120x120">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-76x76.png" sizes="76x76">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-152x152.png" sizes="152x152">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon-196x196.png" sizes="196x196" type="image/png">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon-160x160.png" sizes="160x160" type="image/png">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon-96x96.png" sizes="96x96" type="image/png">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon-32x32.png" sizes="32x32" type="image/png">
    <meta name="msapplication-TileColor" content="#b4d455">
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/mstile-144x144.png">
    <!-- cross device favicon -->
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
</head>
<body <?php body_class(); ?>>
    <header id="header">
        <div class="container">
            <div class="row">
                <h1 class="col-sm-4 logo-wrap">
                    <a rel="bookmark" href="<?php echo home_url(); ?>">
                        Logo
                    </a>
                </h1>

                <nav class="col-sm-8 topo-menu-wrap">
                    <?php wp_nav_menu( array( 'theme_location' => 'topo' ) ); ?>
                </nav>
            </div>
        </div>
    </header>

    <div role="main" class="content-wrapper">