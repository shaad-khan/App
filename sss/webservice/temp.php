<?php
//header( "Content-Type: application/vnd.ms-excel" );
//header( "Content-disposition: attachment; filename=spreadsheet.xls" );
date_default_timezone_set('Asia/Kolkata');
		require_once 'PHPExcel/Classes/PHPExcel.php';
		
		$filename = 'SSS_Shift_report'; //your file name
		$objPHPExcel = new PHPExcel();
		/*********************Add column headings START**********************/
		$objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('A1', 'Ticket_ID')
					->setCellValue('B1', 'Requester')
					->setCellValue('C1', 'Client')
					->setCellValue('D1', 'Project')
					->setCellValue('E1', 'ProjectId')
					->setCellValue('F1', 'CTicket')
                    ->setCellValue('G1', 'TDescription')
                    ->setCellValue('H1', 'Status')
					->setCellValue('I1', 'Creation Date')
                    ->setCellValue('J1', 'WorkDate')
                    ->setCellValue('K1', 'WorkedBy')
					->setCellValue('L1', 'EmplId')
                    ->setCellValue('M1', 'EnvType')
                    ->setCellValue('N1', 'TaskType')
                    ->setCellValue('O1', 'ShiftType')
                    ->setCellValue('P1', 'TimeMinutes')
                    ->setCellValue('Q1', 'TimeHours')
					->setCellValue('R1', 'Team')
					->setCellValue('S1', 'Comments')
					->setCellValue('T1',  'Job-Type')
					->setCellValue('U1', 'Access-Form-Number')
					->setCellValue('V1', 'Cloning-Profile ')
					->setCellValue('W1', 'Approver')
					->setCellValue('X1', 'Access-Form-Date');

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
mt.Ticket_ID,mt.requester,
replace(replace(mt.Client, char(10),''), char(13),'') as Client,
replace(replace(mt.Project, char(10),''), char(13),'') as Project ,pf.PID,
mt.CTicket,ut.Comments,mt.team,
mt.Tdiscription,mt.Status,mt.Cdatetime,
WorkDate =
case mt.aflag
when '0' then ut.UpdateTime 
when '1' then mt.Resolver_Dtime
else 'Unknown'
end,
WorkedBy = case mt.aflag
when '0' then ut.UpdateBy
when '1' then mt.Resolver
else 'Unknown'
end,
uf.EID as EmpId,
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
when '1' then mt.Shift
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
end,
mt.jobtype as jobtype,aformnumber,approver,cprofile,afdate


 from dbo.User_prof  as uf,dbo.Project_tab as pf, dbo. Master_Ticket_Tab mt left outer join dbo.Update_Tab ut
on mt.Ticket_ID = ut.TicketId where mt.team='SSS' and case mt.aflag
when '0' then ut.TimeTaken
when '1' then mt.Total_time end <> 0 and

case mt.aflag
when '0' then CAST (CONVERT(DATE, ut.UpdateTime, 101) as varchar(30))
when '1' then CAST (CONVERT(DATE, mt.Resolver_Dtime, 101) as varchar(30)) end  between '$sdate' and '$edate' and 
case mt.aflag
when '0' then ut.UpdateBy
when '1' then mt.Resolver
else 'Unknown'
end like uf.sessionId and (mt.Project like pf.Project or ut.Project like pf.Project)";

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
					->setCellValue('B'.$i, $row2['requester'])
					->setCellValue('C'.$i, $row2['Client'])
					->setCellValue('D'.$i, $row2['Project'])
					->setCellValue('E'.$i, $row2['PID'])
					->setCellValue('F'.$i, $row2['CTicket'])
					->setCellValue('G'.$i, $row2['Tdiscription'])
					->setCellValue('H'.$i, $row2['Status'])
					->setCellValue('I'.$i, $row2['Cdatetime'])
					->setCellValue('J'.$i, $row2['WorkDate'])
					->setCellValue('K'.$i, $row2['WorkedBy'])
					->setCellValue('L'.$i, $row2['EmpId'])
					->setCellValue('M'.$i, $row2['EnvType'])
					->setCellValue('N'.$i, $row2['TaskType'])
					->setCellValue('O'.$i, $row2['ShiftType'])
					->setCellValue('P'.$i, $row2['Time_Min'])
					->setCellValue('Q'.$i, $row2['Time_hours'])
					->setCellValue('R'.$i, $row2['Team'])
					->setCellValue('S'.$i, $row2['Comments'])
					->setCellValue('T'.$i, $row2['jobtype'])
					->setCellValue('U'.$i, $row2['aformnumber'])
					->setCellValue('V'.$i, $row2['cprofile'])
					->setCellValue('W'.$i, $row2['approver'])
					->setCellValue('X'.$i, $row2['afdate']);

//echo $row2['Ticket_ID'] . "\t" . $row2['Project'] ."\t" . $row2['Team']."\t" . $row2['CTicket']."\t" . $row2['TDiscription']."\t" . $row2['Status']."\t". $row2['WorkDate']."\t" . $row2['WorkedBy']."\t" . $row2['EnvType']."\t" . $row2['TaskType']."\t" . $row2['ShiftType']."\t" . $row2['Time_Min']."\t" . $row2['Time_hours']."\n";
//$rows[]=$row2;
$i++;

}

/*------------------------------------------------------------*/

        foreach(range('A','X') as $columnID) {
			$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
		}
		/*********************Autoresize column width depending upon contents END***********************/
		
		$objPHPExcel->getActiveSheet()->getStyle('A1:X1')->getFont()->setBold(true); //Make heading font bold
		
		/*********************Add color to heading START**********************/
		$objPHPExcel->getActiveSheet()
					->getStyle('A1:X1')
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