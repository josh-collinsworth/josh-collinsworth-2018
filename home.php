<?php get_header(); ?>

<main id="main">

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <article>
                <a href="<?php the_permalink() ?>">
                    <?php the_post_thumbnail(); ?>
                    <h2><?php the_title(); ?></h2>
                </a>
                <p><?php the_excerpt(); ?></p>
            </article>

        <?php endwhile; ?>

    <?php endif; ?>

    <?php get_template_part('template-parts/pagination'); ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>