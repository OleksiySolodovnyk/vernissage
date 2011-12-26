<?php get_header(); ?>

<div id="divider"></div>
<div id="main">
    <?php while ( have_posts() ) : the_post(); ?>
    <div id="header">
        <h1><?php the_title(); ?></h1>
    </div>
    
    <div id="content">
        <?php the_content(); ?>
        <address><em>Contact information: </em></address>
        <address><em><?php echo get_post_meta($post->ID, 'Career phone', true); ?></em></address>
        <address><em><?php echo get_post_meta($post->ID, 'Career email', true); ?></em></address>
    </div>
    <div id="content-foo">
        <span class="readmore"><a href="javascript:window.history.back();"><img class="left-arrow" src="<?php echo get_template_directory_uri(); ?>/images/arrow-left.png" alt="arrow" />Backward</a></span>
    </div>
    <?php endwhile; ?>
</div>

<div id="social">

</div>

<?php get_footer(); ?>