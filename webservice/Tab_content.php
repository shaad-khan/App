<?php
//$d=$_GET["d"];
//$t=$_GET["t"];
$msg=$_GET["MSG"];
$msg=str_replace("'", "&apos;", $msg);
//$msg2=$msg;
//$msg=strtoupper($msg);
$username=explode("@",$username);
date_default_timezone_set('Asia/Kolkata');
								$date = date('Y-m-d');

								$t = date('H:i:s');
$str = $msg;
//echo $str."<br>";
$stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $str);

$str=str_replace(' ', '', $str);
									$ContinuityDate = $date;
$d=date('l', strtotime( $ContinuityDate));

//echo $str."<br>";



//$stripped=ltrim($stripped," ");
//$stripped=rtrim($stripped," ");
//$stripped=trim($stripped);
//echo $stripped."<br>";
$server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";
//$rows=0;
//$ID=$_GET["ID"];
$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
//$sql3="select * from dbo.checklist";
     // $sql3="select * from dbo.Continuity where (Status like '%pending%' or Status like '%close%') and Checklist_flag=0";
   //   echo "<br>".$sql3;
    $classify=0;
     $wip=0;
     $aui=0;
     $auc=0;
     $rew-0;
     $doc=0;
     $close=0;

//$sql="select * from status_count order by ID desc";


$sql="select ID,Email,ISNULL(Classify,0) as Classify,ISNULL(Wip,0) as Wip ,ISNULL(Aui,0) as Aui,ISNULL(Review,0) as Review,ISNULL(Doc,0) as Doc,ISNULL(Closure,0) as Closure,ISNULL(Total,0) as Total from status_count order by ID desc";
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
?>
