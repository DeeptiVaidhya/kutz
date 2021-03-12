<?php
// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AIzaSyC5WBluvLWcOarE7x6pbDFp6EB6GJProWs' );

$id = "cGm7sVSoE_8:APA91bFXb2iQYSwZoaH9jUK9qptuwa3TZ7ZaIl6v4TUTkBk13ZcRSz7v-Rrv55uVoqvC1Jk_udhVei4pWnEJFq4mIeouxy5mhnjHNdTNdV1x7MavrlM4q4kJ-3kvq0yOljW9lroBszYn";
$registrationIds = array($id);
// prep the bundle
$msg = array
(
    'message'   => 'here is a message. message',
    'title'     => 'This is a title. title',
    'subtitle'  => 'This is a subtitle. subtitle',
    'tickerText'    => 'Ticker text here...Ticker text here...Ticker text here',
    'vibrate'   => 1,
    'sound'     => 1,
    'largeIcon' => 'large_icon',
    'smallIcon' => 'small_icon'
);
$fields = array
(
    'registration_ids'  => $registrationIds,
    'data'          => $msg
);
 
$headers = array
(
    'Authorization: key=' . API_ACCESS_KEY,
    'Content-Type: application/json'

);
 //print_r($headers);die;
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );
echo $result;


?>