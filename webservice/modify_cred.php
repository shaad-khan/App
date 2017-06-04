<?php
//echo "inserted";

session_start();


$u=$_SESSION["user"];


$tid=$_POST['tid'];
//$ttype=$_POST[''];
$tspent=$_POST['tspent'];
$adate=$_POST['adate'];
//$date=explode()
$user=$_POST['req'];
//$amessage=str_replace("'","''",$amessage);

$server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    date_default_timezone_set('Asia/Kolkata');
									$date = date('Ymd H:i:s');
									$date4 = date('y');

if($u!=null)
{
  
$sql="update Credential set [User ID]='$tspent',[Password]='$adate',[Last Updated By]='$u',[Last Updated]='$date' where id=$tid";
echo $sql;
$conn->query($sql);

$sql="select * from Credential where id=$tid";
$result=$conn->query($sql);
//echo $msg;
  while($row3=$result->fetch())
{
$rows[]=$row3;
}
print(json_encode($rows, JSON_NUMERIC_CHECK));
}
else{
  echo "<script> alert('Session expired please re-login');setTimeout(function () { win.close();}, 6000);</script>";
}
?>