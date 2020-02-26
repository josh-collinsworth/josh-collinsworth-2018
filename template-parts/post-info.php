<p class="post-info">
    <strong>Published: </strong><?php the_date(); ?>
    <?php if (get_the_category()) : ?>
        <br />
        <strong>In: </strong><?php the_category(' | '); ?>
    <?php endif; ?>
    <?php if (get_the_tags()) : ?>
        <br />
        <strong>Tags: </strong>
        <?php the_tags(); ?>
    <?php endif; ?>
</p>