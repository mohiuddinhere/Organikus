<?php
$zipCode = $_POST['zipcode'];
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

include "../authentication/connection.php";
$str = "SELECT * FROM hardinesszone WHERE zip = $zipCode";
$result = mysqli_query($conn, $str);
$r = mysqli_fetch_assoc($result);
$hardinessZone = $r['zone'];
$zip_id = $r['id'];


$str = "SELECT * FROM treelist WHERE zone_id = $zip_id";
$result = mysqli_query($conn, $str);
$r = mysqli_fetch_all($result);

$tree_data = [];
if(mysqli_num_rows($result)> 0){
    foreach($result as $r){
        array_push($tree_data, $r);
    }
    // var_dump($tree_data);
}


$obj = [];
if($json['results']){
    $latitude = $json['results']["$zipCode"][0]['latitude'];
    $longitude = $json['results']["$zipCode"][0]['longitude'];
    $palce = $json['results']["$zipCode"][0]['city'];
    $locationPoint = $latitude . "/" . $longitude;

    $obj['palce'] = $palce;
    $obj['locationPoint'] = $locationPoint;
    $obj['hardiness_zone'] = $hardinessZone;
    $obj['data'] = 'true';
    $obj['tree_array'] = $tree_data;
    echo json_encode($obj);
}else if(!$json['results']) {
    $obj['data'] = 'false';
    echo json_encode($obj);
} 



?>