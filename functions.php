<?php
/**
 * Created by PhpStorm.
 * User: sumitsharma
 * Date: 2019-11-02
 * Time: 12:29
 */

require_once 'theme-options.php';

function add_stylesheet_to_head() {
    echo "<link href='".get_stylesheet_uri()."' rel='stylesheet' type='text/css'>";
}

add_action( 'wp_head', 'add_stylesheet_to_head' );

function scripts($hook) {

    // create my own version codes

    //
    wp_enqueue_script( 'js', get_template_directory_uri( 'js/script.js', __FILE__ ), array());

}
add_action('wp_enqueue_scripts', 'scripts');


add_theme_support( 'title-tag' );

register_nav_menus(
    array(
        'primary' => __( 'Primary Menu', 'twentyfifteen' ),
        'social'  => __( 'Social Links Menu', 'twentyfifteen' ),
    )
);

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 825, 510, true );

function create_services_posttype() {

    register_post_type( 'services',
        array(
            'labels' => array(
                'name' => __( 'Services' ),
                'singular_name' => __( 'Service' )
            ),
            'public' => true,
            'capability_type'     => 'post',
            'supports'            => array( 'title', 'editor','excerpt','author', 'thumbnail','revisions','custom-fields' ),
            'has_archive' => true,
            'rewrite' => array('slug' => 'services'),
        )
    );
}

add_action( 'init', 'create_services_posttype' );


add_action( 'wp_ajax_contact_action', 'contact_action' );
add_action( 'wp_ajax_nopriv_contact_action', 'contact_action' );
function contact_action() {
    $response = array(
        'error' => false,
    );

    if (trim($_POST['email']) == '' || trim($_POST['message']) == '' || trim($_POST['name']) == '') {
        $response['error'] = true;
        $response['error_message'] = 'Please fill required fields.';

        exit(json_encode($response));
    }
    $contact_recipient = $_POST['contact_recipient'];
    $contact_subject = $_POST['contact_subject'];
    if(wp_mail($contact_recipient, $contact_subject, $_POST['message'])){
        $response['error'] = false;
        $response['error_message'] = 'Mail successfully sent.';
    }
    exit(json_encode($response));
}

add_action('after_setup_theme', 'one_theme_setup');
function one_theme_setup(){
    if(get_option('theme_options')=='0'){
    $theme_options = file_get_contents(get_template_directory().'/default.txt');
    global $wpdb;
    $fixed_data = preg_replace_callback ( '!s:(\d+):"(.*?)";!s', function($match) {
        return ($match[1] == strlen($match[2])) ? $match[0] : 's:' . strlen($match[2]) . ':"' . $match[2] . '";';
    },$theme_options );
     $data = unserialize($fixed_data);

    update_option('theme_options',$data);
     }

}
