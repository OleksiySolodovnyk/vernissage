<?php
get_header(); ?> 

<div id="divider"></div>
        <div id="main">
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="restaurant">
                <div class="res-column first">
                    <h1><?php the_title(); ?></h1>
                    <div id="small-desc"><h3><?php the_excerpt(); ?></h3></div>
                    <div class="careerdivider"></div>
                    <?php the_content(); ?>
                </div>
                <div class="res-column">
                    <h3>CONTACT</h3>
                    <div class="google-map">
                        <?php

                        if(function_exists('pronamic_google_maps')) {
                            pronamic_google_maps(array(
                                'width' => 200,
                                'height' => 200,
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
                    
                    <div id="hours">
                        <h3>OPENING HOURS</h3>
                        <p><?php echo get_post_meta($post->ID, 'openingHours', true); ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile; // end of the loop. ?>
                              
        </div>
        
        <div id="social">
            <div id="vk_like"></div>
            <script type="text/javascript">
            VK.Widgets.Like("vk_like", {type: "mini"});
            </script>
        </div>
<?php get_footer(); ?>