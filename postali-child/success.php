<?php 

/**
 * Success
 * Template Name: Success
 * @package Postali Parent
 * @author Postali LLC
 */

get_header(); ?>

<section id="banner" class="navy-bg">
    <div class="container">
        <div class="columns">
            <div class="left-col">
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                <p class="yellow-subtitle"><?php echo esc_html( get_field('yellow_subtitle') ); ?></p>
                <h1><?php echo esc_html( get_field('large_copy') ); ?></h1>
                <?php echo acf_esc_html( get_field('page_copy') ); ?>
                <a href="tel:<?php echo get_field('phone', 'options'); ?>" class="btn"><?php echo esc_html( get_field('phone', 'options') ); ?></a>
            </div>`
            <div class="right-col">
                <div class="yellow-border">
                    <?php $page_icon = get_field('page_icon'); 
                    if( $page_icon ) {
                        echo wp_get_attachment_image( $page_icon['id'], 'full', "", ["class" => "email-icon ignore-lazy"]);    
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section>



<?php get_footer(); ?>