<?php the_post(); ?>
<article <?php post_class(); ?>>
    <header>
        <h1><?php the_title(); ?></h1>

        <div class="meta">
            <time class="post-date" datetime="<?php the_time( 'Y-m-d' ); ?>">
                <?php the_time( 'l, j \d\e F \d\e Y' ); ?>
            </time>

            <?php the_category(); ?>
        </div>
    </header>

    <div class="entry-content">
    <?php
        the_content();
        gtx_custom_wp_link_pages();
    ?>
    </div>

    <footer>
        <?php the_tags( 'Tags: ', ', ' ); ?>
    </footer>
</article>

<div class="comments-wrap">
    <?php comments_template(); ?>
</div>