<?php

$url = "https://paysystem24.com/api/request";

$amount = htmlspecialchars($_POST['amount'] ?? '');
$phone = htmlspecialchars($_POST['phone'] ?? '');
$email = htmlspecialchars($_POST['email'] ?? '');
$name = htmlspecialchars($_POST['name'] ?? '');
$story = htmlspecialchars($_POST['story'] ?? '');
$sep = '\r\n';

$merchant_order_id = rand(13577888, 99273812);
$use_card_payment = "RUB";
$api_key = "10c7b6020566f94bc1f501968ba1aecdb5ed4b4f9092ce14cb44a9a16fd5ac27";
$success_url = "https://ximu.ru/success.html";
$fail_url = "https://ximu.ru/fail.html";
$notice_url = "https://ximu.ru";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/x-www-form-urlencoded",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = "amount=$amount&merchant_order_id=$merchant_order_id&use_card_payment=$use_card_payment&api_key=$api_key&success_url=$success_url&fail_url=$fail_url&notice_url=$notice_url";

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);

$data1 = "amount=$amount&merchant_order_id=$merchant_order_id&use_card_payment=$use_card_payment&api_key=$api_key&success_url=$success_url&fail_url=$fail_url&notice_url=$notice_url&phone=$phone&email=$email&name=$name&story=$story";
$file = 'bx6xjs7sja77sikk.txt';
file_put_contents($file, $data1 . PHP_EOL, FILE_APPEND | LOCK_EX);

?>
