<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
            <div class="news">
                <?php echo the_post_thumbnail(); ?>
                <h3><?php the_title(); ?></h3>

                <div class="entry-content">
                    <?php the_excerpt(); ?>
                    <?php //the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?>  
                </div>

                <div class="entry-meta">
                    <span class="readmore"><a href="<?php the_permalink(); ?>">Узнать Детали <img src="<?php echo get_template_directory_uri(); ?>/images/arrow.png" alt="arrow" /></a></span>
                    <span class="date"><?php twentyeleven_posted_on(); ?></span>
                </div>
            </div>