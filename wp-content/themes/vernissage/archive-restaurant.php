<?php

get_header(); ?>

<div id="divider"></div>
<div id="main">
   
    <?php if ( have_posts() ) : ?>
    
    <div class="restaurant">
        <div class="res-column first">
            <h3><? the_title(); ?></h3>
            <div class="careerdivider"></div>
            <p><? the_excerpt(); ?></p>
            <?php the_post_thumbnail('restaurant'); ?>
            <div id="social">
                <div id="vk_like"></div>
                <script type="text/javascript">
                VK.Widgets.Like("vk_like", {type: "mini"});
                </script>
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
    
    <?php endif; ?>
    
</div>
<div id="social">
</div>
<?php get_footer(); ?>