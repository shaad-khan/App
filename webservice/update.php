<?php
session_start();
$user_session=$_SESSION["user"];
$Id=$_GET['ID'];
$atime=$_GET['atime'];
$sch=$_GET['sch'];
date_default_timezone_set('Asia/Kolkata');
									//$date = date('Ymd H:i:s');
									$fdate = date('Y-m-d H:i:s');


$server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
/*$sql="delete from Master_Ticket_Tab where Ticket_ID='$Id'";
$conn->query($sql);
$sql="delete from Update_Tab where Ticketid='$Id'";
$conn->query($sql);*/

$sql="update Master_Ticket_tab set Status='Close',Resolver='$user_session',Total_client_time=$atime,Updatetime='$fdate',shift='$sch' where Ticket_ID='$id'";
echo $sql;

//$conn->query($sql);
/*$sql="select * from Update_Tab where TicketId='".$id."' order by UpdateTime desc";
    //echo $sql;
    
$result=$conn->query($sql);
//echo $msg;
  while($row4=$result->fetch())
{

	$rows[]=$row4;
}



ob_start("ob_gzhandler");

print(json_encode($rows));
ob_end_flush();
exit;*/

    ?>