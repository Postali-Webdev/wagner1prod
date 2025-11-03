<?php
/**
 * Template Name: Front Page
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>



<section id="banner">       
    <div class="columns">
        <div class="column-full block">
            <div class="copy-wrapper">
                <div class="inner-wrapper">
                    <p class="thin-subtitle"><?php echo esc_html( get_field('banner_title_h1') ); ?></p>
                    <h1><?php echo esc_html( get_field('banner_sub_title') ); ?></h1>
                    <div class="cta">
                        <?php $cta = get_field('banner_cta'); ?>
                        <p><?php echo esc_html($cta['cta_text']); ?></p>
                        <a href="tel:<?php echo get_field('phone', 'options'); ?>" class="btn"><?php echo esc_html( get_field('phone', 'options') ); ?></a>
                    </div>
                </div>
                <div class="bottom-copy">
                    <div class="inner-wrapper">
                        <?php echo acf_esc_html( get_field('banner_copy') ); ?>
                    </div>
                    <?php $banner_img = get_field('banner_image'); ?>
                    <?php if( $banner_img ) { echo wp_get_attachment_image( $banner_img['id'], 'full', "", ["class" => "ignore-lazy banner-img"]); } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="experience-block">
        <p class="large-text"><?php echo esc_html( get_field('years_of_experience', 'options') ); ?>+</p>
        <p class="small-text">Years of experience</p>
    </div>
</section>

<section id="panel-2">
    <div class="container">
        <div class="columns">
            <div class="column-full block">
                <h2><?php echo esc_html( get_field('p2_section_title') ); ?></h2>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="columns about">
            <div class="column-50">
                <?php $p2_img = get_field('p2_section_image'); ?>
                <div class="image-wrapper">
                    <?php if( $p2_img ) { echo wp_get_attachment_image( $p2_img['id'] , 'full'); } ?>
                    <div class="awards-slider">
                        <div class="inner-awards-wrapper">
                            <?php if( have_rows('awards', 'options') ): 
                                while ( have_rows('awards', 'options') ) : the_row();  
                                $image = get_sub_field('award');?>

                                <div class="award">
                                    <?php if( $image ) { echo wp_get_attachment_image( $image['id'] , 'full', "", ['class' => 'ignore-lazy']); } ?>
                                </div>

                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column-50">
                <p class="blue-subtitle"><?php echo esc_html( get_field('p2_section_sub_title') ); ?></p>
                <?php echo acf_esc_html( get_field('p2_section_copy') ); ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="columns">
            <div class="column-full block">
                <div class="grey-block wide">
                    <?php $grey_block = get_field('p2_attorneys_grey_block'); ?>
                    <div class="copy">
                        <h3><?php echo esc_html( $grey_block['title'] ); ?></h3>
                        <?php echo acf_esc_html( $grey_block['copy'] ); ?>
                    </div>
                    <a class="btn-fill" target="<?php echo esc_attr( $grey_block['about_page_button']['target'] ); ?>" href="<?php echo esc_url( $grey_block['about_page_button']['url']) ?>"><span><?php echo esc_html( $grey_block['about_page_button']['title'] ); ?></span></a>
                </div>
            </div>
        </div>
    </div>

    <div class="columns reviews">
        <div class="container">
            <div class="column-75 block">
                <?php $testimonials_block = get_field('p2_testimonials_block'); ?>
                <h3><?php echo esc_html( $testimonials_block['section_title'] ); ?></h3>
                <?php echo wp_get_attachment_image('389', 'full', "", ["class" => "mobile-stars-img"]); ?>
                <p class="large-yellow-subtitle"><?php echo esc_html( $testimonials_block['section_sub_title'] ); ?></p>
                <?php echo acf_esc_html( $testimonials_block['testimonial_copy'] ); ?>
                <a target="<?php echo esc_attr( $testimonials_block['more_testimonials_button']['target'] ); ?>" class="btn-fill" href="<?php echo esc_url( $testimonials_block['more_testimonials_button']['url']) ?>"><span><?php echo esc_html( $testimonials_block['more_testimonials_button']['title'] ); ?></span></a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="columns results">
            <?php $results_block = get_field('p2_results_block'); ?>
            <div class="column-50">
                <?php $left_block = $results_block['left_block']; 
                $right_block = $results_block['right_block']; ?>
                <div class="grey-block">
                    <?php echo esc_html( $left_block['quote_part_1'] ); ?>
                    <p class="blue-subtitle"><?php echo esc_html( $left_block['quote_part_2'] ); ?></p>
                    <div class="img-wrapper">
                        <?php if( $left_block['attorney_image'] ) { echo wp_get_attachment_image( $left_block['attorney_image']['id'] , 'full', "", ["class" => "attorney-img"]); } ?>
                        <div class="attorney">
                            <p class="name"><?php echo esc_html( $left_block['attorney_name'] ); ?></p>
                            <p class="title"><?php echo esc_html( $left_block['attorney_title'] ); ?></p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo esc_url( $right_block['results_button']['url'] ); ?>" target="<?php echo esc_attr( $right_block['results_button']['target'] ); ?>" class="btn-fill results-mobile-btn"><span><?php echo esc_html( $right_block['results_button']['title'] ); ?></span></a>
            </div>
            <div class="column-50">
                <h3><?php echo esc_html( $right_block['section_title'] ); ?></h3>
                <?php echo acf_esc_html( $right_block['section_copy'] ); ?>
                <a href="<?php echo esc_url( $right_block['results_button']['url'] ); ?>" target="<?php echo esc_attr( $right_block['results_button']['target'] ); ?>" class="btn-fill results-desktop-btn"><span><?php echo esc_html( $right_block['results_button']['title'] ); ?></span></a>
            </div>
        </div>
    </div>
</section>

<section id="panel-3" class="grey-bg hp-pa-accordions">
    <div class="container">
        <div class="columns">
            <div class="column-full block">
                <h2><?php echo esc_html( get_field('p3_section_title') ); ?></h2>
                <p><?php echo acf_esc_html( get_field('p3_section_copy') ); ?></p>
            </div>
            <div class="columns">
                <div class="column-50 outer-pa-wrapper">
                    <?php if( have_rows('p3_practice_areas') ): $pa_count = 0; ?>
                        <div class="accordion-wrapper">
                            <?php while ( have_rows('p3_practice_areas') ) : the_row(); $pa_object = get_sub_field('practice_area'); $pa_count++;?>
                                <div class="accordions-<?php echo $pa_count; ?> accordions<?php echo $pa_count == 1 ? ' active' : ''; ?>" data-img="pa-img-<?php echo $pa_count; ?>">
                                    <div class="icon-wrapper">
                                        <?php $pa_icon = get_field('icon', $pa_object->ID);
                                            if( $pa_icon ) {
                                                echo wp_get_attachment_image( $pa_icon['id'] , 'full', "", ["class" => "img"]); 
                                            }
                                        ?>
                                    </div>
                                    <div tabindex="0" class="accordions_title<?php echo $pa_count == 1 ? ' active' : ''; ?>">
                                        <p class="title"><?php echo esc_html( get_field('short_title', $pa_object->ID) ); ?></p>
                                        <span></span>
                                    </div>
                                    <div class="accordions_content" <?php echo $pa_count == 1 ? 'style="display: block;"' : ''; ?>>
                                        <p class="excerpt"><?php echo acf_esc_html( get_field('excerpt', $pa_object->ID) ); ?></p>
                                        <a href="<?php echo esc_url( get_the_permalink( $pa_object->ID ) );  ?>">Learn More</a>
                                    </div>
                                </div>        
                            <?php endwhile; ?> 
                        </div>
                    <?php endif;
                    $all_cases_btn = get_field('p3_practice_areas_button'); ?>
                    <a href="<?php echo esc_url( $all_cases_btn['url'] ); ?>" class="btn-fill"><span><?php echo esc_html( $all_cases_btn['title'] ); ?></span></a>
                </div>
                <?php if( have_rows('p3_practice_areas') ): $pa_img_count = 0; ?>
                <div class="column-50 img">
                    <?php while( have_rows('p3_practice_areas') ) : the_row(); $pa_img_count++; ?>
                        <?php $pa_object = get_sub_field('practice_area');
                        $pa_img = get_field('global_image', $pa_object->ID); 
                        $pa_class = 'pa-img pa-img-' . $pa_img_count;
                        if( $pa_img_count == 1) {
                            $pa_class .= ' active';
                        } ?>
                        <div class="<?php echo $pa_class; ?>">
                            <?php if( $pa_img ) { echo wp_get_attachment_image( $pa_img['id'], 'full', "", ["class" => "practice-area-image"]); }?>
                            <div class="pa-toggle" data-accordion="<?php echo $pa_img_count; ?>">
                                <div class="prev toggle-arrow"></div>
                                <p><?php echo esc_html( get_field('short_title', $pa_object->ID) ); ?></p>
                                <div class="next toggle-arrow"></div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section id="panel-4">
    <div class="container">
        <div class="columns">
            <div class="column-75 block center">
                <h2><?php echo esc_html( get_field('p4_section_title') ); ?></h2>
            </div>
        </div>
        <div class="columns">
            <div class="column-50">
                <?php $p4_image = get_field('p4_section_image'); ?>
                <?php 
                if( $p4_image ) {
                    echo wp_get_attachment_image( $p4_image['id'] , 'full', "", ["class" => "img"]); 
                }?>
            </div>
            <div class="column-50">
                <?php echo acf_esc_html( get_field('p4_section_top_copy') ); ?>
                <div class="blue-subtitle"><?php echo acf_esc_html( get_field('p4_section_middle_copy') ); ?></div>
                <?php echo acf_esc_html( get_field('p4_section_bottom_copy') ); ?>
                <div class="cta">
                    <?php $p4_cta = get_field('p4_cta'); ?>
                    <p><?php echo esc_html( $p4_cta['cta_text'] ); ?></p>
                    <a href="tel:<?php echo get_field('phone', 'options'); ?>" class="btn"><?php echo esc_html( get_field('phone', 'options') ); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="panel-5" class="grey-bg">
    <span id="faq"></span>
    <div class="container">
        <div class="columns">
            <div class="column-full block">
                <h2><?php echo esc_html( get_field('p5_section_title') ); ?></h2>
                <p class="blue-subtitle"><?php echo acf_esc_html( get_field('p5_section_sub_title') ); ?></p>
                <?php if( have_rows('p5_faqs') ) : 
                    $count_question = 0;
                    $count_answer = 0;?>
                    <div class="faq-wrapper">
                        <div class="questions-wrapper">
                            <?php while( have_rows('p5_faqs') ) : the_row(); $count_question++; ?>
                                <div tabindex="0" data-answer="answer-<?php echo $count_question; ?>" class="question question-<?php echo $count_question; echo $count_question == 1 ? ' active' : ''; ?>">
                                    <p class="mobile-title blue-subtitle">Question</p>
                                    <h3><?php echo esc_html( get_sub_field('question') ); ?></h3>
                                    <div id="answer-<?php echo $count_question; ?>" class="answer-mobile answer-<?php echo $count_question; echo $count_question == 1 ? ' active' : ''; ?>">
                                         <p class="blue-subtitle">Answer</p>
                                        <?php echo acf_esc_html( get_sub_field('answer') ); ?>
                                        <div class="share-wrapper">
                                            <p><strong>Share this Answer</strong></p>
                                            <?php $domain = parse_url(get_the_permalink(), PHP_URL_HOST); ?>
                                            <div class="inner-wrapper">
                                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $domain; ?>/?question=question-<?php echo $count_question; ?>%23faq" class="social facebook"></a>
                                                <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url($domain); ?>/?question=question-<?php echo $count_question; ?>%23faq&title=<?php echo urlencode( get_sub_field('question')); ?>&source=<?php echo $domain; ?>" class="social linkedin"></a>
                                                <a target="_blank" href="https://<?php echo $domain; ?>/?question=question-<?php echo $count_question; ?>#faq" class="social share-link">
                                                    <div class="text-copied-notif"><p>Copied!</p></div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>

                        <div class="answers-wrapper">
                            <p class="blue-subtitle">Answer</p>
                            <?php while( have_rows('p5_faqs') ) : the_row(); $count_answer++; ?>
                                <div class="answer answer-<?php echo $count_answer; echo $count_answer == 1 ? ' active' : ''; ?>">
                                    <?php echo acf_esc_html( get_sub_field('answer') ); ?>
                                    <div class="share-wrapper">
                                        <p><strong>Share this Answer</strong></p>
                                        <?php $domain = parse_url(get_the_permalink(), PHP_URL_HOST); ?>
                                        <div class="inner-wrapper">
                                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $domain; ?>/?question=question-<?php echo $count_answer; ?>%23faq" class="social facebook"></a>
                                            <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url($domain); ?>/?question=question-<?php echo $count_question; ?>%23faq&title=<?php echo urlencode( get_sub_field('question')); ?>&source=<?php echo $domain; ?>" class="social linkedin"></a>
                                            <a target="_blank" href="https://<?php echo $domain; ?>/?question=question-<?php echo $count_answer; ?>#faq" class="social share-link">
                                                <div class="text-copied-notif"><p>Copied!</p></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section id="panel-6">
    <div class="container">
        <?php get_template_part('block', 'cta', ['prefix' => 'p6_cta_block_' ]); ?>
    </div>
</section>

<section id="panel-7">
    <div class="container">
        <div class="columns">
            <div class="column-full block center">
                <h3><?php echo esc_html( get_field('p7_section_title') ); ?></h3>
                <?php echo do_shortcode( get_field('gravity_form_shortcode') ); ?>
            </div>
        </div>
    </div>
</section>





<?php get_footer();?>