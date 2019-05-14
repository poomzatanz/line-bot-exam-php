<?php
$accessToken = "U0p/EAti+Q5I+NI7Mj1X4jyXcF0I33C3aHAATpQpcjq7CpD751Sa35u+iB/k8C59oo1Zckc2sfsXkwgnxn92+0ZkaCCHq/KHD7QANBAogMOzXFbHufeLFmAy8FMz2Hd1DhmC2JxhRFtT5aFui7huWQdB04t89/1O/w1cDnyilFU=";
$content = file_get_contents('php://input');
$arrayJson = json_decode($content, true);


$host="db4free.net";
$user="poomzatan123456";
$password="0811582889zX";
$connect=mysqli_connect($host,$user,$password,"testdb1234567");
mysqli_set_charset($connect,"UTF8");
if($connect)
{
    $n=$_POST['name'];
    $l=$_POST['last'];
    
    $sqltext1 = "SELECT * FROM `Learn` WHERE input = '".$n."'";
		$qury1 = mysqli_query($connect,$sqltext1);
        $result=mysqli_fetch_array($qury1,MYSQLI_ASSOC);
  
    if(!$result){
        $sqltext = "INSERT INTO `Learn` (`id_learn`, `input`, `out`) VALUES (NULL, '$n', '$l');";
    $qury = mysqli_query($connect,$sqltext);
    
	if($qury){
        $sqltext1 = "SELECT * FROM `idLine` ORDER BY `id` DESC LIMIT 1";
		$qury1 = mysqli_query($connect,$sqltext1);
        $result1=mysqli_fetch_array($qury1,MYSQLI_ASSOC);

        $arrHeader = array();
        $arrHeader[] = "Content-Type: application/json";
        $arrHeader[] = "Authorization: Bearer {$accessToken}";
         
        $arrPostData = array();
        $arrPostData['to'] = $result1['idLine'];
        $arrPostData['messages'][0]['type'] = "text";
        $arrPostData['messages'][0]['text'] = "ขอบคุณสำหรับการสอนนะครับ";
        pushMsg($arrHeader,$arrPostData);
        echo "<h1>ขอบคุณสำหรับการสอนนะครับ...</h1>";
        exit;
	}
    }else {
        echo "<h1>มีข้อมูลแล้วครับ.......</h1>";
        exit;
    }
    	

}
function pushMsg($arrHeader,$arrPostData){
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
