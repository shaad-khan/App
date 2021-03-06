<?php
//header( "Content-Type: application/vnd.ms-excel" );
//header( "Content-disposition: attachment; filename=spreadsheet.xls" );
date_default_timezone_set('Asia/Kolkata');
		require_once 'PHPExcel/Classes/PHPExcel.php';
		
		$filename = 'L3_Shift_report'; //your file name
		$objPHPExcel = new PHPExcel();
		/*********************Add column headings START**********************/
		$objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('A1', 'Ticket_ID')
					->setCellValue('B1', 'Client')
					->setCellValue('C1', 'Project')
					->setCellValue('D1', 'ProjectId')
					->setCellValue('E1', 'CTicket')
                    ->setCellValue('F1', 'TDescription')
                    ->setCellValue('G1', 'Status')
					->setCellValue('H1', 'Creation Date')
                    ->setCellValue('I1', 'WorkDate')
                    ->setCellValue('J1', 'WorkedBy')
					->setCellValue('K1', 'EmplId')
                    ->setCellValue('L1', 'EnvType')
                    ->setCellValue('M1', 'TaskType')
                    ->setCellValue('N1', 'ShiftType')
                    ->setCellValue('O1', 'TimeMinutes')
                    ->setCellValue('P1', 'TimeHours');
					

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

$sql3="SET ANSI_NULLS OFF

select 
mt.Ticket_ID,
replace(replace(mt.Client, char(10),''), char(13),'') as Client,
replace(replace(mt.Project, char(10),''), char(13),'') as Project,pf.PID,
mt.CTicket,
mt.Tdiscription,
WorkDate =
case mt.aflag
when '0' then 
   case ut.adtime
    when NULL then CAST (CONVERT(DATE, ut.UpdateTime, 101) as varchar(30))
    else ut.adtime
    end
   
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
uf.EID as EmpId,
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
 from dbo.User_prof  as uf,dbo.Project_tab as pf,dbo. Master_Ticket_Tab mt
 left outer join dbo.Update_Tab ut
on mt.Ticket_ID = ut.TicketId where mt.team='L3'  and case mt.aflag
when '0' then ut.TimeTaken
when '1' then mt.Total_time end <> 0 and
case mt.aflag
when '0' then 
   case ut.adtime
    when NULL then CAST (CONVERT(DATE, ut.UpdateTime, 101) as varchar(30))
    else CAST (CONVERT(DATE, ut.adtime, 101) as varchar(30))
    end
 when '1' then CAST (CONVERT(DATE, mt.Resolver_Dtime, 101) as varchar(30)) end between '$sdate' and '$edate' and 
case mt.aflag
when '0' then ut.UpdateBy
when '1' then mt.Resolver
else 'Unknown'
end like uf.sessionId and mt.Project like pf.Project";

//echo $sql3;
  $result=$conn->query($sql3);
//echo $msg;
$i=2;
 //   echo 'Ticket_ID' . "\t" . 'Client'. "\t" . 'Project' . "\t" . 'Team' . "\t" . 'CTicket' ."\t" . 'TDiscription' ."\t" . 'Status' ."\t" . 'WorkDate' ."\t" . 'WorkedBy' ."\t" . 'EnvType' ."\t" . 'TaskType' ."\t" . 'ShiftType' ."\t" . 'TimeMinutes' ."\t" . 'TimeHours' ."\n";
  while($row2=$result->fetch())
{ 
	//
	//$rows[]=$row2;
	
		//echo "i am here";
		//$rows[]=$row2;
	
		$objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('A'.$i, $row2['Ticket_ID'])
					->setCellValue('B'.$i, $row2['Client'])
					->setCellValue('C'.$i, $row2['Project'])
					->setCellValue('D'.$i, $row2['PID'])
					->setCellValue('E'.$i, $row2['CTicket'])
					->setCellValue('F'.$i, $row2['Tdiscription'])
					->setCellValue('G'.$i, $row2['Status'])
					->setCellValue('H'.$i, $row2['Cdatetime'])
					->setCellValue('I'.$i, $row2['WorkDate'])
					->setCellValue('J'.$i, $row2['WorkedBy'])
					->setCellValue('K'.$i, $row2['EmpId'])
					->setCellValue('L'.$i, $row2['EnvType'])
					->setCellValue('M'.$i, $row2['TaskType'])
					->setCellValue('N'.$i, $row2['ShiftType'])
					->setCellValue('O'.$i, $row2['Time_Min'])
					->setCellValue('P'.$i, $row2['Time_hours']);
					
//echo $row2['Ticket_ID'] . "\t" . $row2['Project'] ."\t" . $row2['Team']."\t" . $row2['CTicket']."\t" . $row2['TDiscription']."\t" . $row2['Status']."\t". $row2['WorkDate']."\t" . $row2['WorkedBy']."\t" . $row2['EnvType']."\t" . $row2['TaskType']."\t" . $row2['ShiftType']."\t" . $row2['Time_Min']."\t" . $row2['Time_hours']."\n";
//$rows[]=$row2;
$i++;

}

/*------------------------------------------------------------*/

        foreach(range('A','p') as $columnID) {
			$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
		}
		/*********************Autoresize column width depending upon contents END***********************/
		
		$objPHPExcel->getActiveSheet()->getStyle('A1:p1')->getFont()->setBold(true); //Make heading font bold
		
		/*********************Add color to heading START**********************/
		$objPHPExcel->getActiveSheet()
					->getStyle('A1:p1')
					->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()
					->setARGB('99ff99');
		/*********************Add color to heading END***********************/
		
		$objPHPExcel->getActiveSheet()->setTitle('userReport'); //give title to sheet
		$objPHPExcel->setActiveSheetIndex(0);
		header('Content-Type: application/vnd.ms-excel');
		header("Content-Disposition: attachment;Filename=$filename.xls");
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;




/*----------------------------------------------------------*/


//print(json_encode($rows, JSON_NUMERIC_CHECK));

?>