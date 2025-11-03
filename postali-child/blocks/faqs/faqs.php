<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */
    $faqs_headline = get_field('faqs_headline');

?>

<section class="faqs" data-cue="fadeIn" data-duration="1000">
    <div class="container">
        <div class="columns">
            <div class="column-66 centered center">
                <span class="headline"><?php echo $faqs_headline; ?></span>
            </div>
            <div class="spacer-30"></div>
            <div class="column-66 centered">
            <?php if( have_rows('faqs') ): ?>
            <?php while( have_rows('faqs') ): the_row(); ?>  
                <div class="accordions">
                    <div class="accordions_title">
                        <h3><?php the_sub_field('question'); ?></h3>
                        <p><span></span></p>
                    </div>
                    <div class="accordions_content">
                        <p><?php the_sub_field('answer'); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php endif; ?> 
            </div>
        </div>
    </div>
</section>



