<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<div id="main">
<div id="header">
    <h1>NEWS</h1>
</div>
    <?php if ( have_posts() ) : ?>
        
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="column first">
                <?php get_template_part( 'content', get_post_format() ); ?>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <article id="post-0" class="post no-results not-found">
                <header class="entry-header">
                        <h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
                </header><!-- .entry-header -->

                <div class="entry-content">
                        <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
                        <?php get_search_form(); ?>
                </div><!-- .entry-content -->
        </article><!-- #post-0 -->
    <?php endif; ?>
    <div id="social">
    </div>
</div>
<?php get_footer(); ?>