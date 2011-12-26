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
    
</div>

<?php get_footer(); ?>
