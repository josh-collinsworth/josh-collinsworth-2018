<?php get_header(); ?>

<main id="main">

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <h2>
                <a href="<?php the_permalink() ?>">
                    <?php the_title(); ?>
                </a>
            </h2>

            <?php get_template_part('template-parts/post', 'info'); ?>

            <?php the_excerpt(); ?>

        <?php endwhile; ?>

    <?php endif; ?>

    <?php get_template_part('template-parts/pagination'); ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>