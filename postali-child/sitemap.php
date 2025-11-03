<?php 

/**
 * Sitemap
 * Template Name: Sitemap
 * @package Postali Parent
 * @author Postali LLC
 */

get_header(); ?>

<section id="banner" class="navy-bg">
    <div class="container">
        <div class="columns">
            <div class="left-col">
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                <p class="yellow-subtitle">WAGNER, McLAUGHLIN & WHITTEMORE</p>
                <h1>Sitemap</h1>
                <div class="cta">
                    <p><?php echo esc_html( get_field('global_cta_copy', 'options')); ?></p>
                    <a href="tel:<?php echo get_field('phone', 'options'); ?>" class="btn"><?php echo esc_html( get_field('phone', 'options') ); ?></a>
                </div>
            </div>
            <div class="right-col">
            </div>
        </div>
    </div>
</section>

<secton id="panel-1">
    <div class="container">
        <div class="columns">
            <div class="column-50 block">
                <h2>Pages</h2>
                <?php
                echo '<ul>';
                wp_list_pages([
                    'title_li' => '',
                    'sort_column' => 'menu_order,post_title',
                    'depth' => 0 // 0 means unlimited depth (shows all descendants)
                ]);
                echo '</ul>';
                ?>

                <h2>Attorneys</h2>
                <?php
                // WP Query to retrieve all attorneys
                $attorney_args = array(
                    'post_type' => 'attorneys', // Specify your custom post type
                    'posts_per_page' => -1, // Retrieve all attorney posts
                    'orderby' => 'menu_order', // Sort by menu order, then title
                    'order' => 'ASC',
                );

                $attorney_query = new WP_Query($attorney_args);

                if ($attorney_query->have_posts()) {
                    echo '<ul>';
                    while ($attorney_query->have_posts()) {
                        $attorney_query->the_post();
                        echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                    }
                    echo '</ul>';
                } else {
                    echo 'No attorneys found.';
                }
                wp_reset_postdata();
                ?>
            </div>

            <div class="column-50 block">
                <h2>Blogs</h2>
                <?php
                // WP Query to retrieve all blog posts
                $args = array(
                    'post_type' => 'post', // Specify the post type as 'post' for blog posts
                    'posts_per_page' => -1, // Retrieve all blog posts
                    'orderby' => 'date', // Sort by date
                    'order' => 'DESC', // Descending order
                );

                $query = new WP_Query($args);

                // The Loop
                if ($query->have_posts()) {
                    echo '<ul>';
                    while ($query->have_posts()) {
                        $query->the_post();
                        echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                    }
                    echo '</ul>';
                } else {
                    echo 'No blog posts found.';
                }

                // Restore original post data
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</secton>



<?php get_footer(); ?>