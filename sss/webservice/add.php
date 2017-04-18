<?php

session_start();

$user_session=$_SESSION["user"];
$type=$_POST["type"];

$server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    
$TID  = $_POST["TID"];

$env=$_POST['env'];

$client= $_POST["client"];

$creator=$_POST['creator'];

$assigned_To=$_POST['assign'];


$release=$_POST['release'];

$project= $_POST["project"];

$uname= $_POST["uname"];

$aname= $_POST["aname"];

$utime= $_POST["utime"];

$status= $_POST["status"];

$resolver= $_POST["resolver"];

$schedule= $_POST["schedule"];

$reviewer= $_POST["reviewer"];


$discription= $_POST["discription"];

$comments= $_POST["comments"];
$comments=str_replace("'","''",$comments);
$cstatus= $_POST["cstatus"];

$ttime= $_POST["ttime"];

$tcategory= $_POST["tcategory"];

$AUI= $_POST["AUI"];
$aui_flag=0;
$attime=$_POST['attime'];

$cl_tkt=$_POST['client_tkt'];
$team=$_POST['cteam'];
$docf=0;
$errors= array();
      $file_name = $_FILES['dfile']['name'];
      $file_size =$_FILES['dfile']['size'];
      $file_tmp =$_FILES['dfile']['tmp_name'];
      $file_type=$_FILES['dfile']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['dfile']['name'])));
      
      $expensions= array("jpeg","jpg","png",'pdf','doc','xls','rar','zip');
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
        $the_path = '../repo/'.$TID;
$the_mode = '0777';
mkdir($the_path,$the_mode, true);
//echo $the_path."/".$file_name."<br/>";
$path=$the_path.'/'.$file_name;
         move_uploaded_file($file_tmp,$the_path."/".$file_name);

       //  echo "Success";
$sql_status="select * from repo where tid='$TID'";
    //$tab_status='';
$result=$conn->query($sql_status);
//echo $msg;
  while($row4=$result->fetch())
{
  $x=1;
}
if($x!=1)
{
  $sql="insert into repo values('$TID','$path')";
}
else{
  $sql="update repo set link='$path' where tid='$TID'";
}
$conn->query($sql);
      }else{
        // print_r($errors);
      }

//$sql="insert into Update_Tab values('$TID','$status','$utime','$uname','$schedule','$client','$project','$ttime','$reviewer','$resolver','','$tcategory')";

//echo $user_session;
//echo ($uname!=$user_session);//and($status=='Classify'));
if(($creator!=$user_session)and($status=='Classify'))
{
   //echo "i am step 1";
     echo "<script> alert('ticket is assigned to $creator');
     setTimeout(function(){window.close()}, 1000);
     </script>";
    
}
else 
{
    /* update assigncolumn in Main_table */


    //echo "i am step 2";
    //echo "<script> alert('insert');</script>";
if($status=='Classify')
{
$Master_sql="Update Master_Ticket_Tab set Assign_To='$user_session',Updatetime='$utime', Status='WIP',Client='$client',Project='$project',EnvType='$env',team='$team' where Ticket_ID='$TID'";
}
 else if(($status=='WIP') and ($AUI=='on') and ($cstatus!='next'))
    {
$fstatus='AUI';
$aui_flag=1;
        $fresolver=$user_session;
        
        $Master_sql="Update Master_Ticket_Tab set Assign_To='unassigned',Status='$fstatus',Resolver='$fresolver',Resolver_Dtime='$fdate',Updatetime='$utime' where Ticket_ID='$TID'";

   // $Master_sql="Update Master_Ticket_Tab set Assign_To='unassigned', Status='$fstatus',Updatetime='$utime' where Ticket_ID='$TID'";
    }
else if(($status=='WIP') and ($AUI!='on') and ($cstatus!='next' ))
    {
$fstatus='WIP';

//$aui_flag=1;
        //$fresolver=$user_session;
        $Master_sql="Update Master_Ticket_Tab set Assign_To='unassigned',Status='$fstatus',Resolver='$fresolver',Resolver_Dtime='$fdate',Updatetime='$utime' where Ticket_ID='$TID'";

   // $Master_sql="Update Master_Ticket_Tab set Assign_To='unassigned', Status='$fstatus',Updatetime='$utime' where Ticket_ID='$TID'";
    }

   /* else if(($assigned_To==$user_session) and ($status=='WIP') and ($release==0))
    {
        
         $Master_sql="Update Master_Ticket_Tab set Assign_To='$user_session',Status='WIP' where Ticket_ID='$TID'";
    }*/
else if(($status=='Review') and ($cstatus=="Closure"))
{
  $fstatus="Closure";
   $Master_sql="Update Master_Ticket_Tab set Assign_To='unassigned',Status='$fstatus',Updatetime='$utime' where Ticket_ID='$TID'";

}
else if($cstatus=='next')
{
    $sql_status="select Status,Resolver from Master_Ticket_Tab where Ticket_ID='$TID'";
    $tab_status='';
$result=$conn->query($sql_status);
//echo $msg;
  while($row4=$result->fetch())
{
    $tab_status=$row4['Status'];
    $Resolver=$row4['Resolver'];
}
if(($tab_status=='WIP') and $AUI!='on' )
{
    $fstatus='Review';
    date_default_timezone_set('Asia/Kolkata');
									//$date = date('Ymd H:i:s');
									$fdate = date('m-d-y H:i:s');
    $fresolver=$user_session;
    $freviewer=$user_session;

}
else if(($tab_status=='WIP') and $AUI=='on' )
{
$fstatus='AUI';
$aui_flag=1;
date_default_timezone_set('Asia/Kolkata');
									//$date = date('Ymd H:i:s');
									$fdate = date('m-d-y H:i:s');
$fresolver=$user_session;
}
else if(($tab_status=='AUI'))
{
$fstatus='Review';
//$aui_flag=1;
date_default_timezone_set('Asia/Kolkata');
									//$date = date('Ymd H:i:s');
									$fdate = date('m-d-y H:i:s');
//$fresolver=$user_session;
}
else if(($tab_status=='Review'))
{
    $fstatus='Doc';
    $docf=1;
}

else if($tab_status=='Doc')
{
    $fstatus='Closure';
    //echo $fstatus;
}
else if($tab_status=='Closure')
{
    $fstatus='Close';
    //echo $fstatus;
}

if(($fstatus!='') and ($fresolver!='')and ($docf==0))
{
$Master_sql="Update Master_Ticket_Tab set Assign_To='unassigned',Status='$fstatus',Resolver='$fresolver',Resolver_Dtime='$fdate',Updatetime='$utime' where Ticket_ID='$TID'";

}
else if(($fstatus!='') and ($docf==0))
{
$Master_sql="Update Master_Ticket_Tab set Assign_To='unassigned',Status='$fstatus',Updatetime='$utime' where Ticket_ID='$TID'";
//echo $Master_sql;
}
else if(($fstatus=='Doc') and ($docf==1))
{
  $Master_sql="Update Master_Ticket_Tab set Status='$fstatus',Updatetime='$utime',Assign_to='$Resolver' where Ticket_ID='$TID'";

}


   //$conn->query($Master_sql);

//$sql="insert into Update_Tab values('$TID','$fstatus','$utime','$uname','$schedule','$client','$project','$ttime','$reviewer','$resolver','','$tcategory')";

}
if($Master_sql) 
{
    //echo $Master_sql;
$conn->query($Master_sql);

}
$s="Update Master_Ticket_Tab set Updatetime='$utime' where Ticket_ID='$TID'";
$conn->query($s);
if($fstatus=='')
{
    $fstatus='Classify';
}
$update_table_sql="insert into Update_Tab values('$TID','$fstatus','$utime','$uname','$schedule','$client','$project','$ttime','$freviewer','$fresolver','','$tcategory','',$aui_flag,'$comments')";
//echo $update_table_sql;

$conn->query($update_table_sql);
$f2=1;
$tsql="select TimeTaken from Update_Tab where TicketId='$TID'";
$result=$conn->query($tsql);
while($row1=$result->fetch())
{
  $total=$total+$row1['TimeTaken'];
  }
 $s="Update Master_Ticket_Tab set Total_time=$total where Ticket_ID='$TID'";
 
$conn->query($s);
if($attime!='')
{
    $s="Update Master_Ticket_Tab set Total_client_time=$attime where Ticket_ID='$TID'";
 
$conn->query($s);
}

}
if($f2==1)
{
    /*###############################################################################################################*/
/*----------------------------------------------------------------------------------------------------*/

$sql="select * from User_prof where Team='SSS' or Team='All'";
     $result1=$conn->query($sql);



  while($row2=$result1->fetch())

{



	//$resolver=explode("@", $row2['Email']);
  $resolver=$row2['sessionId'];
	$r=$row2['sessionId']."@continuserve.com";

$sql3="select count(*) as ccount from dbo.Master_Ticket_Tab where (Creator like '".$resolver."' and Status='Classify')";
//echo $sql3;

     $result=$conn->query($sql3);
//echo $msg;
  while($row3=$result->fetch())
{
	if($row3['ccount']!=0)
	{
	$sql="update Status_count set Classify=".$row3['ccount']." where Email like '%".$r."%' and Team='SSS'";
	//echo $resolver[0].",Classify: $row3['ccount']";
	//echo $sql;
	
	//=$resolver[0].",Classify: $classify,wip:$wip,aui:$auc";

	}
  else{
    $sql="update Status_count set Classify=0 where Email like '%".$r."%' and Team='SSS'";
  }
  $conn->query($sql);
	//$rows[]=$row3;


}

/*-----------------------------------------------------*/
$sql3="select count(*) as ccount from dbo.Master_Ticket_Tab where Assign_to like '".$resolver."' and Status='WIP' and team='SSS'";
//echo $sql3;

     $result=$conn->query($sql3);
//echo $msg;
  while($row3=$result->fetch())
{
	if($row3['ccount']!=0)
	{
	$sql="update Status_count set Wip=".$row3['ccount']." where Email like '%".$r."%' and Team='SSS'";
	//echo $resolver[0].",Classify: $row3['ccount']";
	//echo $sql;
	
	//=$resolver[0].",Classify: $classify,wip:$wip,aui:$auc";

	}
  else{
    $sql="update Status_count set Wip=0 where Email like '%".$r."%' and Team='SSS'";
  }
  $conn->query($sql);
	//$rows[]=$row3;


}
/*-----------------------------------------------------*/
$sql3="select count(*) as ccount from dbo.Master_Ticket_Tab where Assign_to like '".$resolver."' and Status='Review' and team='SSS'";
//echo $sql3;

     $result=$conn->query($sql3);
//echo $msg;
  while($row3=$result->fetch())
{
	if($row3['ccount']!=0)
	{
	$sql="update Status_count set Review=".$row3['ccount']." where Email like '%".$r."%' and Team='SSS'";
	//echo $resolver[0].",Classify: $row3['ccount']";
	//echo $sql;
	
	//=$resolver[0].",Classify: $classify,wip:$wip,aui:$auc";

	}
  else{
    $sql="update Status_count set Review=0 where Email like '%".$r."%' and Team='SSS'";
  }
  $conn->query($sql);
	//$rows[]=$row3;


}

/*-----------------------------------------------------*/
$sql3="select count(*) as ccount from dbo.Master_Ticket_Tab where Assign_to like '".$resolver."' and Status='AUI' and team='SSS'";
//echo $sql3;

     $result=$conn->query($sql3);
//echo $msg;
  while($row3=$result->fetch())
{
	if($row3['ccount']!=0)
	{
	$sql="update Status_count set Aui=".$row3['ccount']." where Email like '%".$r."%' and Team='SSS'";
	//echo $resolver[0].",Classify: $row3['ccount']";
	//echo $sql;
	
	//=$resolver[0].",Classify: $classify,wip:$wip,aui:$auc";

	}
  else{
    $sql="update Status_count set Aui=0 where Email like '%".$r."%' and Team='SSS'";
  }
  $conn->query($sql);
	//$rows[]=$row3;


}


$sql3="select count(*) as ccount from dbo.Master_Ticket_Tab where Assign_to like '".$resolver."' and Status='Doc' and team='SSS'";
//echo $sql3;

     $result=$conn->query($sql3);
//echo $msg;
  while($row3=$result->fetch())
{
	if($row3['ccount']!=0)
	{
	$sql="update Status_count set Doc=".$row3['ccount']." where Email like '%".$r."%' and Team='SSS'";
	//echo $resolver[0].",Classify: $row3['ccount']";
	//echo $sql;
	
	//=$resolver[0].",Classify: $classify,wip:$wip,aui:$auc";

	}
  else{
    $sql="update Status_count set Doc=0 where Email like '%".$r."%' and Team='SSS'";
  }
  $conn->query($sql);
	//$rows[]=$row3;


}
$sql3="select count(*) as ccount from dbo.Master_Ticket_Tab where Assign_to like '".$resolver."' and Status='Closure' and team='SSS'";
//echo $sql3;

     $result=$conn->query($sql3);
//echo $msg;
  while($row3=$result->fetch())
{
	if($row3['ccount']!=0)
	{
	$sql="update Status_count set Closure=".$row3['ccount']." where Email like '%".$r."%' and Team='SSS'";
	//echo $resolver[0].",Classify: $row3['ccount']";
	//echo $sql;
	
	//=$resolver[0].",Classify: $classify,wip:$wip,aui:$auc";

	}
  else{
    $sql="update Status_count set Closure=0 where Email like '%".$r."%' and Team='SSS'";
  }
  $conn->query($sql);
	//$rows[]=$row3;


}



}

if($cl_tkt!=null)
{
  $sql="update Master_Ticket_tab set Cticket='$cl_tkt' where Ticket_ID='$TID'";
 $conn->query($sql);
}




    /*----------------------------------------------------------------------------------------*/
echo "<script> alert('Updated successfully');
     setTimeout(function(){window.close()}, 1000);
     </script>";
}
else
{
    echo "<script> alert('Updation failed');
     setTimeout(function(){window.close()}, 1000);
     </script>";
}
?>