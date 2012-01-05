<?php get_header(); ?>


<div id="divider"></div>
<div id="main">
    <?php while ( have_posts() ) : the_post(); ?>

            <div id="header">
                <h1><?php the_title(); ?></h1>
                <span><?php vernissage_posted_on(); ?></span>
            </div>

            <div class="desc-column first">
                <?php the_post_thumbnail('medium-feature'); ?>
                <div class="photo-desc">
                    <p><?php echo get_post_field('post_excerpt', get_post_thumbnail_id($post_ID)); ?></p>
                    <p><?php echo get_post_field('post_content', get_post_thumbnail_id($post_ID)); ?></p>
                </div>
            </div>

            <div class="desc-column">
                <?php the_content(); ?>
                <span class="readmore">
                    <a href="javascript:window.history.back();"><img class="left-arrow" src="<?php echo get_template_directory_uri(); ?>/images/arrow-left.png" alt="arrow" />
                        <?php 
                        $lng = qtrans_getLanguage();
                        if ($lng == "ru")
                        {
                            echo "Назад";
                        }
                        else if ($lng == "en")
                        {
                            echo "Backward";
                        }
                        else if ($lng == "fr")
                        {
                            echo "En arrière:";
                        }
                        ?>
                    </a>
                </span>
            </div>

    <?php endwhile; ?>
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