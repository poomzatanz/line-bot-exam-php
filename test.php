<?php
require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');
$access_token = 'n3Ip66xMPuO1xND8801hh9NZhuyHgsSuFvCETfyga18qvVuO095cmHbr9mV+M4kejFHkGb88rpwscKSr0co8BpWr8zN09hfRNUvhH6Mp/NOp6dMl/ULggahkDbLHk2nq/CtV0+85qZGZinIv50f6sQdB04t89/1O/w1cDnyilFU=';
$strAccessToken = "U0p/EAti+Q5I+NI7Mj1X4jyXcF0I33C3aHAATpQpcjq7CpD751Sa35u+iB/k8C59oo1Zckc2sfsXkwgnxn92+0ZkaCCHq/KHD7QANBAogMOzXFbHufeLFmAy8FMz2Hd1DhmC2JxhRFtT5aFui7huWQdB04t89/1O/w1cDnyilFU=";
 
$strUrl = "https://api.line.me/v2/bot/message/push";
$host="db4free.net";
$user="poomzatan123456";
$password="0811582889zX";
$connect=mysqli_connect($host,$user,$password,"testdb1234567");
mysqli_set_charset($connect,"UTF8");
if($connect)
{
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
$arrPostData = array();
$arrPostData['to'] = 'U00d3f92880e602629d119bfd651f4a3f';
$arrPostData['messages'][0]['type'] = "text";
$arrPostData['messages'][0]['text'] = "ทดสอบ ทดสอบ เทส เทส";

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
?>
