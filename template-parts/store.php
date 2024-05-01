<article id="post-<?php the_ID(); ?>" class="border-t border-cwred grid sm:grid-cols-5 py-6 gap-6 last:border-b">
    <div class="col-span-5 sm:col-span-3 flex flex-col justify-start items-start w-full gap-4">
        <h2 class="text-cwblue font-bold uppercase"><?php the_title(); ?></h2>
        <?php the_content(); ?>
        <!--?php $custom = get_post_custom();?>
        <p>
            <?php if(isset($custom['phone'])) { echo '<strong>PH:</strong> <a href="tel:'.$custom['phone'][0].'">'.$custom['phone'][0].'</a><br>';}?>
            <?php if(isset($custom['healthmail'])) { echo '<strong>Healthmail:</strong> <a href="mailto:'.$custom['healthmail'][0].'">'.$custom['healthmail'][0].'</a><br>';}?>
        </p>
        <div-- class="flex flex-col">
            <h3 class="text-cwblue font-bold">Trading hours</h3>
            <p>
                <?php if(isset($custom['mon_fri'])) { echo '<strong>Monday - Friday:</strong> '.$custom['mon_fri'][0]. '<br>';}?>
                <?php if(isset($custom['mon_wed'])) { echo '<strong>Monday - Friday:</strong> '.$custom['mon_wed'][0]. '<br>';}?>
                <?php if(isset($custom['sat'])) { echo '<strong>Saturday:</strong> '.$custom['sat'][0];}?><br>
                <?php if(isset($custom['sun_ph'])) { echo '<strong>Sunday & Public Holidays:</strong> '.$custom['sun_ph'][0]. '<br>';}?>
            </p>
        </div-->
    </div>
    <img src="<?php echo the_post_thumbnail_url();?>" alt="" class="w-full col-span-5 sm:col-span-2 border-2">
</article>