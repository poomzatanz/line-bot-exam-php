<?php

function hello($name,$n,$l,$m,$a,$t) {
	
require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');
    echo "Hello1 $name.\n";
	$strAccessToken = "QbPV0K1fLygsgn1qPdqb93NdTIqcMUOr4G4ArHZKbwqVqGRSrRzJrmVD9OuIBVzUoo1Zckc2sfsXkwgnxn92+0ZkaCCHq/KHD7QANBAogMPDp5ID+ea2juiV8+VAa8Pjsul37/1/RQlhV7z1ES5oYAdB04t89/1O/w1cDnyilFU=";
		$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
	 $arrPostData = array();
	$arrPostData['to'] = $name;
$arrPostData['messages'][0]['type'] = "text";
$arrPostData['messages'][0]['text'] = "คุณได้สมัครสมาชิกแล้ว	ชื่อของคุณคือ 	".$n." นามสกุล ".$l."	อีเมลล์คือ	".$m."	ที่อยู่	".$a."	เบอร์โทรที่ติดต่อได้	".$t;

}

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');
$access_token = 'n3Ip66xMPuO1xND8801hh9NZhuyHgsSuFvCETfyga18qvVuO095cmHbr9mV+M4kejFHkGb88rpwscKSr0co8BpWr8zN09hfRNUvhH6Mp/NOp6dMl/ULggahkDbLHk2nq/CtV0+85qZGZinIv50f6sQdB04t89/1O/w1cDnyilFU=';
$strAccessToken = "QbPV0K1fLygsgn1qPdqb93NdTIqcMUOr4G4ArHZKbwqVqGRSrRzJrmVD9OuIBVzUoo1Zckc2sfsXkwgnxn92+0ZkaCCHq/KHD7QANBAogMPDp5ID+ea2juiV8+VAa8Pjsul37/1/RQlhV7z1ES5oYAdB04t89/1O/w1cDnyilFU=";
 
$strUrl = "https://api.line.me/v2/bot/message/push";
$host="db4free.net";
$user="poomzatan123456";
$password="0811582889zX";
$connect=mysqli_connect($host,$user,$password,"testdb1234567");
mysqli_set_charset($connect,"UTF8");
if($connect)
{
	$n=$_POST['name'];
	$l=$_POST['last'];
	$p=$_POST['pass'];
	$m=$_POST['mail'];
	$a=$_POST['add'];
	$t=$_POST['tel'];
	$pass = md5($p);	

   $sqltext1 = "SELECT DISTINCT iduserLine FROM Line";
		$qury1 = mysqli_query($connect,$sqltext1);
		while ($row=mysqli_fetch_array($qury1)){ 
		  hello($row['iduserLine'],$n,$l,$m,$a,$t);
		}
		

$sqltext = "INSERT INTO `regis` (`pk_re`, `name`, `lastname`, `add`, `email`, `password`, `tel`) VALUES (NULL, '$n', '$l', '$a', '$m', '$pass', '$t');";
  echo $sqltext;
	$qury = mysqli_query($connect,$sqltext);
	if($qury){
               
	}	
}
else{
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
