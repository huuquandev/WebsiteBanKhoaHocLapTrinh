<?php

$db_host = 'localhost';
$db_name = 'websitelaptrinh';
$db_user = 'root';
$db_password = '';

// Kết nối cơ sở dữ liệu bằng MySQLi
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function unique_id() {
    $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $rand = array();
    $length = strlen($str) - 1;
    for ($i = 0; $i < 20; $i++) {
        $n = mt_rand(0, $length);
        $rand[] = $str[$n];
    }
    return implode($rand);
}


?>