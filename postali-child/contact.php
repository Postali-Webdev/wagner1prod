<?php 

/**
 * Contact
 * Template Name: Contact Us
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
                    <p class="blue-subtitle">WAGNER, McLAUGHLIN & WHITTEMORE</p>
                    <div class="columns">
                        <div class="column-50 block">
                            <?php $address = get_field('address', 'options'); ?>
                            <p class="address"><?php echo $address['street'] . ' ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']; ?></p>
                            <div class="contact-info">
                                <a href="tel:<?php echo get_field('phone', 'options'); ?>">Phone: <?php echo esc_html( get_field('phone', 'options') ); ?></a>
                                <a href="tel:<?php echo get_field('toll_free_phone', 'options'); ?>">Toll Free: <?php echo esc_html( get_field('toll_free_phone', 'options') ); ?></a>
                                <a href="fax:<?php echo get_field('fax', 'options') ?>">Fax: <?php echo esc_html( get_field('fax', 'options') ); ?></a>
                            </div>

                            <?php $directions_link = get_field('direction_link', 'options'); ?>
                            <a target="blank" class="directions-link" href="<?php echo $directions_link; ?>" target="_blank" class="blue-subtitle">Directions</a>
                        </div>
                        <div class="column-50">
                            <iframe title="google map of Wagner, McLaughlin & Whittemore office" src="<?php echo get_field('map_embed_url', 'options'); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact">
    <div class="container">
        <div class="columns">
            <div class="column-full block center">
                <h3><?php echo esc_html( get_field('p2_section_title') ); ?></h3>
                <?php echo do_shortcode( get_field('p2_gravity_form_embed') ); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>