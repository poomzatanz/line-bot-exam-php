<?php
require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');
$access_token = 'n3Ip66xMPuO1xND8801hh9NZhuyHgsSuFvCETfyga18qvVuO095cmHbr9mV+M4kejFHkGb88rpwscKSr0co8BpWr8zN09hfRNUvhH6Mp/NOp6dMl/ULggahkDbLHk2nq/CtV0+85qZGZinIv50f6sQdB04t89/1O/w1cDnyilFU=';
$strAccessToken = "n3Ip66xMPuO1xND8801hh9NZhuyHgsSuFvCETfyga18qvVuO095cmHbr9mV+M4kejFHkGb88rpwscKSr0co8BpWr8zN09hfRNUvhH6Mp/NOp6dMl/ULggahkDbLHk2nq/CtV0+85qZGZinIv50f6sQdB04t89/1O/w1cDnyilFU=";
 
$strUrl = "https://api.line.me/v2/bot/message/push";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
$arrPostData = array();
$arrPostData['to'] = "U9fab035a6b8d51bd7c3104855fd54fc9";
$arrPostData['messages'][0]['type'] = "text";
$arrPostData['messages'][0]['text'] = "นี้คือการทดสอบ Push Message";
 
 
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
