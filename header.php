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
                                <a href="index.html" rel="home">
                                    COACH                                    </a>
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
                        <!--nav class="nav primary-nav" id="primary-nav" role="navigation">
                            <ul id="menu-primary-coach" class="menu"><li id="menu-item-54" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-29 current_page_item menu-item-54"><a href="index.html">Home</a></li>
                                <li id="menu-item-32" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-32"><a href="lessons/index.html">Services</a>
                                    <ul class="sub-menu">
                                        <li id="menu-item-55" class="menu-item menu-item-type-post_type menu-item-object-lesson menu-item-55"><a href="lesson/the-coach-studio/index.html">Personal Mentorship</a></li>
                                        <li id="menu-item-57" class="menu-item menu-item-type-post_type menu-item-object-lesson menu-item-57"><a href="lesson/clay-lessons/index.html">Business Planning</a></li>
                                        <li id="menu-item-56" class="menu-item menu-item-type-post_type menu-item-object-lesson menu-item-56"><a href="lesson/handcrafted-art/index.html">Central Investments</a></li>
                                    </ul>
                                </li>
                                <li id="menu-item-44" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-44"><a href="our-story/index.html">About Me</a></li>
                                <li id="menu-item-60" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-60"><a href="catalog/index.html">Case Studies</a></li>
                                <li id="menu-item-119" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-119"><a href="blog/index.html">Blog</a></li>
                                <li id="menu-item-63" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-63"><a href="contact/index.html">Contact</a></li>
                            </ul>                        </nav-->
                        <!-- END nav container -->
                    </div>
                </div>
            </div>
        </header>

    <div id="content" class="site-content">