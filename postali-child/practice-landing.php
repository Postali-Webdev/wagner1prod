<?php 

/**
 * Practice Landing
 * Template Name: Practice Landing
 * @package Postali Parent
 * @author Postali LLC
 */

get_header(); ?>

<section id="banner" class="navy-bg">
    <div class="container">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs" class="mobile-breadcrumbs">','</p>');} ?>    
        <div class="columns">
            <div class="column-full block center">
                <h1><?php echo esc_html( get_field('banner_title') ); ?></h1>
                <div class="cta">
                    <?php $cta = get_field('banner_cta'); ?>
                    <p><?php echo esc_html($cta['copy']); ?></p>
                    <a href="tel:<?php echo get_field('phone', 'options'); ?>" class="btn"><?php echo esc_html( get_field('phone', 'options') ); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="panel-1" class="grey-bg">
    <div class="container">
        <div class="columns">
            <div class="column-full block">
                <?php 
                    // Get parent pages with the template practice-parent.php
                    $parent_pages = get_pages(array(
                        'meta_key' => '_wp_page_template',
                        'meta_value' => 'practice-parent.php'
                    ));


                    foreach ($parent_pages as $parent_page) {
                        $short_title = get_field('short_title', $parent_page->ID);
                        $title = $short_title ? $short_title : $parent_page->post_title;
                        // Replace spaces with dashes
                        $anchor_link = str_replace(' ', '-', $title);

                        // Remove special characters
                        $anchor_link = strtolower(preg_replace('/[^a-zA-Z0-9-]/', '', $anchor_link));

                        echo "<span id='{$anchor_link}'></span>";
                        echo '<ul class="parent-pages">';
                        echo '<li>';
                        echo '<h2><a href="' . get_permalink($parent_page->ID) . '">' . $title . '</a></h2>';

                        // Get child pages of the parent page
                        $child_pages = get_pages(array(
                            'child_of' => $parent_page->ID
                        ));

                        if ($child_pages) {
                            echo '<ul class="child-pages">';
                            foreach ($child_pages as $child_page) {
                                echo '<li>';
                                $short_title = get_field('short_title', $child_page->ID);
                                $title = $short_title ? $short_title : $child_page->post_title;
                                echo '<a href="' . get_permalink($child_page->ID) . '">' . $title . '</a>';

                                // Get grandchild pages of the child page
                                $grandchild_pages = get_pages(array(
                                    'child_of' => $child_page->ID
                                ));

                                if ($grandchild_pages) {
                                    echo '<ul class="grandchild-pages">';
                                    foreach ($grandchild_pages as $grandchild_page) {
                                        echo '<li>';
                                        $short_title = get_field('short_title', $grandchild_page->ID);
                                        $title = $short_title ? $short_title : $grandchild_page->post_title;
                                        echo '<a href="' . get_permalink($grandchild_page->ID) . '">' . $title . '</a>';
                                        echo '</li>';
                                    }
                                    echo '</ul>';
                                }

                                echo '</li>';
                            }
                            echo '</ul>';
                        }

                        echo '</li>';
                        echo '</ul>';
                    }
                ?>
            </div>
        </div>
    </div>
</section>



<?php get_footer(); ?>