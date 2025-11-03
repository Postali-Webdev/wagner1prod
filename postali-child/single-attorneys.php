<?php 
/**
 * Single Attorneys
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); ?>

<section id="banner">       
    <div class="columns">
        <div class="column-full">
            <div class="copy-wrapper">
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                <div class="inner-wrapper">
                    <?php $first_name = get_field('banner_first_name');
                    $last_name = get_field('banner_last_name'); ?>
                    <h1><?php echo esc_html( $first_name . ' ' . $last_name ); ?></h1>
                    <p class="thin-subtitle"><?php echo esc_html( get_field('banner_occupation') ); ?></p>
                    <div class="spacer-30"></div>
                    <div class="cta">
                        <?php $cta = get_field('banner_cta'); ?>
                        <p><?php echo esc_html($cta['copy']); ?></p>
                        <a href="tel:<?php echo get_field('phone', 'options'); ?>" class="btn"><?php echo esc_html( get_field('phone', 'options') ); ?></a>
                    </div>
                </div>
                <div class="bottom-copy">
                    <div class="inner-wrapper">
                        <?php $banner_featured_award = get_field('banner_featured_award');
                        if( $banner_featured_award ) { echo wp_get_attachment_image( $banner_featured_award['id'], 'full', "", ["class" => "ignore-lazy featured-award"]); } ?>    
                        <p class="blue-subtitle"><?php echo acf_esc_html( get_field('banner_blue_copy') ); ?></p>
                    </div>
                </div>
            </div>
            <div class="img-wrapper">
                <?php $employee_img = get_field('banner_employee_image'); ?>
                <?php if( $employee_img ) { echo wp_get_attachment_image( $employee_img['id'], 'full', "", ["class" => "ignore-lazy banner-img"]); } ?>
            </div>
        </div>
    </div>
</section>

<?php if( get_field('linkedin_url') ) : ?>
    <a class="linkedin-link" href="<?php echo esc_url( get_field('linkedin_url') ); ?>"><span>Connect with <?php echo $first_name; ?> on:</span>
        <?php echo wp_get_attachment_image( '453', 'full', "", ["class" => "ignore-lazy banner-img"]); ?>
    </a>
<?php endif; ?>

<section id="employee-bio">
    <div class="container">
        <div class="columns">
            <div class="column-66 block center">
                <?php if( get_field('employee_bio') ) : ?>
                    <h2>Notable Experience</h2>
                    <?php echo acf_esc_html( get_field('employee_bio_intro')); ?>

                    <?php if( have_rows('awards') ): ?>
                    <div class="awards-block">

                        <?php 
                        $string = get_the_title();
                        $last_word_start = strrpos($string, ' ') + 1; // +1 so we don't include the space in our result
                        $last_word = substr($string, $last_word_start); // $last_word = PHP.
                        ?>

                        <h3>Attorney <?php echo $last_word; ?>'s Awards & Honors</h3>
                        <div class="awards">
                        <?php while( have_rows('awards') ): the_row(); ?>  
                            <?php 
                            $image = get_sub_field('award');
                            if( !empty( $image ) ): ?>
                            <?php if( get_sub_field('award_link') ) : ?><a href="<?php the_sub_field('award_link'); ?>" target="blank"><?php endif; ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php if( get_sub_field('award_link') ) : ?></a><?php endif; ?>
                            <?php endif; ?>
                        <?php endwhile; ?>
                        </div>
                    </div>
                    <?php endif; ?> 

                    <?php echo acf_esc_html( get_field('employee_bio_main')); ?>

                <?php endif; ?>
                
                <?php if( have_rows('Staff') ) : ?>
                    <div class="staff-wrapper">
                        <?php while( have_rows('Staff') ) : the_row(); $staff_img = get_sub_field('headshot'); ?>
                            <div class="employee">
                                <?php if( $staff_img ) { echo wp_get_attachment_image( $staff_img['id'], 'full', "", ["class" => "employee-img"]); } ?>
                                <h3><?php echo get_sub_field('name'); ?></h3>
                                <p class="title"><?php echo get_sub_field('title'); ?></p>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

                <?php
                $current_page_slug = get_post_field('post_name', get_post());
                
                $args = array(
                    'post_type' => 'testimonials',
                    'posts_per_page' => 2,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'testimonial_attorney_filter',
                            'field' => 'slug',
                            'terms' => $current_page_slug
                        )
                    )
                );
                $query = new WP_Query( $args ); 
                if ( $query->have_posts() ) : ?>
                 <p><strong>See what our clients are saying about <?php echo $first_name; ?>!</strong></p>
                 <a class="btn-fill" href="/client-endorsements/attorney/<?php echo $current_page_slug; ?>"><span>View Testimonials</span></a>
                <?php endif; wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>

<?php if( have_rows('accomplishments') ) : ?>
<section id="employee-accomplishments">
    <div class="container">
        <div class="columns">
            <div class="column-75 block center">
                <?php echo wp_get_attachment_image('456', 'full', "", ["class" => "mobile-trophy-img"]); ?>
                <h2>Accomplishments</h2>
                <?php while( have_rows('accomplishments') ) : the_row(); ?>
                    <p class="blue-subtitle"><?php echo esc_html( get_sub_field('list_title') ); ?></p>
                    <?php if( have_rows('list') ) : ?>
                        <ul>
                            <?php while( have_rows('list') ) : the_row(); ?>
                                <li><?php echo acf_esc_html( get_sub_field('list_item') ); ?></li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<section id="contact-form">
    <div class="container">
        <div class="columns">
            <div class="column-full block center">
                <h3><?php echo esc_html( get_field('section_title') ); ?></h3>
                <?php echo do_shortcode( get_field('gravity_form_embed') ); ?>
            </div>
        </div>
    </div>
</section>



<?php get_footer(); ?>