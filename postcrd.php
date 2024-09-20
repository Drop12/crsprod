<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Allow from any origin
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

$json = file_get_contents('php://input');
$data = json_decode($json,true);

date_default_timezone_set('Africa/Dar_es_Salaam');
$destination = "assets/cdr" . date('Y-m-d') . ".log";
error_log("\n" . date('Y-m-d H:i:s') . " Incoming Request :\n $json ", 3, $destination);

//$data = json_decode($json, true);
require_once 'functions.php';
$db = login();
// Check if the decoding was successful
if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
    die('Error decoding JSON: ' . json_last_error_msg());
}

$AcctId=$data['AcctId'];
$src=$data['src'];
$dst=$data['dst'];


if($dst=="750011800" || $dst=="748501994")
{
    date_default_timezone_set('Africa/Dar_es_Salaam');

    // Get the current date and time
    $current_date_time = date('Y-m-d H:i:s');
    
    $sql_insert="INSERT INTO `tbl_call_registry`(`phone_number`, `reg_date`)
    VALUES ('$src','$current_date_time')";
    if(!mysqli_query($db, $sql_insert))
    {
        die($sql);
    }
}
elseif($dst=="4001" || $dst=="5002")
{  
    
    $entry_id=get_entry_id($db,$src);
    if ($dst == 5002) {
        $language=4002;
    } else {
        $language=4001;
    }

    $sql_insert="UPDATE `tbl_call_registry` SET `lugha`='$language' where `id`='$entry_id'";
    //echo $sql_insert;
    //die($sql);
    if(!mysqli_query($db, $sql_insert))
    {
        die($sql);
    }
}
elseif($dst=="4011" || $dst=="4012" || $dst=="4013" || $dst=="4014" || $dst=="4015"  || $dst=="4016" || $dst=="5011" || $dst=="5012" || $dst=="5013" || $dst=="5014" || $dst=="5015"  || $dst=="5016")
{
    $entry_id=get_entry_id($db,$src);
    $dst=get_dst_region($dst);
    $sql_insert="UPDATE `tbl_call_registry` SET `mkoa`='$dst' where `id`='$entry_id'";
    if(!mysqli_query($db, $sql_insert))
    {
        die($sql);
    }
}
elseif($dst=="4021" || $dst=="4022" || $dst=="5021" || $dst=="5022")
{
    $entry_id=get_entry_id($db,$src);
    $dst=get_dst_category($dst);
    $sql_insert="UPDATE `tbl_call_registry` SET `swali_lipi`='$dst' where `id`='$entry_id'";
    if(!mysqli_query($db, $sql_insert))
    {
        die($sql);
    }
}
elseif($dst=="4031" || $dst=="4032"  || $dst=="4033" || $dst=="4034" || $dst=="4035" || $dst=="4036"  || $dst=="4037" ||$dst=="5031" || $dst=="5032"  || $dst=="5033" || $dst=="5034" || $dst=="5035" || $dst=="5036"  || $dst=="5037")
{
    $entry_id=get_entry_id($db,$src);
    $dst=get_dst_programt($dst);
    $sql_insert="UPDATE `tbl_call_registry` SET `mradi`='$dst' where `id`='$entry_id'";
    if(!mysqli_query($db, $sql_insert))
    {
        die($sql);
    }
}
elseif($dst=="4041" || $dst=="4042" || $dst=="5041" || $dst=="5042")
{
    $entry_id=get_entry_id($db,$src);
    $dst=get_dst_followup($dst);
    $sql_insert="UPDATE `tbl_call_registry` SET `mrejesho`='$dst' where `id`='$entry_id'";
    //echo $src;
    //die();
    if(!mysqli_query($db, $sql_insert))
    {
        die($sql);
    }
}
elseif($dst=="1002" || $dst=="1001" ||  $dst=="1000")
{
    $entry_id=get_entry_id($db,$src);
    $dst=$date['recordfiles'];
    $sql_insert="UPDATE `tbl_call_registry` SET `filelocd`='$dst' where `id`='$entry_id'";
    if(!mysqli_query($db, $sql_insert))
    {
        die($sql);
    }
}

$response=array(
                    "status"=>"200",
                    "statusDesc"=>"Success"     
                );

header('Content-Type: application/json');
$response=json_encode($response);
print_r($response);
die(); 


