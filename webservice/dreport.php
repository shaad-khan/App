<?php




$server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$sql="DECLARE @startDate DATETIME=CAST(MONTH(GETDATE()) AS VARCHAR) + '/' + '01/' +  + CAST(YEAR(GETDATE()) AS VARCHAR) -- mm/dd/yyyy
DECLARE @endDate DATETIME= GETDATE() -- mm/dd/yyyy

;WITH Calender AS 
(
    SELECT @startDate AS CalanderDate
    UNION ALL
    SELECT CalanderDate + 1 FROM Calender
    WHERE CalanderDate + 1 <= @endDate
)
SELECT [Date] = CONVERT(VARCHAR(10),CalanderDate,25) 
FROM Calender
OPTION (MAXRECURSION 0)";

$result=$conn->query($sql);
//echo $msg;
  while($row4=$result->fetch())
{

	echo $row4['date'];
}


    ?>