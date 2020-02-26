<?php get_header(); ?>

<main id="main">

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <article>
                <h1><?php the_title(); ?></h1>

                <?php get_template_part('template-parts/post', 'info'); ?>

                <?php the_content(); ?>

            </article>

            <aside id="post-comments">
                <h2>Comments:</h2>
                <ul class="commentlist">
                    <?php
                    $comments = get_comments(array(
                        'post_id' => get_the_ID(),
                        'status' => 'approve'
                    ));

                    wp_list_comments(array(
                        'per_page' => 10, //Allow comment pagination
                        'reverse_top_level' => false //Show the oldest comments at the top of the list
                    ), $comments);
                    ?>
                </ul>
            </aside>

        <?php endwhile; ?>

    <?php endif; ?>

    <?php get_template_part('template-parts/pagination'); ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>