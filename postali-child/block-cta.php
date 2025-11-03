<?php /* CTA Block */ 
$block_prefix = $args['prefix'];
$title = get_field( $block_prefix . 'title' );
$image = get_field( $block_prefix . 'image' );
$copy = get_field( $block_prefix . 'copy' );
$cta = get_field( $block_prefix . 'cta' );
?>


<div class="cta-block">
    <div class="columns">
        <div class="column-75 block center">
            <h2><?php echo esc_html( $title ); ?></h2>
        </div>
    </div>
    <div class="columns">
        <div class="column-50">
            <?php if( $image ) {
                echo wp_get_attachment_image( $image['id'] , 'full', "", ["class" => "img"]);
            } else {
                echo wp_get_attachment_image( '476' , 'full', "", ["class" => "img"]);
            } ?>
        </div>
        <div class="column-50 block">
            <?php if( $copy ) : ?>
                <?php echo $copy; ?>
            <?php endif; ?>
            <div class="cta">
                <?php if( $cta['copy'] ) : ?>
                    <p><?php echo $cta['copy']; ?></p>
                <?php endif; ?>
                <div class="btn-wrap">
                    <?php if( $cta['button'] ) : ?>
                        <a href="<?php echo $cta['button']['url']; ?>" class="btn"><?php echo $cta['button']['title']; ?></a>
                    <?php endif; ?>
                    <?php if( $cta['bonus_link_optional'] ) : ?>
                        <a href="<?php echo $cta['bonus_link_optional']['url']; ?>"><?php echo $cta['bonus_link_optional']['title']; ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>