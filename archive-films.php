<?php get_header() ?>

<h1 class='text-center'><?php the_title(); ?></h1>

<main class="main single container">
    <div class="row justify-content-center">

        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>           

        <div class="col-12 col-md-3 m-5 border">
            <div class="img-fw p-3">
                <?php the_post_thumbnail(); ?>
            </div>
            <div class="w-100 text-center p-3">
                <a href=<?php the_permalink() ?> class="mx-auto">
                    <input type="button" value="En savoir plus" class="btn btn-primary text-center">
                </a>
            </div>
        </div>
            

        <?php endwhile; ?>
        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>