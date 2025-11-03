<?php 

/**
 * Practice Child
 * Template Name: Practice Child
 * @package Postali Parent
 * @author Postali LLC
 */

get_header(); ?>

<section id="banner" class="navy-bg">
    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs" class="mobile-breadcrumbs">','</p>');} ?>    
    <div class="columns">
        <div class="column-50">
            <div class="container">
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs" class="desktop-breadcrumbs">','</p>');} ?>
                <h1><?php echo esc_html( get_field('banner_title') ); ?></h1>
                <?php echo acf_esc_html( get_field('banner_copy') ); ?>
                <div class="cta">
                    <?php $cta = get_field('banner_cta'); ?>
                    <p><?php echo esc_html($cta['copy']); ?></p>
                    <a href="tel:<?php echo get_field('phone', 'options'); ?>" class="btn"><?php echo esc_html( get_field('phone', 'options') ); ?></a>
                </div>
            </div>
        </div>
        <div class="column-50">
            <?php $banner_img = get_field('banner_image');
            if( $banner_img ) {
                echo wp_get_attachment_image( $banner_img['id'], 'full', "", ["class" => "ignore-lazy banner-img"]); 
            } ?>
        </div>
    </div>
</section>

<section id="panel-2">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <h2><?php echo esc_html( get_field('p2_section_title') ); ?></h2>
                <?php echo acf_esc_html( get_field('p2_copy') ); ?>
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
    </div>
</section>



<?php 
$current_page_id = get_the_ID();
$current_page = get_post($current_page_id);

$sibling_args = array(
    'post_type'      => 'page',
    'post_parent'    => $current_page->post_parent,
    'post__not_in'   => [$current_page_id],
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
    'posts_per_page' => 3,
);
$sibling_query = new WP_Query( $sibling_args );
$sibling_count = $sibling_query->post_count;

$child_args = array(
    'post_type'      => 'page',
    'post_parent'    => get_the_ID(),
    'posts_per_page' => 3,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
);
$child_query = new WP_Query( $child_args );
$child_count = $child_query->post_count;

if ( $child_query->have_posts()) {
    $related_posts_query = $child_query;
} else {
    $related_posts_query = $sibling_query;
}


if ( $related_posts_query->have_posts() ) : ?>
<section id="panel-3" class="navy-bg">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <h2><?php echo esc_html( get_field('p3_section_title') ); ?></h2>
                <?php echo acf_esc_html( get_field('p3_copy') ); ?>
            </div>

            <div class="column-50 block">

                <p class="yellow-subtitle">Related Topics</p>
                <div class="related-topics">
                    <?php 
                        while ( $related_posts_query->have_posts() ) {
                            $related_posts_query->the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class="practice-area"><?php echo get_field('short_title'); ?></a>
                        <?php }
                        wp_reset_postdata();

                        if ( $child_query->have_posts() && $child_count < 3 && $sibling_query->have_posts()) {
                            $sibling_args['posts_per_page'] = 3 - $child_count;
                            $sibling_query = new WP_Query( $sibling_args );
                            while ( $sibling_query->have_posts() ) {
                                $sibling_query->the_post(); ?>
                                <a href="<?php the_permalink(); ?>" class="practice-area"><?php echo get_field('short_title'); ?></a>
                            <?php } wp_reset_postdata();
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<section id="panel-4">
    <div class="container">
        <div class="columns">
            <div class="column-full block">
                <?php 
                if( have_rows('p4_copy') ):
                while ( have_rows('p4_copy') ) : the_row();
                    if( get_row_layout() == 'copy_block' ):
                        $copy = get_sub_field('copy');
                        echo $copy;
                    elseif( get_row_layout() == 'bordered_copy_block' ):
                        $h4_title = get_sub_field('h4_title');
                        $copy = get_sub_field('copy');
                        
                        echo '<div class="border-wrap"><h4>' . $h4_title . '</h4>';
                        echo $copy . '</div>';
                    endif;
                endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

<section id="panel-5" class="grey-bg">
    <div class="container">
        <?php get_template_part('block', 'cta', ['prefix' => 'p5_cta_' ]); ?>
    </div>
</section>

<section id="panel-6" class="grey-bg">
    <div class="container">
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
</section>

<?php get_footer(); ?>