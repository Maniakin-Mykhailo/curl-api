<?php

$curl = curl_init();
$method = $_SERVER['REQUEST_METHOD'];
$id = '0';
if (isset($_GET['q'])):
$q = $_GET['q'];
$params = explode('/', $q);
$transaction = $params[0];
$user = $params[1];
$id = $params['2'];
endif;
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://user-transaction-fetch-api.herokuapp.com/transaction/user/' . "$id" ,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
));


$response_list = curl_exec($curl);
$response_list = json_decode($response_list, true);
curl_close($curl);


