<?php get_header( ); ?>
<section class="p-6 bg-cwyellow flex justify-center">
	<img src="<?php echo get_template_directory_uri( ); ?>/img/Chemist-Warehouse-Hoarding.png" alt="" class="max-h-[120px] h-auto max-w-full w-auto">
</section>
<!--?php get_template_part( 'template-parts/catalogue' );?-->
<div class="container mx-auto my-8">
	<!--img src="<?php echo get_template_directory_uri( ); ?>/img/header.png" alt=""-->
	<a href="<?php echo site_url('/careers'); ?>" class="bg-cwyellow text-cwblue font-black uppercase text-4xl px-12 py-8 flex text-center justify-center hover:bg-cwblue hover:text-cwyellow transition-all mb-4">Click here to join our team</a>
	<a href="<?php echo site_url('/list-your-products-with-us'); ?>" class="bg-cwyellow text-cwblue font-black uppercase text-3xl px-12 py-8 flex text-center justify-center hover:bg-cwblue hover:text-cwyellow transition-all">Click here to List your products with us</a>
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
		<?php endwhile; ?>
	<?php endif; ?>

	<?php $store = new WP_Query( array('post_type' => 'stores')); ?>
		<?php if(is_front_page()) : ?>
			<?php while ( $store->have_posts() ) : $store->the_post(); ?>
				<?php get_template_part( 'template-parts/store' ); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	<?php wp_reset_query();?>

	<?php $store = new WP_Query( array('post_type' => 'jobs')); ?>
		<?php if(is_page('careers')) : ?>
			<?php while ( $store->have_posts() ) : $store->the_post(); ?>
				<?php get_template_part( 'template-parts/job' ); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	<?php wp_reset_query();?>

</div>

<?php get_footer(); ?>
