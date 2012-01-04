<!DOCTYPE html>
<html>
<head>
    <title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
        
    <script type="text/javascript" src="http://userapi.com/js/api/openapi.js?45"></script>
    <script type="text/javascript">
      VK.init({apiId: 2735430, onlyWidgets: true});
    </script>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/imgslider.js"></script>
    <?php wp_head(); ?> 
</head>
<body>
    <div id="wrapper">

       
        <div id="navigation">
            <div id="logo">
                <a href="/"><img src="<?=get_template_directory_uri()?>/images/logo.jpg" alt="logo" /></a>
            </div>
            <?php wp_nav_menu( array( 'menu' => 'main', 'container_class' => 'menu') ); ?>
            
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            
            
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            
            
            <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
            
                <h1>SIDEBAR-1</h1>

            <?php endif; // end sidebar widget area ?>
            
            
        </div>