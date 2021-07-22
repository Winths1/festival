<?php get_header() ?>

<h1 class='text-center'><?php the_title(); ?></h1>

<main class="main single container">
    <div class="row">

        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>           

            <p class="post-info">
            Posté le <?php the_date(); ?> dans <?php the_category(', '); ?> par <?php the_author(); ?>.
            </p>

            
            <?php the_content(); ?>
            

        <?php endwhile; ?>
        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>