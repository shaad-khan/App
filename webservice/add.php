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
$Master_sql="Update Master_Ticket_Tab set Assign_To='$user_session', Status='WIP' where Ticket_ID='$TID'";
}
 else if(($assigned_To==$user_session) and ($status=='WIP') and ($release==1))
    {
    $Master_sql="Update Master_Ticket_Tab set Assign_To='unassigned', Status='WIP' where Ticket_ID='$TID'";
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
    $fresolver=$user_session;

}
else if(($tab_status=='WIP') and $AUI=='on' )
{
$fstatus='WIP';
$fresolver=$user_session;
}
else if(($tab_status=='Review'))
{
    $fstatus='Documentation';
}
else if(($tab_status=='Documentation'))
{
    $fstatus='Closure';
}
if($fstatus!=null and $fresolver!=null)
{
$Master_sql="Update Master_Ticket_Tab set Assign_To='unassigned',Status='$fstatus',Resolved_By='$fresolver' where Ticket_ID='$TID'";

}

echo $Master_sql;

   $conn->query($Master_sql);

//$sql="insert into Update_Tab values('$TID','$fstatus','$utime','$uname','$schedule','$client','$project','$ttime','$reviewer','$resolver','','$tcategory')";


}
?>