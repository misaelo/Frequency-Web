<?php
// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AIzaSyA2xFIZhAdGz0I3rnzNcePMr0fP7e6hhBw');

//$registrationIds = ["dPW1T6Iw4js:APA91bET63vJbbQfOkWsDjfkU1mWYRi65fSmAk-gyoyRIVq5al-kys8yd3uNUlxAs1vQ1zVTpDRjoZ7UGWF_MyUj3bHET_Mr1X0X5d0Pc_a85rwkGxzb0uE4x9asIdEhOr92VPm8xMx-"];
$registrationIds = [$_REQUEST['id']];
//$registrationIds = ["aUniqueKey"];

// prep the bundle
$msg = [
    'title'   => 'Programación Android',
	'body'    => 'Prueba 2',
	'vibrate'   => 1,
    'sound'     => 1
];

$fields = [
    'registration_ids'  => $registrationIds,
    'notification'      => $msg
];

$headers = [
    'Authorization: key=' . API_ACCESS_KEY,
    'Content-Type: application/json'
];
$fields = json_encode( $fields );

$ch = curl_init();https:
curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, $fields );
$result = curl_exec($ch );
curl_close( $ch );

echo $result;
?>