<?php
/**
 * The default template for displaying content
 */
?>
<div id="header">
    <h1><?php the_title(); ?></h1>
</div>
<div id="content">
    <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?>
</div>
