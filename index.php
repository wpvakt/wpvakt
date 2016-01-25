<?php
/*
Plugin Name: WP VAKT
Plugin URI: http://www.wpvakt.no/
Description: WP VAKT er en tjeneste som har spesialisert seg på WordPress oppdateringer og sikkerhet. WordPress er verdens mest brukte plattform for publisering av nettsider og er derfor veldig utsatt for hacking og ødeleggende angrep. Hvis nettsiden er viktig for din virksomhet er det naturlig å sikre den godt og å holde den oppdatert med siste versjoner. Vi kan gjøre nettsidene dine bedre rustet mot angrep og hacking, og holde den oppdatert for deg, til enhver tid.
Version: 1.5.1
Author:  Biter AS
Author URI: http://wpvakt.no
License:
*/




//Plugin auto update
//http://w-shadow.com/blog/2010/09/02/automatic-updates-for-any-plugin/
if(!class_exists( "PluginUpdateChecker_1_6" )) {
    require('plugin-updates/plugin-update-checker.php');
}
$wpvakt_update = new PluginUpdateChecker_1_6(
    'http://wpvakt.no/wp-vakt-plugin-updates/info.json',
    __FILE__,
    'wp-vakt' //plugin slug
);







/*
|--------------------------------------------------------------------------
| LOADING PLUGIN COMPONENTS
|--------------------------------------------------------------------------
|
|
*/

include 'helpers.php';
include 'dashboard.php';
include 'wpv_settings.php';
include 'email_template.php';

function wpv_backend_scripts_and_styles($hook) {
    //if($hook != 'settings_page_wv_settings') return;

    wp_register_style( 'wpv.backend.css', plugins_url('css/wpv.backend.css', __FILE__));
    wp_enqueue_style( 'wpv.backend.css' );

    wp_enqueue_script( 'wpv.backend.js', plugins_url('js/wpv.backend.js', __FILE__ ), array( 'jquery' ), false, true);
    wp_localize_script( 'wpv.backend.js', 'scriptsajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'admin_enqueue_scripts', 'wpv_backend_scripts_and_styles' );





/*
|--------------------------------------------------------------------------
| ACTIVATION / DEACTIVATION EMAIL
|--------------------------------------------------------------------------
|
|
*/
function wpv_activate() {
    if(!get_option('wpvakt_installed')) {
        $url = 'http://www.wpvakt.no?activation&domain='.urlencode(site_url()).'&email='.urlencode(get_option('admin_email'));
        add_option('wpvakt_installed', 1);
        wpv_fetch_data($url);
    }
}
register_activation_hook( __FILE__, 'wpv_activate' );

function wpv_deactivate() {
    $url = 'http://www.wpvakt.no?deactivation&domain='.urlencode(site_url()).'&email='.urlencode(get_option('admin_email'));
    delete_option('wpvakt_installed');
    wpv_fetch_data($url);
}
register_deactivation_hook( __FILE__, 'wpv_deactivate' );
/**
 * When plugin is installed trough 1 click installation the "activation_hook" is not triggered!
 * To register the instalation we'll check if the "wpvakt_installed" option is available - if not - we'll add it and send the notification "manually"
 * The "wpvakt_installed" option is added on plugin activation & removed on plugin deactivation
 */
if(!get_option('wpvakt_installed')) {
    wpv_activate();
}






/*
|--------------------------------------------------------------------------
| FETCH JSON DATA FROM wpvakt.no
|--------------------------------------------------------------------------
| returns encoded json OR null on error
|
*/
function wpv_fetch_data($url) {
    $data = NULL;
    // trying CURL
    if(function_exists('curl_init')){
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
        $data = json_decode(curl_exec($ch));
        curl_close($ch);
    } else {
        // trying file_get_contents
        $json = @file_get_contents($url);
        $data = json_decode($json);
    }
    return $data;
}






/*
|--------------------------------------------------------------------------
| SCHEDULING THE REMINDER EMAIL
|--------------------------------------------------------------------------
|
|
*/

/**
 * Add the weekly schedule
 */
add_filter( 'cron_schedules', 'wpv_add_weekly_schedule' );
function wpv_add_weekly_schedule( $schedules ) {
    $schedules['weekly'] = array(
        'interval' => 7 * 24 * 60 * 60, //7 days * 24 hours * 60 minutes * 60 seconds
        'display' => 'Weekly'
    );
    return $schedules;
}

/**
 * Remove the crone task on plugin deactivation
 */
register_deactivation_hook( __FILE__, 'wi_remove_daily_backup_schedule' );
function wi_remove_daily_backup_schedule(){
  wp_clear_scheduled_hook( 'wpv_weekly_updates_status' );
}

//wpv_weekly_update_reminder_schedule(); //for manually activaring the cron task

/**
 * Add the cron task on plugin activation
 */
register_activation_hook( __FILE__, 'wpv_weekly_update_reminder_schedule' );
function wpv_weekly_update_reminder_schedule(){
  //Use wp_next_scheduled to check if the event is already scheduled
  $timestamp = wp_next_scheduled( 'wpv_weekly_updates_status' );
  //If $timestamp == false schedule the task since it hasn't been done previously
  if( $timestamp == false ){
    //Schedule the event for right now, then to repeat weekly using the hook 'wpv_weekly_updates_status'
    wp_schedule_event( time(), 'weekly', 'wpv_weekly_updates_status' );
  }
}

/**
 * Hook the email function into the action wpv_weekly_updates_status
 */
add_action( 'wpv_weekly_updates_status', 'wpv_send_status_email' );
function wpv_send_status_email($test=false) {
    $status = wpv_fetch_data('http://www.wpvakt.no?status&domain='.urlencode(site_url()));
    if($status === NULL) { //send only to inactive clients
        $domain = str_replace('http://', '', home_url());
        $domain = str_replace('https://', '', $domain);

        add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));
        $subject = 'Oppdateringsstatus på '.$domain;
        $headers[] = 'From: '.get_option('blogname').' <'.get_option('admin_email').'>';

        $data = array(
            'logo_image' => mail_logo(),
            'header_image_url' => get_home_url( null, '', null ).'/wp-content/plugins/wp-vakt/img/wpvakt-email-logo.png',
            'header_image_width' => '293',
            'title' => '<span style="display:block; margin-bottom:20px; font-size:16px; line-height:20px; font-weight:normal">Du har vår WP VAKT utvidelse installert i din WordPress installasjon, og vi har derfor sjekket siden din for oppdateringer.</span>Oppdateringsstatus på <span style="color:#63B89A">'.$domain.'</span>',
            'content' => wpv_core_updates().wpv_plugin_updates().wpv_theme_updates(),
            'footer_note' => 'Les mer om vår sikkerhets- og oppdateringstjeneste på <a href="http://www.wpvakt.no/tjenesten/">wpvakt.no</a>'
            );
        $message = wpv_email_template_min($data);

        if($test) return $message;

        wp_mail(get_option('admin_email'), $subject, $message, $headers);
    }
}
























