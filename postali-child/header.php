<?php
/**
 * Theme header.
 *
 * @package Postali Child
 * @author Postali LLC
**/
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>

<?php if( is_front_page() ) {
	$banner_img = get_field('banner_image');
	if( $banner_img) {
		?>
		<link rel="preload" as="image" href="<?php echo $banner_img['url'] . '.webp'; ?>">
		<?php
	}
} ?>

	<!-- Add JSON Schema here -->
    <?php 
    // Global Schema
    $global_schema = get_field('global_schema', 'options');
    if ( !empty($global_schema) ) :
        echo '<script type="application/ld+json">' . $global_schema . '</script>';
    endif;

    // Single Page Schema
    $single_schema = get_field('single_schema');
    if ( !empty($single_schema) ) :
        echo '<script type="application/ld+json">' . $single_schema . '</script>';
    endif; ?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KW6JM7R');</script>
<!-- End Google Tag Manager -->
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php wp_head(); ?>

<?php if (has_post_thumbnail()) {
$attachment_image = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
<link rel="preload" as="image" href="<?php echo $attachment_image; ?>">
<link rel="preload" as="image" href="<?php echo $attachment_image; ?>.webp">
<?php } ?>

</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KW6JM7R"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<header>
		<div id="header-top" class="container">
			<div id="header-top_left">
				<?php 
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					$logo_img_id = attachment_url_to_postid( $image[0] );
				?>
				<a class="custom-logo-link" href="<?php echo home_url(); ?>" title="navigate to the home page">
					<?php echo wp_get_attachment_image( $logo_img_id, 'full', "", ["class" => "custom-logo"]) ?>
				</a>
				<a href="tel:<?php echo get_field('phone', 'options'); ?>" class="btn mobile-btn">Call Now</a>
			</div>
			
			<div id="header-top_right">
				<div id="header-top_right_menu">
                    <nav role="navigation">
                    <?php
					$args = array(
						'container' => false,
						'theme_location' => 'header-nav'
					);
					wp_nav_menu( $args );
                    ?>	
                    </nav>
					<div id="header-top_mobile">
						<div id="menu-icon" class="toggle-nav">
							<span class="line line-1"></span>
							<span class="line line-2"></span>
							<span class="line line-3"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header> 
