<?php


/*
|--------------------------------------------------------------------------
| THE DASHBOARD WIDGET
|--------------------------------------------------------------------------
|
|
*/

/**
 * Creates the HTML for the dashboard widget
 */
function dashboard_widget_function() {
	?>
	<img src="<?php echo plugins_url( 'img/widget-logo.png' , __FILE__ ) ?>" alt="">
	<strong class="top_right_text">WORDPRESS VAKTSERVICE</strong>
	<div>
		<p>WP VAKT er en tjeneste som har spesialisert seg på WordPress oppdateringer og sikkerhet. WordPress er verdens mest brukte plattform for publisering av nettsider og er derfor veldig utsatt for hacking og ødeleggende angrep. Hvis nettsiden er viktig for din virksomhet er det naturlig å sikre den godt og å holde den oppdatert med siste versjoner. Vi kan gjøre nettsidene dine bedre rustet mot angrep og hacking, og holde den oppdatert for deg, til enhver tid.</p>
		<br>
		<div class="wpv_status"></div>
		<?php //wpvakt_dashboard_status() ?>
	</div>
	<?php
}

/**
 * Adds teh WP VAKT widget to the dashboard
 */
function add_dashboard_widgets() {
	wp_add_dashboard_widget('wpvakt', 'WP VAKT', 'dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'add_dashboard_widgets' );

/**
 * Adds the javascript snippet that moves the vidget form fnoraml flow to the top of the page
 */
function wpv_move_the_widget() {
	?>
    <script type="text/javascript">
    jQuery(document).ready( function($)
    {
    	var widget = $('#wpvakt');
        $('#dashboard-widgets').prepend(widget);
    });
    </script>
    <?php
}
add_action('admin_head-index.php', 'wpv_move_the_widget');


function wpvakt_dashboard_status() {
    $status = wpv_fetch_data('http://www.wpvakt.no?status&domain='.urlencode(site_url()));
    if($status === NULL) {
        ?>
        <p class="noplan_msg"><img src="<?php echo plugins_url( 'img/sad-face-dashboard.png' , __FILE__ ) ?>" alt="">Sikkerhetsstatus: Ditt nettsted har ingen vaktservice aktivert, og kan være utsatt for angrep. </p>
        <a class="no_plan_btn" href="<?php echo get_option('home') . '/wp-admin/options-general.php?page=wpv_settings' ?>">LA OSS KOMME IGANG!</a>
        <?php
    } else {
        $msg = ($status->plan == 'premium')? 'Du har den beste vaktservice tjenesten aktivert.' : 'Du har vaktservicetjeneste aktivert.';
        ?>
        <p class="activeplan_msg"><img src="<?php echo plugins_url( 'img/happy-face-dashboard.png' , __FILE__ ) ?>" alt=""><?php echo $msg ?></p>
        <a class="active_plan_btn" <?php if($status->plan == 'premium') echo 'style="display:none"' ?> href="<?php echo get_option('home') . '/wp-admin/options-general.php?page=wpv_settings' ?>">Utvid vaktservice tjenesten din!</a>
        <?php
    }
    die();
}
add_action( 'wp_ajax_nopriv_wpvakt_dashboard_status', 'wpvakt_dashboard_status' );
add_action( 'wp_ajax_wpvakt_dashboard_status', 'wpvakt_dashboard_status' );



