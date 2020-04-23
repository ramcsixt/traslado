<?php
    require_once("xxtea.php");
    $str = "Hello World! 你好，中国！";
    $key = "2020Verano";
    $encrypt_data = xxtea_encrypt($str, $key);
    $decrypt_data = xxtea_decrypt($encrypt_data, $key);
    echo $encrypt_data;
?>