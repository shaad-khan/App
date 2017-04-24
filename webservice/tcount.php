<?php
$id=$_GET["ID"];

$server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    



    $sql="select count(*) as tcount from Master_Ticket_Tab where and (Team='L3' or Team='')";
    //echo $sql;
$result=$conn->query($sql);
//echo $msg;
  while($row4=$result->fetch())
{

	$rows[]=$row4;
}
$sql="select count(*) as pcount from Master_Ticket_Tab where  Status!='Close' and (Team='L3' or Team='')";
    //echo $sql;
$result=$conn->query($sql);
//echo $msg;
  while($row4=$result->fetch())
{

	$rows[]=$row4;
}
$sql="select count(*) as ccount from Master_Ticket_Tab where Status='Close' and (Team='L3' or Team='')";
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
exit;
?>