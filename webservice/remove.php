<?php
session_start();
$Id=$_GET['ID'];



$server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$sql="delete from Master_Ticket_Tab where Ticket_ID='$Id'";
$conn->query($sql);
$sql="delete from Update_Tab where Ticketid='$Id'";
$conn->query($sql);


    ?>