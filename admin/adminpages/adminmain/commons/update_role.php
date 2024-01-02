<?php
    include_once '../../../../function.php';
    include_once '../../../../components/connect.php';
    $name_role = $_POST['name_role'];
    $id_role = $_POST['id_role'];
    $response = UpdateRole($name_role, $id_role);
    echo json_encode($response);
?>