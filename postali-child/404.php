<?php 

/**
 * 404
 * @package Postali Parent
 * @author Postali LLC
 */

get_header(); ?>

<section id="banner" class="navy-bg">
    <div class="container">
        <div class="columns">
            <div class="left-col">
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                <p class="yellow-subtitle">OOPS!</p>
                <h1>WE CAN’T SEEM TO FIND THE PAGE YOU'RE LOOKING FOR.</h1>
                <div class="cta">                    
                    <a href="/" class="btn-fill"><span>Back To Homepage</span></a>
                </div>
            </div>`
            <div class="right-col">
                <div class="yellow-border">
                    <p>404</p>
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>