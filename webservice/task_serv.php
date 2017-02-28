<?php
session_start();


$u = $_SESSION["user"];

$s=$_GET['sdate'];
$e=$_GET['edate'];
$server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";
date_default_timezone_set('Asia/Kolkata');
									//$date = date('Ymd H:i:s');
									$fdate = date('Y-m-d');

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    if(($s=='')&&($e==''))
    {
      $sql="select m.Tdiscription,m.Ticket_ID,m.Client,u.Status,u.UpdateTime,u.TimeTaken from master_ticket_tab as m ,update_Tab as u where m.Ticket_ID=u.TicketId and u.UpdateBy='$u'";
//$sql="select * from Master_Ticket_Tab where Resolver='$u' and Resolver_Dtime='$fdate'";
    }
    else
    {
      $sql="select * from Master_Ticket_Tab where (Resolver='$u') and (Resolver_Dtime between '$s' and '$e')";
    }
$result=$conn->query($sql);
//echo $msg;
  while($row4=$result->fetch())
{

	$rows[]=$row4;
}

//ob_start("ob_gzhandler");

print(json_encode($rows, JSON_NUMERIC_CHECK));
//ob_end_flush();
//exit;



?>