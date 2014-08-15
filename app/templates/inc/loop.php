<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article <?php post_class(); ?>>
        <header>
            <h1>
                <a rel="bookmark" href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h1>

            <div class="meta">
                <time class="post-date" datetime="<?php the_time( 'Y-m-d' ); ?>">
                    <?php the_time( 'l, j \d\e F \d\e Y' ); ?>
                </time>

                <?php the_category(); ?>
            </div>
        </header>

        <div class="entry-content">
            <?php get_template_part( 'inc/content', get_post_format() ); ?>
        </div>

        <footer>
            <?php the_tags( 'Tags: ', ', ' ); ?>
        </footer>
    </article>
<?php endwhile; else : ?>
    <p>Nenhum post encontrado.</p>
<?php endif; ?>