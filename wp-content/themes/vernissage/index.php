<?php
get_header(); ?>

        <?php s3slider_show(); ?>
        <div id="main">
            <?php if ( have_posts() ) : ?>
    
        <?php
        
        $args = array(
            'orderby'   => 'post_date',
            'order'     => 'DESC'
        );
        
        $post_array = get_posts($args);
        
        for ($i = 0; $i < count($post_array); $i+=3)
        {
            $post_array_1[] = $post_array[$i]->ID;
        }
        for ($i = 1; $i < count($post_array); $i+=3)
        {
            $post_array_2[] = $post_array[$i]->ID;
        }
        for ($i = 2; $i < count($post_array); $i+=3)
        {
            $post_array_3[] = $post_array[$i]->ID;
        }
        ?>
    
        <div class="column first">
        <?php query_posts(array('post__in' => $post_array_1)); while (have_posts()) { the_post(); ?>
            <?php                
                get_template_part( 'content', get_post_format() );
            ?>    
        <?php } wp_reset_query(); ?>
        </div>
        <div class="column">
        <?php query_posts(array('post__in' => $post_array_2)); while (have_posts()) { the_post(); ?>
            <?php                
                get_template_part( 'content', get_post_format() );
            ?>    
        <?php } wp_reset_query(); ?>
        </div>
        <div class="column">
        <?php query_posts(array('post__in' => $post_array_3)); while (have_posts()) { the_post(); ?>
            <?php                
                get_template_part( 'content', get_post_format() );
            ?>    
        <?php } wp_reset_query(); ?>
        </div>
    
    <?php else : ?>
        <article id="post-0" class="post no-results not-found">
                <header class="entry-header">
                        <h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
                </header><!-- .entry-header -->

                <div class="entry-content">
                        <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
                        <?php get_search_form(); ?>
                </div>
        </article>
    <?php endif; ?>           
        </div>
        
        <div id="social">
            
        </div>


<?php get_footer(); ?>