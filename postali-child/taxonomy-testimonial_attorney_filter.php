<?php 

/**
 * Attorney Testimonials Page
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
            <div class="right-col">
                <?php
                // Get the featured testimonial post object
                $testimonial_featured = get_field('testimonial_featured', 'options');

                // Check if the featured testimonial post object exists
                if ($testimonial_featured) :
                    // Get the post object's ACF fields
                    $copy = get_field('copy', $testimonial_featured->ID);
                    $author = get_field('author', $testimonial_featured->ID);
                    $source = get_field('source', $testimonial_featured->ID);
                    $date = get_the_date('F Y');
                    ?>

                    <div class="featured-item">
                        <span class="star-rating">★ ★ ★ ★ ★</span>
                        <?php echo $copy; ?>
                        <div class="lower-row">
                            <?php if ($source === 'google') {
                                echo wp_get_attachment_image( '519', 'full', "", ["class" => "google-icon ignore-lazy"]);    
                            } ?>
                            <p class="author"><strong><?php echo $author; ?></strong> | <?php echo $date; ?></p>
                        </div>

                    </div>
                <?php endif; ?>
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

                <?php
                $pagination_args = array(
                    'prev_text'          => '',
                    'next_text'          => '',
                    'type'               => 'array',
                    'show_all'           => false,
                    'end_size'           => 0,
                    'mid_size'           => 3,
                    'current'            => max(1, get_query_var('paged')),
                    'total'              => $wp_query->max_num_pages,
                );

                $pagination_links = paginate_links($pagination_args);

                if ($pagination_links) {
                    echo '<ul class="pagination">';
                    foreach ($pagination_links as $link) {
                        echo '<li>' . $link . '</li>';
                    }
                    echo '</ul>';
                }
                ?>

            </div>
        </div>
    </div>
</section>
<?php endif; ?>


<?php get_footer(); ?>