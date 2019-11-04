<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://developer.wordpress.org/themes/basics/template-hierarchy/}
 *
 * @package WordPress
 * @subpackage one
 * @since one 1.1
 */
?>
<?php if (!defined('ABSPATH')) exit; ?>
<?php get_header(); ?>

    <div class="banner internal-banner custom_height " role="banner" style="background-image:url(/wp-content/themes/one/images/coach-hero-image-services.jpg);">
        <div class="container banner-content align-left">
            <div class="banner-caption text-left">

                <h2>SERVICES<br>
                    OFFERED</h2>
            </div>
        </div>
    </div>
    <section class="page-content" role="main">
    <div class="container">
    <div class="row">
        <!-- Page content -->
        <div class="col-md-12">
        </div>
    </div>
<div class="cpt-listing">
  <?php
    if(have_posts()) : while(have_posts()) : the_post(); ?>
        <article id="lesson-16" class="cpt-single-item post-16 lesson type-lesson status-publish has-post-thumbnail hentry">

            <div class="row">
                <!-- CPT Featured Image -->
                <div class="cpt-thumb col-md-5">
                    <a href="<?php echo get_the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                        <!--img width="480" height="500" src="../wp-content/uploads/sites/17/2017/05/coach-personal-mentorship-home-480x500.jpg" class="featured-image wp-post-image" alt="" -->                                            </a>
                </div>

                <!-- CPT Content -->
                <div class="cpt-content col-md-7">
                    <header class="cpt-title">
                        <h2><a href="<?php echo get_the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h2>
                        <h6><?php the_content(); ?></h6>
                    </header>

                    <div class="cpt-excerpt">
                        <?php the_excerpt(); ?>
                    </div>

                    <!-- CPT Custom Fields -->
                    <div class="row cpt-custom-fields">
                        <div class="field-block col-md-6 col-sm-6">
                            <h5 class="cursive-font">Process</h5>
                        <?php echo get_post_meta(get_the_ID(),'process',true); ?>
                        </div>

                        <div class="field-block col-md-6 col-sm-6">
                            <h5 class="cursive-font">Let us help you</h5>
                            <?php echo get_post_meta(get_the_ID(),'let_us_help_you',true); ?>
                        </div>
                    </div>

                    <br class="clear">

                    <div class="row cpt-buttons">
                        <div class="col-md-6 col-sm-6 cpt-button">
                            <a href="<?php echo get_the_permalink(); ?>" class="button border">Read More</a>
                        </div>
                        <div class="col-md-6 col-sm-6 cpt-button">
                            <a href="../contact/index.html" class="button border">REQUEST A CONSULTATION</a>
                        </div>
                    </div>

                </div>
            </div>
        </article>
    <?php
    endwhile;
        the_posts_pagination(
            array(
                'prev_text'          => __( 'Previous page', 'one' ),
                'next_text'          => __( 'Next page', 'one' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'one' ) . ' </span>',
            )
        );
    endif;

?>
</div>
</div>
</section>
<?php get_footer(); ?>
