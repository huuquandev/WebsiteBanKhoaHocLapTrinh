<?php
         include_once '../../../../function.php';
         include_once '../../../../components/connect.php';
    $tags = $_POST['tags'];
    $response = deleteTags($tags);
    echo json_encode($response);

?>