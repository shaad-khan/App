<?php
session_start();


$u = $_SESSION["user"];
$server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$sq="select * from Master_Ticket_Tab where RESOLVER='$u'"
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