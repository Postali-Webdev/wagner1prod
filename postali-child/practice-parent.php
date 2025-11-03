<?php 

/**
 * Practice Parent
 * Template Name: Practice Parent
 * @package Postali Parent
 * @author Postali LLC
 */

get_header(); ?>

<section id="banner" class="navy-bg">
    <div class="columns">
        <div class="column-50 block">
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
        </div>
        <div class="column-50 block">
            <h1><?php echo esc_html( get_field('banner_title') ); ?></h1>
            <div class="cta">
                <?php $cta = get_field('banner_cta'); ?>
                <p><?php echo esc_html($cta['copy']); ?></p>
                <a href="tel:<?php echo get_field('phone', 'options'); ?>" class="btn"><?php echo esc_html( get_field('phone', 'options') ); ?></a>
            </div>
        </div>
    </div>
</section>

<section id="banner-lower">
    <div class="columns">
        <div class="column-50"></div>
        <div class="column-50 block">
            <div class="border-wrap">
                <?php $intro_copy_group = get_field('banner_intro_copy'); ?>
                <p class="blue-subtitle"><?php echo acf_esc_html( $intro_copy_group['large_blue_copy'] ); ?></p>
                <?php echo acf_esc_html( $intro_copy_group['copy'] ); ?>
            </div>
            <a class="anchor-link" href="#types"><?php echo esc_html( get_field('banner_anchor_link_title') ); ?></a>
        </div>
    </div>
</section>

<section id="panel-2">
    <?php $banner_img = get_field('banner_image');
    if( $banner_img['id'] ) {
        echo wp_get_attachment_image( $banner_img['id'], 'full', "", ["class" => "ignore-lazy banner-img"]); 
    } ?>
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <h2><?php echo esc_html( get_field('p2_section_title') ); ?></h2>
                <?php echo acf_esc_html( get_field('p2_section_copy') ); ?>
                <?php ?>
            </div>
            <div class="column-50">
                <div class="areas-served">
                    <?php $areas_group = get_field('p2_areas_served'); ?>
                    <h3><?php echo esc_html( $areas_group['section_title'] ); ?></h3>
                    <?php echo acf_esc_html( $areas_group['copy'] ); ?>
                    <?php if( have_rows('areas', 'options') ) : ?>
                        <ul>
                            <?php while( have_rows('areas', 'options') ) : the_row(); ?>
                                <li><?php echo esc_html( get_sub_field('area') ); ?></li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column-full">
                <?php if( have_rows('awards', 'options') ) : ?> 
                    <div class="awards-wrapper">
                        <div class="inner-wrapper">
                            <?php while( have_rows('awards', 'options') ) : the_row(); 
                                $award = get_sub_field('award');
                                if($award['id']) { 
                                    echo '<div class="award-slider-img">';
                                    echo wp_get_attachment_image( $award['id'], 'full', "", ["class" => "award-slider-img"]); 
                                    echo '</div>';
                                }?>
                            <?php endwhile; ?> 
                        </div>
                    </div>
                <?php endif;?>
            </div>                
            <?php $pa_child_args = array(
                'post_type' => 'page',
                'post_parent' => get_the_ID(),
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            );

            $pa_child_query = new WP_Query( $pa_child_args );

            if ( $pa_child_query->have_posts() ) : ?>

                <div class="column-full block">
                    <span id="types"></span>
                    <?php $pa_group = get_field('practice_child_block'); ?>
                    <div class="copy-wrapper">
                        <h3><?php echo esc_html( $pa_group['section_title'] ); ?></h3>
                        <?php echo acf_esc_html( $pa_group['copy'] ); ?>
                    </div>
                    <div class="pa-wrapper">
                        <?php while ( $pa_child_query->have_posts() ) {
                            $pa_child_query->the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class="practice-area"><?php echo get_field('short_title'); ?></a>
                        <?php }
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section id="panel-3" class="grey-bg">
    <div class="container">
        <div class="columns">
            <div class="column-full block">
                <div class="copy-wrapper">
                    <h2><?php echo esc_html( get_field('p3_section_title') ); ?></h2>
                    <?php echo acf_esc_html( get_field('p3_copy') ); ?>
                </div>
                <?php if( have_rows('p3_processes') ) : $process_count = 0; $process_total = count(get_field('p3_processes')); ?>
                    <div class="processes-wrapper">
                        <?php while( have_rows('p3_processes') ) : the_row(); $process_count++; ?>
                            <div class="process<?php echo get_sub_field('add_white_background') ? ' white-bg' : ''; ?>">
                                <div class="left-col">
                                    <div class="icon-wrapper">
                                        <?php 
                                        if( get_field('p3_add_custom_icons') ) {
                                            if( get_sub_field('custom_icon') ) {
                                                $custom_icon = get_sub_field('custom_icon');
                                                echo wp_get_attachment_image( $custom_icon['id'], 'full', "", ["class" => "process-icon"]);
                                            }
                                        } else {
                                            for( $i = 0; $i < $process_total; $i++ ) { ?>
                                                <div class="process-bubble <?php echo $process_count > $i ? 'fill-bubble' : ''; ?>"></div>
                                        <?php }
                                        }?>
                                    </div>
                                    <h3><?php echo esc_html( get_sub_field('title') ); ?></h3>
                                </div>
                                <div class="right-col">
                                    <?php if( get_sub_field('image') ) {
                                        $section_image = get_sub_field('image');
                                        echo wp_get_attachment_image( $section_image['id'], 'full', "", ["class" => "process-icon"]);
                                    } ?>
                                    <?php echo acf_esc_html( get_sub_field('copy') ); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php if( get_field('p4_testimonial') ) : 
    $p4_testimonial = get_field('p4_testimonial'); ?>
<section id="panel-4" class="navy-bg">
    <div class="container">
        <div class="columns testimonial-wrapper">
            <div class="column-50 block left-copy">
                <p class="testimonial-callout"><span class="shadowed-text">“</span><?php the_field('intro_copy', $p4_testimonial->ID); ?></p>
            </div>
            <div class="column-50 block right-copy">
                <span class="star-rating">★ ★ ★ ★ ★</span>
                <h2>Client Endorsements</h2>
                <div class="full-testimonial"><?php the_field('copy', $p4_testimonial->ID); ?></div>
                <div class="author">
                    <?php if( get_field('source', $p4_testimonial->ID) == 'google' ) {
                        echo wp_get_attachment_image( '475', 'full', "", ["class" => "process-icon"]);
                    } ?>
                    <p><?php the_field('author', $p4_testimonial->ID); ?> | <?php echo get_the_date('F Y'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<section id="panel-5">
    <div class="container">
        <?php get_template_part('block', 'cta', ['prefix' => 'p5_cta_' ]); ?>
    </div>
</section>



<?php get_footer(); ?>