<?php
    include_once '../../../../function.php';
    include_once '../../../../components/connect.php';
    $orderId = $_POST['orderId'];
    $status = $_POST['trangThai'];
    $userId = $_POST['userId'];
    $coursesId = $_POST['coursesId'];
    $response = UpdateStatusOrder($orderId, $status, $userId, $coursesId);
    echo json_encode($response);
?>