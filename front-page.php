<?php get_header( ); ?>
<?php get_template_part( 'template-parts/catalogue' );?>
<div class="container mx-auto my-8">
	<img src="<?php echo get_template_directory_uri( ); ?>/img/header.png" alt="">
<a href="<?php echo site_url(); ?>/careers"><img src="<?php echo get_template_directory_uri( ); ?>/img/join-our-team-long-banner.png" alt="" class="my-6 mx-auto"></a>
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
