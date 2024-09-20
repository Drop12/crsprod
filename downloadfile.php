<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once 'functions.php';
$db=login();


$dtat_id=$_GET['reg_id'];
$audiod=$_GET['tpp'];

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
    //echo $sql_update;
    //die();
    if(mysqli_query($db, $sql_update))
    {
      $filedata = $data['filedata'];
      $audio_data = base64_decode($filedata);

      // Specify the file path in the 'assets' directory
      $file_path = 'assets/'.$unix_timestamp;

      // Save the decoded audio data to a .wav file
      file_put_contents($file_path, $audio_data);

      if (file_exists($file_path)) {
       $estatus='File downloaded Successfully';
    } else {
      $estatus='File downloaded failed';
    }
      
    }
    else
    {
        echo $sql_update;
        die();
    }
    header("location:callregi.php?dstatus=$estatus");
}
else
{
    echo "Can't Download File, Kindly Contact Administrator";
    die();
}

curl_close($curl);
//echo $response;
