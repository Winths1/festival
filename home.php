<?php get_header() ?>

<h1 class='text-center'><?php the_title(); ?></h1>

<main class="main single container">
    <div class="row">
        <h1 class="text-center my-3">Actualités<br>
            Retrouvez toute l'actualité du festival</h1>

        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>           

        <article class="d-sm-flex flex-md-row flex-sm-column-reverse text-center col-md-12 my-3">
            
                <?php the_content(); ?>
            
        </article>
        <p class="post-info">
            Posté le <?php the_date(); ?> dans <?php the_category(', '); ?> par <?php the_author(); ?>.
        </p>          

        <?php endwhile; ?>
        <?php endif; ?>

        <div class="d-flex justify-content-center pg">

                <?php posts_nav_link(' · ', '←', '→'); ?>

        </div>
        

    </div>
</main>

<?php get_footer(); ?>