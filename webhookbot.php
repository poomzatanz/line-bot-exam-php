<?php
   $accessToken = "n3Ip66xMPuO1xND8801hh9NZhuyHgsSuFvCETfyga18qvVuO095cmHbr9mV+M4kejFHkGb88rpwscKSr0co8BpWr8zN09hfRNUvhH6Mp/NOp6dMl/ULggahkDbLHk2nq/CtV0+85qZGZinIv50f6sQdB04t89/1O/w1cDnyilFU=";
   $content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
   //รับข้อความจากผู้ใช้
   $message = $arrayJson['events'][0]['message']['text'];
   //รับ id ของผู้ใช้
   $id = $arrayJson['events'][0]['source']['userId'];
   if($message == "name"){
      $push[0]='สวัสดีครับ  ';
      $push[1]='User ID ของคุณคือ '.;
      $push[2]=$id;
       for($i=0;$i<=2;$i++){
          $arrayPostData['to'] = $id;
          $arrayPostData['messages'][0]['type'] = "text";
          $arrayPostData['messages'][0]['text'] = $push[$i];
          pushMsg($arrayHeader,$arrayPostData);
       }
    }
   function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
   }
   exit;
