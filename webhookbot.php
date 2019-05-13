<?php
   $accessToken = "U0p/EAti+Q5I+NI7Mj1X4jyXcF0I33C3aHAATpQpcjq7CpD751Sa35u+iB/k8C59oo1Zckc2sfsXkwgnxn92+0ZkaCCHq/KHD7QANBAogMOzXFbHufeLFmAy8FMz2Hd1DhmC2JxhRFtT5aFui7huWQdB04t89/1O/w1cDnyilFU=";
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
      $host="db4free.net";
      $user="poomzatan123456";
      $password="0811582889zX";
      $connect=mysqli_connect($host,$user,$password,"testdb1234567");
      mysqli_set_charset($connect,"UTF8");
      if($connect)
      {
         $sql="SELECT * FROM `Line` INNER join regis on Line.pk_re = regis.pk_re WHERE `iduserLine`='".$id."'";
         $qury = mysqli_query($connect,$sql);
		   $result=mysqli_fetch_array($qury,MYSQLI_ASSOC);
      
        $push[0]='สวัสดีครับ  '.$result['name'];
        $push[1]='User ID ของคุณคือ ';
        $push[2]="$id";
      
       for($i=0;$i<=2;$i++){
          $arrayPostData['to'] = $id;
          $arrayPostData['messages'][0]['type'] = "text";
          $arrayPostData['messages'][0]['text'] = $push[$i];
          pushMsg($arrayHeader,$arrayPostData);
       }
         
      }else{
         $arrayPostData['to'] = $id;
         $arrayPostData['messages'][0]['type'] = "text";
         $arrayPostData['messages'][0]['text'] = "ผมยังไม่ได้เรียนคำนี้";
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
