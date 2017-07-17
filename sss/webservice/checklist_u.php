<?php
session_start();
$u=$_SESSION['user'];
$id=$_GET["id"];
//$u=$_SESSION['user'];
$server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    
    date_default_timezone_set('Asia/Kolkata');
    $d=date('Ymd H:i:s');



    //$sql="select * from Master_ticket_tab where Team='SSS' and Ticket_ID like 'CSCHK%' and Status='WIP'";
    //echo $sql;
    if($u)
    {
$sql="update Master_ticket_tab set Resolver='$u', Status='Close',Resolver_Dtime='$d',aflag=1 where Id=$id";
echo $sql;
$conn->query($sql);
//echo $msg;
 
    }


?>