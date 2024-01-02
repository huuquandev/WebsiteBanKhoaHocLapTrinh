<?php
    include_once '../../../../function.php';
    include_once '../../../../components/connect.php';
    $name_role = $_POST['name_role'];
    $response = addRole($name_role);
    echo json_encode($response);
?>