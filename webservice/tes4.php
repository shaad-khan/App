
<?php
$server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$sql="select * from User_prof where Team='L3' or Team='All'";
     $result1=$conn->query($sql);



  while($row2=$result1->fetch())

{



	//$resolver=explode("@", $row2['Email']);
  $resolver=$row2['sessionId'];
	$r=$row2['sessionId'];

$sql3="select count(*) as ccount from dbo.Master_Ticket_Tab where Creator like '".$resolver."' and Status='Classify'";
//echo $sql3;

     $result=$conn->query($sql3);
//echo $msg;
  while($row3=$result->fetch())
{
	if($row3['ccount']!=0)
	{
	$sql="update Status_count set Classify=".$row3['ccount']." where Email like '%".$r."%'";
	//echo $resolver[0].",Classify: $row3['ccount']";
	//echo $sql;
	
	//=$resolver[0].",Classify: $classify,wip:$wip,aui:$auc";

	}
  else{
    $sql="update Status_count set Classify=0 where Email like '%".$r."%'";
  }
  $conn->query($sql);
	//$rows[]=$row3;


}

/*-----------------------------------------------------*/
$sql3="select count(*) as ccount from dbo.Master_Ticket_Tab where Assign_to like '".$resolver."' and Status='WIP'";
//echo $sql3;

     $result=$conn->query($sql3);
//echo $msg;
  while($row3=$result->fetch())
{
	if($row3['ccount']!=0)
	{
	$sql="update Status_count set Wip=".$row3['ccount']." where Email like '%".$r."%'";
	//echo $resolver[0].",Classify: $row3['ccount']";
	//echo $sql;
	
	//=$resolver[0].",Classify: $classify,wip:$wip,aui:$auc";

	}
  else{
    $sql="update Status_count set Wip=0 where Email like '%".$r."%'";
  }
  $conn->query($sql);
	//$rows[]=$row3;


}
/*-----------------------------------------------------*/
$sql3="select count(*) as ccount from dbo.Master_Ticket_Tab where Assign_to like '".$resolver."' and Status='Review'";
//echo $sql3;

     $result=$conn->query($sql3);
//echo $msg;
  while($row3=$result->fetch())
{
	if($row3['ccount']!=0)
	{
	$sql="update Status_count set Review=".$row3['ccount']." where Email like '%".$r."%'";
	//echo $resolver[0].",Classify: $row3['ccount']";
	//echo $sql;
	
	//=$resolver[0].",Classify: $classify,wip:$wip,aui:$auc";

	}
  else{
    $sql="update Status_count set Review=0 where Email like '%".$r."%'";
  }
  $conn->query($sql);
	//$rows[]=$row3;


}

/*-----------------------------------------------------*/
$sql3="select count(*) as ccount from dbo.Master_Ticket_Tab where Assign_to like '".$resolver."' and Status='AUI'";
//echo $sql3;

     $result=$conn->query($sql3);
//echo $msg;
  while($row3=$result->fetch())
{
	if($row3['ccount']!=0)
	{
	$sql="update Status_count set Aui=".$row3['ccount']." where Email like '%".$r."%'";
	//echo $resolver[0].",Classify: $row3['ccount']";
	//echo $sql;
	
	//=$resolver[0].",Classify: $classify,wip:$wip,aui:$auc";

	}
  else{
    $sql="update Status_count set Aui=0 where Email like '%".$r."%'";
  }
  $conn->query($sql);
	//$rows[]=$row3;


}


$sql3="select count(*) as ccount from dbo.Master_Ticket_Tab where Assign_to like '".$resolver."' and Status='Doc'";
//echo $sql3;

     $result=$conn->query($sql3);
//echo $msg;
  while($row3=$result->fetch())
{
	if($row3['ccount']!=0)
	{
	$sql="update Status_count set Doc=".$row3['ccount']." where Email like '%".$r."%'";
	//echo $resolver[0].",Classify: $row3['ccount']";
	//echo $sql;
	
	//=$resolver[0].",Classify: $classify,wip:$wip,aui:$auc";

	}
  else{
    $sql="update Status_count set Doc=0 where Email like '%".$r."%'";
  }
  $conn->query($sql);
	//$rows[]=$row3;


}
$sql3="select count(*) as ccount from dbo.Master_Ticket_Tab where Assign_to like '".$resolver."' and Status='Closure'";
//echo $sql3;

     $result=$conn->query($sql3);
//echo $msg;
  while($row3=$result->fetch())
{
	if($row3['ccount']!=0)
	{
	$sql="update Status_count set Closure=".$row3['ccount']." where Email like '%".$r."%'";
	//echo $resolver[0].",Classify: $row3['ccount']";
	//echo $sql;
	
	//=$resolver[0].",Classify: $classify,wip:$wip,aui:$auc";

	}
  else{
    $sql="update Status_count set Closure=0 where Email like '%".$r."%'";
  }
  $conn->query($sql);
	//$rows[]=$row3;


}

?>