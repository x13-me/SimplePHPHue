<!DOCTYPE html>
<?php
$hueIP = file_get_contents('IP.txt');
$apikey = file_get_contents('key.txt');
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://$hueIP/api/$apikey/groups/0/action");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"on\":true}");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
$headers = array();
$headers[] = "Content-Type: application/x-www-form-urlencoded";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
include 'index.html';
?>