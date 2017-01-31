<?php
$id=$_GET["ID"];

$server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    



    $sql="select * from Update_Tab where TicketId='".$id."' order by UpdateTime desc";
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