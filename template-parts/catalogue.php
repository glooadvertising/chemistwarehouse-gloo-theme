<?php $latest_catalogue = new WP_Query(['post_type' => 'catalogues', 'posts_per_page' => 1]);?>
<?php while ( $latest_catalogue->have_posts() ) : $latest_catalogue->the_post(); ?>

<?php $attachment = get_post_custom();?>
<a href="<?php if(isset($attachment['attachment'])) { echo $attachment['attachment'][0];}?>" target="_blank" class="flex w-full">
	<img src="<?php echo the_post_thumbnail_url(); ?>" alt="" class="w-full">
</a>
<?php endwhile; wp_reset_query(); ?>

