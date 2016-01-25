<?php

/*
|--------------------------------------------------------------------------
| SET OF FUNCTIONS THAT GATHER INFORMATION ON UPDATE STATUS FOR CORE, PLUGINS AND THEMES
|--------------------------------------------------------------------------
| 
| 
*/

/**
 * Gather informsation about the WP core updates
 */
function wpv_helpers_get_core_updates( $options = array() ) {
	$options = array_merge( array( 'available' => true, 'dismissed' => false ), $options );
	$dismissed = get_site_option( 'dismissed_update_core' );

	if ( ! is_array( $dismissed ) )
		$dismissed = array();

	$from_api = get_site_transient( 'update_core' );

	if ( ! isset( $from_api->updates ) || ! is_array( $from_api->updates ) )
		return false;

	$updates = $from_api->updates;
	$result = array();
	foreach ( $updates as $update ) {
		if ( $update->response == 'autoupdate' )
			continue;

		if ( array_key_exists( $update->current . '|' . $update->locale, $dismissed ) ) {
			if ( $options['dismissed'] ) {
				$update->dismissed = true;
				$result[] = $update;
			}
		} else {
			if ( $options['available'] ) {
				$update->dismissed = false;
				$result[] = $update;
			}
		}
	}
	return $result;
}

/**
 * Gather informsation about the plugin updates
 */
function wpv_helpers_get_plugin_updates() {
	$home = dirname(dirname(dirname(dirname(__FILE__))));
	if(!function_exists('get_plugins')) include $home.'/wp-admin/includes/plugin.php';
	$all_plugins = get_plugins();
	$upgrade_plugins = array();
	$current = get_site_transient( 'update_plugins' );
	foreach ( (array)$all_plugins as $plugin_file => $plugin_data) {
		if ( isset( $current->response[ $plugin_file ] ) ) {
			$upgrade_plugins[ $plugin_file ] = (object) $plugin_data;
			$upgrade_plugins[ $plugin_file ]->update = $current->response[ $plugin_file ];
		}
	}

	return $upgrade_plugins;
}

/**
 * Gather informsation about the theme updates
 */
function wpv_helpers_get_theme_updates() {
	$themes = wp_get_themes();
	$current = get_site_transient('update_themes');

	if ( ! isset( $current->response ) )
		return array();

	$update_themes = array();
	foreach ( $current->response as $stylesheet => $data ) {
		$update_themes[ $stylesheet ] = wp_get_theme( $stylesheet );
		$update_themes[ $stylesheet ]->update = $data;
	}

	return $update_themes;
}









/*
|--------------------------------------------------------------------------
| CREATES THE HTML CONTENT FOR EMAIL TEMPLATE
|--------------------------------------------------------------------------
| 
| 
*/

function wpv_core_updates() {
	$output = '<h3 style="margin-bottom:25px;">WordPress versjon og kildefiler status:</h3>';
    if(function_exists('wpv_helpers_get_core_updates')) {
        $core_updates = wpv_helpers_get_core_updates();
        $status = $core_updates[0];
        //var_dump($status);
        if($status->response === 'latest') {
            $output .= '<p class="list_item_happy">'.happy_face().' WordPress er oppdatert.</p>';
        } else {
            $output .= '<p class="list_item_sad">'.sad_face().'WordPress krever oppdatering!</p>';
        }
    } else {
        $output .= '<p class="list_item_sad">'.sad_face().' The function get_core_updates() does not exist!</p>';
    }
    $output .= '<div style="border-bottom:1px solid #ECECEC"></div>';
    return $output;
}

/**
 * Creates the HTML content containing information on plugin updates
 */
function wpv_plugin_updates() {
	$output = '<h3 style="margin-bottom:25px;">WordPress utvidelser status:</h3>';
    if(function_exists('wpv_helpers_get_plugin_updates')) {
        $plugin_updates = wpv_helpers_get_plugin_updates();
        if(count($plugin_updates) > 0) {
            foreach ($plugin_updates as $plugin) {
                //var_dump($plugin);
                $output .= '<p class="list_item_sad">'.sad_face().' Utvidelser "'.$plugin->Name.'" krever oppdatering!</p>';
            }
        } else {
            $output .= '<p class="list_item_happy">'.happy_face().' Alle utvidelser er oppdatert.</p>';
        }
    } else {
        $output .= '<p class="list_item_sad">'.sad_face().' The function get_plugin_updates() does not exist!</p>';
    }
    $output .= '<div style="border-bottom:1px solid #ECECEC"></div>';
    return $output;
}

/**
 * Creates the HTML content containing information on theme updates
 */
function wpv_theme_updates() {
	$output = '<h3 style="margin-bottom:25px;">WordPress tema status:</h3>';
    if(function_exists('wpv_helpers_get_theme_updates')) {
        $theme_updates = wpv_helpers_get_theme_updates();
        if(count($theme_updates) > 0) {
            foreach ($theme_updates as $theme) {
            	//the theme headers are private thats why we have to use the reflection object
                $reflector = new ReflectionObject($theme);
                $nodes = $reflector->getProperty('headers');
                $nodes->setAccessible(true);
                $data = $nodes->getValue($theme);
                //var_dump($data);
                $output .= '<p class="list_item_sad">'.sad_face().' Tema "'.$data['Name'].'" krever oppdatering!</p>';
            }
        } else {
            $output .= '<p class="list_item_happy">'.happy_face().' Alle temaer er oppdatert.</p>';
        }
    } else {
        $output .= '<p class="list_item_sad">'.sad_face().' The function get_theme_updates() does not exist!</p>';
    }
    $output .= '<div style="border-bottom:1px solid #ECECEC"></div>';
    return $output;
}

/**
 * Creates the HTML for the main logo in email template - NOT IN USE FOR NOW
 */
function mail_logo() {
    return '<img src="'.get_home_url( null, '', null ).'/wp-content/plugins/wp-vakt/img/wpvakt-email-logo.png" label="WP VAKT" width="200" border="0" align="top" style="display:inline;outline-style:none;text-decoration:none;"/>';
}

/**
 * Creates the HTML for the happy face image (for email template)
 */
function happy_face() {
    return '<img src="'.get_home_url( null, '', null ).'/wp-content/plugins/wp-vakt/img/happy.jpg" label="Happy Face" width="31" border="0" align="top" style="display:inline;margin-top:-7px;margin-right:10px;outline-style:none;text-decoration:none;"/>';
}

/**
 * Creates the HTML for the sad face image (for email template)
 */
function sad_face() {
    return '<img src="'.get_home_url( null, '', null ).'/wp-content/plugins/wp-vakt/img/sad.jpg" label="Sad Face" width="31" border="0" align="top" style="display:inline;margin-top:-7px;margin-right:10px;outline-style:none;text-decoration:none;"/>';
}