<?php 

/**
 * Search
 * @package Postali Parent
 * @author Postali LLC
 */

get_header();


if (isset($_GET['s'])) {
    // Get the search query
    $search_query = get_search_query();
}

?>

<section id="banner" class="navy-bg">
    <div class="container">
        <div class="columns">
            <div class="left-col">
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                <p class="yellow-subtitle">Results For</p>
                
                <h1>“<?php echo esc_html( $search_query ); ?>”</h1>
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

<section id="panel-1">
    <div class="container">
        <div class="columns">
            <div class="column-66 block">
                <?php
                // Check if there is a search query
                if (isset($_GET['s'])) {
                
                    // Custom query to retrieve all post types except 'post' (blog posts) based on the search query
                    $args = array(
                        'post_type' => 'any', // Specify 'any' to retrieve all post types
                        's' => $search_query,
                        'posts_per_page' => -1,
                        'post__not_in' => get_all_blog_post_ids(), // Exclude blog posts
                    );

                    // Get all post types except blog posts based on the search query
                    $results = get_posts($args);

                    // Output the titles of the results
                    if (!empty($results)) {
                        echo '<ul>';
                        foreach ($results as $result) : ?>
                            
                        <div class="search-result">
                            <a href="<?php echo get_permalink($result->ID); ?>" class="search-result-link">
                                <h3 class="search-result-title"><?php echo $result->post_title; ?></h3>
                                <p class="search-result-excerpt"><?php echo $result->post_excerpt; ?></p>
                                <p class="learn-more">Learn More</p>
                            </a>
                        </div>
                        <?php endforeach;
                        
                    } else {
                        echo '<p>No Pages Found.</p>';
                    }
                }

                // Function to get all blog post IDs
                function get_all_blog_post_ids() {
                    $blog_post_ids = array();
                    $blog_posts = get_posts(array('post_type' => 'post', 'posts_per_page' => -1));
                    foreach ($blog_posts as $post) {
                        $blog_post_ids[] = $post->ID;
                    }
                    return $blog_post_ids;
                }
                ?>
            </div>
            <div class="column-33 block">
                <p class="blue-subtitle">Relevant Blogs</p>
                <?php
                // Check if there is a search query
                if (isset($_GET['s'])) {

                    // Custom query to retrieve blog posts based on the search query
                    $args = array(
                        'post_type' => 'post',
                        's' => $search_query,
                        'posts_per_page' => -1,
                    );

                    // Get the blog posts based on the search query
                    $blog_posts = get_posts($args);

                    // Output the blog posts
                    if (!empty($blog_posts)) {
                        
                        foreach ($blog_posts as $post) : ?>
                        <div class="blog-post">
                            <a href="<?php the_permalink($post->ID); ?>" class="blog-link"></a>
                            <div class="inner-wrapper">
                                <?php $blog_img = get_post_thumbnail_id($post->ID);
                                if( $blog_img ) {
                                echo wp_get_attachment_image( $blog_img, 'full', "", ["class" => "blog-img"]);    
                                } ?>
                            
                                <p class="date"><?php the_time('F j, Y'); ?></p>
                                <h2><?php the_title(); ?></h2>
                                <p class="category">Categories: <?php the_category(', ', '', $post->ID); ?></p>
                                <p class="yellow-subtitle">Read More</p>
                            </div>
                        </div>
                        <?php endforeach;
                        
                    } else {
                        echo '<p>No Blog Posts Found.</p>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>



<?php get_footer(); ?>