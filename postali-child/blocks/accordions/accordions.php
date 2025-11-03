<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

    $section_headline = get_field('accordions_section_headline');
    $section_subheadline = get_field('accordions_section_subheadline');
    $accordions_background_color = get_field('accordions_background_color');
?>

<section id="accordions-block" style="background:<?php echo $accordions_background_color; ?>">
    <div class="container">
        <div class="columns">
            <div class="column-full block">
            <h2><?php echo $section_headline; ?></h2>
            <?php if (!empty($section_subheadline)) { ?>
            <h3><?php echo $section_subheadline; ?></h3>
            <?php } ?>
            <?php if( have_rows('accordions') ): ?>
            <?php while( have_rows('accordions') ): the_row(); ?>  
                <div class="accordions">
                    <div class="accordions_title">
                        <h3><?php the_sub_field('accordion_title'); ?></h3>
                        <p><span></span></p>
                    </div>
                    <div class="accordions_content">
                        <p><?php the_sub_field('accordion_content'); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php endif; ?> 
            </div>
        </div>
    </div>
</section>

<script>
    // script to make accordions function
    jQuery(".accordions").on("click", function() {
        // will (slide) toggle the related panel.
        jQuery(this).toggleClass("active");
        jQuery(this).find(".accordions_title").toggleClass("active");
        jQuery(this).find(".accordions_content").slideToggle();
    });
</script>