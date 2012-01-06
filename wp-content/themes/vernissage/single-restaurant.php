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
                    <h3>
                        <?php 
                        $lng = qtrans_getLanguage();
                        if ($lng == "ru")
                        {
                            echo "КОНТАКТЫ";
                        }
                        else if ($lng == "en")
                        {
                            echo "CONTACT";
                        }
                        else if ($lng == "fr")
                        {
                            echo "CONTACT";
                        }
                        ?>
                    </h3>
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
                    
                    <span class="readmore">
                        <a href="http://maps.google.com/maps?q=<?=substr(get_post_meta($post->ID, Pronamic_Google_Maps_Post::META_KEY_LATITUDE, true),0,7);?>+<?=substr(get_post_meta($post->ID, Pronamic_Google_Maps_Post::META_KEY_LONGITUDE, true),0,7);?>&hl=ru&t=m">
                            <?php
                            if ($lng == "ru") {
                                echo "Показать на Google Maps";
                            } else if ($lng == "en") {
                                echo "View on Google Maps";
                            } else if ($lng == "fr") {
                                echo "Afficher dans Google Maps";
                            }
                            ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/arrow.png" alt="arrow" />
                        </a>
                    </span><br/>
                    
                    <p>
                        <?php 
                        
                        $lng = qtrans_getLanguage();
                        $key = "reservation_" .$lng;
                        echo get_post_meta($post->ID, $key, true); 
                        
                        ?>
                    </p>
                    <p>
                        <?php
                        $key = "address_" .$lng;
                        echo get_post_meta($post->ID, $key, true); 
                        ?>
                    </p>
                    <img src="<?php bloginfo('template_directory'); ?>/images/wifi.png" alt="wifi" />
                    <img src="<?php bloginfo('template_directory'); ?>/images/visa.png" alt="visa" />
                    <img src="<?php bloginfo('template_directory'); ?>/images/master.png" alt="master" />
                    
                    <div id="hours">
                        <h3>
                            <?php 
                            $lng = qtrans_getLanguage();
                            if ($lng == "ru")
                            {
                                echo "ВРЕМЯ РАБОТЫ";
                            }
                            else if ($lng == "en")
                            {
                                echo "OPENING HOURS";
                            }
                            else if ($lng == "fr")
                            {
                                echo "HEURES D'OUVERTURE";
                            }
                            ?>
                            
                        </h3>
                        <p>
                            <?php 
                            $key = "openingHours_" .$lng;
                            echo get_post_meta($post->ID, $key, true);
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endwhile; // end of the loop. ?>
                              
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