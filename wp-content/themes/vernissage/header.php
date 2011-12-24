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
      VK.init({apiId: 2718494, onlyWidgets: true});
    </script>
</head>
<body>
    <div id="wrapper">

       
        <div id="navigation">
            <div id="logo">
                <a href="/"><img src="<?=get_template_directory_uri()?>/images/logo.jpg" alt="logo" /></a>
            </div>
            <?php wp_nav_menu( array( 'menu' => 'main', 'menu_class' => 'menu' ) ); ?>
        </div>