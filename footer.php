
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>

<footer id="colophon" class="site-footer bg-cwblue text-white py-12" role="contentinfo">
	<?php do_action( 'tailpress_footer' ); ?>

	<div class="container mx-auto text-center text-white">
		Pharmacy LLC <?php echo date_i18n( 'Y' );?> - Pharmacy LLC <!--?php echo get_bloginfo( 'name' );?-->
	</div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
