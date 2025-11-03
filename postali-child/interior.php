<?php 

/**
 * 
 * Template Name: Interior (Default)
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
                    <?php $banner_cta =  get_field('banner_cta'); ?>
                    <p><?php echo esc_html( get_field('global_cta_copy', 'options')); ?></p>
                    <a href="tel:<?php echo get_field('phone', 'options'); ?>" class="btn"><?php echo esc_html( get_field('phone', 'options') ); ?></a>
                </div>
            </div>
            <div class="right-col">
                <?php $bordered_block = get_field('banner_bordered_block');
                if( $bordered_block['standard_copy'] || $bordered_block['blue_copy'] ) : ?>
                <div class="featured-item">
                    <p class="blue-subtitle"><?php echo esc_html( $bordered_block['blue_copy'] ); ?></p>
                    <?php echo acf_esc_html( $bordered_block['standard_copy'] ); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<section id="panel-2" class="grey-bg">
    <?php if( $bordered_block['standard_copy'] || $bordered_block['blue_copy'] ) : ?>
        <div class="offset-box-spacer"></div>
    <?php else : ?>
        <div class="default-spacer"></div>
    <?php endif; ?>
    <div class="container">
        <div class="columns">
            <div class="column-66 block">
                <?php echo acf_esc_html( get_field('p2_copy') ); ?>
            </div>
            <div class="column-33 block blog-sidebar">
                <div class="form-wrapper">
                    <h3>Contact Us Today!</h3>
                    <?php echo do_shortcode( get_field('sidebar_gravity_form') ); ?>  
                </div>
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