<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>


<div id="divider"></div>
<div id="main">
    <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'content', 'single' ); ?>

    <?php endwhile; // end of the loop. ?>
</div>
<div id="social">

</div>

<?php get_footer(); ?>