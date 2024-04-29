<?php get_header( ); ?>

<div class="container mx-auto my-8">

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
            <?php get_template_part( 'template-parts/why-join-us' ); ?>
		<?php endwhile; ?>
	<?php endif; ?>
	 
	<?php $store = new WP_Query( array('post_type' => 'jobs')); ?>
		<?php if(is_page('careers')) : ?>
			<?php while ( $store->have_posts() ) : $store->the_post(); ?>
				<?php get_template_part( 'template-parts/job' ); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	<?php wp_reset_query();?>

</div>

<?php get_footer(); ?>