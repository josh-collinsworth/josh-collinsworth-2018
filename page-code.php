<?php get_header(); ?>

<main id="main">

    <div id="code-page">

        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>

                <h1><?php the_title(); ?></h1>

                <?php the_content(); ?>

            <?php endwhile; ?>

        <?php endif; ?>

    </div>

    <?php get_template_part('template-parts/pagination'); ?>

</main>

<?php get_footer(); ?>