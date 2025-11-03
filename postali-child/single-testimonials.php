<?php 

/**
 * Single Testimonial
 * @package Postali Parent
 * @author Postali LLC
 */

get_header(); ?>

<section id="banner" class="navy-bg">
    <div class="container">
        <div class="columns">
            <div class="left-col">
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                <h1><?php echo esc_html( get_field('testimonial_page_title', 'options') ); ?></h1>
                <div class="cta">
                    <p><?php echo esc_html( get_field('testimonial_cta_copy', 'options') ); ?></p>
                    <a href="tel:<?php echo get_field('phone', 'options'); ?>" class="btn"><?php echo esc_html( get_field('phone', 'options') ); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if( have_posts() ) : ?>
<section id="body" class="grey-bg">
    <div class="container">
        <div class="columns">
            <div class="column-full block">
                <h2>What Our Clients Say About Us</h2>
                <?php while( have_posts() ) : the_post(); ?>
                    <div class="endorsement">
                        <span class="star-rating">★ ★ ★ ★ ★</span>
                        <?php echo get_field('copy'); ?>
                        <div class="lower-row">
                            <?php if ($source === 'google') {
                                echo wp_get_attachment_image( '519', 'full', "", ["class" => "google-icon"]);    
                            } ?>
                            <p class="author"><strong><?php echo get_field('author'); ?></strong> | <?php echo get_the_date('F Y'); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>


<?php get_footer(); ?>