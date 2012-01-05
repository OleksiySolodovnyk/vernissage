<?php get_header(); ?>

<div id="divider"></div>
<div id="main">
    <div id="header">
        <h1>
            <?php 
            $lng = qtrans_getLanguage();
            $get_details = "";
            if ($lng == "ru")
            {
                echo "НОВОСТИ";
                $get_details = "Узнать Детали";
            }
            else if ($lng == "en")
            {
                echo "NEWS";
                $get_details = "Get Details";
            }
            else if ($lng == "fr")
            {
                echo "NOUVELLES";
                $get_details = "Оbtenir des détails";
            }
            
            
            
            ?>
        </h1>
    </div>
    <?php if ( have_posts() ) : ?>
    
        <?php
        
        $args = array(
            'orderby'   => 'post_date',
            'order'     => 'DESC',
            'post_type' => 'news'
        );
        
        $post_array = get_posts($args);        
        $num_posts = count($post_array);
              
        for ($i = 0; $i < count($post_array); $i+=3)
        {
            $post_array_1[] = $post_array[$i]->ID;
        }
        if ($num_posts > 1) {
            for ($i = 1; $i < count($post_array); $i+=3)
            {
                $post_array_2[] = $post_array[$i]->ID;
            }
        }
        if ($num_posts > 2) {
            for ($i = 2; $i < count($post_array); $i+=3)
            {
                $post_array_3[] = $post_array[$i]->ID;
            }
        }
        
        ?>
    
        <div class="column first">
        <?php query_posts(array('post_type' => 'news', 'post__in' => $post_array_1)); while (have_posts()) { the_post(); ?>
            <div class="news">
                <?php echo the_post_thumbnail(); ?>
                <h3><?php the_title(); ?></h3>

                <div class="entry-content">
                    <?php the_excerpt(); ?>
                </div>

                <div class="entry-meta">
                    <span class="readmore"><a href="<?php the_permalink(); ?>"><?=$get_details?> <img src="<?php echo get_template_directory_uri(); ?>/images/arrow.png" alt="arrow" /></a></span>
                    <span class="date"><?php vernissage_posted_on(); ?></span>
                </div>
            </div>    
        <?php } wp_reset_query(); ?>
        </div>
    
        <div class="column">
        <?php if (!empty($post_array_2)) { ?>
        <?php query_posts(array('post_type' => 'news', 'post__in' => $post_array_2)); while (have_posts()) { the_post(); ?>
            <div class="news">
                <?php echo the_post_thumbnail(); ?>
                <h3><?php the_title(); ?></h3>

                <div class="entry-content">
                    <?php the_excerpt(); ?>
                </div>

                <div class="entry-meta">
                    <span class="readmore"><a href="<?php the_permalink(); ?>"><?=$get_details?> <img src="<?php echo get_template_directory_uri(); ?>/images/arrow.png" alt="arrow" /></a></span>
                    <span class="date"><?php vernissage_posted_on(); ?></span>
                </div>
            </div>    
        <?php } wp_reset_query(); ?>
        <?php } ?>
        </div>
    
        <div class="column">
        <?php if (!empty($post_array_3)) { ?>
        <?php query_posts(array('post_type' => 'news', 'post__in' => $post_array_3)); while (have_posts()) { the_post(); ?>
            <div class="news">
                <?php echo the_post_thumbnail(); ?>
                <h3><?php the_title(); ?></h3>

                <div class="entry-content">
                    <?php the_excerpt(); ?>
                </div>

                <div class="entry-meta">
                    <span class="readmore"><a href="<?php the_permalink(); ?>"><?=$get_details?> <img src="<?php echo get_template_directory_uri(); ?>/images/arrow.png" alt="arrow" /></a></span>
                    <span class="date"><?php vernissage_posted_on(); ?></span>
                </div>
            </div>    
        <?php } wp_reset_query(); ?>
        <?php } ?>
        </div>
    
    <?php else : ?>
            <h3>Nothing Found</h3>
    <?php endif; ?>
</div>
<div id="social">
    <div class="button button_vk">
        <div id="vk_like"></div>
        <script type="text/javascript">
         VK.Widgets.Like('vk_like', {type: "mini", pageUrl: "<?php echo get_post_type_archive_link('news') ?>"});
        </script>
    </div>    
    <div class="button button_gp">
        <g:plusone size="medium" href="<?php echo get_post_type_archive_link('news') ?>"></g:plusone>
        <script type="text/javascript">
            (function() {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                po.src = 'https://apis.google.com/js/plusone.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
            })();
        </script>
    </div>
    <div class="button button_twi">
        <a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_post_type_archive_link('news') ?>" data-text="<?php the_title(); ?>" data-count="horizontal" data-via="TwiName-CHANGE">Твитнуть</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    </div>
    <div class="fb-like" data-href="<?php echo get_post_type_archive_link('news') ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
</div>
<?php get_footer(); ?>