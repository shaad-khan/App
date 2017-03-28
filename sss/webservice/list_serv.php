<?php
$param=$_GET["param"];

$server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    

if($param=='total')
{
     $sql="select * from Master_Ticket_Tab where team='SSS'";
}
else if($param=='pending')
{

    $sql="select * from Master_Ticket_Tab where Status!='Close' and team='SSS' order by UpdateTime desc";
}
else if($param=='close')
{
     $sql="select * from Master_Ticket_Tab where Status='Close' and team='SSS' order by UpdateTime desc";
}
else
{
    $sql="select * from Master_Ticket_Tab where (Status='$param' or Ticket_ID='$param' or Tdiscription like '".$param."%' or Client='$param' or Project='$param' or Resolver like '".$param."%' or EnvType='$param' or Reviewer like '".$param."%' or Assign_to like '".$param."%' or Creator like '".$param."%') and team='SSS' order by UpdateTime desc"; 
}
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