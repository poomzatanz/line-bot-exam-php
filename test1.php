<?php
require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');
$access_token = 'n3Ip66xMPuO1xND8801hh9NZhuyHgsSuFvCETfyga18qvVuO095cmHbr9mV+M4kejFHkGb88rpwscKSr0co8BpWr8zN09hfRNUvhH6Mp/NOp6dMl/ULggahkDbLHk2nq/CtV0+85qZGZinIv50f6sQdB04t89/1O/w1cDnyilFU=';
$strAccessToken = "9dBMbNELf4MfazUdpjf7Ut4tMHFJANUDNXGMvO/c4FQTp1m+c387phVRsKDcptKLYavvrpVcX1392F86W484NNwZf8iptnpLuuCSsztf8qdkVnLUHyHG+Onam1PfTX7NieDHHVXSJWse35NIaqfQMgdB04t89/1O/w1cDnyilFU=";
$strUrl = "https://api.line.me/v2/bot/message/push";
$host="db4free.net";
$user="poomzatan123456";
$password="0811582889zX";
$connect=mysqli_connect($host,$user,$password,"testdb1234567");
mysqli_set_charset($connect,"UTF8");
if($connect)
{
	
  $n=$_POST['name'];
  
    $sqltext1 = "SELECT * FROM idLine ORDER BY `id` DESC LIMIT 1";

		$qury1 = mysqli_query($connect,$sqltext1);
		$result=mysqli_fetch_array($qury1,MYSQLI_ASSOC);
		
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
$arrPostData = array();
$arrPostData['to'] = $result['idLine'];
$arrPostData['messages'][0]['type'] = "text";
$arrPostData['messages'][0]['text'] = "คุณได้สมัครสมาชิกแล้ว	ชื่อของคุณคือ 	".$n;
$sqltext = "INSERT INTO `name` (`pk_name`, `name`, `id`) VALUES (NULL, '$n','".$result['id']."')";
	$qury = mysqli_query($connect,$sqltext);
	if($qury){
               echo"<h1>ชื่อของคุณได้เก็บเข้าระบบแล้วครับ</h1>";
               echo "<script type='text/javascript'>window.close();</script>";
	}	
}
else{
  echo"<h1>เกิดข้อผิดพลาดกรุณากลับไปกรอกใหม่</h1>";

  echo"<script>
  var timeleft = 5;
  var downloadTimer = setInterval(function(){
    document.getElementById('progressBar').value = 5 - timeleft;
    timeleft -= 1;
    if(timeleft <= 0){
     window.location='username.php';
    }else{ 
          
  }, 1000);
  </script>
  <progress value='0' max='5' id='progressBar'></progress>
";
}
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
?>
