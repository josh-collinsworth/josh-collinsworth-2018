<?php get_header(); ?>

<main id="main">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<h1><?php the_title() ?></h1>

			<?php the_content(); ?>

		</main>

	<?php endwhile; ?>

<?php else: ?>

	<p><strong>Sorry, no content found.</strong></p>

<?php endif; ?>


<?php get_template_part('template-parts/pagination'); ?>

</main>

<?php get_footer(); ?>