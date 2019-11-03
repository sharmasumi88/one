<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage one
 * @since one 1.1
 */

get_header(); ?>
<?php while ( have_posts() ) :
			the_post(); ?>
    <div class="banner internal-banner custom_height " role="banner" style="background-image:url(/wp-content/themes/one/images/coach-hero-image-services.jpg);">
        <div class="container banner-content align-left">
            <div class="banner-caption text-left">

                <h2><?php the_title(); ?></h2>
            </div>
        </div>
    </div>
    <section class="page-content" role="main">

    <!-- START Single CPT -->
        <article id="page-<?php echo get_the_ID(); ?>" class="post-<?php echo get_the_ID(); ?> page type-page status-publish has-post-thumbnail hentry" role="article">
            <div class="container">
                 <div class="row">
                        <?php the_content(); ?>
                 </div>
            </div>
        </article>
<?php 	endwhile; ?>
    </section>

<?php get_footer(); ?>