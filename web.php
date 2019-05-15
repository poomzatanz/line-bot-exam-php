<?php
   $accessToken = "dO0ef9KZbvPCU5RSTQaaVMvZVbtQ6T5YOmaJbsqfSLes2CTerW169czvva/Ce1ojkVeGOkbZPImULUdT0gaZrZJSyzSUIsbAUFNzMkNPJ5tcPesmnkC9JHWiye5tAVinjZCPW5SPFkdVi2JXCcfhjgdB04t89/1O/w1cDnyilFU=";//copy ข้อความ Channel access token ตอนที่ตั้งค่า
   $content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
   //รับข้อความจากผู้ใช้
   $message = $arrayJson['events'][0]['message']['text'];
   
   $id = $arrayJson['events'][0]['source']['userId'];
   $host="db4free.net";
   $user="poomzatan123456";
   $password="0811582889zX";
   $connect=mysqli_connect($host,$user,$password,"testdb1234567");
   mysqli_set_charset($connect,"UTF8");

   $sql1 = "INSERT INTO `idLine` (`id`, `idLine`) VALUES (NULL, '$id')";
   $qury = mysqli_query($connect,$sql1);
   if($qury){

   }

   $sqltext1 = "SELECT * FROM `Learn` WHERE input = '".$message."'";
   $qury1 = mysqli_query($connect,$sqltext1);
     $result=mysqli_fetch_array($qury1,MYSQLI_ASSOC);

     $sqltext2 = "SELECT * FROM `name` INNER JOIN idLine ON name.id = idLine.id WHERE idLine = '".$id."'";
     $qury2 = mysqli_query($connect,$sqltext2);
     $result2=mysqli_fetch_array($qury2,MYSQLI_ASSOC);

   if($connect)
   {
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
         
           $push[0]='สวัสดีครับ  คุณ '.$result2['name'];
           $push[1]='User ID ของคุณคือ ';
           $push[2]="$id";
         
          for($i=0;$i<=2;$i++){
             $arrayPostData['to'] = $id;
             $arrayPostData['messages'][0]['type'] = "text";
             $arrayPostData['messages'][0]['text'] = $push[$i];
             pushMsg($arrayHeader,$arrayPostData);
          }
          
         }
       }elseif ($result) {
         $arrayPostData['to'] = $id;
         $arrayPostData['messages'][0]['type'] = "text";
         $arrayPostData['messages'][0]['text'] = $result['out']." ".$result2['name'];
         pushMsg($arrayHeader,$arrayPostData);
       }elseif (!$result2) {
         $arrayPostData['to'] = $id;
         $arrayPostData['messages'][0]['type'] = "text";
         $arrayPostData['messages'][0]['text'] = "ผมยังไม่รู้จักคุณกรุณาใส่ชื่อ ด้วยครับ ที่ https://regis.herokuapp.com/username.php ได้เลยครับ ";
         pushMsg($arrayHeader,$arrayPostData);
       }
       else{
          
         $arrayPostData['to'] = $id;
         $arrayPostData['messages'][0]['type'] = "text";
         $arrayPostData['messages'][0]['text'] = "ขอโทษครับ คุณ ".$result2['name']." ผมยังไม่ได้เรียนคำนี้ ......... กรุณาสอนด้วยครับ ที่ https://regis.herokuapp.com/upgradebot.php ได้เลยครับ";
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

?>