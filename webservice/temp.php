<?php

$edate=$_GET['edate'];
$sdate=$_GET['sdate'];
$sd=explode(" ",$sdate);
$ed=explode(" ",$edate);
$sdate=$sd[0];
$edate=$ed[0];
$user_session=$_SESSION["user"];
$server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$s1="truncate table dbo.temp";
$conn->query($s1);

$s="select 
mt.Ticket_ID,
replace(replace(mt.Client, char(10),''), char(13),''),
replace(replace(mt.Project, char(10),''), char(13),''),
mt.CTicket,
mt.Tdiscription,
WorkDate =
case mt.aflag
when '0' then CAST (CONVERT(DATE, ut.UpdateTime, 101) as varchar(30))
when '1' then CAST (CONVERT(DATE, mt.Resolver_Dtime, 101) as varchar(30))
else 'Unknown'
end,
WorkedBy = case mt.aflag
when '0' then ut.UpdateBy
when '1' then mt.Resolver
else 'Unknown'
end,
mt.EnvType,
TaskType =
case mt.aflag
when '0' then replace(replace(ut.TaskName, char(10),''), char(13),'')
when '1' then replace(replace(mt.atype, char(10), ''), char(13), '')
 else 'Unknown'
end,
ShiftType =
case mt.aflag
when '0' then ut.Shift
when '1' then 'Adhoc Shift'
else 'Unknown'
end,
Time_Min =
case mt.aflag
when '0' then ut.TimeTaken
when '1' then mt.Total_time
else 'Unknown'
end,
mt.team,atype,
CONVERT(DATE, ut.UpdateTime, 101)  as dt1 from dbo. Master_Ticket_Tab mt left outer join dbo.Update_Tab ut
on mt.Ticket_ID = ut.TicketId where mt.team='L3' and case mt.aflag
when '0' then ut.TimeTaken
when '1' then mt.Total_time end <> 0 and

case mt.aflag
when '0' then CAST (CONVERT(DATE, ut.UpdateTime, 101) as varchar(30))
when '1' then CAST (CONVERT(DATE, mt.Resolver_Dtime, 101) as varchar(30)) end between '$sdate' and '$edate'";

$res=$conn->query($s);

  while($row=$res->fetch())
{
    $sql="insert into temp values('".$row['WorkDate']."','".$row['WorkedBy']."','".$row['Time_Min']."')";

    $conn->query($sql);

}

 $sql3='select workby,workdate,sum(t."time") as time_spend from dbo.Temp as t group by workdate,workby';
  //echo "<br>".$sql3;


     $result=$conn->query($sql3);
//echo $msg;

  while($row2=$result->fetch())
{ 
	//
	//$rows[]=$row2;
	
		//echo "i am here";
		//$rows[]=$row2;
	
$rows[]=$row2;
}




print(json_encode($rows, JSON_NUMERIC_CHECK));

?>