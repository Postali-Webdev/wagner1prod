<?php
/**
 * Template Name: Blog
 * 
 * @package Postali Child
 * @author Postali LLC
 */

get_header(); ?>


<section id="single-blog-post">
    <div class="container">
        <div class="columns">
            <div class="column-66 block">
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                <p class="blue-subtitle date"><?php the_time('F j, Y'); ?></p>
                <h1><?php echo get_the_title(); ?></h1>
                <p class="category">Categories: <?php the_category(', '); ?></p>
                <?php $blog_img = get_post_thumbnail_id();
                if( $blog_img ) {
                    echo wp_get_attachment_image( $blog_img, 'full', "", ["class" => "blog-img ignore-lazy"]);    
                } ?>
                <div class="spacer-60"></div>
                <?php the_content(); ?>
                <?php
                $prev_post = get_previous_post();
                $next_post = get_next_post();
                ?>

                <div class="blog-nav-links">
                    <?php if ($prev_post) : ?>
                        <a class="prev-blog" href="<?php echo get_permalink($prev_post->ID); ?>">Previous Blog</a>
                    <?php endif; ?>

                    <?php if ($next_post) : ?>
                        <a class="next-blog" href="<?php echo get_permalink($next_post->ID); ?>">Next Blog</a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="column-33 block grey-bg blog-sidebar">
                <div class="recent-posts">
                    <p class="blue-subtitle">Recent Posts</p>
                    <?php
                    $args = array(
                        'posts_per_page' => 3,
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'post__not_in' => array(get_the_ID())
                    );

                    $query = new WP_Query($args);

                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            ?>
                            <div class="recent-post">
                                <a class="blog-link" href="<?php the_permalink(); ?>"></a>
                                <h3><?php the_title(); ?></h3>
                                <p class="read-now">Read Now</p>
                            </div>
                            <?php
                        }
                        wp_reset_postdata();
                    } else {
                        // No posts found
                    }
                    ?>
                    <a href="/legal-blog/" class="btn-fill"><span>View All Blogs</span></a>
                </div>
                <div class="contact">
                    <?php
                        // Get the primary categories taxonomy
                        $primary_taxonomy = get_the_category()[0]->name;
                        //Check if the primary taxonomy is named "Uncategorized"
                        if ($primary_taxonomy === 'Uncategorized') {
                            $contact_title = 'Contact An Attorney Today!';
                        } else {
                            $contact_title = 'Contact A ' . $primary_taxonomy . ' Attorney Today!';
                        }
                    ?>
                    <h3><?php echo $contact_title; ?></h3>
                    <?php echo do_shortcode( '[gravityform id="1" title="false" description="false"]' ) ?>
                </div>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>
