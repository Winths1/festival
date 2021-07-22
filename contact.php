<?php
/*
Template Name: Contact
*/

get_header(); ?>

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

    <div class="row">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3985.8001793263834!2d0.35641199263788015!3d46.663252874902945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1626849430772!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

</main>

<?php get_footer(); ?>