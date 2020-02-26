<?php get_header(); ?>

<main id="main">

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <div id="my-dumb-face">
                <img src="/wp-content/themes/josh-collinsworth-2018/self-portrait-summer-2018.svg" alt="">
            </div>

            <div id="my-dumb-text">
                <?php the_content(); ?>
            </div>

        <?php endwhile; ?>

    <?php endif; ?>

</main>

<?php get_footer(); ?>
