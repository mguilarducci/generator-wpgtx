<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8">
        <?php
            the_post();
            the_title();
            the_content();
        ?>
        </div>

        <?php get_sidebar( 'blog' ); ?>
    </div>
</div>

<?php get_header(); ?>