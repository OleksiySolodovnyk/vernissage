<?php
/*
    Template Name: Contacts template
*/
?>
<?php get_header(); ?>
<div id="divider"></div>
<div id="main">
    <div id="header">
        <h1><?php the_title(); ?></h1>
    </div>
    <div id="content">
        <?php query_posts(array('post_type' => 'restaurant', 'post__in' => $post_array_1)); while (have_posts()) { the_post(); ?>
        <div class="contacts">
            <a class="title" href="javascript:MoveToGoogleMarker(<?=substr(get_post_meta($post->ID, Pronamic_Google_Maps_Post::META_KEY_LATITUDE, true),0,7);?>, <?=substr(get_post_meta($post->ID, Pronamic_Google_Maps_Post::META_KEY_LONGITUDE, true),0,7);?>);"><?php the_title(); ?></a>
            <p><?php echo get_post_meta($post->ID, 'address', true); ?></p>
            <address><em><?php echo get_post_meta($post->ID, 'reservation', true); ?></em></address>
            <!--<address><em>+380 44 230 94 36</em></address>-->
            <div class="icons">
                <img src="<?php echo get_template_directory_uri(); ?>/images/wifi.jpg" alt="WiFi"/>
                <img src="<?php echo get_template_directory_uri(); ?>/images/visa.jpg" alt="Visa">
                <img src="<?php echo get_template_directory_uri(); ?>/images/mastercard.jpg" alt="MasterCard">
            </div>
        </div>
        <?php } wp_reset_query(); ?>
    </div>
    <div id="map">
        <?php

        if(function_exists('pronamic_google_maps_mashup')) {
            pronamic_google_maps_mashup(
                array(
                    'post_type' => 'restaurant'
                ) , 
                array(
                    'width' => 930 ,
                    'height' => 400 , 
                    'marker_options' => array(
                        'icon' => 'http://maisonchambaudie.com.ua/wp-content/themes/vernissage/images/pointer.png'
                    )
                )
            );
        }
        ?>
    </div>
</div>
<div id="social">
</div>

<?php get_footer(); ?>