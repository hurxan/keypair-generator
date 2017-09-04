<?php
//Message signed before
$data='Your input here';

//Fetching the keypair
$public_key = openssl_get_publickey(file_get_contents("./PublicKey.pem"));
$signature  = file_get_contents("./Signature.txt");

//Decoding the signature
$signature  = base64_decode($signature);

//Verifying the signature
$ok = openssl_verify($data, $signature, $public_key, OPENSSL_ALGO_SHA1);
if ($ok == 1) {
    echo "Signature verified successfully";
} elseif ($ok == 0) {
    echo "Message isn't correct";
} else {
    echo "Signature is wrong";
}
?>