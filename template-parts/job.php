<article id="<?php echo basename(get_permalink()); ?>" class="flex flex-col gap-6 border-b-2 border-white">
    <details class="job flex flex-col justify-start items-start w-full gap-4">
        <summary class="bg-cwblue text-white font-bold uppercase p-4 cursor-pointer"><?php the_title(); ?></summary>
        <div class="py-4 px-6 bg-gray-100">
            <?php the_content(); ?>
            <!-- <hr class="mb-6">

            <h2 class="text-cwblue text-2xl font-bold uppercase mb-6">Apply to this position</h2> -->

            <!--?php echo do_shortcode( '[fluentform id="4"]' ); ?-->
        </div>
    </details>
</article>