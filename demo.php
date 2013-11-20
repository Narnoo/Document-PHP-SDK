<?php
//Import Document SDK
require_once './documents-sdk/class-request.php';
require_once './documents-sdk/class-document-request.php';


$appkey = '8WMVJYd5TF53o0xYZ2';
$secretkey = 'MbG393WXRn75anUFuxgsw63G78ojI3lI';


$document = new DocumentRequest($appkey,$secretkey);
//$getDocuments = $document->getCollection( array('department'=>1,'keywords' => 'ttnq'));
$getDocuments = $document->getCategories();
print_r($getDocuments);




?>
