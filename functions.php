<?php

error_reporting(0);
/*
;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);*/

@set_time_limit(0);

function login()
{
    //crs server conncetion   
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'pass12344');
    define('DB_NAME', 'crs20204');

    
    $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

   
    if ($db === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    return $db;
}

/*function login()
{
    
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'crs');
    define('DB_PASSWORD', '@123crs');
    define('DB_NAME', 'crenew');

   
    $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    
    if ($db === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    return $db;
}
*/
function send_temail()
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://faic.goldnet.tz/crsem.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
        "api_key": "YTc4YWY3ZWVlZWViODU3YTY5ODUzNTA4ZGU3YzVhYzM1NTdjNjM1MWEyYzA1ODU1ZDhlqA12AjkP0qNTc4ZjU3N2QwMDVmMw==",
        "send_to": "ronilickd@yahoo.com"
    }',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    return;
}

function get_total_reg_c($db)
{
    $sales_id=$_SESSION['user_id'];
    $count=0;
    $sql = "SELECT * FROM `tbl_crips_customer`";
    $result_set = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result_set);

    // If result matched $myusername and $mypassword, table row must be 1 row
    return $count;
}
function get_total_reg_s($db)
{
    $count=0;
    $sql = "SELECT * FROM `tbl_credentials` where `userrole`='sales'";
    $result_set = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result_set);

    // If result matched $myusername and $mypassword, table row must be 1 row
    return $count;
}
function get_total_rentries_channel($db,$ivr)
{
    $count=0;
    $sql = "SELECT * FROM `tbl_registryinput` where `tbl_channel`='$ivr'";
    $result_set = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result_set);

    // If result matched $myusername and $mypassword, table row must be 1 row
    return $count;
}
function get_total_rentries($db)
{
    $count=0;
    $sql = "SELECT * FROM `tbl_registryinput`";
    $result_set = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result_set);

    // If result matched $myusername and $mypassword, table row must be 1 row
    return $count;
}
function get_total_reg_p($db)
{
    $count=0;
    $sql = "SELECT * FROM `tbl_crips_product`";
    $result_set = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result_set);

    // If result matched $myusername and $mypassword, table row must be 1 row
    return $count;
}
function capitalizeFirstLetter($string) {
    return ucfirst($string);
}
function get_section_id($db,$questionid)
{
    $customer_name=null;
    $sql = "SELECT 	`section_id` FROM `tbl_questions` where `id`='$questionid' LIMIT 1";
    $result_set = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $customer_name = $row['section_id'];
    }

    // If result matched $myusername and $mypassword, table row must be 1 row
    return $customer_name;
}
function get_total_reg_txn($db)
{
    $count=0;
    $sql = "SELECT * FROM `tbl_crips_order` where `payment_status`='PENDING'";
    $result_set = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result_set);

    // If result matched $myusername and $mypassword, table row must be 1 row
    return $count;
}
function get_question_type($question_type)
{
    
    if($question_type=="TEXT_INPUT")
    {
        return "Single Answer";
    }
    elseif($question_type=="DROPDOWN")
    {
        return "Multiple Choice";
    }
}
function get_qn_jibu($db,$id)
{
    $concatenated_answers = null;
    $sql = "SELECT `jibu` FROM `tbl_qmultiple` WHERE `question_id` = '$id' ORDER BY reg_date DESC";
    $result_set = mysqli_query($db, $sql);
    
    if ($result_set) {
        while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
            $concatenated_answers .= $row['jibu'] . ",";
        }
    } else {
        // Handle error if query fails
        return "Error: " . mysqli_error($db);
    }
    
    // Return the concatenated answers
    return $concatenated_answers;
}
function get_last_qn_id($db)
{
    $customer_name=null;
    $sql = "SELECT 	`id` FROM `tbl_questions` order by reg_date desc LIMIT 1";
    $result_set = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $customer_name = $row['id'];
    }

    // If result matched $myusername and $mypassword, table row must be 1 row
    return $customer_name;
}
function get_project_nameddd($db,$project_id)
{
    $customer_name=null;
    $sql = "SELECT product_name FROM `tbl_crips_product` where `id`='$project_id'";
    $result_set = mysqli_query($db, $sql);

    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $customer_name = $row['product_name'];
    }

    // If result matched $myusername and $mypassword, table row must be 1 row
    return $customer_name;
}
function get_cdr_districtr($db,$district)
{
    $customer_name=null;
    $sql = "SELECT district_name FROM `tbl_district2` where `district_id`='$district'";
    $result_set = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $customer_name = $row['district_name'];
    }

    // If result matched $myusername and $mypassword, table row must be 1 row
    return $customer_name;
}
function get_region_namepp($db,$region_id)
{
    $customer_name=null;
    $sql = "SELECT region_name FROM `tbl_region` where `region_id`='$region_id'";
    $result_set = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $customer_name = $row['region_name'];
    }

    // If result matched $myusername and $mypassword, table row must be 1 row
    return $customer_name;
}
function get_customer_name($db,$customer_id)
{
    
    $customer_name=null;
    $sql = "SELECT customer_name FROM `tbl_crips_customer` where `id`='$customer_id'";
    $result_set = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $customer_name = $row['customer_name'];
    }

    // If result matched $myusername and $mypassword, table row must be 1 row
    return $customer_name;
}
function get_customer_user_dist($db)
{
    $sales_id=$_SESSION['user_id'];
    $count=0;
    $sql = "SELECT * FROM `tbl_crips_customer` where `sales_id`='$sales_id'";
    $result_set = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result_set);

    // If result matched $myusername and $mypassword, table row must be 1 row
    return $count;
}
function get_customer_user_reg($db)
{
    $sales_id=$_SESSION['user_id'];
    $count=0;
    $sql = "SELECT * FROM `tbl_crips_order` where `sales_id`='$sales_id'";
    $result_set = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result_set);

    // If result matched $myusername and $mypassword, table row must be 1 row
    return $count;
}
function get_sales_name($db,$sales_id)
{
    $sql = "SELECT full_name from  tbl_credentials where `user_id`='$sales_id'";
    $result_set = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $districtname = $row['full_name'];
    }

    return $districtname;
}
function get_product_name($db,$rttp)
{
    $sql = "SELECT product_name from  tbl_crips_product where `id`='$rttp'";
    $result_set = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $districtname = $row['product_name'];
    }

    return $districtname;
}
function get_regionnamennn($db,$reg_id)
{
    $sql = "SELECT region_name from  tbl_region2 where `region_id`='$reg_id'";
    $result_set = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $districtname = $row['region_name'];
    }

    return $districtname;
}
function get_districtname($db,$district)
{
    $sql = "SELECT district_name from tbl_district where district_id='$district'";
    $result_set = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $districtname = $row['district_name'];
    }

    return $districtname;
}

function get_wardname($db,$ward)
{
    $sql = "SELECT ward_name from tbl_ward where ward_id ='$ward'";
    $result_set = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $ward_name = $row['ward_name'];
    }

    return $ward_name;
}

function get_heathcentername($db,$healthfacilityid)
{
    $sql = "SELECT facility_name from tbl_healthcenter where facility_id ='$healthfacilityid'";
    $result_set = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $facility_name = $row['facility_name'];
    }

    return $facility_name;
}

function get_regionname($db,$region_id)
{
    $sql = "SELECT regionname from tbl_region where r_id ='$region_id'";
    $result_set = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $regionname = $row['regionname'];
    }

    return $regionname;
}
function get_zone_name($zone_id,$db)
{
    $sql = "SELECT zone_name from tbl_zones where zone_id ='$zone_id'";
    $result_set = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $zone_name = $row['zone_name'];
    }

    return $zone_name;
}
function get_organization_name($organization_id,$db)
{
    $sql = "SELECT 	jina_shirika from tbl_members where meeting_id ='$organization_id'";
    $result_set = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $jina_shirika = $row['jina_shirika'];
    }

    return $jina_shirika;
}
function get_percent($db,$district,$numerator,$denominator)
{

    $total_numerator=get_valuespecific($db,$district,$numerator);
    $total_denominator=get_valuespecific($db,$district,$denominator);

    if($total_denominator!=0 && $total_numerator!=0)
    {
        $percent=number_format(($total_numerator/$total_denominator)*100,2);

        return $percent;
    }
    else
    {

        return 0;
    }

    
}
function breakStringAfterWords($string, $wordLimit = 5) {
  $words = explode(' ', $string);
  $chunks = array_chunk($words, $wordLimit);
  $lines = array_map(function($chunk) {
      return implode(' ', $chunk);
  }, $chunks);
  return implode("\n", $lines);
}
function get_list_event($db)
{
    $sql = "SELECT * FROM `tbl_event_date`";
    $result_set = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result_set);

    // If result matched $myusername and $mypassword, table row must be 1 row
    return $count;
}
function get_valuespecific($db,$district,$colum)
{
    $t_value=0;
    $sql = "SELECT ".$colum." as tsum from tbl_crsall where hcptype ='2' and district='$district'";
    $result_set = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result_set);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count >= 1) {
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {


        $t_value = $t_value + $row['tsum'];
    }
    }

    return $t_value;
}

function get_registered_zones($db)
{
    $data = array(
        array(
            "zone_id" => "All",
            "zone_name" => "All"
        ),
    );
    $query = "SELECT * FROM tbl_zones";
    $result_set = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $data[] = array(
            "zone_id"=>$row['zone_id'],
            "zone_name"=>$row['zone_name']
        );
    }  
    return $data;
}

function get_thematic_area($db)
{
    $data = array(
        array(
            "thematic_area_id" => "All",
            "thematic_area_name" => "All"
        ),
    );
    $query = "SELECT * FROM tbl_themantic_area";
    $result_set = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $data[] = array(
            "thematic_area_id"=>$row['themantic_id'],
            "thematic_area_name"=>$row['themantic_name']
        );
    }  
    return $data;
}

function get_member_details($db)
{
    $data = array();
    $query = "SELECT * FROM tbl_members";
    $result_set = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $data[] = array(
            "member_id"=>$row['meeting_id'],
            "member_name"=>$row['jina_shirika'],
            "region"=>$row['mkoa'],
            "zone"=>get_zone_name($row['zone_id'],$db),
            "joining_year"=>$row['joining_year'],
            "thematic_area"=>get_thematic_areamn($row['meeting_id'],$db)
        );
    }  
    return $data;
}

function get_thematic_are_member_id($db,$meeting_id)
{
    $data = array();
    $query = "SELECT * FROM tbl_mnthematicarea where member_id='$meeting_id'";
    $result_set = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $data[] = array(
            "thematic_area_id"=>$row['thematic_area_id'],
            "thematic_area"=>get_thematic_by_id($db,$row['thematic_area_id'])
        );
    }  
    return $data;
}

function get_thematic_by_id($db,$thematic_area_id)
{
    $query = "SELECT themantic_name FROM tbl_themantic_area where themantic_id='$thematic_area_id'";
    $result_set = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $data = $row['themantic_name'];
    }  
    return $data;
}

function get_member_details_zone_all($db,$thematic_area_id)
{
    $data = array();
    $query = "SELECT tbl_members.mkoa,tbl_members.zone_id,tbl_members.joining_year,tbl_members.website,tbl_members.meeting_id,tbl_members.jina_shirika,tbl_members.jina_mwombaji,tbl_members.barua_pepe,tbl_members.simu,tbl_mnthematicarea.thematic_area_id FROM tbl_members inner Join tbl_mnthematicarea ON tbl_members.meeting_id=tbl_mnthematicarea.member_id where tbl_mnthematicarea.thematic_area_id='$thematic_area_id'";
    $result_set = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $data[] = array(
            "member_id"=>$row['meeting_id'],
            "member_name"=>$row['jina_shirika'],
            "region"=>$row['mkoa'],
            "zone"=>get_zone_name($row['zone_id'],$db),
            "joining_year"=>$row['joining_year'],
            "thematic_area"=>get_thematic_areamn($row['meeting_id'],$db)
        );
    }  
    return $data;
}

function get_member_details_thematic_all($db,$zone_id)
{
    $data = array();
    $query = "SELECT tbl_members.mkoa,tbl_members.zone_id,tbl_members.joining_year,tbl_members.website,tbl_members.meeting_id,tbl_members.jina_shirika,tbl_members.jina_mwombaji,tbl_members.barua_pepe,tbl_members.simu FROM tbl_members where tbl_members.zone_id='$zone_id'";
    $result_set = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $data[] = array(
            "member_id"=>$row['meeting_id'],
            "member_name"=>$row['jina_shirika'],
            "region"=>$row['mkoa'],
            "zone"=>get_zone_name($row['zone_id'],$db),
            "joining_year"=>$row['joining_year'],
            "thematic_area"=>get_thematic_areamn($row['meeting_id'],$db)
        );
    }  
    return $data;
}

function get_member_details_not_all($db,$zone_id,$thematic_area_id)
{
    $data = array();
    $query = "SELECT tbl_members.mkoa,tbl_members.zone_id,tbl_members.joining_year,tbl_members.website,tbl_members.meeting_id,tbl_members.jina_shirika,tbl_members.jina_mwombaji,tbl_members.barua_pepe,tbl_members.simu,tbl_mnthematicarea.thematic_area_id FROM tbl_members inner Join tbl_mnthematicarea ON tbl_members.meeting_id=tbl_mnthematicarea.member_id where tbl_members.zone_id='$zone_id' AND tbl_mnthematicarea.thematic_area_id='$thematic_area_id'";
    $result_set = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $data[] = array(
            "member_id"=>$row['meeting_id'],
            "member_name"=>$row['jina_shirika'],
            "region"=>$row['mkoa'],
            "zone"=>get_zone_name($row['zone_id'],$db),
            "joining_year"=>$row['joining_year'],
            "thematic_area"=>get_thematic_areamn($row['meeting_id'],$db)
        );
    }  
    return $data;
}

function get_aboutus($db,$meeting_id)
{
    $query = "SELECT about_us FROM tbl_aboutusmn where member_id='$meeting_id'";
    $result_set = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $data = $row['about_us'];
    }  
    return $data;
}

function get_mission_vision($db,$type,$meeting_id)
{
    $data = array();
    $query = "SELECT mv_text FROM tbl_missionvision where member_id='$meeting_id' AND mv_type='$type'";
    $result_set = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $data[] = array(
            "$type"=>$row['mv_text']
        );
    }  
    return $data;
}

function get_publication_member_id($db,$meeting_id)
{
    $data = array();
    $query = "SELECT * FROM tbl_publication where member_id='$meeting_id' AND aproved='1' order by reg_date desc LIMIT 3";
    $result_set = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $data[] = array(
            "title"=>$row['doc_title'],
            "text"=>$row['doc_text'],
            "date_published"=>$row['reg_date'],
            "image_front"=>"https://thrdc.bluefindigital.co.tz/uploads/".$row['image_front']
        );
    }  
    return $data;
}

function get_reports_member_id($db,$meeting_id)
{
    $data = array();
    $query = "SELECT * FROM tbl_report where member_id='$meeting_id' order by date_recieved desc LIMIT 3";
    $result_set = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $data[] = array(
            "report_type"=>$row['type_ofreport'],
            "report_title"=>$row['file_name'],
            "date_published"=>$row['date_recieved'],
            "cover_image"=>"https://thrdc.bluefindigital.co.tz/uploads/".$row['cover_image'],
            "report_link"=>"https://thrdc.bluefindigital.co.tz/uploads/".$row['reportfile']
        );
    }  
    return $data;
}

function getpublications($db)
{
    $data = array();
    $query = "SELECT * FROM tbl_publication where aproved='1' order by reg_date desc";
    $result_set = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $data[] = array(
            "member_name"=>get_organization_name($row['member_id'],$db),
            "title"=>$row['doc_title'],
            "text"=>$row['doc_text'],
            "date_published"=>$row['reg_date'],
            "image_front"=>"https://thrdc.bluefindigital.co.tz/uploads/".$row['image_front']
        );
    }  
    return $data;
}

function getreports($db)
{
    $data = array();
    $query = "SELECT * FROM tbl_report order by date_recieved desc";
    $result_set = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $data[] = array(
            "member_name"=>get_organization_name($row['member_id'],$db),
            "report_type"=>$row['type_ofreport'],
            "report_title"=>$row['file_name'],
            "date_published"=>$row['date_recieved'],
            "cover_image"=>"https://thrdc.bluefindigital.co.tz/uploads/".$row['cover_image'],
            "report_link"=>"https://thrdc.bluefindigital.co.tz/uploads/".$row['reportfile']
        );
    }  
    return $data;
}

function get_thematic_areamn($meeting_id,$db)
{
    $thematic_area=null;
    $query = "SELECT * FROM tbl_mnthematicarea where member_id='$meeting_id'";
    $result_set = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        
        $thematic_area.=get_thematic_by_id($db,$row['thematic_area_id']).",\n";

    }  
    
    return $thematic_area;
}
function get_mn_publications($db)
{
    $count=null;
    $member_id=$_SESSION['mbember_id'];
    $query = "SELECT * FROM tbl_publication where member_id='$member_id'";
    $result_set = mysqli_query($db, $query);
    $count = mysqli_num_rows($result_set);
    return $count;
}

function get_mn_trainings($db)
{
    $count=null;
    $member_id=$_SESSION['mbember_id'];
    $query = "SELECT * FROM tbl_trainings where member_id='$member_id'";
    $result_set = mysqli_query($db, $query);
    $count = mysqli_num_rows($result_set);
    return $count;
}

function get_mn_reports($db)
{
    $count=null;
    $member_id=$_SESSION['mbember_id'];
    $query = "SELECT * FROM tbl_report where member_id='$member_id'";
    $result_set = mysqli_query($db, $query);
    $count = mysqli_num_rows($result_set);
    return $count;
}

function get_mn_fee_paid($db)
{
    $amount=null;
    $member_id=$_SESSION['mbember_id'];
    $query = "SELECT SUM(amount_paid) as total_paid FROM tbl_payment where member_id='$member_id'";
    $result_set = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result_set, MYSQLI_ASSOC);
    $amount = $row['total_paid'];
    return $amount;
}

function get_all_members_count($db)
{
    $count=null;
    $query = "SELECT * FROM tbl_members";
    $result_set = mysqli_query($db, $query);
    $count = mysqli_num_rows($result_set);
    return $count;
}
function get_zones_count($db)
{
    $count=null;
    $query = "SELECT * FROM tbl_zones";
    $result_set = mysqli_query($db, $query);
    $count = mysqli_num_rows($result_set);
    return $count;
}
function get_fee_year($db)
{
    $amount=null;
    $year=date('Y');
    $query = "SELECT SUM(amount_paid) as total_paid FROM tbl_payment where `year`='$year'";
    $result_set = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result_set, MYSQLI_ASSOC);
    $amount = $row['total_paid'];
    return $amount;
}
function get_leaders_count($db)
{
    $count=null;
    $query = "SELECT * FROM tbl_zone_leaders";
    $result_set = mysqli_query($db, $query);
    $count = mysqli_num_rows($result_set);
    return $count;
}
function get_users_count($db)
{
    $count=null;
    $query = "SELECT * FROM tbl_credentials";
    $result_set = mysqli_query($db, $query);
    $count = mysqli_num_rows($result_set);
    return $count;
}
function get_publications_count($db)
{
    $count=null;
    $query = "SELECT * FROM tbl_publication";
    $result_set = mysqli_query($db, $query);
    $count = mysqli_num_rows($result_set);
    return $count;
}
function get_materials_count($db)
{
    $count=null;
    $query = "SELECT * FROM tbl_thdrcdocuments";
    $result_set = mysqli_query($db, $query);
    $count = mysqli_num_rows($result_set);
    return $count;
}
function validate_uniqueid($uniqueid, $sender, $phonenumber,$sms,$db)
{
    //&& uniqueid='$uniqueid'
    date_default_timezone_set('Africa/Dar_es_Salaam');
    $d_date = date('Y-m-d');
    $query = "SELECT * FROM tbl_smsledger where (cast(sms_date as date)='$d_date') && textsent='$sms' && senderid='$sender' && phonenumber='$phonenumber'";
    //die($query);
    $result = mysqli_query($db,$query);
    $count = mysqli_num_rows($result); 
    
    //die($count);
    if ($count >= 1) {
        return FALSE;
    } else {
        return TRUE;
    }
}
function initiate_txn($account_id, $phone, $sender, $sms, $uniqueid,$db)
{
    date_default_timezone_set('Africa/Dar_es_Salaam');
    $d_date = date('Y-m-d H:i:s');
    $count_sms = strlen($sms);
    $mazima = floor($count_sms / 160);
    $modulus = $count_sms % 160;

    if ($modulus > 0) {
        $sms_count = $mazima + 1;
    }

    $sql = "INSERT INTO `tbl_smsledger`(`account_id`, `senderid`, `phonenumber`,`textsent`,`textcharacters`,`sms_status`,`sms_date`,`group_id`,`sms_stage`,`sms_counntused`,`uniqueid`)
               VALUES ('$account_id','$sender','$phone','$sms','$count_sms','initieted','$d_date','Single SMS','initieted','$sms_count','$uniqueid')";
   if(!mysqli_query($db, $sql))
   {
        die($sql);
   }
   
   /*echo $sql;
   echo "<br/>";*/
   
}
function get_sms_count($db,$status)
{
    $query = "SELECT * FROM tbl_smsledger where account_id='7695182' AND sms_status='$status'";
    $result = mysqli_query($db,$query);
    $count = mysqli_num_rows($result); 
    return $count;
}
function get_total_sms_count($db)
{
    $query = "SELECT * FROM tbl_smsledger where account_id='7695182'";
    $result = mysqli_query($db,$query);
    $count = mysqli_num_rows($result); 
    return $count;
}
function get_zone_count($db,$zone_id)
{
    $query = "SELECT * FROM tbl_members where zone_id='$zone_id'";
    $result = mysqli_query($db,$query);
    $count = mysqli_num_rows($result); 
    return $count;
}

function get_member_phone($generateinvoice,$db)
{
    $query = "SELECT * FROM tbl_members where meeting_id='$generateinvoice'";
    $result = mysqli_query($db,$query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $simu = $row['simu'];
    return $simu;
}
function get_program_r($db,$project_name)
{
    $query = "SELECT product_name FROM tbl_crips_product where `id`='$project_name'";
    $result = mysqli_query($db,$query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $simu = $row['product_name'];
    return $simu;
}
function get_admin_phone($user_id,$db)
{
    $query = "SELECT * FROM tbl_credentials where `user_id`='$user_id'";
    $result = mysqli_query($db,$query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $simu = $row['phone_numbe'];
    return $simu;
}
function get_what_issue($issue_p)
{
    if($issue_p=='1')
    {
        return "Feedback on abuse, harassment, exploitation, or violation of work ethics against the organization's project participant and stakeholder";
    }
    else
    {
        return "Feedback on project implementation ";
    }
}
function get_cdr_regionr($db,$region)
{
    $query = "SELECT region_name FROM tbl_region2 where region_id='$region'";
    $result = mysqli_query($db,$query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $simu = $row['region_name'];
    return $simu;
}
function get_member_name($id,$db)
{
    $query = "SELECT * FROM tbl_members where meeting_id='$id'";
    $result = mysqli_query($db,$query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $simu = $row['jina_shirika'];
    return $simu;
}
function get_total_entries_ad($db)
{
    
    $query = "SELECT * FROM tbl_registryinput";
    //die($query);
    $result = mysqli_query($db,$query);
    $count = mysqli_num_rows($result); 

    return $count;
}
function get_total_assigned_calls($db)
{
    $user_idd=$_SESSION['user_id'];
    $query = "SELECT * FROM tbl_registryinput where assigned_to='$user_idd' and (`status_r`='investigation' OR `status_r`='action')";
    //die($query);
    $result = mysqli_query($db,$query);
    $count = mysqli_num_rows($result); 

    return $count;
}
function validate_tp($training_id,$member_id,$db)
{
    //&& uniqueid='$uniqueid'
    date_default_timezone_set('Africa/Dar_es_Salaam');
    $d_date = date('Y-m-d');
    $query = "SELECT * FROM tbl_trainingpartcipants where training_id='$training_id' && member_id='$member_id'";
    //die($query);
    $result = mysqli_query($db,$query);
    $count = mysqli_num_rows($result); 
    
    //die($count);
    if ($count >= 1) {
        return FALSE;
    } else {
        return TRUE;
    }
}


function validate_mnv($insertmissionvision,$member_id,$db)
{
    date_default_timezone_set('Africa/Dar_es_Salaam');
    $d_date = date('Y-m-d');
    $query = "SELECT * FROM tbl_missionvision where member_id='$member_id' && mv_type='$insertmissionvision'";
    //die($query);
    $result = mysqli_query($db,$query);
    $count = mysqli_num_rows($result); 
    
    //die($count);
    if ($count >= 2) {
        return FALSE;
    } else {
        return TRUE;
    }
}

function validate_thematicmn($insertthematic,$member_id,$db)
{
    $query = "SELECT * FROM tbl_mnthematicarea where member_id='$member_id'";
    //die($query);
    $result = mysqli_query($db,$query);
    $count = mysqli_num_rows($result); 
    
    //die($count);
    if ($count >= 2) {
        return FALSE;
    } else {
        return TRUE;
    }
}

function validate_indroductionmn($db)
{
    $member_id=$_SESSION['mbember_id'];
    $query = "SELECT * FROM tbl_aboutusmn where member_id='$member_id'";
    //die($query);
    $result = mysqli_query($db,$query);
    $count = mysqli_num_rows($result); 
    
    //die($count);
    if ($count >= 1) {
        return FALSE;
    } else {
        return TRUE;
    }
}
function get_if_feedback($text)
{
    if (($text == 1 || $text == 2)) {
        
        if($text==1)
        {
            return "Yes";
        }
        elseif($text==2)
        {
            return "No";
        }
    }
    else
    {
        return $text;
    }
}
function get_project_name($text)
{
    if (($text == 1 || $text == 2 || $text == 3 || $text == 4 || $text == 5 || $text == 6)) {
        
        if($text==1)
        {
            return "ADG";
        }
        elseif($text==2)
        {
            return "STRONG";
        }
        elseif($text==3)
        {
            return "Charity water";
        }
        elseif($text==4)
        {
            return "ECD";
        }
        elseif($text==5)
        {
            return "SCP4 Malari";
        }
        elseif($text==6)
        {
            return "GHG";
        }
    }
    else
    {
        return $text;
    }
}
function get_swali_lipi($text)
{
    if (($text == 1 || $text == 2)) {
        
        if($text==1)
        {
            return "Feedback on abuse, harassment, exploitation, or violation of work ethics against the organization's project participant and stakeholder";
        }
        elseif($text==2)
        {
            return "Feedback on project implementation ";
        }
    }
    else
    {
        return $text;
    }
}
function get_region($text)
{
    if (($text == 1 || $text == 2 || $text == 3 || $text == 4)) {
        
        if($text==1)
        {
            return "Dar Es Salaam";
        }
        elseif($text==2)
        {
            return "Mbeya";
        }
        elseif($text==3)
        {
            return "Kigoma";
        }
        elseif($text==4)
        {
            return "Tabora";
        }
    }
    else
    {
        return $text;
    }
}
function get_cdr_region($text)
{
      if (($text == 4011 || $text == 4012 || $text == 4013 || $text == 4014  || $text == 4015)) {
        
        if($text==4011)
        {
            return "Dar Es Salaam";
        }
        elseif($text==4012)
        {
            return "Mbeya";
        }
        elseif($text==4013)
        {
            return "Kigoma";
        }
        elseif($text==4014)
        {
            return "Tabora";
        }
        elseif($text==4015)
        {
            return "OTHERS";
        }
    }
    else
    {
        return $text;
    }
}
function get_crd_swali_lipi($text)
{
    if (($text == 4021 || $text == 4022)) {
        
        if($text==4021)
        {
            return "Feedback on abuse, harassment, exploitation, or violation of work ethics against the organization's project participant and stakeholder";
        }
        elseif($text==4022)
        {
            return "Feedback on project implementation ";
        }
    }
    else
    {
        return $text;
    }
}
function get_cdr_program($text)
{
    if (($text == 4031 || $text == 4032 || $text == 4033 || $text == 4034 || $text == 4035 || $text == 4036)) {
        
        if($text==4031)
        {
            return "ADG";
        }
        elseif($text==4032)
        {
            return "STRONG";
        }
        elseif($text==4033)
        {
            return "Charity water";
        }
        elseif($text==4034)
        {
            return "ECD";
        }
        elseif($text==4035)
        {
            return "SCP4 Malari";
        }
        elseif($text==4036)
        {
            return "GHG";
        }
    }
    else
    {
        return $text;
    }
}
function get_crd_rejesho($text)
{
    if (($text == 4041 || $text == 4042 || $text == 5041 || $text == 5042)) {
        
        if($text==4041 || $text==5041)
        {
            return "Yes";
        }
        elseif($text==4042 || $text == 5042)
        {
            return "No";
        }
    }
    else
    {
        return $text;
    }
}
function get_challange()
{
try {
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://41.221.51.92:8089/api',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        curl_setopt($curl, CURLOPT_VERBOSE, true),
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "request": {
                "action": "challenge",
                "version": "1.0.25.9",
                "user": "cdruser"
            }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Cookie: HttpOnly; CookieName=CookieValue; TRACKID=eb08b509b72dbbb05fe02f0d98916950; session-identify=sid88710864-1722432494'
        ),
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0, // Disable host verification
    ));

    $response = curl_exec($curl);

    $data = json_decode($response, true);

    print_r($data);
// Extract the challenge value
    $challenge = $data['response']['challenge'];
    
    
    if (curl_errno($curl)) {
        throw new Exception('cURL error: ' . curl_error($curl));
    }

    curl_close($curl);

   

} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}
die();
}


function download_registry($db)
{
    $req= array(
        "api_key"=>"YTc4YWY3ZWVlZWViODU3YTY5ODUzNTA4ZGU3YzVhYzM1NTdjNjM1MWEyYzA1ODU1ZDhlqA12AjkP0qNTc4ZjU3N2QwMDVmMw=="
    );

    
    $kkt = json_encode($req,JSON_UNESCAPED_UNICODE); 
    //print_r($kkt);
    //die();
    
    $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://bluefinsolutions.co.tz/md/getcdr.php',
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
    curl_close($curl);
    $obj = json_decode($response);
    
    $office = $obj->{'complete_cdr'};


    foreach ($office as $obj) {
        // Access properties of each object
        $simu=$obj->phone_number;
        $mkoa=$obj->mkoa;
        $swalilipi=$obj->swali_lipi;
        $mradi=$obj->mradi;
        $mrejesho=$obj->mrejesho;
        $faili= $obj->filelocd ;
        $tarehe=$obj->reg_date;
        $uniqid=$obj->unid;

        if(validate_uniid($db,$uniqid))
        {
            $sql_insert="INSERT INTO `tbl_call_registry`(`phone_number`,  `mkoa`, `swali_lipi`, `mradi`, `mrejesho`, `filelocd`, `reg_date`,`uniqid`) 
            VALUES ('$simu','$mkoa','$swalilipi','$mradi','$mrejesho','$faili','$tarehe','$uniqid')";
            mysqli_query($db, $sql_insert);
        }

        
    }

    return $office;
}

function validate_uniid($db,$uniqid)
{
    $query = "SELECT * FROM tbl_call_registry where uniqid='$uniqid'";
    //die($query);
    $result = mysqli_query($db,$query);
    $count = mysqli_num_rows($result); 
    
    //die($count);
    if ($count >= 1) {
        return FALSE;
    } else {
        return TRUE;
    }
}