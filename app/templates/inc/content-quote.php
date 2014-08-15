<?php if ( has_post_thumbnail() ) : ?>
    <figure><?php the_post_thumbnail( 'post-wide' ); ?></figure>
<?php endif; ?>
<?php the_content(); ?>