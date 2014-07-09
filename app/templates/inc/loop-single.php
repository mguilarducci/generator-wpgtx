<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <header>
        <h1><?php the_title(); ?></h1>

        <time class="post-date" datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time( 'l, j \d\e F \d\e Y' ); ?></time>
    </header>

    <?php the_content(); ?>

    <footer>
        <?php the_tags( 'Tags: ', ', ' ); ?>
    </footer>
<?php endwhile; else : ?>
    <p>Nenhum post encontrado.</p>
<?php endif; ?>