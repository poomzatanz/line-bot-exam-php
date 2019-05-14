<?php
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
               
		echo "<h1>ขอบคุณสำหรับการสอนนะครับ...</h1>";
	}
    }else {
        echo "<h1>มีข้อมูลแล้วครับ.......</h1>";
    }
    	

}
