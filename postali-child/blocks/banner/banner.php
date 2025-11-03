<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */
    $banner_background_color = get_field('banner_background_color');
    $main_headline = get_field('main_headline');
    $banner_copy = get_field('banner_copy');
    $button_cta = get_field('button_cta');
    $button_text = get_field('button_text');
    $button_link = get_field('button_link');
    $form_shortcode = get_field('form_shortcode');
    $header_image = get_field('header_image');
    $testimonial_text = get_field('testimonial_text');
    $testimonial_author = get_field('testimonial_author');
    $testimonial_source = get_field('testimonial_source');
?>

<span id="banner"></span>
<?php if (get_field('right_panel') == 'form') { ?>
<section class="banner form" style="background-color:<?php echo $banner_background_color; ?>">
    <div class="container">
        <div class="columns">
            <div class="column-50 block">
                <h1><?php echo $main_headline; ?></h1>
                <p><?php echo $banner_copy; ?></p>
                <div class="spacer-30"></div>
                <p class="button-cta"><strong><?php echo $button_cta; ?></strong></p>
                <a href="<?php echo $button_link; ?>" class="btn"><?php echo $button_text; ?></a>
            </div>
            <div class="column-50">
                <div class="form-block">
                    <?php echo do_shortcode('' . $form_shortcode . ''); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php } elseif (get_field('right_panel') == 'image') { ?>
    
<section class="banner image" style="background-color:<?php echo $banner_background_color; ?>">
    <div class="container">
        <div class="columns">
            <div class="column-50 block">
                <h1><?php echo $main_headline; ?></h1>
                <p><?php echo $banner_copy; ?></p>
                <div class="spacer-30"></div>
                <p class="button-cta"><strong><?php echo $button_cta; ?></strong></p>
                <a href="<?php echo $button_link; ?>" class="btn"><?php echo $button_text; ?></a>
            </div>
            <div class="column-50">
                <div class="img-block">
                <?php 
                if( !empty( $header_image ) ): ?>
                    <img src="<?php echo esc_url($header_image['url']); ?>" alt="<?php echo esc_attr($header_image['alt']); ?>" />
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php } elseif (get_field('right_panel') == 'testimonial') { ?>
    
    <section class="banner testimonial" style="background-color:<?php echo $banner_background_color; ?>">
        <div class="container">
            <div class="columns">
                <div class="column-50 block">
                    <h1><?php echo $main_headline; ?></h1>
                    <p><?php echo $banner_copy; ?></p>
                    <div class="spacer-30"></div>
                    <p class="button-cta"><strong><?php echo $button_cta; ?></strong></p>
                    <a href="<?php echo $button_link; ?>" class="btn"><?php echo $button_text; ?></a>
                </div>
                <div class="column-50 testimonial">
                    <p><?php echo $testimonial_text; ?></p>
                    <div class="source-author">
                    <?php 
                    if( !empty( $testimonial_source ) ): ?>
                        <img src="<?php echo esc_url($testimonial_source['url']); ?>" alt="<?php echo esc_attr($testimonial_source['alt']); ?>" />
                    <?php endif; ?>
                    <div class="author">
                        <p><?php echo $testimonial_author; ?></p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>


