<?php
session_start();
$Id=$_GET['ID'];
$name=$_SESSION['user'];
$status=$_GET['status'];
$unblock=$_GET['unblock'];
date_default_timezone_set('Asia/Kolkata');
									//$date = date('Ymd H:i:s');
									$fdate = date('Y-m-d H:i:s');

 $edate=date("Y-m-d H:i:s", strtotime('+5 hours', strtotime($fdate)));


$server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
if($status==0 && $unblock==0)
{
    $sql="update Master_Ticket_Tab set Blocker_name='$name',Blocker_flag=1,Block_datetime='$edate' where Ticket_ID='$Id'";
$conn->query($sql);

}
else if($status==1 && $unblock==0)
{
    $sql="select Blocker_name from Master_Ticket_Tab where Ticket_ID='$Id'";

    $result=$conn->query($sql);
//echo $msg;
  while($row4=$result->fetch())
{

	$rows[]=$row4;
}
ob_start("ob_gzhandler");

print(json_encode($rows, JSON_NUMERIC_CHECK));
ob_end_flush();
exit;
}
else if($unblock==1)
{

$bsql="select Block_datetime,Ticket_ID from Master_Ticket_Tab";
$result=$conn->query($bsql);
//echo $msg;
  while($row=$result->fetch())
{
    $tic=$row['Ticket_ID'];
$sql="select (DATEDIFF(minute, '".$row['Block_datetime']."', '$fdate') / 60) % 24 'Hours'";
//echo $sql;
$res=$conn->query($sql);
while($r=$res->fetch())
{
  if($r['Hours']==0)
  {
      $usql="update Master_Ticket_Tab set Blocker_flag=0 where Ticket_ID='$tic'";
     //$conn->query($usql);
     echo $usql;
   // sendemail($tic);
  }  
}
}

}

function sendemail($tic) {
    $server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$sql="select Tdiscription,Status,Blocker_name from Master_Ticket_Tab where Ticket_ID='$tic'";
$result=$conn->query($sql);
//echo $msg;
  while($row=$result->fetch())
{
    $sub=$row['Tdiscription'];
    $status=$row['Status'];
    $bn=$row['Blocker_name'];
}


require 'class/class.phpmailer.php';
  require 'class/class.smtp.php';


 $mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = "tls";
$mail->Host = "smtp.office365.com";
$mail->Port = 587;
$mail->IsHTML(true);
//$mail->Username = "CS_Connect@continuserve.com";
//$mail->Password = "Password1$";
//$mail->SetFrom=('L3Alerts@continuserve.com');

$mail->Username = "SSShelpdesk@continuserve.com";
$mail->Password = "Welcome123456";
//$mail->SetFrom=('L3Alerts@continuserve.com');
$mail->CharSet = 'UTF-8';
$mail->From = "SSShelpdesk@continuserve.com"; // the authenticated account
$mail->FromName = "SSShelpdesk@continuserve.com"; // the user's email ?
$mail->Subject = $sub;

$e="Block on Ticket-ID: $tic has being revoked [previous blocker was $bn] </br>Thank you,<br/>helpdesk";
/*
$myfile = fopen("report.html", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  $e=$e.fgets($myfile);
}
fclose($myfile);*/

$mail->MsgHTML($e);
//$file_to_attach = 'report/report.html';
//$mail->AddAttachment($file_to_attach);
//$mail->AddAttachment(  , 'NameOfFile.pdf' );
//$mail->AddReplyTo('');
$mail->AddAddress('L3_CS@continuserve.com');
$mail->AddCC("shadab.k@continuserve.com");
//$mail->AddCC("npai@continuserve.com");
//$mail->AddCC("stanly.benny@continuserve.com");
//$mail->AddCC("shadab.k@continuserve.com");
 if(!$mail->Send())
    {
    echo "Mailer Error: " . $mail->ErrorInfo;
    }    




}





?>