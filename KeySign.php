<?php
//$data contains the message to be signed
$data='Your input here';

//Fetch private key from file and read it
$priv_key = file_get_contents("./PrivateKey.pem");
$pkeyid = openssl_get_privatekey($priv_key);

//Calculate signature with SHA-1 algorithm
openssl_sign($data, $signature, $pkeyid, OPENSSL_ALGO_SHA1);

//Encode in base64 the signature so it can be read by human eye
$signature = base64_encode($signature);

echo($signature);
file_put_contents('./signature.txt', $signature);
?>