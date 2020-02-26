<?php get_header(); ?>

<main id="main">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<h1><?php the_title(); ?></h1>

			<?php the_excerpt(); ?>

		<?php endwhile; ?>

	<?php endif; ?>

	<?php get_template_part('template-parts/pagination'); ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>