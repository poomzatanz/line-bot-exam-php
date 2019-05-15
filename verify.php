<?php
$access_token = 'JMp2wdEJ8OAvnqoJjlnyQvxnUz03sesdqQbnv683lHCUgzoUJ4FNnx1S1HhZ2qIpoo1Zckc2sfsXkwgnxn92+0ZkaCCHq/KHD7QANBAogMPCyhSGdxfIgp6dfxdA3GiNTs2rJkV/dQAr9dVi1pXIggdB04t89/1O/w1cDnyilFU=';


$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;