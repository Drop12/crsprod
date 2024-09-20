<?php

require_once 'function.php';
$db=login();


$dtat_id=$data['reg_id'];
$audiod=$data['tpp'];

$parts = explode("/", $audiod);
$filename = rtrim($parts[1], '@');

$unix_timestamp = time().generateRandomString().'.wav';

$req= array(
    "api_key"=>"YTc4YWY3ZWVlZWViODU3YTY5ODUzNTA4ZGU3YzVhYzM1NTdjNjM1MWEyYzA1ODU1ZDhlqA12AjkP0qNTc4ZjU3N2QwMDVmMw==",
   "filename"=>$unix_timestamp,
   "audiod"=>$filename
);

$kkt = json_encode($req,JSON_UNESCAPED_UNICODE); 

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://faic.goldnet.tz/cdrc.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$kkt,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

$data = json_decode($response, true);

// Extract the status value
$status = $data['status'];

if($status==200)
{
    $sql_update="UPDATE  tbl_call_registry SET `dfileloc`='$unix_timestamp',`is_donload`='1' where `id`='$dtat_id'";
    mysqli_query($db, $sql_update);
    header("location:callregi.php");
}
else
{
    echo "Can't Download File, Kindly Contact Administrator";
    die();
}

curl_close($curl);
//echo $response;
