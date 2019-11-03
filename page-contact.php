<?php
/**
 * The template for displaying contact page
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
    <section class="section background text-center" id="form_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Request a consultation</h2>
                    </div>


                    <div class="form-container contact-form">
                        <form id="booking_form" class="form text-left" role="form" method="post" action="<?php echo admin_url('admin-ajax.php'); ?>" >
                            <fieldset>
                                <label>Name *</label>
                                <input type="text" name="name" class="input booking_name" maxlength="120" required="">
                            </fieldset>
                            <fieldset>
                                <label>Email *</label>
                                <input type="email" name="email" class="input booking_email" maxlength="120" required="">
                            </fieldset>

                            <fieldset>
                                <label>Message *</label>
                                <textarea rows="10" cols="50" class="input booking_msg" name="message" required=""></textarea>
                            </fieldset>

                            <input type="hidden" name="contact_subject" id="contact_subject" value="Contact query from website Coach">
                            <input type="hidden" name="contact_recipient" id="contact_recipient" value="sharmasumi1988@gmail.com">
                            <!--input type="hidden" name="contact_recipient" id="contact_recipient" value="robinc@one.com"-->

                            <fieldset>
                                <input type="hidden" name="action" value="contact_action">
                                <?php wp_nonce_field(); ?>
                                <?php wp_referer_field(); ?>
                                <input type="submit" class="submit button small pull-right" value="SEND MESSAGE" name="booking-submit">
                            </fieldset>
                            <fieldset>
                                <div class="form_message"></div>
                            </fieldset>
                        </form>
                    </div>


                </div>
            </div>
        </div>
        <style>
            #form_section{background-color:#d9d3c7;background-repeat:no-repeat;background-position:right center;background-size:100% auto;background-image:url(../wp-content/uploads/sites/17/2017/05/coach-leave-a-message.png);}            </style>
    </section>

    <section class="section solid white text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Location</h2>
                    </div>

                    <div class="section-content">
                        <p>Amet rhoncus ante consequat aenean integer eget dolor praesent, accumsan enim ornare sit sapien, bibendum at <br>massa montes vulputate sed neque in suspendisse nibh.</p>
                        <div class="map"><p><iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d71661.1494044012!2d-4.302161566081442!3d55.855536666418!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x488815562056ceeb%3A0x71e683b805ef511e!2sGlasgow%2C+UK!5e0!3m2!1sen!2sin!4v1495099571940" width="1180" height="480" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p></div>
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
<script>
    jQuery(document).ready(function($) {

        $('#booking_form').on('submit', function(e) {
            e.preventDefault();

            var $form = $(this);

            $.post($form.attr('action'), $form.serialize(), function(data) {
               $('.form_message').html(data.error_message).focus();
            }, 'json');
        });

    });
</script>
