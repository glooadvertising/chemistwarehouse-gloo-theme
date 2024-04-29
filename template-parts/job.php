<article id="post-<?php the_ID(); ?>" class="flex flex-col gap-6 border-b-2 border-white">
    <details class="flex flex-col justify-start items-start w-full gap-4">
        <summary class="bg-cwblue text-white font-bold uppercase p-4 cursor-pointer"><?php the_title(); ?></summary>
        <div class="py-4 px-6 bg-gray-100">
            <?php the_content(); ?>
            <hr>
            <?php echo do_shortcode( '[fluentform id="4"]' ); ?>
        </div>
    </details>
</article>