<?php

get_header(); ?>

<div id="divider"></div>
<div id="main">
   
     <?php while ( have_posts() ) : the_post(); ?>
    
    <div class="restaurant">
        <div class="res-column first">
            <h3><? the_title(); ?></h3>
            <div class="careerdivider"></div>
            <p><? the_excerpt(); ?></p>
            <?php the_post_thumbnail('restaurant'); ?>
            <div id="social">
                <div class="button button_vk">
                    <div id="vk_like_<?php the_ID(); ?>"></div>
                    <script type="text/javascript">
                        VK.Widgets.Like("vk_like_<?php the_ID(); ?>", {type: "mini", pageUrl: "<?php the_permalink(); ?>"});
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
        </div>
        <div class="res-column">
            <h3>CONTACT</h3>
            <div class="google-map">
                <?php
                    if(function_exists('pronamic_google_maps')) {
                        pronamic_google_maps(array(
                            'width' => 220,
                            'height' => 180,
                            'static' => true
                        ));
                    }
                ?>
            </div>
            <p><?php echo get_post_meta($post->ID, 'reservation', true); ?></p>
            <p><?php echo get_post_meta($post->ID, 'address', true); ?></p>
           <img src="<?php bloginfo('template_directory'); ?>/images/wifi.png" alt="wifi" />
                    <img src="<?php bloginfo('template_directory'); ?>/images/visa.png" alt="visa" />
                    <img src="<?php bloginfo('template_directory'); ?>/images/master.png" alt="master" />
        </div>
    </div>
    
    <?php endwhile; ?>
    
</div>

<?php get_footer(); ?>