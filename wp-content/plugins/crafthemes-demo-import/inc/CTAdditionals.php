<?php
// Block direct access to the main plugin file.
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
// Mailchimp Subscribe Function
function ct_mailchimp_subscriber_status( $email, $status, $list_id, $api_key, $merge_fields = array('FNAME' => '','LNAME' => '') ){
    $data = array(
        'apikey'        => $api_key,
            'email_address' => $email,
        'status'        => $status,
        'merge_fields'  => $merge_fields
    );
    $mch_api = curl_init(); // initialize cURL connection

    curl_setopt($mch_api, CURLOPT_URL, 'https://' . substr($api_key,strpos($api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/' . $list_id . '/members/' . md5(strtolower($data['email_address'])));
    curl_setopt($mch_api, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic '.base64_encode( 'user:'.$api_key )));
    curl_setopt($mch_api, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
    curl_setopt($mch_api, CURLOPT_RETURNTRANSFER, true); // return the API response
    curl_setopt($mch_api, CURLOPT_CUSTOMREQUEST, 'PUT'); // method PUT
    curl_setopt($mch_api, CURLOPT_TIMEOUT, 10);
    curl_setopt($mch_api, CURLOPT_POST, true);
    curl_setopt($mch_api, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($mch_api, CURLOPT_POSTFIELDS, json_encode($data) ); // send data in json

    $result = curl_exec($mch_api);
    return $result;
}


// Create Subscription database "ct_mc_sub"
// function ct_mc_tbl_create() {
//     global $wpdb;

//     $ct_tbl_name = $wpdb->prefix . "ct_mc_sub";

//     if( $wpdb->get_var( "show tables like '$ct_tbl_name'" ) != $ct_tbl_name )  {
//         $ct_query = "CREATE TABLE $ct_tbl_name(
//             id int(10) NOT NULL AUTO_INCREMENT,
//             subscribed varchar (100) DEFAULT '',
//             PRIMARY KEY (id)
//         )";

//         require_once( ABSPATH . "wp-admin/includes/upgrade.php" );
//         dbDelta( $ct_query );
//     }
// }


// Insert into "ct_mc_sub" table
function ct_mc_tbl_insert( $value ) {
    global $wpdb;
    $ct_tbl_name = $wpdb->prefix . "ct_mc_sub";
    $check_table = $wpdb->get_var( 'select count(id) from ' . $ct_tbl_name );

        if ( $check_table == 0 ) {

            $wpdb->insert( $ct_tbl_name,
                array(
                    'subscribed'  =>  $value,
                ),
                array(
                    '%s',
                )
            );
    }
}

// Hide Subscribe form if accepted
global $wpdb;
$ct_tbl_name = $wpdb->prefix . "ct_mc_sub";
$check_table = $wpdb->get_var( 'select count(id) from ' . $ct_tbl_name );

if ( $check_table != 0 ) {
    add_action('admin_head', 'ct_custom_css');
    function ct_custom_css() {
        echo '<style>
                .newsletter-form {
                    display:none;
                }
              </style>';
    }
}

/*****************************************************************************
* Import Respective Theme Demos
*****************************************************************************/
$theme = wp_get_theme();
$theme_name = $theme->get( 'Name' );

if( $theme_name == "Apex Business"
    || $theme_name == "Apex Business Premium"
    || $theme_name == "Apex Business Pro" ) {
    include( plugin_dir_path( __FILE__ ) . '/CTImportApex.php' );
} else if ( $theme_name == "Minimalist Blog"
    || $theme_name == "Minimalist Blog Pro"
    || $theme_name == "Minimalist Blog Premium"
    || $theme_name == "Minimalist Premium"
    || $theme_name == "Minimalist Pro" ) {
    include( plugin_dir_path( __FILE__ ) . '/CTImportMinimalist.php' );
} else if ( $theme_name == "Prime Business"
    || $theme_name == "Prime Business Pro"
    || $theme_name == "Prime Business Premium" ) {
    include( plugin_dir_path( __FILE__ ) . '/CTImportPrime.php' );
} else if ( $theme_name == "Writer Blog"
    || $theme_name == "Writer Blog Pro"
    || $theme_name == "Writer Blog Premium"
    || $theme_name == "Writer Premium"
    || $theme_name == "Writer Pro" ) {
    include( plugin_dir_path( __FILE__ ) . '/CTImportWriter.php' );
} else if ( $theme_name == "Periar"
    || $theme_name == "Periar Pro"
    || $theme_name == "Periar Premium"
    || $theme_name == "Periar" ) {
    include( plugin_dir_path( __FILE__ ) . '/CTImportPeriar.php' );
} else if ( $theme_name == "Dreamer Blog"
    || $theme_name == "Dreamer Pro"
    || $theme_name == "Dreamer Premium"
    || $theme_name == "Dreamer Blog Premium" ) {
    include( plugin_dir_path( __FILE__ ) . '/CTImportDreamer.php' );
} else if ( $theme_name == "Spark News"
    || $theme_name == "Spark News Pro"
    || $theme_name == "Spark News Premium"
    || $theme_name == "Spark Premium" ) {
    include( plugin_dir_path( __FILE__ ) . '/CTImportSpark.php' );
} else if ( $theme_name == "Calm Blog"
    || $theme_name == "Calm Blog Pro"
    || $theme_name == "Calm Blog Premium" ) {
    include( plugin_dir_path( __FILE__ ) . '/CTImportCalm.php' );
}

// Looping the notification through time after clicking close button
// if( !get_option( 'ct-times-shown-option' ) ) {
//     update_option( 'ct-times-shown-option', 1 );
//     set_transient( 'ct-times-shown-transient', 1, 43200 ); // 12 hours in seconds
// } else if( get_option( 'ct-times-shown-option' ) == 1 ) {
//     update_option( 'ct-times-shown-option', 2 );
//     set_transient( 'ct-times-shown-transient', 1, 604800 ); // 7 days
// } else if( get_option( 'ct-times-shown-option' ) == 2 ) {
//     update_option( 'ct-times-shown-option', 3 );
//     set_transient( 'ct-times-shown-transient', 1, 45*24*60*60 ); // 45 days
// }






















