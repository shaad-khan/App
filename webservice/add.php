<?php

session_start();

$user_session=$_SESSION["user"];
$type=$_GET["type"];

$server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    
$TID  = $_GET["TID"];

$env=$_GET['env'];

$client= $_GET["client"];

$creator=$_GET['creator'];

$assigned_To=$_GET['assign'];


$release=$_GET['release'];

$project= $_GET["project"];

$uname= $_GET["uname"];

$aname= $_GET["aname"];

$utime= $_GET["utime"];

$status= $_GET["status"];

$resolver= $_GET["resolver"];

$schedule= $_GET["schedule"];

$reviewer= $_GET["reviewer"];


$discription= $_GET["discription"];

$comments= $_GET["comments"];

$cstatus= $_GET["cstatus"];

$ttime= $_GET["ttime"];

$tcategory= $_GET["tcategory"];

$AUI= $_GET["AUI"];
$aui_flag=0;
$attime=$_GET['attime'];

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
$Master_sql="Update Master_Ticket_Tab set Assign_To='$user_session',Updatetime='$utime', Status='WIP',Client='$client',Project='$project',EnvType='$env' where Ticket_ID='$TID'";
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

else if($cstatus=='next')
{
    $sql_status="select Status from Master_Ticket_Tab where Ticket_ID='$TID'";
    $tab_status='';
$result=$conn->query($sql_status);
//echo $msg;
  while($row4=$result->fetch())
{
    $tab_status=$row4['Status'];
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

if(($fstatus!='') and ($fresolver!=''))
{
$Master_sql="Update Master_Ticket_Tab set Assign_To='unassigned',Status='$fstatus',Resolver='$fresolver',Resolver_Dtime='$fdate',Updatetime='$utime' where Ticket_ID='$TID'";

}
else if($fstatus!='')
{
$Master_sql="Update Master_Ticket_Tab set Assign_To='unassigned',Status='$fstatus',Updatetime='$utime' where Ticket_ID='$TID'";
//echo $Master_sql;
}



   //$conn->query($Master_sql);

//$sql="insert into Update_Tab values('$TID','$fstatus','$utime','$uname','$schedule','$client','$project','$ttime','$reviewer','$resolver','','$tcategory')";

}
if($Master_sql) 
{
   // echo $Master_sql;
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

$sql="select * from User_prof where Team='L3' or Team='All'";
     $result1=$conn->query($sql);



  while($row2=$result1->fetch())

{



	$resolver=explode("@", $row2['Email']);
	$r=$row2['Email'];

$sql3="select count(*) as ccount from dbo.Master_Ticket_Tab where Creator like '".$resolver[0]."' and Status='Classify'";
//echo $sql3;

     $result=$conn->query($sql3);
//echo $msg;
  while($row3=$result->fetch())
{
	if($row3['ccount']!=0)
	{
	$sql="update Status_count set Classify=".$row3['ccount']." where Email like '%".$r."%'";
	//echo $resolver[0].",Classify: $row3['ccount']";
	//echo $sql;
	
	//=$resolver[0].",Classify: $classify,wip:$wip,aui:$auc";

	}
  else{
    $sql="update Status_count set Classify=0 where Email like '%".$r."%'";
  }
  $conn->query($sql);
	//$rows[]=$row3;


}

/*-----------------------------------------------------*/
$sql3="select count(*) as ccount from dbo.Master_Ticket_Tab where Assign_to like '".$resolver[0]."' and Status='WIP'";
//echo $sql3;

     $result=$conn->query($sql3);
//echo $msg;
  while($row3=$result->fetch())
{
	if($row3['ccount']!=0)
	{
	$sql="update Status_count set Wip=".$row3['ccount']." where Email like '%".$r."%'";
	//echo $resolver[0].",Classify: $row3['ccount']";
	//echo $sql;
	
	//=$resolver[0].",Classify: $classify,wip:$wip,aui:$auc";

	}
  else{
    $sql="update Status_count set Wip=0 where Email like '%".$r."%'";
  }
  $conn->query($sql);
	//$rows[]=$row3;


}
/*-----------------------------------------------------*/
$sql3="select count(*) as ccount from dbo.Master_Ticket_Tab where Assign_to like '".$resolver[0]."' and Status='Review'";
//echo $sql3;

     $result=$conn->query($sql3);
//echo $msg;
  while($row3=$result->fetch())
{
	if($row3['ccount']!=0)
	{
	$sql="update Status_count set Review=".$row3['ccount']." where Email like '%".$r."%'";
	//echo $resolver[0].",Classify: $row3['ccount']";
	//echo $sql;
	
	//=$resolver[0].",Classify: $classify,wip:$wip,aui:$auc";

	}
  else{
    $sql="update Status_count set Review=0 where Email like '%".$r."%'";
  }
  $conn->query($sql);
	//$rows[]=$row3;


}

/*-----------------------------------------------------*/
$sql3="select count(*) as ccount from dbo.Master_Ticket_Tab where Assign_to like '".$resolver[0]."' and Status='AUI'";
//echo $sql3;

     $result=$conn->query($sql3);
//echo $msg;
  while($row3=$result->fetch())
{
	if($row3['ccount']!=0)
	{
	$sql="update Status_count set Aui=".$row3['ccount']." where Email like '%".$r."%'";
	//echo $resolver[0].",Classify: $row3['ccount']";
	//echo $sql;
	
	//=$resolver[0].",Classify: $classify,wip:$wip,aui:$auc";

	}
  else{
    $sql="update Status_count set Aui=0 where Email like '%".$r."%'";
  }
  $conn->query($sql);
	//$rows[]=$row3;


}


$sql3="select count(*) as ccount from dbo.Master_Ticket_Tab where Assign_to like '".$resolver[0]."' and Status='Doc'";
//echo $sql3;

     $result=$conn->query($sql3);
//echo $msg;
  while($row3=$result->fetch())
{
	if($row3['ccount']!=0)
	{
	$sql="update Status_count set Doc=".$row3['ccount']." where Email like '%".$r."%'";
	//echo $resolver[0].",Classify: $row3['ccount']";
	//echo $sql;
	
	//=$resolver[0].",Classify: $classify,wip:$wip,aui:$auc";

	}
  else{
    $sql="update Status_count set Doc=0 where Email like '%".$r."%'";
  }
  $conn->query($sql);
	//$rows[]=$row3;


}
$sql3="select count(*) as ccount from dbo.Master_Ticket_Tab where Assign_to like '".$resolver[0]."' and Status='Closure'";
//echo $sql3;

     $result=$conn->query($sql3);
//echo $msg;
  while($row3=$result->fetch())
{
	if($row3['ccount']!=0)
	{
	$sql="update Status_count set Closure=".$row3['ccount']." where Email like '%".$r."%'";
	//echo $resolver[0].",Classify: $row3['ccount']";
	//echo $sql;
	
	//=$resolver[0].",Classify: $classify,wip:$wip,aui:$auc";

	}
  else{
    $sql="update Status_count set Closure=0 where Email like '%".$r."%'";
  }
  $conn->query($sql);
	//$rows[]=$row3;


}



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