<!DOCTYPE html>
<html lang="pt-br" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header id="header">
        <div class="container">
            <div class="row">
                <h1 class="col-sm-4 logo-wrap">
                    <a rel="bookmark" href="<?php echo home_url(); ?>">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                </h1>

                <nav class="col-sm-8 topo-menu-wrap" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'topo' ) ); ?>
                </nav>
            </div>
        </div>
    </header>

    <div role="main" class="content-wrapper">