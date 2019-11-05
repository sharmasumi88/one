<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage one
 * @since one 1.1
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
<div id="page">

        <header id="site-header" role="header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <button class="menu-toggle mobile-only" aria-controls="sticky_menu" aria-expanded="false">Menu</button>
                        <div class="site-logo">
                            <h1 class="site-title">
                                <a href="<?php echo site_url(); ?>" rel="home">
                                    <?php echo get_bloginfo('name'); ?>  
                                </a>
                            </h1>
                        </div>
                        <!-- END logo container -->
                    </div>
                    <div class="col-md-8 desktop-only">
                        <!-- START nav container -->
                        <?php
                        $defaults = array(
                            'menu'            => 'top',
                            'container'       => 'nav',
                            'container_class' => 'nav primary-nav',
                            'container_id'    => 'primary-nav',
                            'menu_class'      => 'menu',
                            'menu_id'         => '',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'item_spacing'    => 'preserve',
                            'depth'           => 0,
                            'walker'          => '',
                            'theme_location'  => '',
                        );

                        wp_nav_menu($defaults); ?>

                    </div>
                </div>
            </div>
        </header>

    <div id="content" class="site-content">