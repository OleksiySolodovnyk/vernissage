<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<div id="header">
    <h1><?php echo strip_tags(get_the_title()); ?></h1>
</div>
<div id="content">
    <?php the_content(); ?>
</div>
