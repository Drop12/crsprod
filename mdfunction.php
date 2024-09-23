<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function login()
{
    /* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'pass12344');
define('DB_NAME', 'crs20204');


/*define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'crs');
    define('DB_PASSWORD', '@123crs');
    define('DB_NAME', 'crenew');*/

    /* Attempt to connect to MySQL database */
    $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Check connection
    if ($db === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    return $db;
}

function validate_short_care($db,$msisdn)
{
    $sql = "SELECT count(`phone_number`) as `total_count` from `tbl_caresession` where `phone_number`='$msisdn'";
    $result_set = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $total_count = $row['total_count'];
    }
    if($total_count >= 1)
    {
        return true;
    }
    else
    {
        return false;
    }
}


function insert_session_care($db,$msisdn,$current_question)
{
    $sql = "INSERT INTO `tbl_caresession`(`phone_number`, `current_question`)
               VALUES ('$msisdn','$current_question')";
   if(!mysqli_query($db, $sql))
   {
        die($sql);
   }
}

function insert_outgoingsms_care($db,$msisdn,$date,$sms)
{
    $smscount=get_smscount($sms);
    $sms=mysqli_real_escape_string($db,$sms);
    $sql = "INSERT INTO `tbl_care_outgoingsms`(`msisdn`,`sms`,`sms_count`)
               VALUES ('$msisdn','$sms','$smscount')";
   if(!mysqli_query($db, $sql))
   {
        die($sql);
   }
}

function get_menu($db,$stage_id,$msisdn)
{
    $sql = "SELECT `menu` from `tbl_crs_menu` where `sms_code`='$stage_id'";
    $result_set = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $menu = $row['menu'];
    }

    return $menu;
}

function send_outgoing($sms_is,$msisdn,$sms,$db,$destination)
{

    $data[] = array(
        "text" => "$sms",
        "msisdn" => $msisdn,
        "source" => "15062"
    );

    $req = array(
        "channel" => array(
            "channel" => "120874",
            "password" =>"MjAzNzAwYWM1N2UwYWJmYjZkNThjOGIzOThiMzBhNGY4OWVmOTdmY2M1NzhhYjQ2NTI4YTNhYzg4NjZiZTAyZA=="
        ),
        "messages" => $data
    );

    $kkt = json_encode($req,JSON_UNESCAPED_UNICODE);

    //die($kkt);

    error_log("\n" . date('Y-m-d H:i:s') . " Sent Request :\n $kkt ", 3, $destination);

    $curl = curl_init();

    $post_url = "https://bulksms.fasthub.co.tz/fasthub/messaging/json/api";
    curl_setopt_array($curl, array(
        CURLOPT_URL => $post_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $kkt,
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
        ),
    ));

    $response = curl_exec($curl);

    //print_r($response);
    //die();
    error_log("\n" . date('Y-m-d H:i:s') . " Returned Response :\n $response ", 3, $destination);

    if ($response === FALSE) {
        die();
    } else {
        $responsee = json_decode($response, true);
        $isSuccessful = $responsee['isSuccessful'];
        $reference_id = $responsee['reference_id'];
        $sms_quota = $responsee['sms_quota'];

        if ($isSuccessful == "true") {

            update_outgoingsms($sms_is,$response,$reference_id,$db);
        }
    }
    curl_close($curl);

}

function update_outgoingsms($sms_is,$responsee,$reference_id,$db)
{
    $sql = "UPDATE `tbl_care_outgoingsms` SET `response`='$responsee',`reference_id`='$reference_id',`is_sent`='1' where `sms_id`='$sms_is'";
    if(!mysqli_query($db, $sql))
    {
        die($sql);
    }
}

function get_time()
{
    return date('Y-m-d H:i:s');
}

function get_smscount($sms)
{
    $count_sms = strlen($sms);
    $mazima = floor($count_sms / 160);
    $modulus = $count_sms % 160;

    if ($modulus > 0) {
        $sms_count = $mazima + 1;
    }

    return $sms_count;
}

function get_stageid_care($db,$msisdn)
{
    $sql = "SELECT 	`current_question` from `tbl_caresession` where `phone_number`='$msisdn' order by date_ desc limit 1";
    $result_set = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $current_question = $row['current_question'];
    }

    return $current_question;
}

function update_ot($db,$sms_id)
{
    $sql="UPDATE  `tbl_care_outgoingsms` SET `is_sent`=1 where `sms_id`='$sms_id'";
    if(!mysqli_query($db,$sql))
    {
        die($sql);
    }
}

function insert_inputt_care($db,$msisdn,$stage_id,$text)
{
    $date=date('Y-m-d H:i:s');
    $sql = "INSERT INTO `tbl_crs_input_new`(`msisdn`,`stage_code`,`luga`,`reg_date`)
               VALUES ('$msisdn','$stage_id','$text','$date')";
    if(!mysqli_query($db, $sql))
    {
        die($sql);
    }
}
function update_update_mkoa_wilaya($db,$text,$msisdn,$stage_id)
{
    $id=getcurrentid($db,$msisdn);
    $sql="UPDATE  `tbl_crs_input_new` SET `stage_code`='$stage_id',`wilaya`='$text' where `id`='$id'";
    if(!mysqli_query($db,$sql))
    {
        die($sql);
    }
}
function update_update_gender($db,$text,$msisdn,$stage_id)
{
    
    $id=getcurrentid($db,$msisdn);
    $sql="UPDATE  `tbl_crs_input_new` SET `stage_code`='$stage_id',`mkoa`='$text' where `id`='$id'";
    if(!mysqli_query($db,$sql))
    {
        die($sql);
    }
}
function update_update_mkoa($db,$text,$msisdn,$stage_id)
{
    $id=getcurrentid($db,$msisdn);
    $sql="UPDATE  `tbl_crs_input_new` SET `stage_code`='$stage_id',`mkoa`='$text' where `id`='$id'";
    if(!mysqli_query($db,$sql))
    {
        die($sql);
    }
    
}

function update_session($db,$msisdn,$stage_id)
{
    $sql="UPDATE  `tbl_caresession` SET `current_question`='$stage_id' where `phone_number`='$msisdn' && `current_question` !='10'";
    if(!mysqli_query($db,$sql))
    {
        die($sql);
    }
}

function validate_cdse($db,$text)
{
    $sql = "SELECT client_cds from `tbl_cdsn` where `client_cds`='$text'";
    $result_set = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result_set);
    if($count >= 1)
    {
        return true;
    }
    else
    {
        return false;
    }
}
function get_cdsdetails_kizungu($db,$text)
{
    $sql = "SELECT * from `tbl_cdsn` where `client_cds`='$text'";
    $result_set = mysqli_query($db, $sql);

    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $full_name = $row['full_name'];
        $city = $row['city'];
    }

    $menu = null;
    $menu .= "Welcome\n";
    $menu .= "Full Name:".$full_name."\n";
    $menu .= "CDS Number:".$text."\n";

    return $menu;
}
function get_cdsdetails($db,$text)
{
    $sql = "SELECT * from `tbl_cdsn` where `client_cds`='$text'";
    $result_set = mysqli_query($db, $sql);

    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $full_name = $row['full_name'];
        $city = $row['city'];
    }

    $menu = null;
    $menu .= "Karibu\n";
    $menu .= "Jina Kamili:".$full_name."\n";
    $menu .= "CDS Namba:".$text."\n";

    return $menu;
}

function update_inputt($db,$msisdn,$stage_id,$text,$cname)
{
    $sql = "UPDATE `tbl_crs_input_new` SET ".$cname."='$text',`current_question`='$stage_id' where current_question!='8' && phone_number='$msisdn'";
    if(!mysqli_query($db, $sql))
    {
        die($sql);
    }
}
function update_update_simu_namba($db,$msisdn,$stage_id,$text)
{
    $id=getcurrentid($db,$msisdn);
    $sql = "UPDATE `tbl_crs_input_new` SET `simu_namba`='$text',`stage_code`='$stage_id' where `id`='$id'";
    if(!mysqli_query($db, $sql))
    {
        die($sql);
    }
}
function update_update_mrejesho($db,$msisdn,$stage_id,$text)
{
    $id=getcurrentid($db,$msisdn);
    $sql = "UPDATE `tbl_crs_input_new` SET `mrejesho`='$text',`stage_code`='$stage_id' where `id`='$id'";
    if(!mysqli_query($db, $sql))
    {
        die($sql);
    }
}
function update_update_maelezo($db,$msisdn,$stage_id,$text)
{
    $id=getcurrentid($db,$msisdn);
    $sql = "UPDATE `tbl_crs_input_new` SET `maelezo_mafupi`='$text',`stage_code`='$stage_id' where `id`='$id'";
    if(!mysqli_query($db, $sql))
    {
        die($sql);
    }
}
function update_update_kata($db,$msisdn,$stage_id,$text)
{
    $id=getcurrentid($db,$msisdn);
    $sql = "UPDATE `tbl_crs_input_new` SET `kata_mji`='$text',`stage_code`='$stage_id' where `id`='$id'";
    if(!mysqli_query($db, $sql))
    {
        die($sql);
    }
}
function update_update_mradi($db,$msisdn,$stage_id,$text)
{
    $id=getcurrentid($db,$msisdn);
    $sql = "UPDATE `tbl_crs_input_new` SET 	`mradi`='$text',`stage_code`='$stage_id' where `id`='$id'";
    if(!mysqli_query($db, $sql))
    {
        die($sql);
    }
}
function update_update_swala_lipi($db,$msisdn,$stage_id,$text)
{
    $id=getcurrentid($db,$msisdn);
    $sql = "UPDATE `tbl_crs_input_new` SET 	swala_lipi='$text',`stage_code`='$stage_id' where `id`='$id'";
    if(!mysqli_query($db, $sql))
    {
        die($sql);
    }
}
function update_full_name($db,$text,$msisdn)
{
    $id=getcurrentid($db,$msisdn);
    $sql = "UPDATE `tbl_crs_input_new` SET fullname='$text',`regass`='Proxy' where `id`='$id'";
    if(!mysqli_query($db, $sql))
    {
        die($sql);
    }

}
function get_mkoa_id($db,$msisdn)
{
    $sql = "SELECT `mkoa` from `tbl_crs_input_new` where `msisdn`='$msisdn' order by reg_date desc LIMIT 1";
    $result_set = mysqli_query($db, $sql);

    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $id = $row['mkoa'];
    }

    return $id;
}
function getcurrentid($db,$msisdn)
{
    $sql = "SELECT `id` from `tbl_crs_input_new` where `msisdn`='$msisdn' order by reg_date desc LIMIT 1";
    $result_set = mysqli_query($db, $sql);

    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $id = $row['id'];
    }

    return $id;
}
function update_attendance($db,$text,$msisdn)
{
    $id=getcurrentid($db,$msisdn);
    if($text==1)
    {
        $g='Physical';
    }
    else
    {
        $g='Online';
    }

    $sql = "UPDATE `tbl_crs_input_new` SET `attendance`='$g' where `id`='$id'";
    if(!mysqli_query($db, $sql))
    {
        die($sql);
    }
}
function update_full_name_gender($db,$text,$msisdn)
{
    $id=getcurrentid($db,$msisdn);
    if($text==1)
    {
        $g='Female';
    }
    else
    {
        $g='Male';
    }

    $sql = "UPDATE `tbl_crs_input_new` SET gender='$g' where `id`='$id'";
    if(!mysqli_query($db, $sql))
    {
        die($sql);
    }
}
function validate_cdseinn($db,$text)
{
    $sql = "SELECT `cds_number` from `tbl_crs_input_new` where `cds_number`='$text'";
    $result_set = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result_set);
    if($count >= 1)
    {
        return true;
    }
    else
    {
        return false;
    }
}
function insert_typeof($db,$msisdn)
{
    $id=getcurrentid($db,$msisdn);
     $sql = "UPDATE `tbl_crs_input_new` SET regass='Shareholder' where `id`='$id'";
    if(!mysqli_query($db, $sql))
    {
        die($sql);
    }
}
function update_input($db,$id)
{
    $sql = "UPDATE `tbl_input` SET is_processed='1' where `id`='$id'";
    if(!mysqli_query($db, $sql))
    {
        die($sql);
    }
}
function get_menu_mkoawilayaeng($menu)
{
    $textr=null;
    if($menu==1)
    {
        $textr.="Kindly Select District\n";
        $textr.="1.Ilala\n";
        $textr.="2.Ubungo\n";
        $textr.="3.Temeke\n";
        $textr.="4.Kigamboni\n";
        $textr.="5.Kinondoni\n";
    }
    else if($menu==2)
    {
        $textr.="Kindly Select District\n";
        $textr.="1.Mbalari\n";
        $textr.="2.Rungwe\n";
        $textr.="3.Chunya\n";
        $textr.="4.Kyela\n";
        $textr.="5.Mbeya\n";
        $textr.="6.Mbeya Rural\n";
    }
    else if($menu==3)
    {
        $textr.="Kindly Select District\n";
        $textr.="1.Kasulu\n";
        $textr.="2.Kibondo\n";
        $textr.="3.Kigoma Rural\n";
        $textr.="4.Kigoma Town\n";
        $textr.="5.Buhigwe\n";
        $textr.="6.Kakonko\n";
        $textr.="7.Uvinza\n";
    }
    else if($menu==4)
    {
        $textr.="Kindly Select District\n";
        $textr.="1.Igunga\n";
        $textr.="2.Nzega\n";
        $textr.="3.Sikonge\n";
        $textr.="4.Tabora Town\n";
        $textr.="5.Urambo\n";
        $textr.="6.Uyui\n";
        $textr.="7.Kaliua\n";
    }
    else if($menu==5)
    {
        $textr.="Kindly Provide Region Name";
    }
    
    return $textr;
}
function get_menu_mkoawilaya($menu)
{
    $textr=null;
    if($menu==1)
    {
        $textr.="Chagua Wilaya Uliopo\n";
        $textr.="1.Ilala\n";
        $textr.="2.Ubungo\n";
        $textr.="3.Temeke\n";
        $textr.="4.Kigamboni\n";
        $textr.="5.Kinondoni\n";
    }
    else if($menu==2)
    {
        $textr.="Chagua Wilaya Uliopo\n";
        $textr.="1.Mbalari\n";
        $textr.="2.Rungwe\n";
        $textr.="3.Chunya\n";
        $textr.="4.Kyela\n";
        $textr.="5.Mbeya\n";
        $textr.="6.Mbeya Rural\n";
    }
    else if($menu==3)
    {
        $textr.="Chagua Wilaya Uliopo\n";
        $textr.="1.Kasulu\n";
        $textr.="2.Kibondo\n";
        $textr.="3.Kigoma Vijijini\n";
        $textr.="4.Kigoma Mjini\n";
        $textr.="5.Buhigwe\n";
        $textr.="6.Kakonko\n";
        $textr.="7.Uvinza\n";
    }
    else if($menu==4)
    {
        $textr.="Chagua Wilaya Uliopo\n";
        $textr.="1.Igunga\n";
        $textr.="2.Nzega\n";
        $textr.="3.Sikonge\n";
        $textr.="4.Tabora Mjini\n";
        $textr.="5.Urambo\n";
        $textr.="6.Uyui\n";
        $textr.="7.Kaliua\n";
    }
    else if($menu==5)
    {
        $textr.="Andika Mkoa uliopo";
    }
    
    return $textr;
}