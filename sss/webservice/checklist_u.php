<?php
session_start();
$u=$_SESSION['user'];
$id=$_GET["id"];
$stype=$_GET['stype'];
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
    if($u!=null && $stype!=null)
    {
$sql="update Master_ticket_tab set Resolver='$u', Status='Close',Resolver_Dtime='$d',aflag=1,atype='CheckList Task',shift='$stype' where Id=$id";
echo $sql;
$conn->query($sql);
//echo $msg;
 
    }
    else{
        echo "<script>alert('Shift Timing Is missing');</shift>";
    }


?>