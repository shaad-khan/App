<?php
//echo "inserted";

session_start();

function createRange($start, $end, $format = 'Y-m-d') {
  $start  = new DateTime($start);
  $end= new DateTime($end);
  $invert = $start > $end;
  
  $dates = array();
  $dates[] = $start->format($format);
  while ($start != $end) {
  $start->modify(($invert ? '-' : '+') . '1 day');
  $dates[] = $start->format($format);
  }
  return $dates;
  }
$u=$_SESSION["user"];

$etype=$_POST['etype'];
$ptype=$_POST['ptype'];
$ctype=explode(" ",$ptype);
$client=$ctype[0];
$ttype=$_POST['ttype'];
$tspent=$_POST['tspent'];
$adate=$_POST['adate'];
$amessage=$_POST['amessage'];
$stype=$_POST['stype'];
$amessage=str_replace("'","''",$amessage);
$jtype=$_POST['jtype'];
$server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $da=explode("-",$adate);
    $x=createRange($da[0], $da[1]);
    
    for($i=0;$i<=count($x);$i++)
    {


    date_default_timezone_set('Asia/Kolkata');
									//$date = date('Ymd H:i:s');
									$date4 = date('y');
$sql="select IDENT_CURRENT( 'Master_Ticket_Tab' ) as id";


$result=$conn->query($sql);
//echo $msg;
  while($row3=$result->fetch())
{
$id=$row3['id'];
}
 if($id<10)

                                  {
                                  // $msg2=$msg2.' CSTKT'.$date4.'0000'.$id;
                                   $tk='CSADHOC'.$date4.'0000'.$id;

                                  }  //echo "$mydate[weekday]$mydate[month]$mydate[mday]$mydate[year]"." "."$mydate[hours]:$mydate[minutes]:$mydate[seconds]";
                                   if($id>=10&&$id<100)

                                  {
                                  // $msg2=$msg2.' CSTKT'.$date4.'000'.$id;
                                   $tk='CSADHOC'.$date4.'000'.$id;

                                  } 
                                   if($id>=100&&$id<1000)

                                  {
                                  // $msg2=$msg2.' CSTKT'.$date4.'00'.$id;
                                   $tk='CSADHOC'.$date4.'00'.$id;
                                  } 
                                   if($id>=1000&&$id<10000)

                                  {
                                  // $msg2=$msg2.' CSTKT'.$date4.'0'.$id;
                                   $tk='CSADHOC'.$date4.'0'.$id;
                                  } 
                                   if($id>=10000)

                                  {
                                 //  $msg2=$msg2.' CSTKT'.$date4.$id;
                                   $tk='CSADHOC'.$date4.$id;
                                  } 
if($u!=null)
{
$sql="insert into Master_Ticket_Tab (Ticket_ID,Tdiscription,Status,Client,Project,Resolver,CTicket,Cdatetime,Resolver_Dtime,EnvType,Reviewer,Assign_to,Creator,Updatetime,Repo,aflag,Total_time,atype,team,jobtype,shift)values('$tk','$amessage','Close','$client','$ptype','$u','','$adate','$x[$i]','$etype','','$u','$u','$adate','',1,$tspent,'$ttype','SSS','$jtype','$stype')";

$conn->query($sql);

$sql="select Top 1 Ticket_ID from Master_Ticket_Tab where aflag=1 order by Id desc";
$result=$conn->query($sql);
//echo $msg;
  while($row3=$result->fetch())
{
$rows[]=$row3;
}
//print(json_encode($rows, JSON_NUMERIC_CHECK));
}
else{
  echo "<script> alert('Session expired please re-login');setTimeout(function () { win.close();}, 6000);</script>";
}
 }
?>