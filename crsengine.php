<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id=$_GET['id'];
$serviceNumber=$_GET['serviceNumber'];
$text=$_GET['text'];
$msisdn=$_GET['msisdn'];
$date=$_GET['date'];

require_once 'mdfunction.php';
$db=login();

//$smd=loginsms();

$destination = "rtlogs/crsshortcode" . date('Y-m-d') . ".log";
error_log("\n" . get_time() . " id :\n $id ", 3, $destination);
error_log("\n" . get_time() . " serviceNumber :\n $serviceNumber ", 3, $destination);
error_log("\n" . get_time() . " text :\n $text ", 3, $destination);
error_log("\n" . get_time() . " msisdn :\n $msisdn ", 3, $destination);
error_log("\n" . get_time() . " date :\n $date ", 3, $destination);

if(validate_short_care($db,$msisdn))
{
    $stage_id=get_stageid_care($db,$msisdn);
    if($stage_id=="1")
    {
        $pattern = '/^[0-2]*$/';
        if (($text == 1 || $text == 2) && preg_match($pattern, $text))
        {
            if($text==1)
            {
                
                update_session($db,$msisdn,"2");
                insert_inputt_care($db,$msisdn,$stage_id,$text);
                insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,'2',$msisdn));
            }
            else if($text=2)
            {
                update_session($db,$msisdn,"11");
                insert_inputt_care($db,$msisdn,$stage_id,$text);
                insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,'11',$msisdn));
            }
        }
        else
        {
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,$stage_id,$msisdn));
        }
    }
    elseif ($stage_id==11)
    {
        $pattern = '/^[0-5]*$/';
        if (($text == 1 || $text == 2 || $text == 3 || $text == 4 || $text == 5) && preg_match($pattern, $text))
        {
            if($text==1)
            {
                update_update_mkoa($db,$text,$msisdn,$stage_id);
                update_session($db,$msisdn,"12");
                insert_outgoingsms_care($db,$msisdn,$date,get_menu_mkoawilayaeng("1"));
            }
            else if($text==2)
            {
                update_update_mkoa($db,$text,$msisdn,$stage_id);
                update_session($db,$msisdn,"12");
                insert_outgoingsms_care($db,$msisdn,$date,get_menu_mkoawilayaeng("2"));
            }
            else if($text==3)
            {
                update_update_mkoa($db,$text,$msisdn,$stage_id);
                update_session($db,$msisdn,"12");
                insert_outgoingsms_care($db,$msisdn,$date,get_menu_mkoawilayaeng("3"));
            }
            else if($text==4)
            {
                update_update_mkoa($db,$text,$msisdn,$stage_id);
                update_session($db,$msisdn,"12");
                insert_outgoingsms_care($db,$msisdn,$date,get_menu_mkoawilayaeng("4"));
            }
            else if($text==5)
            {
                update_update_mkoa($db,$text,$msisdn,$stage_id);
                update_session($db,$msisdn,"24");
                insert_outgoingsms_care($db,$msisdn,$date,get_menu_mkoawilayaeng("5"));
            }
        }
        else
        {
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,$stage_id,$msisdn));
        }
    }
    elseif ($stage_id==2)
    {
        $pattern = '/^[0-5]*$/';
        if (($text == 1 || $text == 2 || $text == 3 || $text == 4 || $text == 5) && preg_match($pattern, $text))
        {
            if($text==1)
            {
                update_update_mkoa($db,$text,$msisdn,$stage_id);
                update_session($db,$msisdn,"3");
                insert_outgoingsms_care($db,$msisdn,$date,get_menu_mkoawilaya("1"));
            }
            else if($text==2)
            {
                update_update_mkoa($db,$text,$msisdn,$stage_id);
                update_session($db,$msisdn,"3");
                insert_outgoingsms_care($db,$msisdn,$date,get_menu_mkoawilaya("2"));
            }
            else if($text==3)
            {
                update_update_mkoa($db,$text,$msisdn,$stage_id);
                update_session($db,$msisdn,"3");
                insert_outgoingsms_care($db,$msisdn,$date,get_menu_mkoawilaya("3"));
            }
            else if($text==4)
            {
                update_update_mkoa($db,$text,$msisdn,$stage_id);
                update_session($db,$msisdn,"3");
                insert_outgoingsms_care($db,$msisdn,$date,get_menu_mkoawilaya("4"));
            }
            else if($text==5)
            {
                //update_update_mkoa($db,$text,$msisdn,$stage_id);
                update_session($db,$msisdn,"23");
                insert_outgoingsms_care($db,$msisdn,$date,get_menu_mkoawilaya("5"));
            }
        }
        else
        {
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,$stage_id,$msisdn));
        }
    }
    else if ($stage_id==24)
    {
        if($text !='')
        {
            update_update_mkoa($db,$text,$msisdn,$stage_id);
            update_session($db,$msisdn,"12");
            insert_outgoingsms_care($db,$msisdn,$date,"Enter the district where you are located");
        }
        else
        {
            insert_outgoingsms_care($db,$msisdn,$date,get_menu_mkoawilayaeng("5"));
        }
    }
    else if ($stage_id==23)
    {
        if($text !='')
        {
            update_update_mkoa($db,$text,$msisdn,$stage_id);
            update_session($db,$msisdn,"3");
            insert_outgoingsms_care($db,$msisdn,$date,"Andika wilaya unaopatikana");
        }
        else
        {
            insert_outgoingsms_care($db,$msisdn,$date,get_menu_mkoawilaya("5"));
        }
    }
    else if ($stage_id==12)
    {
        if($text !='')
        {
            $mkoaid=get_mkoa_id($db,$msisdn);
            
            if($mkoaid==1)
            {
                if (($text == 1 || $text == 2 || $text == 3 || $text == 4 || $text == 5))
                {
                    update_session($db,$msisdn,"13");
                    insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,"13",$msisdn));
                }
                else
                {
                    insert_outgoingsms_care($db,$msisdn,$date,get_menu_mkoawilayaeng("1"));
                }
            }
            else if($mkoaid==2)
            {
                if (($text == 1 || $text == 2 || $text == 3 || $text == 4 || $text == 5 || $text == 6))
                {
                    update_session($db,$msisdn,"13");
                    insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,"13",$msisdn));
                }
                else
                {
                    insert_outgoingsms_care($db,$msisdn,$date,get_menu_mkoawilayaeng("2"));
                }
            }
            else if($mkoaid==3)
            {
                if (($text == 1 || $text == 2 || $text == 3 || $text == 4 || $text == 5 || $text == 6  || $text == 7))
                {
                    update_session($db,$msisdn,"13");
                    insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,"13",$msisdn));
                }
                else
                {
                    insert_outgoingsms_care($db,$msisdn,$date,get_menu_mkoawilayaeng("3"));
                }
            }
            else if($mkoaid==4)
            {
                if (($text == 1 || $text == 2 || $text == 3 || $text == 4 || $text == 5  || $text == 6  || $text == 7))
                {
                    update_session($db,$msisdn,"13");
                    insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,"13",$msisdn));
                }
                else
                {
                    insert_outgoingsms_care($db,$msisdn,$date,get_menu_mkoawilayaeng("4"));
                }
            }
            else 
            {
                if ($text !='')
                {
                    update_session($db,$msisdn,"13");
                    insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,"13",$msisdn));
                    
                }
                else
                {
                    insert_outgoingsms_care($db,$msisdn,$date,"Enter the district where you are located");
                }
            }
            update_update_mkoa_wilaya($db,$text,$msisdn,$stage_id);
        }
        else
        {
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,$stage_id,$msisdn));
        }
    }
    else if ($stage_id==3)
    {
        if($text !='')
        {
            $mkoaid=get_mkoa_id($db,$msisdn);
            
            if($mkoaid==1)
            {
                if (($text == 1 || $text == 2 || $text == 3 || $text == 4 || $text == 5))
                {
                    update_session($db,$msisdn,"4");
                    insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,"4",$msisdn));
                }
                else
                {
                    insert_outgoingsms_care($db,$msisdn,$date,get_menu_mkoawilaya("1"));
                }
            }
            else if($mkoaid==2)
            {
                if (($text == 1 || $text == 2 || $text == 3 || $text == 4 || $text == 5 || $text == 6))
                {
                    update_session($db,$msisdn,"4");
                    insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,"4",$msisdn));
                }
                else
                {
                    insert_outgoingsms_care($db,$msisdn,$date,get_menu_mkoawilaya("2"));
                }
            }
            else if($mkoaid==3)
            {
                if (($text == 1 || $text == 2 || $text == 3 || $text == 4 || $text == 5 || $text == 6  || $text == 7))
                {
                    update_session($db,$msisdn,"4");
                    insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,"4",$msisdn));
                }
                else
                {
                    insert_outgoingsms_care($db,$msisdn,$date,get_menu_mkoawilaya("3"));
                }
            }
            else if($mkoaid==4)
            {
                if (($text == 1 || $text == 2 || $text == 3 || $text == 4 || $text == 5  || $text == 6  || $text == 7))
                {
                    update_session($db,$msisdn,"4");
                    insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,"4",$msisdn));
                }
                else
                {
                    insert_outgoingsms_care($db,$msisdn,$date,get_menu_mkoawilaya("4"));
                }
            }
            else
            {
                if ($text !='')
                {
                    update_session($db,$msisdn,"4");
                    insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,"4",$msisdn));
                    
                }
                else
                {
                    insert_outgoingsms_care($db,$msisdn,$date,"Andika wilaya unaopatikana");
                }
            }
            update_update_mkoa_wilaya($db,$text,$msisdn,$stage_id);
        }
        else
        {
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,$stage_id,$msisdn));
        }
    }
    else if($stage_id==13)
    {
        if ($text !='')
        {
            
            update_session($db,$msisdn,"14");
            update_update_kata($db,$msisdn,$stage_id,$text);
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,'14',$msisdn));
        }
        else
        {
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,$stage_id,$msisdn));
        }
    }
    else if($stage_id==4)
    {
        if ($text !='')
        {
            
            update_session($db,$msisdn,"5");
            update_update_kata($db,$msisdn,$stage_id,$text);
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,'5',$msisdn));
        }
        else
        {
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,$stage_id,$msisdn));
        }
    }
    else if($stage_id==14)
    {
        $pattern = '/^[0-2]*$/';
        if (($text == 1 || $text == 2) && preg_match($pattern, $text))
        {
            if($text==1)
            {
                update_session($db,$msisdn,"16");
                update_update_swala_lipi($db,$msisdn,$stage_id,$text);
                insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,'16',$msisdn));
            }
            else if($text==2)
            {
                update_session($db,$msisdn,"15");
                update_update_swala_lipi($db,$msisdn,$stage_id,$text);
                insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,'15',$msisdn));
            }
        }
        else
        {
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,$stage_id,$msisdn));
        }
    }
    else if($stage_id==5)
    {
        $pattern = '/^[0-2]*$/';
        if (($text == 1 || $text == 2) && preg_match($pattern, $text))
        {
            if($text==1)
            {
                update_session($db,$msisdn,"7");
                update_update_swala_lipi($db,$msisdn,$stage_id,$text);
                insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,'7',$msisdn));
            }
            else if($text==2)
            {
                update_session($db,$msisdn,"6");
                update_update_swala_lipi($db,$msisdn,$stage_id,$text);
                insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,'6',$msisdn));
            }
        }
        else
        {
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,$stage_id,$msisdn));
        }
    }
    else if($stage_id==15)
    {
        $pattern = '/^[0-7]*$/';
        if (($text == 1 || $text == 2 || $text == 3 || $text == 4 || $text == 5 || $text == 6) && preg_match($pattern, $text))
        {
            update_session($db,$msisdn,"16");
            update_update_mradi($db,$msisdn,$stage_id,$text);
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,'16',$msisdn));
        }
        else if($text==7)
        { 
            update_session($db,$msisdn,"26");
            //update_update_mradi($db,$msisdn,$stage_id,$text);
            insert_outgoingsms_care($db,$msisdn,$date,"Enter the name of the project or issue that is not listed");
        }
        else
        {
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,$stage_id,$msisdn));
        }
    }
    else if($stage_id==26)
    {
        if ($text !='')
        {
            update_session($db,$msisdn,"16");
           update_update_mradi($db,$msisdn,$stage_id,$text);
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,'16',$msisdn));
        }
        else
        {
            insert_outgoingsms_care($db,$msisdn,$date,"Enter the name of the project or issue that is not listed");
        }
    }
    else if($stage_id==6)
    {
        $pattern = '/^[0-7]*$/';
        if (($text == 1 || $text == 2 || $text == 3 || $text == 4 || $text == 5 || $text == 6 || $text == 7) && preg_match($pattern, $text))
        {
            update_session($db,$msisdn,"7");
            update_update_mradi($db,$msisdn,$stage_id,$text);
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,'7',$msisdn));
        }
        else if($text==8)
        { 
            update_session($db,$msisdn,"25");
            //update_update_mradi($db,$msisdn,$stage_id,$text);
            insert_outgoingsms_care($db,$msisdn,$date,"Ingiza jina la mradi au suala ambalo halijaorodheshwa");
        }
        else
        {
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,$stage_id,$msisdn));
        }
    }
    else if($stage_id==25)
    {
        if ($text !='')
        {
            
            update_session($db,$msisdn,"7");
            update_update_mradi($db,$msisdn,$stage_id,$text);
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,'7',$msisdn));
        }
        else
        {
            insert_outgoingsms_care($db,$msisdn,$date,"Ingiza jina la mradi au suala ambalo halijaorodheshwa");
        }
    }
    else if($stage_id==16)
    {
        if ($text !='')
        {
            
            update_session($db,$msisdn,"17");
            update_update_maelezo($db,$msisdn,$stage_id,$text);
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,'17',$msisdn));
        }
        else
        {
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,$stage_id,$msisdn));
        }
    }
    else if($stage_id==7)
    {
        if ($text !='')
        {
            
            update_session($db,$msisdn,"8");
            update_update_maelezo($db,$msisdn,$stage_id,$text);
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,'8',$msisdn));
        }
        else
        {
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,$stage_id,$msisdn));
        }
    }
    else if($stage_id==17)
    {
        $pattern = '/^[0-2]*$/';
        if (($text == 1 || $text == 2) && preg_match($pattern, $text))
        {
             if($text==1)
            {
                update_session($db,$msisdn,"18");
                update_update_mrejesho($db,$msisdn,$stage_id,$text);
                insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,'18',$msisdn));
            }
            else if($text==2)
            {
                update_session($db,$msisdn,"19");
                update_update_mrejesho($db,$msisdn,$stage_id,$text);
                insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,'19',$msisdn));
            }
        }
        else
        {
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,$stage_id,$msisdn));
        }
    }
    else if($stage_id==8)
    {
        $pattern = '/^[0-2]*$/';
        if (($text == 1 || $text == 2) && preg_match($pattern, $text))
        {
             if($text==1)
            {
                update_session($db,$msisdn,"9");
                update_update_mrejesho($db,$msisdn,$stage_id,$text);
                insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,'9',$msisdn));
            }
            else if($text==2)
            {
                update_session($db,$msisdn,"10");
                update_update_mrejesho($db,$msisdn,$stage_id,$text);
                insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,'10',$msisdn));
            }
        }
        else
        {
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,$stage_id,$msisdn));
        }
    }
    else if($stage_id==18)
    {
        if (($text !=''))
        {
            update_session($db,$msisdn,"19");
            update_update_simu_namba($db,$msisdn,$stage_id,$text);
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,'19',$msisdn));
        }
        else
        {
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,$stage_id,$msisdn));
        }
    }
    else if($stage_id==19)
    {
        if (($text !=''))
        {
            if($text=='CRS' || $text=='Crs' || $text=='crs')
            {
                insert_session_care($db,$msisdn,"1");
                insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,"1",$msisdn));
            }
            else
            {
                insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,"19",$msisdn));
            }
        }
        else
        {
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,$stage_id,$msisdn));
        }
    }
    else if($stage_id==9)
    {
        if (($text !=''))
        {
            update_session($db,$msisdn,"10");
            update_update_simu_namba($db,$msisdn,$stage_id,$text);
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,'10',$msisdn));
        }
        else
        {
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,$stage_id,$msisdn));
        }
    }
    else if($stage_id==10)
    {
        if (($text !=''))
        {
            if($text=='CRS' || $text=='Crs' || $text=='crs')
            {
                insert_session_care($db,$msisdn,"1");
                insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,"1",$msisdn));
            }
            else
            {
                insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,"10",$msisdn));
            }
        }
        else
        {
            insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,$stage_id,$msisdn));
        }
    }
}
else
{
    insert_session_care($db,$msisdn,"1");
    insert_outgoingsms_care($db,$msisdn,$date,get_menu($db,"1",$msisdn));
}

//echo '';

$destination2 = "rtlogs/crsshortcode" . date('Y-m-d') . ".log";
$sql1 = "SELECT * from `tbl_care_outgoingsms`  where `is_sent`='0' and `msisdn`='$msisdn' order by `reg_date` ASC LIMIT 1";
$result_set = mysqli_query($db, $sql1);
$count = mysqli_num_rows($result_set);
if ($count > 0) {
    while ($row = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $sms_is=$row['sms_id'];
        $msisdn = $row['msisdn'];
        $sms = $row['sms'];
        send_outgoing($sms_is, $msisdn, $sms, $db,$destination2);

        update_ot($db,$sms_is);
        //echo $sms;
    }
}

echo '';
