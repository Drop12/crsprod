<?php
function login()
{
    /*Database credentials. Assuming you are running MySQL
    server with default setting (user 'root' with no password)*/
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'pass12344');
    define('DB_NAME', 'crs20204');

    /*Attempt to connect to MySQL database*/
    $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    //Check connection
    if ($db === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    return $db;
}
function get_entry_id($db,$src)
{
    $sql = "SELECT `id` from tbl_call_registry where `phone_number`='$src' order by reg_date desc LIMIT 1";
    $result_set = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $total_count = $row['id'];
    }

    return $total_count;
}
function get_dst_en($dst)
{
    if($dst=="5002")
    {
        return "4002";
    }
    else
    {
        return "4001";
    }
}
function get_dst_region($dst)
{
    if($dst=="4011" || $dst=="5011")
    {
        return "4011";
    }
    elseif($dst=="4012" || $dst=="5012")
    {
        return "4012";
    }
    elseif($dst=="4013" || $dst=="5013")
    {
        return "4013";
    }
    elseif($dst=="4014" || $dst=="5014")
    {
        return "4014";
    }
    elseif($dst=="4015" || $dst=="5015")
    {
        return "4015";
    }
    elseif($dst=="4016" || $dst=="5016")
    {
        return "4016";
    }
}
function get_dst_programt($dst)
{
    if($dst=="4031" || $dst=="5031")
    {
        return "4031";
    }
    elseif($dst=="4032" || $dst=="5032")
    {
        return "4032";
    }
    elseif($dst=="4033" || $dst=="5033")
    {
        return "4033";
    }
    elseif($dst=="4034" || $dst=="5034")
    {
        return "4034";
    }
    elseif($dst=="4035" || $dst=="5035")
    {
        return "4035";
    }
    elseif($dst=="4036" || $dst=="5036")
    {
        return "4036";
    } 
}
function get_dst_category($dst)
{
     if($dst=="4021" || $dst=="5021")
    {
        return "4021";
    }
    elseif($dst=="4022" || $dst=="5022")
    {
        return "4022";
    }
   
}
function get_dst_followup($dst)
{
    if($dst=="4041" || $dst=="5041")
    {
        return "4041";
    }
    elseif($dst=="4042" || $dst=="5042")
    {
        return "4042";
    }
}