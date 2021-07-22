<main class="container">
    <div class="row">

        <?php if (have_posts()) : ?>
    <!-- Si j'ai des Posts, j'affiche cette partie -->

        <?php while (have_posts()) : the_post(); ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title("<h1>","</h1>"); ?></a>
            <?php
            if ( has_post_thumbnail() ) {
                the_post_thumbnail("medium",
                ['class' => 'miniature',
                'alt' => 'Thumbnail'
            ]);
            } 
            the_content();
            the_category();
            ?>
        <?php endwhile; ?>
        <?php else : echo('Il n\'y a pas d\'articles') ?>
        <!-- Si il n'y a pas de Post, j'affiche cette partie -->
        <?php endif; ?>

    </div>
</main>
