<?php
//Import Document SDK
require_once './documents-sdk/class-request.php';
require_once './documents-sdk/class-document-request.php';

$appkey = '8WMVJYd5TF53o0xYZ2';
$secretkey = 'MbG393WXRn75anUFuxgsw63G78ojI3lI';
$endpoint = 'localhost:8888/distributor/index.php/api'; 

// Document Request Setup
$document = new DocumentRequest($appkey,$secretkey,$endpoint);
$getDocuments = $document->getDocuments();
print_r($getDocuments);
?>
