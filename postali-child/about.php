<?php 

/**
 * 
 * Template Name: About Us
 * @package Postali Parent
 * @author Postali LLC
 */

get_header();  ?>

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
                <div class="featured-item">
                    <?php $bordered_block = get_field('banner_bordered_block'); ?>
                    <p class="blue-subtitle"><?php echo esc_html( $bordered_block['blue_copy'] ); ?></p>
                    <?php echo acf_esc_html( $bordered_block['standard_copy'] ); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="panel-2" class="grey-bg">
    <div class="container">
        <div class="columns">
            <div class="column-66 block">
                <?php echo acf_esc_html( get_field('p2_copy') ); ?>
                <?php if( is_page_template('about.php') ) : 
                    echo acf_esc_html( get_field('about_team_copy') ); ?>

                    <?php
                    // WP Query to retrieve attorneys filtered by occupation taxonomy
                    $attorney_args = array(
                        'post_type' => 'attorneys', // The name of your custom post type
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'occupation', // The name of your taxonomy
                                'field' => 'slug',
                                'terms' => 'attorney', // The slug of the term you want to filter by
                            ),
                        ),
                    );

                    $attorney_query = new WP_Query($attorney_args);

                    // The Loop
                    if ($attorney_query->have_posts()) {
                        echo '<div class="attorneys-wrapper">';
                        while ($attorney_query->have_posts()) {
                            $attorney_query->the_post();
                            $banner_first_name = get_field('banner_first_name');
                            $banner_last_name = get_field('banner_last_name');
                            $attorney_name = $banner_first_name . ' ' . $banner_last_name;
                            echo '<a href="' . get_permalink() . '">' . $attorney_name . '</a>';
                        }

                        // add in button for support staff
                        echo '<a href="/our-team/paralegals-staff/">Paralegals & Staff</a>';

                        echo '</div>';
                    } else {
                        echo 'No attorneys found.';
                    }
                    wp_reset_postdata();


                    // WP Query to retrieve founders filtered by occupation taxonomy
                    $founders_args = array(
                        'post_type' => 'attorneys',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'occupation',
                                'field' => 'slug',
                                'terms' => 'founding-partner',
                            ),
                        ),
                    );

                    $founders_query = new WP_Query($founders_args);

                    // The Loop
                    if ($founders_query->have_posts()) {
                        echo '<p class="blue-subtitle founders-title">Founding Partners</p>';
                        echo '<div class="founders-wrapper">';
                        while ($founders_query->have_posts()) {
                            $founders_query->the_post();
                            $banner_first_name = get_field('banner_first_name');
                            $banner_last_name = get_field('banner_last_name');
                            $attorney_name = $banner_first_name . ' ' . $banner_last_name;
                            echo '<a href="' . get_permalink() . '">' . $attorney_name . '</a>';
                        }
                        echo '</div>';
                    } 
                    wp_reset_postdata();
                    ?>
                    
                <?php endif; ?>
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