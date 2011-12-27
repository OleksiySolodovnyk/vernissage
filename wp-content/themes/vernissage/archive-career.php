<?php get_header(); ?>

<div id="divider"></div>
<div id="main">
    <div id="header">
        <h1>CAREER OPPORTUNITIES</h1>
    </div>
    
    <div id="content">
        <?php $count=0; ?>
        
        <?php while ( have_posts() ) : the_post(); ?>
        <div class="briefcareer">
            <a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <?php the_excerpt(); ?>
             <span class="readmore"><a href="<?php the_permalink(); ?>">Get Details<img src="<?php echo get_template_directory_uri(); ?>/images/arrow.png" alt="arrow" /></a></span>
        </div>
        <?php
            $count++;
            if($count == 4) {
                $count = 0;
        ?>    
            <div class="careerdivider"></div>
        <?php } ?>
        <?php endwhile; ?>
              
    </div>
</div>
<div id="social">
    <div class="button button_vk">
        <div id="vk_like"></div>
        <script type="text/javascript">
         VK.Widgets.Like('vk_like', {type: "mini", pageUrl: "<?php echo get_post_type_archive_link('career') ?>"});
        </script>
    </div>    
    <div class="button button_gp">
        <g:plusone size="medium" href="<?php echo get_post_type_archive_link('career') ?>"></g:plusone>
        <script type="text/javascript">
            (function() {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                po.src = 'https://apis.google.com/js/plusone.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
            })();
        </script>
    </div>
    <div class="button button_twi">
        <a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_post_type_archive_link('career') ?>" data-text="<?php the_title(); ?>" data-count="horizontal" data-via="TwiName-CHANGE">Твитнуть</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    </div>
    <div class="fb-like" data-href="<?php echo get_post_type_archive_link('career') ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
</div>

<?php get_footer(); ?>
