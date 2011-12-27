<?php get_header(); ?>


<div id="divider"></div>
<div id="main">
    <?php while ( have_posts() ) : the_post(); ?>

            <div id="header">
                <h1><?php the_title(); ?></h1>
                <span><?php twentyeleven_posted_on(); ?></span>
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
                <span class="readmore"><a href="javascript:window.history.back();"><img class="left-arrow" src="<?php echo get_template_directory_uri(); ?>/images/arrow-left.png" alt="arrow" />Back</a></span>
            </div>

    <?php endwhile; ?>
</div>
<div id="social">

</div>

<?php get_footer(); ?>