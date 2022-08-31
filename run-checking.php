<?php

$HOSTNAME = "localhost:8000";
$CHECK_ADDRESS = "/admin/run-checking";

$url = $HOSTNAME . $CHECK_ADDRESS;

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);


while (true) {
    curl_exec($ch);
}