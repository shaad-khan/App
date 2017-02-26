<?php
session_start();
$username = $_POST["uid"];
$password = $_POST["pass"];
$host = "https://continuserve1.sharepoint.com/";
 //$x="";
 if($username=="sbenny@continuserve.com")
 {
   $username2="stanly.benny@continuserve.com";

 }
 if($username=="rradhakrishnan@continuserve.com")
 {
   $username2="rajesh.radhakrishnan@continuserve.com";

 }
/*
 if($username2!='')
 {
$token = getSecurityToken($username2, $password, $host);
//$username=$username2;
 }
 else
 {
   $token = getSecurityToken($username, $password, $host);
 }*/
  $token = getSecurityToken($username, $password, $host);
$authCookies = getAuthCookies($token, $host);


//echo $authCookies[0];
//echo "<br/>".$authCookies[1];
 //header("Location: https://continuserve1.sharepoint.com/_forms/default.aspx?wa=wsignin1.0&".$token);
 if($username2!='')
 {
$pieces = explode("@", $username2);
 }
 else{
   $pieces = explode("@", $username);
 }
if($authCookies)
{
  $_SESSION["user"] = $pieces[0];
  if($username2!='')
 {
  $_SESSION["email_id"]=$username2;
 }
 else
 {
    $_SESSION["email_id"]=$username;
 }
  $_SESSION["pass"] =$password;
  include("db.php"); 
  $f=0;
$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
 if($username2!='')
 {
$sql="select * from User_prof where Status=1 and Email like'".$username2."'";
 }
 else
 {
   $sql="select * from User_prof where Status=1 and Email like'".$username."'";
 }
 $result=$conn->query($sql);
//while($row=$result->fetch())
 $team="";
//echo $sql2;
 while($row=$result->fetch())
{
$f=$row['Admin'];
$team=$row['Team'];
$_SESSION['Review']=$row['Review'];
$_SESSION['Doc']=$row['Doc'];
$_SESSION['Closure']=$row['Closure'];
$_SESSION["team"]=$team;

}
if($f)
{
$_SESSION["admin"]=1;
$_SESSION["team"]=$team;
}
if(($team=="L3")||($f==1))
{
  header('Location:https://apps.continuserve.com/main.php');
}
else 
{
  //echo "i am here";
//header('Location:https://apps.continuserve.com/continuity/app/home.php');
  echo "<script type='text/javascript'>alert('Sorry !! you dont have access to this portal ');</script>";
  header('Refresh: 1; URL=https://apps.continuserve.com/');
}
}
else
{
  echo "<script type='text/javascript'>alert('Sorry !! you have entered an invalid password ');</script>";


header('Refresh: 1; URL=https://apps.continuserve.com/');
}
 //sleep(10);
//header('Location:https://csmonitoring-dev.azurewebsites.net/o_view_date2.php?c=Today&d='.$date3);

 //header("Refresh: 2; https://continuserve1.sharepoint.com/PeopleSoft-L3/_layouts/15/start.aspx#/");
/**
 * Get the FedAuth and rtFa cookies
 * 
 * @param string $token
 * @param string $host
 * @return array
 * @throws Exception
 */
function getAuthCookies($token, $host) {
     
    $url = $host . "/_forms/default.aspx?wa=wsignin1.0";
     
    $ch = curl_init();
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$token);   
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//    curl_setopt($ch,CURLOPT_VERBOSE, 1); // For testing
    curl_setopt($ch, CURLOPT_HEADER, true); 
     
    $result = curl_exec($ch);
// echo $result;
    // catch error
    if($result === false) {
        throw new Exception('Curl error: ' . curl_error($ch));
    }
 
    //close connection
    curl_close($ch);      
     
    return getCookieValue($result);
    
}
 
/**
 * Get the security token needed
 * 
 * @param string $username
 * @param string $password
 * @param string $endpoint
 * @return string
 * @throws Exception
 */
 
function getSecurityToken($username, $password, $endpoint) {
     
    $url = "https://login.microsoftonline.com/extSTS.srf";
     
    $tokenXml = getSecurityTokenXml($username, $password, $endpoint);   
     
    $ch = curl_init();
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$tokenXml);   
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
 
    // catch error
    if($result === false) {
        throw new Exception('Curl error: ' . curl_error($ch));
    }
 
    //close connection
    curl_close($ch);
     
    // Parse security token from response
    $xml = new DOMDocument();
    $xml->loadXML($result);
    //echo $xml;
    $xpath = new DOMXPath($xml);
    $nodelist = $xpath->query("//wsse:BinarySecurityToken");
   // echo $xpath->query("//wsse:BinarySecurityToken");
    foreach ($nodelist as $n){
      $x= $n->nodeValue;
        return $n->nodeValue;
        break;
    }
}
 
/**
 * Get the XML to request the security token
 * 
 * @param string $username
 * @param string $password
 * @param string $endpoint
 * @return type string
 */
function getSecurityTokenXml($username, $password, $endpoint) {
    return <<<TOKEN
    <s:Envelope xmlns:s="http://www.w3.org/2003/05/soap-envelope"
      xmlns:a="http://www.w3.org/2005/08/addressing"
      xmlns:u="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">
  <s:Header>
    <a:Action s:mustUnderstand="1">http://schemas.xmlsoap.org/ws/2005/02/trust/RST/Issue</a:Action>
    <a:ReplyTo>
      <a:Address>http://www.w3.org/2005/08/addressing/anonymous</a:Address>
    </a:ReplyTo>
    <a:To s:mustUnderstand="1">https://login.microsoftonline.com/extSTS.srf</a:To>
    <o:Security s:mustUnderstand="1"
       xmlns:o="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
      <o:UsernameToken>
        <o:Username>$username</o:Username>
        <o:Password>$password</o:Password>
      </o:UsernameToken>
    </o:Security>
  </s:Header>
  <s:Body>
    <t:RequestSecurityToken xmlns:t="http://schemas.xmlsoap.org/ws/2005/02/trust">
      <wsp:AppliesTo xmlns:wsp="http://schemas.xmlsoap.org/ws/2004/09/policy">
        <a:EndpointReference>
          <a:Address>https://continuserve1.sharepoint.com/</a:Address>
        </a:EndpointReference>
      </wsp:AppliesTo>
      <t:KeyType>http://schemas.xmlsoap.org/ws/2005/05/identity/NoProofKey</t:KeyType>
      <t:RequestType>http://schemas.xmlsoap.org/ws/2005/02/trust/Issue</t:RequestType>
      <t:TokenType>urn:oasis:names:tc:SAML:1.0:assertion</t:TokenType>
    </t:RequestSecurityToken>
  </s:Body>
</s:Envelope>
TOKEN;
}
 
/**
 * Get the cookie value from the http header
 *
 * @param string $header
 * @return array 
 */
function getCookieValue($header)
{
    $authCookies = array();
    $header_array = explode("\r\n",$header);
    foreach($header_array as $header) {
        $loop = explode(":",$header);
        if($loop[0] == 'Set-Cookie') {
            $authCookies[] = $loop[1];
        }
    }
    unset($authCookies[0]); // No need for first cookie
    return array_values($authCookies);
}


?>