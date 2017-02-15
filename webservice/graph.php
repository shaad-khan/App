<?php
session_start();

$user_session=$_SESSION["user"];
$server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$sql="select Category from Task_category";
$result=$conn->query($sql);
//echo $msg;
  while($row4=$result->fetch())
{

$s="SELECT  DISTINCT  cast(updatetime as date) as time,count(TaskName) as y FROM Update_Tab WHERE UpdateTime >= DATEADD(day,-7, GETDATE()) and UpdateBy='$user_session' and TaskName ='".$row4['Category']."' group by TaskName,cast(updatetime as date)";
 //echo $s;

$res=$conn->query($s);
//echo $msg;
  while($row=$res->fetch())
{
    if($row['TaskName']=='Project Migration')
   $x[]=$row;

}
}
print(json_encode($x, JSON_NUMERIC_CHECK));

?>