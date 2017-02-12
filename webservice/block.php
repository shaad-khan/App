<?php
session_start();
$Id=$_GET['ID'];
$name=$_SESSION['user'];
$status=$_GET['status'];
$unblock=$_GET['unblock'];
date_default_timezone_set('Asia/Kolkata');
									//$date = date('Ymd H:i:s');
									$fdate = date('Y-m-d H:i:s');

 $edate=date("Y-m-d H:i:s", strtotime('+5 hours', strtotime($fdate)));


$server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
if($status==0 && $unblock==0)
{
    $sql="update Master_Ticket_Tab set Blocker_name='$name',Blocker_flag=1,Block_datetime='$edate' where Ticket_ID='$Id'";
$conn->query($sql);

}
else if($status==1 && $unblock==0)
{
    $sql="select Blocker_name from Master_Ticket_Tab where Ticket_ID='$Id'";

    $result=$conn->query($sql);
//echo $msg;
  while($row4=$result->fetch())
{

	$rows[]=$row4;
}
}
else if($unblock==1)
{

$bsql="select Block_datetime from Master_Ticket_Tab";
$result=$conn->query($bsql);
//echo $msg;
  while($row=$result->fetch())
{
$sql="select (DATEDIFF(minute, '".$row['Block_datetime']."', '$fdate') / 60) % 24 'Hours'";
echo $sql;
$res=$conn->query($sql);
while($r=$res->fetch())
{
  if($r['Hours']==0)
  {
      $usql="update Master_Ticket_Tab set Blocker_flag=0 where Ticket_ID='".$row['Ticket_ID']."'";
     // $conn->query($usql);
     echo $usql;
  }  
}
}

}



ob_start("ob_gzhandler");

print(json_encode($rows, JSON_NUMERIC_CHECK));
ob_end_flush();
exit;
}
//     echo $sql;


?>