<?php get_header(); ?>

<main id="main">

    <h1 style="width: 100%; flex: 1 0 100%">Search results:</h1>

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

    <?php else : ?>

        <p><strong>Sorry, no matching content found.</strong></p>

    <?php endif; ?>

    <?php get_template_part('template-parts/pagination'); ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>