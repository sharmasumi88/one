<?php
/**
 * The home page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage one
 * @since one 1.1
 */
get_header(); ?>

<?php
$bannerTitle1 = one_get_theme_option('s_title_1') ? one_get_theme_option('s_title_1') : "No Title";
$bannerBackground1 = one_get_theme_option('s_background_1') ? one_get_theme_option('s_background_1') : esc_url( get_template_directory_uri() )."/coach-hero-image-home.jpg";
$bannerContent1 = one_get_theme_option('s_content_1') ? one_get_theme_option('s_content_1') : "No Content";
$bannerButtonLink1 = one_get_theme_option('s_button_link_1') ? one_get_theme_option('s_button_link_1') : site_url();
$bannerButtonLabel1 = one_get_theme_option('s_button_label_1') ? one_get_theme_option('s_button_label_1') : "No Label";

$bannerTitle2 = one_get_theme_option('s_title_2') ? one_get_theme_option('s_title_2') : "No Title";
$bannerBackground2 = one_get_theme_option('s_background_2') ? one_get_theme_option('s_background_2') : "";
$bannerContent2 = one_get_theme_option('s_content_2') ? one_get_theme_option('s_content_2') : "No Content";
$bannerButtonLink2 = one_get_theme_option('s_button_link_2') ? one_get_theme_option('s_button_link_2') : site_url();
$bannerButtonLabel2 = one_get_theme_option('s_button_label_2') ? one_get_theme_option('s_button_label_2') : "No Label";

$bannerTitle3 = one_get_theme_option('s_title_3') ? one_get_theme_option('s_title_3') : "No Title";
$bannerBackground3 = one_get_theme_option('s_background_3') ? one_get_theme_option('s_background_3') : esc_url( get_template_directory_uri() )."/coach-my-work-process-home.jpg";
$bannerContent3 = one_get_theme_option('s_content_3') ? one_get_theme_option('s_content_3') : "No Content";
$bannerButtonLink3 = one_get_theme_option('s_button_link_3') ? one_get_theme_option('s_button_link_3') : site_url();
$bannerButtonLabel3 = one_get_theme_option('s_button_label_3') ? one_get_theme_option('s_button_label_3') : "No Label";

$bannerTitle4 = one_get_theme_option('s_title_4') ? one_get_theme_option('s_title_4') : "No Title";
$bannerBackground4 = one_get_theme_option('s_background_4') ? one_get_theme_option('s_background_4') : esc_url( get_template_directory_uri() )."/images/coach-arrow-graphs-home.png";
$bannerContent4 = one_get_theme_option('s_content_4') ? one_get_theme_option('s_content_4') : "No Content";
$bannerButtonLink4 = one_get_theme_option('s_button_link_4') ? one_get_theme_option('s_button_link_4') : site_url();
$bannerButtonLabel4 = one_get_theme_option('s_button_label_4') ? one_get_theme_option('s_button_label_4') : "No Label";

$bannerTitle5 = one_get_theme_option('s_title_5') ? one_get_theme_option('s_title_5') : "No Title";
$bannerBackground5 = one_get_theme_option('s_background_5') ? one_get_theme_option('s_background_5') : esc_url( get_template_directory_uri() )."/coach-what-clients-say-home.jpg";
$bannerContent5 = one_get_theme_option('s_content_5') ? one_get_theme_option('s_content_5') : "No Content";
$bannerButtonLink5 = one_get_theme_option('s_button_link_5') ? one_get_theme_option('s_button_link_5') : site_url();
$bannerButtonLabel5 = one_get_theme_option('s_button_label_5') ? one_get_theme_option('s_button_label_5') : "No Label";


$bannerTitle6 = one_get_theme_option('s_title_6') ? one_get_theme_option('s_title_6') : "No Title";
$bannerBackground6 = one_get_theme_option('s_background_6') ? one_get_theme_option('s_background_6') : "";
$bannerContent6 = one_get_theme_option('s_content_6') ? one_get_theme_option('s_content_6') : "No Content";
$bannerButtonLink6 = one_get_theme_option('s_button_link_6') ? one_get_theme_option('s_button_link_6') : site_url();
$bannerButtonLabel6 = one_get_theme_option('s_button_label_6') ? one_get_theme_option('s_button_label_6') : "No Label";

?>
    <section class="banner home-banner custom_height " role="banner" style="background-image:url(<?php echo $bannerBackground1; ?>);">
        <div class="container banner-content  align-center">
            <div class="banner-caption text-center">
                <h2><?php echo $bannerTitle1; ?></h2>
                <div class="sub-title cursive-font">
                    <p><?php echo $bannerContent1; ?></p>
                </div>
                <div class="banner-button">
                    <a href="<?php echo $bannerButtonLink1; ?>" class="button"><?php echo $bannerButtonLabel1; ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="section solid white-bg text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>
                            <?php echo $bannerTitle2; ?>
                        </h2>
                    </div>
                    <div class="section-content">
                        <p><?php echo $bannerContent2; ?></p>
                    </div>


                    <div class="section-columns">
                        <div class="row">

                            <?php
                            $args = array( 'post_type' => 'services', 'posts_per_page' => 3 );
                            $the_query = new WP_Query( $args );
                            ?>
                            <?php if ( $the_query->have_posts() ) { ?>
                                <?php while ( $the_query->have_posts() ) {
                                    $the_query->the_post(); ?>

                                    <div class="col-md-4 cpt-col">
                                        <div class="cta-block">
                                            <div class="cta-banner">
                                                <img width="370" height="250" src="<?php echo  get_the_post_thumbnail_url(); ?>" class="attachment-lesson_thumb size-lesson_thumb wp-post-image" alt="" >
                                            </div>
                                            <div class="cta-content">
                                                <h3 class="cursive-font"><?php the_title(); ?></h3>
                                                <p><?php the_content(); ?></p>
                                                <a target="_blank" href="<?php echo get_the_permalink(); ?>" class="button inline border"><?php echo $bannerButtonLabel2; ?></a>
                                            </div>
                                        </div>
                                    </div>

                                <?php }
                                wp_reset_postdata(); ?>
                            <?php }else{  ?>
                                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                            <?php } ?>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>


    <section class="section background text-white text-center" style="background-image: url(<?php echo $bannerBackground3; ?>);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2><?php echo $bannerTitle3; ?></h2>
                    </div>
                    <?php echo $bannerContent3; ?>

                    <div class="section-button">
                        <a href="<?php echo $bannerButtonLink3; ?>" class="button"><?php echo $bannerButtonLabel3; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section background text-center text-dark" id="app_section" style="background-image: url(<?php echo $bannerBackground4; ?>)" >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2><?php echo $bannerTitle4; ?></h2>
                    </div>
                    <div class="section-content">
                        <?php echo $bannerContent4; ?>
                    </div>

                    <div class="section-button">
                        <a href="<?php echo $bannerButtonLink4; ?>" class="button transparent border"><?php echo $bannerButtonLabel4; ?></a>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <section class="section background text-white text-center" style="background-image: url(<?php echo $bannerBackground5; ?>)">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonials">
                        <span class="icon"></span>
                        <div class="section-title">
                            <h2><?php echo $bannerTitle5; ?></h2>
                        </div>

                        <div class="testimonials-row">
                            <?php echo $bannerContent5; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section solid white text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2><?php echo $bannerTitle6; ?></h2>
                    </div>
                    <div class="section-content">
                        <?php echo $bannerContent6; ?>
                    </div>

                    <div class="form-container newsletter-form">
                        <form id="subscribe_form" class="form text-center">
                            <fieldset>
                                <input type="email" name="email" class="input sub_email" placeholder="Please enter your email." required="">
                            </fieldset>
                            <fieldset>
                                <input type="hidden" id="validate_nonce" name="validate_nonce" value="51d24822fc"><input type="hidden" name="_wp_http_referer" value="/themes/coach/">                                            <input type="submit" class="submit button small dark pull-right" value="Subscribe" name="newsletter-submit">
                            </fieldset>
                            <div class="form_message"></div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>