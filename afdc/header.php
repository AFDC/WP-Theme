<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package AFDC
 * @subpackage WP-Theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
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
                echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

            ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
    <?php
        /* We add some JavaScript to pages with the comment form
         * to support sites with threaded comments (when in use).
         */
        if ( is_singular() && get_option( 'thread_comments' ) )
            wp_enqueue_script( 'comment-reply' );

        /* Always have wp_head() just before the closing </head>
         * tag of your theme, or you will break many plugins, which
         * generally use this hook to add elements to <head> such
         * as styles, scripts, and meta tags.
         */
        wp_head();
    ?>
	<script type="text/javascript">
		$(function() {
			$('#loginForm').load('/login.php');
		});
	</script>
    </head>
    <body <?php body_class(); ?>>
        <div id="wrapper" class="hfeed">
            <div id="header">
                <div id="masthead">
                    <div class="mastBg">
                        <div class="mastBanner mastBanner0<?php echo rand(1, 4); ?>">
                            <div class="mastLogo">
                                <a href="/"><img src="http://www.afdc.com/images/afdc_logo.png" style="border: none;" /></a>
                            </div>
                            <div class="loginField loginArea">
                                <div id="loginForm">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navArea">
                        <div id="access" role="navigation" class="navButtons">
                            <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
                            <div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a></div>
                            <?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
                            <?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
                        </div><!-- #access -->
                    </div>
                </div><!-- #masthead -->
            </div><!-- #header -->
            <div id="main">
