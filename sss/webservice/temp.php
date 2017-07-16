<?php
//header( "Content-Type: application/vnd.ms-excel" );
//	header( "Content-disposition: attachment; filename=spreadsheet.xls" );
$edate=$_GET['edate'];
$sdate=$_GET['sdate'];
$sd=explode(" ",$sdate);
$ed=explode(" ",$edate);
$sdate=$sd[0];
$edate=$ed[0];
$sdate=str_replace('/','-',$sdate);
$edate=str_replace('/','-',$edate);
$user_session=$_SESSION["user"];
$server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$sql3="select 
mt.Ticket_ID,
replace(replace(mt.Client, char(10),''), char(13),'') as Client,
replace(replace(mt.Project, char(10),''), char(13),'') as Project ,
mt.CTicket,
mt.Tdiscription,mt.status,
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
Time_hours =case mt.aflag
when '0' then cast(ut.TimeTaken/60.0 as  decimal(16,2))
when '1' then cast( mt.Total_time/60.0 as  decimal(16,2))
else 'Unknown'
end


 from dbo. Master_Ticket_Tab mt left outer join dbo.Update_Tab ut
on mt.Ticket_ID = ut.TicketId where mt.team='L3' and case mt.aflag
when '0' then ut.TimeTaken
when '1' then mt.Total_time end <> 0 and

case mt.aflag
when '0' then CAST (CONVERT(DATE, ut.UpdateTime, 101) as varchar(30))
when '1' then CAST (CONVERT(DATE, mt.Resolver_Dtime, 101) as varchar(30)) end between '$sdate' and '$edate'";

//echo $sql3;
  $result=$conn->query($sql3);
//echo $msg;

    //echo 'Ticket_ID' . "\t" . 'Client' "\t" . 'Project' . "\t" . 'Team' . "\t" . 'CTicket' ."\t" . 'TDiscription' ."\t" . 'Status' ."\t" . 'WorkDate' ."\t" . 'WorkedBy' ."\t" . 'EnvType' ."\t" . 'TaskType' ."\t" . 'ShiftType' ."\t" . 'TimeMinutes' ."\t" . 'TimeHours' ."\n";
  while($row2=$result->fetch())
{ 
	//
	//$rows[]=$row2;
	
		//echo "i am here";
		//$rows[]=$row2;
echo $row2['Ticket_ID'] . "\t" ;//. $row2['Project'] ."\t" . $row2['Team']."\t" . $row2['CTicket']."\t" . $row2['TDiscription']."\t" . $row2['Status']."\t" . $row2['WorkDate']."\t" . $row2['WorkedBy']."\t" . $row2['EnvType']."\t" . $row2['TaskType']."\t" . $row2['ShiftType']."\t" . $row2['Time_Min'].."\t" . $row2['Time_hours'] "\n";
//$rows[]=$row2;
}




//print(json_encode($rows, JSON_NUMERIC_CHECK));

?>