<?php get_header() ?>

<main class="main single container">
    <div class="row">

        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>           


        <div class="col-12 container border p-3">
            <div class="row">
                <div class="col-6">
                    <?php the_content(); ?>
                </div>
                <div class="col-6 d-flex flex-column justify-content-center">
                    <?php the_terms( $post->ID, 'realisateurs', 'Réalisateurs : ' ); ?> <br>
                    <?php the_terms( $post->ID, 'annees', 'Film sorti en : ' );?> <br><br><br>
                    <?php the_excerpt(); ?>
                    <a href="http://localhost:1234/festival-de-cinema/films/">
                        <input type="button" value="Retour" class="btn btn-primary text-center">
                    </a>
                </div>
            </div>
                                
        </div>

        <?php endwhile; ?>
        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>