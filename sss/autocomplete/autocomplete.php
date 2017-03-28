<?php
	$q=$_GET['q'];
	//$my_data=real_escape_string($_POST['queryString']);
	/*$mysqli=mysqli_connect('localhost','','','test') or die("Database Error");
	$sql="SELECT name FROM tag WHERE name LIKE '%$q%' ORDER BY name";
	$result = mysqli_query($mysqli,$sql) or die(mysqli_error());
	
	if($result)
	{
		while($row=mysqli_fetch_array($result))
		{
			echo $row['name']."\n";
		}
	}*/


	$server = "tcp:sr9jfao529.database.windows.net";
$user = "csmonitoring@sr9jfao529";
$pwd = "C0ntinu5erve";
$db = "CSMonitoring-DEV";
$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );


$sql2 = "(SELECT name FROM tag WHERE name LIKE '%".$q."%' ORDER BY name)";
$result2=$conn->query($sql2);
//while($row=$result->fetch())
//echo $sql2;
 while($row2=$result2->fetch())
{
			echo $row2['email']."\n";
}


?>