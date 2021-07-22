
<?php get_header(); ?>
<!-- <?php echo('Je suis page.php') ?> -->

<h1 class='text-center'><?php the_title(); ?></h1>

<main class="container main page">
    <div class="row">

        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

                <?php the_content(); ?>

        <?php endwhile; ?>
        <?php else : echo('Désolé, Il n\'y a pas d\'articles.'); ?>
        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>