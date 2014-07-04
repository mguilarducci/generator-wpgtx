<!DOCTYPE html>
<html lang="pt-br" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
</head>
<body <?php body_class(); ?>>
    <header id="header">
        <div class="container">
            <div class="row">
                <h1 class="col-sm-4 logo-wrap">
                    <a href="<?php bloginfo( 'url' ); ?>">
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