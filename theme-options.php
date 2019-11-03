<?php
/**
 * Created by PhpStorm.
 * User: sumitsharma
 * Date: 2019-11-03
 * Time: 08:37
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Start Class
if ( ! class_exists( 'ONE_Theme_Options' ) ) {

    class ONE_Theme_Options {

        /**
         * Start things up
         *
         * @since 1.0.0
         */
        public function __construct() {

            // We only need to register the admin panel on the back-end
            if ( is_admin() ) {
                add_action( 'admin_menu', array( 'ONE_Theme_Options', 'add_admin_menu' ) );
                add_action( 'admin_init', array( 'ONE_Theme_Options', 'register_settings' ) );
            }

        }

        /**
         * Returns all theme options
         *
         * @since 1.0.0
         */
        public static function get_theme_options() {
            return get_option( 'theme_options' );
        }

        /**
         * Returns single theme option
         *
         * @since 1.0.0
         */
        public static function get_theme_option( $id ) {
            $options = self::get_theme_options();
            if ( isset( $options[$id] ) ) {
                return $options[$id];
            }
        }

        /**
         * Add sub menu page
         *
         * @since 1.0.0
         */
        public static function add_admin_menu() {
            add_menu_page(
                esc_html__( 'Theme Settings', 'one' ),
                esc_html__( 'Theme Settings', 'one' ),
                'manage_options',
                'theme-settings',
                array( 'ONE_Theme_Options', 'create_admin_page' )
            );
        }

        /**
         * Register a setting and its sanitization callback.
         *
         * We are only registering 1 setting so we can store all options in a single option as
         * an array. You could, however, register a new setting for each option
         *
         * @since 1.0.0
         */
        public static function register_settings() {
            register_setting( 'theme_options', 'theme_options', array( 'ONE_Theme_Options', 'sanitize' ) );
        }

        /**
         * Sanitization callback
         *
         * @since 1.0.0
         */
        public static function sanitize( $options ) {

            // If we have options lets sanitize them
            if ( $options ) {

                // Checkbox
                if ( ! empty( $options['checkbox_example'] ) ) {
                    $options['checkbox_example'] = 'on';
                } else {
                    unset( $options['checkbox_example'] ); // Remove from options if not checked
                }

                // Input
                if ( ! empty( $options['input_example'] ) ) {
                    $options['input_example'] = sanitize_text_field( $options['input_example'] );
                } else {
                    unset( $options['input_example'] ); // Remove from options if empty
                }

                // Select
                if ( ! empty( $options['select_example'] ) ) {
                    $options['select_example'] = sanitize_text_field( $options['select_example'] );
                }

            }

            // Return sanitized options
            return $options;

        }


    public static function get_fonts() {
            $fonts = array(
                'open-sans' => array(
                    'name' => 'Open Sans',
                    'import' => '@import url(https://fonts.googleapis.com/css?family=Open+Sans);',
                    'css' => "font-family: 'Open Sans', sans-serif;"
                ),
                'lato' => array(
                    'name' => 'Lato',
                    'import' => '@import url(https://fonts.googleapis.com/css?family=Lato);',
                    'css' => "font-family: 'Lato', sans-serif;"
                ),
                'arial' => array(
                    'name' => 'Arial',
                    'import' => '',
                    'css' => "font-family: Arial, sans-serif;"
                ),
                'quicksand' => array(
                    'name' => 'Quicksand',
                    'import' => '@import url(https://fonts.googleapis.com/css?family=Quicksand);',
                    'css' => "font-family: Quicksand;"
                )
            );

            return $fonts;
        }

        public static function create_admin_page() {
            wp_enqueue_script('jquery');
        // This will enqueue the Media Uploader script
            wp_enqueue_media(); ?>

            <div class="wrap">

                <h1><?php esc_html_e( 'Theme Options', 'one' ); ?></h1>

                <form method="post" action="options.php">

                    <?php settings_fields( 'theme_options' ); ?>

                    <table class="form-table ONE-custom-admin-login-table">


                        <tr><th><h3>Typography</h3></th></tr>
                        <?php $fonts = self::get_fonts(); ?>
                        <tr valign="top" class="ONE-custom-admin-screen-background-section">
                            <th scope="row"><?php esc_html_e( 'Select font', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 'font' ); ?>

                                <select name="theme_options[font]">
                                    <?php foreach( $fonts as $font_key => $font ): ?>
                                        <option <?php selected( $value, $font_key, true ); ?> value="<?php echo $font_key; ?>"><?php echo $font['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </td>
                        </tr>

                        <tr><th><h4>Home Page Section one</h4></th></tr>

                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 1 title', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_title_1' ); ?>
                                <input type="text" name="theme_options[s_title_1]" value="<?php echo esc_attr( $value ); ?>">
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 1 Button Label', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_button_label_1' ); ?>
                                <input type="text" name="theme_options[s_button_label_1]" value="<?php echo esc_attr( $value ); ?>">
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 1 Button Link', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_button_link_1' ); ?>
                                <input type="text" name="theme_options[s_button_link_1]" value="<?php echo esc_attr( $value ); ?>">
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 1 Content', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_content_1' ); ?>
                               <?php $args = array (
                                'tinymce' => false,
                                'quicktags' => true,
                                );
                                wp_editor( $value, 'theme_options[s_content_1]', $args ); ?>

                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 1 Background image', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_background_1' ); ?>
                                <input type="text" value="<?php echo esc_attr( $value ); ?>" name="theme_options[s_background_1]" id="image_url" class="regular-text">
                                <!--input type="file" name="theme_options[s_background_1]" value="<?php //echo esc_attr( $value ); ?>" -->
                                <button type="button" class="upload-btn">Upload</button>
                            </td>
                        </tr>

                        <tr><th><h4>Home Page Section two</h4></th></tr>

                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 2 title', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_title_2' ); ?>
                                <input type="text" name="theme_options[s_title_2]" value="<?php echo esc_attr( $value ); ?>">
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 2 Button Label', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_button_label_2' ); ?>
                                <input type="text" name="theme_options[s_button_label_2]" value="<?php echo esc_attr( $value ); ?>">
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 2 Button Link', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_button_link_2' ); ?>
                                <input type="text" name="theme_options[s_button_link_2]" value="<?php echo esc_attr( $value ); ?>">
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 2 Content', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_content_2' ); ?>
                                <?php $args = array (
                                    'tinymce' => false,
                                    'quicktags' => true,
                                );
                                wp_editor( $value, 'theme_options[s_content_2]', $args ); ?>

                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 2 Background image', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_background_2' ); ?>
                                <input type="text" value="<?php echo esc_attr( $value ); ?>" name="theme_options[s_background_2]" id="image_url" class="regular-text">
                                <!--input type="file" name="theme_options[s_background_1]" value="<?php //echo esc_attr( $value ); ?>" -->
                                <button type="button" class="upload-btn">Upload</button>
                            </td>
                        </tr>

                        <tr><th><h4>Home Page Section three</h4></th></tr>

                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 3 title', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_title_3' ); ?>
                                <input type="text" name="theme_options[s_title_3]" value="<?php echo esc_attr( $value ); ?>">
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 3 Button Label', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_button_label_3' ); ?>
                                <input type="text" name="theme_options[s_button_label_3]" value="<?php echo esc_attr( $value ); ?>">
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 3 Button Link', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_button_link_3' ); ?>
                                <input type="text" name="theme_options[s_button_link_3]" value="<?php echo esc_attr( $value ); ?>">
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 3 Content', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_content_3' ); ?>
                                <?php
                                wp_editor( htmlspecialchars_decode($value), 'theme_options[s_content_3]' ); ?>

                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 3 Background image', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_background_3' ); ?>
                                <input type="text" value="<?php echo esc_attr( $value ); ?>" name="theme_options[s_background_3]" id="image_url" class="regular-text">
                                <!--input type="file" name="theme_options[s_background_1]" value="<?php //echo esc_attr( $value ); ?>" -->
                                <button type="button" class="upload-btn">Upload</button>
                            </td>
                        </tr>

                        <tr><th><h4>Home Page Section four</h4></th></tr>

                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 4 title', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_title_4' ); ?>
                                <input type="text" name="theme_options[s_title_4]" value="<?php echo esc_attr( $value ); ?>">
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 4 Button Label', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_button_label_4' ); ?>
                                <input type="text" name="theme_options[s_button_label_4]" value="<?php echo esc_attr( $value ); ?>">
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 4 Button Link', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_button_link_4' ); ?>
                                <input type="text" name="theme_options[s_button_link_4]" value="<?php echo esc_attr( $value ); ?>">
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 4 Content', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_content_4' ); ?>
                                <?php $args = array (
                                    'tinymce' => false,
                                    'quicktags' => true,
                                );
                                wp_editor( $value, 'theme_options[s_content_4]', $args ); ?>

                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 4 Background image', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_background_4' ); ?>
                                <input type="text" value="<?php echo esc_attr( $value ); ?>" name="theme_options[s_background_4]" id="image_url" class="regular-text">
                                <!--input type="file" name="theme_options[s_background_1]" value="<?php //echo esc_attr( $value ); ?>" -->
                                <button type="button" class="upload-btn">Upload</button>
                            </td>
                        </tr>

                        <tr valign="top"><th><h4>Home Page Section five</h4></th></tr>

                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 5 title', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_title_5' ); ?>
                                <input type="text" name="theme_options[s_title_5]" value="<?php echo esc_attr( $value ); ?>">
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 5 Button Label', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_button_label_5' ); ?>
                                <input type="text" name="theme_options[s_button_label_5]" value="<?php echo esc_attr( $value ); ?>">
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 5 Button Link', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_button_link_5' ); ?>
                                <input type="text" name="theme_options[s_button_link_5]" value="<?php echo esc_attr( $value ); ?>">
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 5 Content', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_content_5' ); ?>
                                <?php $args = array (
                                    'tinymce' => false,
                                    'quicktags' => true,
                                );
                                wp_editor( $value, 'theme_options[s_content_5]', $args ); ?>

                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 5 Background image', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_background_5' ); ?>
                                <input type="text" value="<?php echo esc_attr( $value ); ?>" name="theme_options[s_background_5]" id="image_url" class="regular-text">
                                <!--input type="file" name="theme_options[s_background_1]" value="<?php //echo esc_attr( $value ); ?>" -->
                                <button type="button" class="upload-btn">Upload</button>
                            </td>
                        </tr>

                        <tr><th><h4>Home Page Section six</h4></th></tr>


                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 6 title', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_title_6' ); ?>
                                <input type="text" name="theme_options[s_title_6]" value="<?php echo esc_attr( $value ); ?>">
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 6 Button Label', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_button_label_6' ); ?>
                                <input type="text" name="theme_options[s_button_label_6]" value="<?php echo esc_attr( $value ); ?>">
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 6 Button Link', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_button_link_6' ); ?>
                                <input type="text" name="theme_options[s_button_link_6]" value="<?php echo esc_attr( $value ); ?>">
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 6 Content', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_content_6' ); ?>
                                <?php $args = array (
                                    'tinymce' => false,
                                    'quicktags' => true,
                                );
                                wp_editor( $value, 'theme_options[s_content_6]', $args ); ?>

                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Section 6 Background image', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_background_6' ); ?>
                                <input type="text" value="<?php echo esc_attr( $value ); ?>" name="theme_options[s_background_6]" id="image_url" class="regular-text">
                                <!--input type="file" name="theme_options[s_background_1]" value="<?php //echo esc_attr( $value ); ?>" -->
                                <button type="button" class="upload-btn">Upload</button>
                            </td>
                        </tr>

                    <tr><th><h4>Footer Sections</h4></th></tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Footer Section 1 title', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_footer_title_1' ); ?>
                                <input type="text" name="theme_options[s_footer_title_1]" value="<?php echo esc_attr( $value ); ?>">
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Footer Section 1 Content', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_footer_1' ); ?>
                                <?php $args = array (
                                    'tinymce' => false,
                                    'quicktags' => true,
                                );
                                wp_editor( $value, 'theme_options[s_footer_1]', $args ); ?>

                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Footer Section 2 title', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_footer_title_2' ); ?>
                                <input type="text" name="theme_options[s_footer_title_2]" value="<?php echo esc_attr( $value ); ?>">
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Footer Section 2 Content', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_footer_2' ); ?>
                                <?php $args = array (
                                    'tinymce' => false,
                                    'quicktags' => true,
                                );
                                wp_editor( $value, 'theme_options[s_footer_2]', $args ); ?>

                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Footer Section 3 title', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_footer_title_3' ); ?>
                                <input type="text" name="theme_options[s_footer_title_3]" value="<?php echo esc_attr( $value ); ?>">
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Footer Section 3 Content', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_footer_3' ); ?>
                                <?php $args = array (
                                    'tinymce' => false,
                                    'quicktags' => true,
                                );
                                wp_editor( $value, 'theme_options[s_footer_3]', $args ); ?>

                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Footer Section 4 title', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_footer_title_4' ); ?>
                                <input type="text" name="theme_options[s_footer_title_4]" value="<?php echo esc_attr( $value ); ?>">
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><?php esc_html_e( 'Footer Copywriter Content', 'one' ); ?></th>
                            <td>
                                <?php $value = self::get_theme_option( 's_footer_4' ); ?>
                                <?php $args = array (
                                    'tinymce' => false,
                                    'quicktags' => true,
                                );
                                wp_editor( $value, 'theme_options[s_footer_4]', $args ); ?>

                            </td>
                        </tr>

                    </table>

                    <?php submit_button(); ?>

                </form>

            </div><!-- .wrap -->
            <script type="text/javascript">
                jQuery(document).ready(function($){
                    $('.upload-btn').click(function(e) {
                        e.preventDefault();
                       var elem = $(this).prev();
                        var image = wp.media({
                            title: 'Upload Image',
                            // mutiple: true if you want to upload multiple files at once
                            multiple: false
                        }).open()
                            .on('select', function(e){
                                // This will return the selected image from the Media Uploader, the result is an object
                                var uploaded_image = image.state().get('selection').first();
                                // We convert uploaded_image to a JSON object to make accessing it easier
                                // Output to the console uploaded_image
                                console.log(uploaded_image);
                                var image_url = uploaded_image.toJSON().url;
                                // Let's assign the url value to the input field
                                console.log(elem);
                                $(elem).val(image_url);
                            });
                    });
                });
            </script>
        <?php }

    }
}
new ONE_Theme_Options();

// Helper function to use in your theme to return a theme option value
    function one_get_theme_option( $id = '' ) {
    return ONE_Theme_Options::get_theme_option( $id );
}

add_action( 'wp_head', 'my_wp_head' );
function my_wp_head() {
    $options = (array) one_get_theme_option('font');
    $fonts = ONE_Theme_Options::get_fonts();
    $current_font_key = 'arial';

    if ( isset( $options[0] ) )
        $current_font_key = $options[0];

    if ( isset( $fonts[ $current_font_key ] ) ) {
        $current_font = $fonts[ $current_font_key ];

        echo '<style>';
        echo $current_font['import'];
        echo 'body * { ' . $current_font['css'] . ' } ';
        echo '</style>';
    }
}
