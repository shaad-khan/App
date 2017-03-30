<?php
$type=$_GET["type"];

$server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    
if($type=='Team')
{
  $sql="select * from ".$type;
}
else
{

    $sql="select * from ".$type." where Team!='SSS' or Team='L3,SSS' or Team='L3'";
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



?>