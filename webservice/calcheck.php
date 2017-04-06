<?php
$type=$_GET["type"];

$server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    $user=$_GET['u'];
    $date=$_GET['date'];
    $type=$_GET['type'];
if($type==1)
{
  $sql="select count(*) as c from Master_Ticket_Tab where Resolver like '%".$user."%' and CONVERT(date,Resolver_Dtime)='$date' and CONVERT(date,Cdatetime)='$date' ";
$result=$conn->query($sql);
//echo $msg;
  while($row4=$result->fetch())
{

	$tcount=$row4['c'];
}
$sql="select sum(TOTAL_TIME) as t from Master_Ticket_Tab where Resolver like '%".$user."%' and CONVERT(date,Resolver_Dtime)='$date' and CONVERT(date,Cdatetime)='$date'";
$result=$conn->query($sql);
//echo $msg;
  while($row4=$result->fetch())
{

	$ttime=$row4['t'];
}
$rows=array('tcount'=>$tcount,'ttime'=>$ttime);
ob_start("ob_gzhandler");

print(json_encode($rows, JSON_NUMERIC_CHECK));
ob_end_flush();
exit;
}
//echo $sql;
/*else
{

    $sql="select * from ".$type." where Team='L3,SSS' or Team='L3'";
}
    //echo $sql;
$result=$conn->query($sql);
//echo $msg;
  while($row4=$result->fetch())
{

	$rows[]=$row4;
}
ob_start("ob_gzhandler");

print(json_encode($rows, JSON_NUMERIC_CHECK));
ob_end_flush();
exit;
*/


?>