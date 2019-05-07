<?php
$host="db4free.net";
$user="poomzatan123456";
$password="0811582889zX";

$connect=mysqli_connect($host,$user,$password,"testdb1234567");

mysqli_set_charset($connect,"UTF8");

if($connect)
{
   echo '$r'; 
	}
}else{
}
