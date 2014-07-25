<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8">
            <?php get_template_part( 'inc/loop' ); ?>

            <div class="pagination">
                <?php paginacao(); ?>
            </div>
        </div>

        <?php get_sidebar( 'blog' ); ?>
    </div>
</div>

<?php get_footer(); ?>