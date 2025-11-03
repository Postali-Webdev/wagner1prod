<?php get_header(); ?>




<section id="banner" class="navy-bg">
    <div class="container">
        <div class="columns">
            <div class="left-col">
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                <p class="yellow-subtitle">WAGNER, McLAUGHLIN & WHITTEMORE</p>
                <h1>Attorneys</h1>
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

<section id="panel-2">
    <div class="container">
        <div class="columns">
            <div class="column-full">
                <?php 
                // The Loop
                if (have_posts()) {
                    echo '<div class="attorneys-wrapper">';
                    while (have_posts()) {
                        the_post();
                        $banner_first_name = get_field('banner_first_name');
                        $banner_last_name = get_field('banner_last_name');
                        $attorney_name = $banner_first_name . ' ' . $banner_last_name;
                        echo '<a href="' . get_permalink() . '">' . $attorney_name . '</a>';
                    }
                    echo '</div>';
                } else {
                    echo 'No attorneys found.';
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>









<?php get_footer(); ?>