<?php 

/**
 * Results
 * Template Name: Results
 * @package Postali Parent
 * @author Postali LLC
 */

get_header(); ?>

<section id="banner" class="navy-bg">
    <div class="container">
        <div class="columns">
            <div class="left-col">
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                <h1><?php echo esc_html( get_field('banner_title') ); ?></h1>
                <div class="cta">
                    <?php $cta = get_field('banner_cta'); ?>
                    <p><?php echo esc_html( $cta['copy']); ?></p>
                    <a href="tel:<?php echo get_field('phone', 'options'); ?>" class="btn"><?php echo esc_html( get_field('phone', 'options') ); ?></a>
                </div>
            </div>
            <div class="right-col">
                <?php $copy = get_field('banner_copy_block'); ?>
                    <div class="featured-item">
                        <p class="blue-subtitle"><?php echo esc_html( $copy['blue_copy'] ); ?></p>
                        <?php echo acf_esc_html( $copy['standard_copy'] ); ?>
                        <p class="blue-subtitle arrow"><?php echo esc_html( $copy['cta_copy'] ); ?></p>
                    </div>
            </div>
        </div>
    </div>
</section>

<section id="panel-2" class="grey-bg">
    <div class="container">
        <div class="columns">
            <div class="column-75 block">
            <?php
            // Check if the flexible content field exists
            if (have_rows('p2_body')) {
                // Loop through the flexible content layouts
                while (have_rows('p2_body')) {
                    the_row();

                    // Check the layout type
                    if (get_row_layout() === 'copy_block') {
                        // Code for the copy_block layout
                        the_sub_field('copy');
                    } elseif (get_row_layout() === 'infographics') {
                        // Code for the infographics layout
                        $graphic_1 = get_sub_field('graphic_1');
                        $graphic_2 = get_sub_field('graphic_2');
                        ?>
                        <div class="columns">
                            <?php if( $graphic_1 && $graphic_2 ) { ?>
                                <div class="column-50">
                                    <?php echo wp_get_attachment_image( $graphic_1['id'], 'full', "", ["class" => "info-graphic"]); ?>
                                </div>
                                <div class="column-50">
                                    <?php echo wp_get_attachment_image( $graphic_2['id'], 'full', "", ["class" => "info-graphic"]); ?>
                                </div>
                            

                            <?php } elseif( $graphic_1 || $graphic_2 ) { ?>
                                <div class="column-full">
                                    <?php 
                                    if( $graphic_1 ) {
                                        echo wp_get_attachment_image( $graphic_1['id'], 'full', "", ["class" => "info-graphic"]); 
                                    } elseif( $graphic_2 ) {
                                        echo wp_get_attachment_image( $graphic_2['id'], 'full', "", ["class" => "info-graphic"]);
                                    }
                                    ?>
                                </div>
                            <?php } ?>
                        </div>
                        
                          
                        <?php
                    } elseif (get_row_layout() === 'banner_copy') { ?>
                        <div class="banner-copy">
                            <p><?php echo acf_esc_html( get_sub_field('banner_copy') ); ?></p>
                        </div>
                    <?php }
                }
            }
            ?>
            </div>
        </div>
    </div>
</section>

<section id="panel-3">
    <div class="container">
        <div class="columns">
            <div class="column-full block center">
                <h3><?php echo esc_html( get_field('p3_section_title') ); ?></h3>
                <?php echo do_shortcode( get_field('p3_gravity_form_embed') ); ?>
            </div>
        </div>
    </div>
</section>




<?php get_footer(); ?>