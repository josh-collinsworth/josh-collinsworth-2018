<?php get_header(); ?>

<main id="main">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<a id="design-header" href="/wp-content/uploads/2017/12/Full-Logo-2018-1.svg">
				<img src="/wp-content/uploads/2017/12/Full-Logo-2018-1.svg">
			</a>

			<?php the_content(); ?>

			<div id="designs-case">

				<?php while ( have_rows( 'design_images' ) ) : the_row(); ?>

					<?php $img = get_sub_field('design_image') ?>

					<a href="<?php echo $img['url']; ?>" class="case-width-<?php echo the_sub_field('width'); ?> case-height-<?php echo the_sub_field('height') ?>">
						<img src="<?php echo $img['url'] ?>" />
					</a>

				<?php endwhile; ?>

			</div>

		<?php endwhile; ?>

	<?php endif; ?>	
	
</main>

<?php get_footer(); ?>