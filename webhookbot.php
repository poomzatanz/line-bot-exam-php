<?php
$host="db4free.net";
$user="poomzatan123456";
$password="0811582889zX";
$connect=mysqli_connect($host,$user,$password,"testdb1234567");
mysqli_set_charset($connect,"UTF8");
if($connect)
{
   $accessToken = "QbPV0K1fLygsgn1qPdqb93NdTIqcMUOr4G4ArHZKbwqVqGRSrRzJrmVD9OuIBVzUoo1Zckc2sfsXkwgnxn92+0ZkaCCHq/KHD7QANBAogMPDp5ID+ea2juiV8+VAa8Pjsul37/1/RQlhV7z1ES5oYAdB04t89/1O/w1cDnyilFU=";

   $content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
   
   $message = $arrayJson['events'][0]['message']['text'];
   
   $id = $arrayJson['events'][0]['source']['userId'];

   if($message == "name"){
       
      $sql="SELECT * FROM `Line` INNER join regis on Line.pk_re = regis.pk_re WHERE `iduserLine`='".$id."'";
      $qury = mysqli_query($connect,$sql);
		$result=mysqli_fetch_array($qury,MYSQLI_ASSOC);
      $push[0]='สวัสดีครับ  '.$result['name'];
      $push[1]='User ID ของคุณคือ '.;
      $push[2]=$id;
       for($i=0;$i<=2;$i++){
          $arrayPostData['to'] = $id;
          $arrayPostData['messages'][0]['type'] = "text";
          $arrayPostData['messages'][0]['text'] = $push[$i];
          pushMsg($arrayHeader,$arrayPostData);
       }
    }else{
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สวัสดี";
      pushMsg($arrayHeader,$arrayPostData);
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
}else{
   
}
   exit;

