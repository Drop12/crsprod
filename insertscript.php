<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*include 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
*/
session_start();
if (!isset($_SESSION['userrole'])) {
    header("location: index.php");
    exit;
}
require_once 'functions.php';

$db = login();

//$dbsms = loginsms();


if (isset($_GET['insertquestionsqqqfn'])){

    $questionid=mysqli_real_escape_string($db, $_GET['insertquestionsqqqfn']);
    $project_id=mysqli_real_escape_string($db, $_GET['projectid']);
    $questionr=mysqli_real_escape_string($db, $_GET['questionr']);
    $question=mysqli_real_escape_string($db, $_GET['question']);
    $questiontype=mysqli_real_escape_string($db, $_GET['questiontype']);
    
    $section=get_section_id($db,$questionid);
    
    $sha1_hash = sha1($question);
    
    if($questiontype=="TEXT_INPUT")
    {
        $sql = "INSERT INTO `tbl_questions`(`project_id`,`section_id`,`question_type`,`question`,`inputName`,`reference`,`questionf_id`)
        VALUES ('$project_id','$section','$questiontype','$question','$sha1_hash','$questionr','$questionid')";
        if(mysqli_query($db, $sql))
        {
            $status="Question Added Successfully";
        }
        else
        {
            die($sql);
        }
    }
    elseif($questiontype=="DROPDOWN")
    {
        $sql = "INSERT INTO `tbl_questions`(`project_id`,`section_id`,`question_type`,`question`,`inputName`,`reference`,`questionf_id`)
        VALUES ('$project_id','$section','$questiontype','$question','$sha1_hash','$questionr','$questionid')";
        if(mysqli_query($db, $sql))
        {
            $answers = $_GET['answers'];
            $question_id=get_last_qn_id($db);
            
            foreach ($answers as $key => $answer) {
                $cleanAnswer = htmlspecialchars(trim($answer));
                
                $sql = "INSERT INTO `tbl_qmultiple`(`question_id`,`jibu`)
                VALUES ('$question_id','$cleanAnswer')";
                mysqli_query($db, $sql);
            }
            $status="Question Added Successfully";
            
        }
        else
        {
            die($sql);
        }
    }
    
    header("location:qffollowup?qnid_id=$questionid&&project_id=$project_id&&sstooop=$status");
    
}

if (isset($_GET['insertquestionsqqq'])){

    $insertquestionsqqq=mysqli_real_escape_string($db, $_GET['insertquestionsqqq']);
    $section=mysqli_real_escape_string($db, $_GET['section']);
    $question=mysqli_real_escape_string($db, $_GET['question']);
    $questiontype=mysqli_real_escape_string($db, $_GET['questiontype']);
    $followupqn=mysqli_real_escape_string($db, $_GET['followupqn']);
    
    $sha1_hash = sha1($question);
    
    if($questiontype=="TEXT_INPUT")
    {
        $sql = "INSERT INTO `tbl_questions`(`project_id`,`section_id`,`question_type`,`question`,`inputName`,`question_followup`)
        VALUES ('$insertquestionsqqq','$section','$questiontype','$question','$sha1_hash','$followupqn')";
        if(mysqli_query($db, $sql))
        {
            $status="Question Added Successfully";
        }
        else
        {
            die($sql);
        }
        
        header("location:projectq?reg_id=$insertquestionsqqq&&sstooop=$status");
    }
    elseif($questiontype=="DROPDOWN" AND $followupqn=="No")
    {
        $sql = "INSERT INTO `tbl_questions`(`project_id`,`section_id`,`question_type`,`question`,`inputName`,`question_followup`)
        VALUES ('$insertquestionsqqq','$section','$questiontype','$question','$sha1_hash','$followupqn')";
        if(mysqli_query($db, $sql))
        {
            $answers = $_GET['answers'];
            $question_id=get_last_qn_id($db);
            
            foreach ($answers as $key => $answer) {
                $cleanAnswer = htmlspecialchars(trim($answer));
                
                $sql = "INSERT INTO `tbl_qmultiple`(`question_id`,`jibu`)
                VALUES ('$question_id','$cleanAnswer')";
                mysqli_query($db, $sql);
            }
            $status="Question Added Successfully";
            
        }
        else
        {
            die($sql);
        }
        
        header("location:projectq?reg_id=$insertquestionsqqq&&sstooop=$status");
    }
    elseif($questiontype=="DROPDOWN" AND $followupqn=="Yes")
    {
        
        $sql = "INSERT INTO `tbl_questions`(`project_id`,`section_id`,`question_type`,`question`,`inputName`,`question_followup`)
        VALUES ('$insertquestionsqqq','$section','$questiontype','$question','$sha1_hash','$followupqn')";
        if(mysqli_query($db, $sql))
        {
            $answers = $_GET['answers'];
            $question_id=get_last_qn_id($db);
            
            foreach ($answers as $key => $answer) {
                $cleanAnswer = htmlspecialchars(trim($answer));
                
                $sql = "INSERT INTO `tbl_qmultiple`(`question_id`,`jibu`)
                VALUES ('$question_id','$cleanAnswer')";
                mysqli_query($db, $sql);
            }
            $status="Question Added Successfully";
            
        }
        else
        {
            die($sql);
        }
        
        header("location:qffollowup?qnid_id=$question_id&&project_id=$insertquestionsqqq&&sstooop=$status");
    }

    
}


if (isset($_GET['insertcallregistry'])){

    $insertdprojectbb=mysqli_real_escape_string($db, $_GET['insertcallregistry']);
    $fullname=mysqli_real_escape_string($db, $_GET['fullname']);
    $gender=mysqli_real_escape_string($db, $_GET['gender']);
    $region=mysqli_real_escape_string($db, $_GET['region']);
    $whatissue=mysqli_real_escape_string($db, $_GET['whatissue']);
    $project=mysqli_real_escape_string($db, $_GET['project']);
    $requirefeedback=mysqli_real_escape_string($db, $_GET['requirefeedback']);
    $priority=mysqli_real_escape_string($db, $_GET['priority']);
    $category=mysqli_real_escape_string($db, $_GET['category']);
    $district=mysqli_real_escape_string($db, $_GET['assignedto']);
    $wardvillage=mysqli_real_escape_string($db, $_GET['wardvillage']);
    $nmessage=mysqli_real_escape_string($db, $_GET['nmessage']);
    $phone_number=mysqli_real_escape_string($db, $_GET['phone_number']);
    $tbl_channel=mysqli_real_escape_string($db, $_GET['tbl_channel']);

    date_default_timezone_set('Africa/Dar_es_Salaam');

    // Get the current date and time
    $currentDateTime = date('Y-m-d H:i:s');

    $timestamp = time(); // Returns the current Unix timestamp

    // Convert the timestamp to a string
    $timestamp_str = (string)$timestamp;

    $sql = "INSERT INTO `tbl_registryinput`(`ticket_id`,`district`,`phone_number`,`requirefd`,`fk_entry`,`full_name`, `sex`, `region`, `issue_p`, `project_name`, `priority`, `category_r`, `ward_village`, `regdetails`, `status_r`, `tbl_channel`, `reg_date`) 
    VALUES ('$timestamp_str','$district','$phone_number','$requirefeedback','$insertdprojectbb','$fullname','$gender','$region','$whatissue','$project','$priority','$category','$wardvillage','$nmessage','assigned','$tbl_channel','$currentDateTime')";
    if(mysqli_query($db, $sql))
    {
        if($tbl_channel=="shortcode")
        {
            
            $update_short="UPDATE tbl_crs_input_new SET `is_proses`='1' where `id`='$insertdprojectbb'";
            mysqli_query($db,$update_short);
        }
        else
        {
            $update_registry="UPDATE tbl_call_registry SET `is_transcribed`='1' where `id`='$insertdprojectbb'";
            mysqli_query($db, $update_registry);
        }
        send_temail();
        $status="Data Added Successfully";
    }
    else
    {
        die($sql);
    }

    if( $tbl_channel=="shortcode")
    {
        header("location:shortocee?rstatus=$status");
    }
    else
    {
        header("location:callregi?rstatus=$status");
    }
    
}
if (isset($_GET['insertsectionsmn'])){

    $insertdprojectbb=mysqli_real_escape_string($db, $_GET['insertsectionsmn']);
    $sectionname=mysqli_real_escape_string($db, $_GET['insertsectioname']);

    $sql = "INSERT INTO `tbl_wsection`(`project_id`,`section_name`)
    VALUES ('$insertdprojectbb','$sectionname')";
    if(mysqli_query($db, $sql))
    {
        $status="Section Added Successfully";
    }
    else
    {
        die($sql);
    }

    header("location:projectq?reg_id=$insertdprojectbb");
}
if (isset($_GET['insertdprojectbb'])){

    $insertdprojectbb=mysqli_real_escape_string($db, $_GET['insertdprojectbb']);
    $regionid=mysqli_real_escape_string($db, $_GET['regionid']);

    $sql = "INSERT INTO `tbl_wproject`(`project_id`,`user_id`)
    VALUES ('$regionid','$insertdprojectbb')";
    if(mysqli_query($db, $sql))
    {
        $status="Project Added Successfully";
    }
    else
    {
        die($sql);
    }

    header("location:projectp?reg_id=$insertdprojectbb");
}
if (isset($_GET['productregistration'])){

    $productregistration=mysqli_real_escape_string($db, $_GET['productregistration']);

    $sql = "INSERT INTO `tbl_crips_product`(`product_name`)
    VALUES ('$productregistration')";
    if(mysqli_query($db, $sql))
    {
        $status="Project Registered Successfully";
    }
    else
    {
        die($sql);
    }

    header("location:projects?sstooop=$status");
}
if (isset($_GET['insertcredetials'])){

    $fullname=mysqli_real_escape_string($db, $_GET['insertcredetials']);
    $phonenumber=mysqli_real_escape_string($db, $_GET['phonenumber']);
    $idnumber=mysqli_real_escape_string($db, $_GET['idnumber']);
    $usertype=mysqli_real_escape_string($db, $_GET['usertype']);
    $password=sha1('@123456');

    $sql = "INSERT INTO `tbl_credentials`(`username`,`password`,`userrole`,`email`,`full_name`,`phone_number`)
    VALUES ('$idnumber','$password','$usertype','$idnumber','$fullname','$phonenumber')";
    //echo $sql;
    //die();
    if(mysqli_query($db, $sql))
    {
        $status="User Registered Successfully";
    }
    else
    {
        die($sql);
    }

    header("location:userprofiles?sstooop=$status");
}
if (isset($_GET['tawlamemberfullname'])){

    $tawlamemberfullname=mysqli_real_escape_string($db, $_GET['tawlamemberfullname']);
    $tawlamemberemail=mysqli_real_escape_string($db, $_GET['tawlamemberemail']);
    $tawlamemberphone=mysqli_real_escape_string($db, $_GET['tawlamemberphone']);
    $tawlamembercategory=mysqli_real_escape_string($db, $_GET['tawlamembercategory']);
    $tawlamemberyear=mysqli_real_escape_string($db, $_GET['tawlamemberyear']);
    $tawlamemberbox=mysqli_real_escape_string($db, $_GET['tawlamemberbox']);
    $tawlamemberregion=mysqli_real_escape_string($db, $_GET['tawlamemberregion']);
    $tawlamemberoffice=mysqli_real_escape_string($db, $_GET['tawlamemberoffice']);
    $tawlamemberstatus=mysqli_real_escape_string($db, $_GET['tawlamemberstatus']);

    $sql = "INSERT INTO `tbl_tawla_members`(`full_name`,`email`,`phone_number`,`category`,`entrance_year`,`pobox`,`location`,`current_office`,`status_m`)
    VALUES ('$tawlamemberfullname','$tawlamemberemail','$tawlamemberphone','$tawlamembercategory','$tawlamemberyear','$tawlamemberbox','$tawlamemberregion','$tawlamemberoffice','$tawlamemberstatus')";
    if(mysqli_query($db, $sql))
    {
        $status="Member Registered Successfully";
    }
    else
    {
        die($sql);
    }

    header("location:adminhome?insertmember=$status");
}
if(isset($_GET['tawlamemberid']))
{
    $tawlamemberid=mysqli_real_escape_string($db, $_GET['tawlamemberid']);
    $tawlamemberinvoicedate=mysqli_real_escape_string($db, $_GET['tawlamemberinvoicedate']);
    $tawlamemberyearfrom=mysqli_real_escape_string($db, $_GET['tawlamemberyearfrom']);
    $tawlamemberyearto=mysqli_real_escape_string($db, $_GET['tawlamemberyearto']);
    $tawlamemberamount=mysqli_real_escape_string($db, $_GET['tawlamemberamount']);

    $sql = "INSERT INTO `tbl_tawla_invoice`(`member_id`,`year_to`,`amount`,`year_from`,`invoice_date`)
    VALUES ('$tawlamemberid','$tawlamemberyearto','$tawlamemberamount','$tawlamemberyearfrom','$tawlamemberinvoicedate')";
    if(mysqli_query($db, $sql))
    {
        $status="Invoice Registered Successfully";
    }
    else
    {
        die($sql);
    }

    header("location:tawlaaddinvoice?psid=$tawlamemberid");
}

if(isset($_GET['tawlafeememberid']))
{
    $tawlafeememberid=mysqli_real_escape_string($db, $_GET['tawlafeememberid']);
    $tawlamemberfeeyear=mysqli_real_escape_string($db, $_GET['tawlamemberfeeyear']);
    $tawlamemberfeeamount=mysqli_real_escape_string($db, $_GET['tawlamemberfeeamount']);

    $sql = "INSERT INTO `tbl_tawla_fee`(`member_id`,`year`,`amount`)
    VALUES ('$tawlafeememberid','$tawlamemberfeeyear','$tawlamemberfeeamount')";
    if(mysqli_query($db, $sql))
    {
        $status="Fee Added Successfully";
    }
    else
    {
        die($sql);
    }

    header("location:tawlacollect?psid=$tawlafeememberid");
}
if(isset($_GET['insertscriptfllup']))
{
    $user_id= $_SESSION['user_id'];
    date_default_timezone_set('Africa/Dar_es_Salaam');

    // Get the current date and time
    $current_date_time = date('Y-m-d H:i:s');
    $insertscriptfllup=mysqli_real_escape_string($db, $_GET['insertscriptfllup']);
    $ftitle=mysqli_real_escape_string($db, $_GET['ftitle']);
    $nmessage=mysqli_real_escape_string($db, $_GET['nmessage']);

    $sql = "INSERT INTO `tbl_followup`(`rtitle`,`tdetails`,`call_id`,`reg_date`,`user_id`)
    VALUES ('$ftitle','$nmessage','$insertscriptfllup','$current_date_time','$user_id')";
    if(mysqli_query($db, $sql))
    {
        $update_sql="UPDATE tbl_registryinput SET `status_r`='$ftitle',`assigned_to`='$user_id' where `id`='$insertscriptfllup'";
        mysqli_query($db,$update_sql);
        $status="Details Added Successfully";
    }
    else
    {
        die($sql);
    }

    header("location:callregfile?recid=$insertscriptfllup");
}