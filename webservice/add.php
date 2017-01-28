<?php
$type=$_GET["type"];

$server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    
$TID  = $_GET["TID"];

$client= $_GET["client"];

$project= $_GET["project"];

$uname= $_GET["uname"];

$aname= $_GET["aname"];

$utime= $_GET["utime"];

$status= $_GET["status"];

$resolver= $_GET["resolver"];

$schedule= $_GET["schedule"];

$reviewer= $_GET["reviewer"];

$discription= $_GET["discription"];

$comments= $_GET["comments"];

$cstatus= $_GET["cstatus"];

$ttime= $_GET["ttime"];

$tcategory= $_GET["tcategory"];

$AUI= $_GET["AUI"];


$sql="insert into Update_Tab values('$TID','$status','$utime','$uname','$schedule','$client','$project','$ttime','$reviewer','$resolver','','$tcategory'



?>