<?php
/**
 * Template Name: Blog
 * 
 * @package Postali Child
 * @author Postali LLC
 */

get_header(); ?>


<section id="banner">
    <div class="container">
        <div class="columns">
            <div class="column-full block">
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                <h1><?php 
                $blog_archive_page_id = get_option('page_for_posts');
                echo get_the_title($blog_archive_page_id); ?></h1>
            </div>
        </div>
    </div>
</section>

<section id="body">
    <div class="container">
        <div class="columns">
            <div class="column-full">
                <div class="posts-wrapper">
                    <?php if ( have_posts() ) : 
                        $count = 0; ?>
                        <?php while ( have_posts() ) : the_post(); $count++; 
                        
                        if ( get_query_var('paged') == 0 && $count == 1 ) {
                            // Add a class to the first blog post.
                            $first_post_class = true;
                        } else {
                            $first_post_class = false;
                        } ?>

                        <?php if( $first_post_class ) : ?>

                            <div class="featured-post">
                                <a href="<?php the_permalink(); ?>" class="blog-link"></a>
                                <div class="left-col">
                                    <p class="date"><?php the_time('F j, Y'); ?></p>
                                    <h2><?php the_title(); ?></h2>
                                    <p class="category">Categories: <?php the_category(', '); ?></p>
                                    <p><?php echo get_the_excerpt(); ?></p>
                                    <p class="yellow-subtitle">Continue Reading</p>
                                </div>
                                <div class="right-col">
                                    <?php $blog_img = get_post_thumbnail_id();
                                    if( $blog_img ) {
                                      echo wp_get_attachment_image( $blog_img, 'full', "", ["class" => "blog-img"]);    
                                    } ?>
                                </div>
                            </div>

                        <?php else : ?>

                        <div class="blog-post">
                            <a href="<?php the_permalink(); ?>" class="blog-link"></a>
                            <div class="inner-wrapper">
                                <?php $blog_img = get_post_thumbnail_id();
                                if( $blog_img ) {
                                echo wp_get_attachment_image( $blog_img, 'full', "", ["class" => "blog-img"]);    
                                } ?>
                            
                                <p class="date"><?php the_time('F j, Y'); ?></p>
                                <h2><?php the_title(); ?></h2>
                                <p class="category">Categories: <?php the_category(', '); ?></p>
                                <p class="yellow-subtitle">Read More</p>
                            </div>
                        </div>

                        <?php endif; ?>
                            
                        <?php endwhile; ?>

                    <?php else : ?>
                        <p>No posts found.</p>
                    <?php endif; ?>
                </div>
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


<?php get_footer(); ?>
