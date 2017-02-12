<?php
session_start();
$Id=$_GET['ID'];
$name=$_SESSION['user'];

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

    $sql="update Master_Ticket_Tab set Blocker_name='$name',Blocker_flag=1,Block_datetime='$edate' where Ticket_ID='$Id'";

//     echo $sql;
$conn->query($sql);

?>