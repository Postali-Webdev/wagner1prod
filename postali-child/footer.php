<?php
/**
 * Theme footer
 *
 * @package Postali Child
 * @author Postali LLC
**/
?>
<footer>
    <section>
        <div class="container">
            <div class="columns block">
                <div class="column-50 block">
                    <?php if( get_field('footer_logo', 'options') ) : $footer_logo = get_field('footer_logo', 'options'); ?>
                        <?php echo wp_get_attachment_image( $footer_logo['id'], 'full', "", ["class" => "custom-logo"]); ?>
                    <?php else : ?>
                        <?php 
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        $logo_img_id = attachment_url_to_postid( $image[0] );
                        ?>
                        <a class="custom-logo-link" href="<?php echo home_url(); ?>" title="navigate to the home page">
                            <?php echo wp_get_attachment_image( $logo_img_id, 'full', "", ["class" => "custom-logo"]) ?>
                        </a>
                    <?php endif; ?>
                    <p class="footer-copy"><?php echo get_field('footer_copy', 'options'); ?></p>
                    <div class="spacer-60"></div>
                    <div class="columns">
                        <div class="column-33 block">
                            <p class="yellow-title">About</p>
                            <?php echo get_field('footer_about_menu', 'options'); ?>
                        </div>
                        <div class="column-33 block">
                            <p class="yellow-title">Practice Areas</p>
                            <?php echo get_field('footer_practice_areas_menu', 'options'); ?>
                        </div>
                        <div class="column-33 block">
                            <?php echo get_field('footer_others_menu', 'options'); ?>
                        </div>
                    </div>
                </div>
                <div class="column-50 block">
                    <div class="block-wrapper">
                        <div class="contact-block-wrapper">
                            <p class="yellow-title">Contact Us</p>
                            <a href="tel:<?php echo get_field('phone', 'options'); ?>"><?php echo get_field('phone', 'options'); ?></a>
                            <a href="mailto:<?php echo get_field('email', 'options'); ?>"><?php echo get_field('email', 'options'); ?></a>
                            <div class="spacer-15"></div>
                            <p class="yellow-title">Toll Free Number</p>
                            <a href="tel:<?php echo get_field('toll_free_phone', 'options'); ?>"><?php echo get_field('toll_free_phone', 'options'); ?></a>
                            <div class="spacer-15"></div>
                            <p class="yellow-title">Address</p>
                            <?php $address = get_field('address', 'options'); ?>
                            <p><?php echo $address['street'] . '<br>' . $address['city'] . ',' . $address['state'] . ' ' . $address['zip']; ?></p>
                            <?php $directions_link = get_field('direction_link', 'options'); ?>
                            <a target="blank" class="directions-link" href="<?php echo $directions_link; ?>" target="_blank">DIRECTIONS</a>
                            <iframe title="google map of Wagner, McLaughlin & Whittemore office" src="<?php echo get_field('map_embed_url', 'options'); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <div class="footer-social">
                                <?php if(get_field('facebook','options')) { ?>
                                    <a class="social facebook" href="<?php the_field('facebook','options'); ?>" title="Facebook" target="blank"><span class="icon-social-facebook"></span></a>
                                <?php } ?>
                                <?php if(get_field('instagram','options')) { ?>
                                    <a class="social instagram" href="<?php the_field('instagram','options'); ?>" title="Instagram" target="blank"><span class="icon-social-instagram"></span></a>
                                <?php } ?>
                                <?php if(get_field('linkedin','options')) { ?>
                                    <a class="social linkedin" href="<?php the_field('linkedin','options'); ?>" title="LinkedIn" target="blank"><span class="icon-social-linkedin"></span></a>
                                <?php } ?>
                                <?php if(get_field('twitter_x','options')) { ?>
                                    <a class="social twitter" href="<?php the_field('twitter_x','options'); ?>" title="Twitter" target="blank"><span class="icon-social-twitter"></span></a>
                                <?php } ?>
                                <?php if(get_field('youtube','options')) { ?>
                                    <a class="social youtube" href="<?php the_field('youtube','options'); ?>" title="YouTube" target="blank"><span class="icon-social-youtube"></span></a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="spacer-15"></div>
                        <p class="footer-disclaimer"><?php echo get_field('footer_disclaimer', 'options'); ?></p>
                        <div class="links-wrapper" style="flex-wrap:wrap;">
                            <?php $disclaimer_links = get_field('footer_disclaimer_links', 'options'); ?>
                            <a href="<?php echo $disclaimer_links['privacy_policy']; ?>">Privacy Policy</a> | <a href="<?php echo $disclaimer_links['sitemap']; ?>">Sitemap</a>
                            <?php if(is_page_template('front-page.php')) { ?>
                            <div class="spacer-break"></div>
                            <a href="https://www.postali.com" title="Site design and development by Postali" target="blank"><img src="https://www.postali.com/wp-content/themes/postali-site/img/postali-tag-reversed.png" alt="Postali | Results Driven Marketing" style="display:block; max-width:250px; margin:0 0 0 auto;"></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>

<script type="text/javascript" src="//cdn.callrail.com/companies/372659082/906c28c9b473491aad6f/12/swap.js"></script>

    <!-- Apex Script -->
    <script src="//www.apex.live/scripts/invitation.ashx?company=wagnerlaw"></script>

<?php wp_footer(); ?>
</body>
</html>


