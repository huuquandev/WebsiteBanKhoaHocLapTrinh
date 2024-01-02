<?php
header('Content-type: text/html; charset=utf-8');
$config = file_get_contents('../config_momo.json');
$array = json_decode($config, true);
include('helper_momo.php');


$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


$partnerCode = $array['partnerCode'];
$accessKey = $array['accessKey'];
$secretKey = $array['secretKey'];
$orderInfo = "Thanh toán qua MoMo";
$amount = $_POST['tongtien'];
$orderId = time() ."";
$idKH = $_POST['idKH'];
$redirectUrl = "http://localhost:3000/pages/checkout.php?courses=$idKH&method=3";
$ipnUrl = "http://localhost:3000/pages/checkout.php?courses=$idKH&method=3";
$extraData = "";

    $requestId = time() . "";
    $requestType = "payWithATM";
    $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
    //before sign HMAC SHA256 signature
    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
    $signature = hash_hmac("sha256", $rawHash, $secretKey);
    $data = array('partnerCode' => $partnerCode,
        'partnerName' => "Test",
        "storeId" => "MomoTestStore",
        'requestId' => $requestId,
        'amount' => $amount,
        'orderId' => $orderId,
        'orderInfo' => $orderInfo,
        'redirectUrl' => $redirectUrl,
        'ipnUrl' => $ipnUrl,
        'lang' => 'vi',
        'extraData' => $extraData,
        'requestType' => $requestType,
        'signature' => $signature);
    $result = execPostRequest($endpoint, json_encode($data));
    $jsonResult = json_decode($result, true);  // decode json

    //Just a example, please check more in there

    header('Location: ' . $jsonResult['payUrl']);
?>