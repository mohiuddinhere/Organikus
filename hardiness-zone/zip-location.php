<?php
$tree = ["Banyan Tree","Neem Tree","Peepal Tree"];

$hardinessZone = "5b";
$zipCode = $_REQUEST['zipcode'];
$countryCode = "BD";
$ch = curl_init();

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);

$data = [
   "codes" => $zipCode,
   "country" => $countryCode
];

curl_setopt($ch, CURLOPT_URL, "https://app.zipcodebase.com/api/v1/search?" . http_build_query($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	"Content-Type: application/json",
    "apikey: 8c74f9e0-e051-11ec-a0cc-bf64be68b890",  
));

$response = curl_exec($ch);
curl_close($ch);

$json = json_decode($response, true);


// var_dump($json);
// echo "<pre>";
// print_r($json);
// echo "</pre>";
$obj = [];
if($json['results']){
    $latitude = $json['results']["$zipCode"][0]['latitude'];
    $longitude = $json['results']["$zipCode"][0]['longitude'];
    $palce = $json['results']["$zipCode"][0]['city'];
    $locationPoint = $latitude . "/" . $longitude;

    $obj['palce'] = $palce;
    $obj['locationPoint'] = $locationPoint;
    $obj['hardiness_zone'] = $hardinessZone;
    $obj['tree_array'] = $tree;
    $obj['data'] = 'true';
    echo json_encode($obj);
}else if(!$json['results']) {
    $obj['data'] = 'false';
    echo json_encode($obj);
} 



?>