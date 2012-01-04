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
            <p>
                <?php
                    $lng = qtrans_getLanguage();
                    $key = "address_" .$lng;
                    echo get_post_meta($post->ID, $key, true);
                ?>
            </p>
            <address>
            <em>
                <?php
                    $lng = qtrans_getLanguage();
                    $key = "reservation_" .$lng;
                    echo get_post_meta($post->ID, $key, true);
                ?>
            </em></address>
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
    <div class="button button_vk">
        <div id="vk_like"></div>
        <script type="text/javascript">
         VK.Widgets.Like('vk_like', {type: "mini", pageUrl: "<?php the_permalink(); ?>"});
        </script>
    </div>    
    <div class="button button_gp">
        <g:plusone size="medium" href="<?php the_permalink(); ?>"></g:plusone>
        <script type="text/javascript">
            (function() {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                po.src = 'https://apis.google.com/js/plusone.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
            })();
        </script>
    </div>
    <div class="button button_twi">
        <a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-count="horizontal" data-via="TwiName-CHANGE">Твитнуть</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    </div>
    <div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
</div>

<?php get_footer(); ?>